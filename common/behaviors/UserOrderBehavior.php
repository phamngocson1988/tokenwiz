<?php
namespace common\behaviors;

use yii\behaviors\AttributeBehavior;
use common\models\Order;

class UserOrderBehavior extends AttributeBehavior
{
	public function totalOrderValue()
    {
	    $owner = $this->owner; // user
    	return Order::find()
    	->where(['user_id' => $owner->id])
    	->andWhere(['status' => [Order::STATUS_SUCCESS, Order::STATUS_RUNNING]])
    	->sum('total_price');
    }
}
