<?php

namespace backend\forms;

use Yii;
use common\models\Wallet;
use yii\helpers\ArrayHelper;

class FetchWalletForm extends FetchListForm
{
    public $orderBy = ['id' => SORT_DESC];

    protected function buildQuery()
    {
        $query = Wallet::find();
        $query->orderBy($this->orderBy);
        $this->_query = $query;
    }    
}
