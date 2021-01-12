<?php
namespace frontend\forms;

use Yii;
use yii\base\Model;
use common\models\WithdrawalWallet;

class CreateWithdrawalForm extends Model
{
    public $amount;
    public $description;
    public $user_id;

     /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['description', 'trim'],
            [['amount', 'description','user_id'], 'required'],
            ['amount', 'integer', 'min' => 1000]
        ];
    }

    public function create()
    {
        if (!$this->validate()) return false;
        $withdrawal = new WithdrawalWallet();
        $withdrawal->amount = $this->amount;
        $withdrawal->description = $this->description;
        $withdrawal->user_id = $this->user_id;
        return $withdrawal->save();
    }
}

