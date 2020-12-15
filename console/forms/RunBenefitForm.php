<?php

namespace console\forms;

use Yii;
use common\models\Order;
use common\models\Wallet;

class RunBenefitForm extends ActionForm
{
    public function run()
    {
        $date = date('Y-m-d');
        $orders = Order::find()
        ->where(['=', "TIMESTAMPDIFF(DAY , date(IFNULL(last_benefit_at, started_at)), '$date')", 30])
        ->andWhere(['status' => Order::STATUS_RUNNING])
        ->all();
        $connection = Yii::$app->db;
        $transaction = $connection->beginTransaction();
        try {
            if (count($orders)) {
                foreach ($orders as $order) {
                    $refObj = get_class($order);
                    $exists = Wallet::find()
                    ->where([
                        'user_id' => $order->user_id,
                        'type' => Wallet::TYPE_IN,
                        'ref_obj' => $refObj,
                        'ref_key' => $order->id
                    ])
                    ->andWhere(['=', "TIMESTAMPDIFF(DAY , date(created_at), '$date')", 0])
                    ->exists();
                    if (!$exists) {
                        $wallet = new Wallet();
                        $wallet->user_id = $order->user_id;
                        $wallet->type = Wallet::TYPE_IN;
                        $wallet->description = sprintf("Benefit from order #%s at %s", $order->id, $date);
                        $wallet->amount = (int)$order->total_price * 3 / 100;
                        $wallet->currency = 'VND';
                        $wallet->ref_obj = $refObj;
                        $wallet->ref_key = $order->id;
                        $wallet->save();
                        $order->touch('last_benefit_at');
                        $order->save();
                    }
                }
                $transaction->commit();
            }
            return count($orders);
        } catch(Exception $e) {
            $this->addError('error', $e->getMessage());
            $transaction->rollback();
            return false;
        }
    }
}
