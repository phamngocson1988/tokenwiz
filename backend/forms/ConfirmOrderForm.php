<?php

namespace backend\forms;

use Yii;
use common\models\Order;
use common\models\User;

class ConfirmOrderForm extends ActionForm
{
    public $id;

    protected $_order;

    public function rules()
    {
    	return [
    		['id', 'required'],
    		['id', 'validateOrder']
    	];
    }

    public function validateOrder($attribute, $params = [])
    {
    	$order = $this->getOrder();
    	if (!$order) {
    		$this->addError($attribute, Yii::t('app', 'Order ID #{id} is not exist', ['id' => $this->id]));
    	} else if (!$order->isTemporary()) {
    		$this->addError($attribute, Yii::t('app', 'Order #{id} cannot be confirmed anymore', ['id' => $order->id]));
    	}
    }

    public function getOrder()
    {
    	if (!$this->_order) {
    		$this->_order = Order::findOne($this->id);
    	}
    	return $this->_order;
    }

    public function confirm()
    {
    	if (!$this->validate()) return false;
    	$order = $this->getOrder();
        $firstTimeConfirm = !$order->confirmed_at;
        $order->touch('confirmed_at');
    	$order->status = Order::STATUS_SUCCESS;
        if ($firstTimeConfirm) {
            return $order->save() && $this->sendEmail($order);
        }
        return $order->save();
    }

    protected function sendEmail($order)
    {
        $user = User::findOne($order->user_id);
        if (!$user) return true;

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'confirm_order'],
                ['user' => $user, 'order' => $order]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($user->email)
            ->setSubject(sprintf('Kích hoạt gói đầu tư số %s đã được xác nhận', $order->id))
            ->send();
    }
}
