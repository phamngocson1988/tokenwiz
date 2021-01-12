<?php

namespace frontend\forms;

use Yii;
use common\models\WithdrawalWallet;
use yii\helpers\ArrayHelper;

class FetchWithdrawWalletForm extends FetchListForm
{
	public $user_id;
    public $orderBy = ['id' => SORT_DESC];

    public function rules()
    {
    	return [
    		['user_id', 'required']
    	];
    }
    protected function buildQuery()
    {
        $query = WithdrawalWallet::find();
        $query->where(['user_id' => $this->user_id]);
        $query->orderBy($this->orderBy);
        $this->_query = $query;
    }    
}
