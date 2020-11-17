<?php

namespace backend\forms;

use Yii;
use common\models\User;
use yii\helpers\ArrayHelper;

class FetchUserForm extends FetchListForm
{
    public $orderBy = ['id' => SORT_DESC];

    protected function buildQuery()
    {
        $query = User::find()->where(['<>', 'status', User::STATUS_DELETED]);
        $query->orderBy($this->orderBy);
        $this->_query = $query;
    }    
}
