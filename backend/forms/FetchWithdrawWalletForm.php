<?php

namespace backend\forms;

use Yii;
use common\models\WithdrawalWallet;
use yii\helpers\ArrayHelper;

class FetchWithdrawWalletForm extends FetchListForm
{
	public $user_id;
    public $orderBy = ['id' => SORT_DESC];

    protected function buildQuery()
    {
        $query = WithdrawalWallet::find();
        if ($this->user_id) {
            $query->where(['user_id' => $this->user_id]);
        }
        $query->orderBy($this->orderBy);
        $this->_query = $query;
    }    
}
