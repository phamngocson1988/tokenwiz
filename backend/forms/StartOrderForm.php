<?php

namespace backend\forms;

use Yii;
use common\models\Order;

class StartOrderForm extends ActionForm
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
    	} else if (!$order->isSuccess()) {
    		$this->addError($attribute, Yii::t('app', 'Order #{id} cannot be started', ['id' => $order->id]));
    	}
    }

    public function getOrder()
    {
    	if (!$this->_order) {
    		$this->_order = Order::findOne($this->id);
    	}
    	return $this->_order;
    }

    public function start()
    {
    	if (!$this->validate()) return false;
    	$order = $this->getOrder();
        $order->touch('started_at');
    	$order->status = Order::STATUS_RUNNING;
    	return $order->save();
    }
}
