<?php

namespace backend\forms;

use Yii;
use common\models\Order;
use yii\helpers\ArrayHelper;

class FetchOrderForm extends FetchListForm
{
    public $orderBy = ['id' => SORT_DESC];

    protected function buildQuery()
    {
        $query = Order::find();
        $query->orderBy($this->orderBy);
        $this->_query = $query;
    }    
}
