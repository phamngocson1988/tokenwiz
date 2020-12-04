<?php

namespace backend\forms;

use Yii;
use common\models\Order;

class ManualStartOrderForm extends ActionForm
{
    public function start()
    {
    	$date = date('Y-m-d 00:00:00');
        $orders = Order::find()
        ->where(['<', 'created_at', $date])
        ->andWhere(['status' => Order::STATUS_SUCCESS])
        ->all();

        $connection = Yii::$app->db;
        $transaction = $connection->beginTransaction();
        try {
            if (count($orders)) {
                foreach ($orders as $order) {
                    $order->touch('started_at');
                    $order->status = Order::STATUS_RUNNING;
                    $order->save();
                }
                $transaction->commit();
            }
            return true;
        } catch(Exception $e) {
            $transaction->rollback();
            return false;
        }
    }
}
