<?php
namespace backend\forms;

use Yii;
use yii\base\Model;
use common\models\WithdrawalWallet;

class DeleteWithdrawalForm extends Model
{
    public $id;
    protected $_withdrawal;

     /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['id', 'required'],
            ['id', 'validateWithdrawal'],
        ];
    }

    public function validateWithdrawal($attribute, $params = []) 
    {
        $withdrawal = $this->getWithdrawal();
        if (!$withdrawal) {
            return $this->addError($attribute, 'Yêu cầu không tồn tại');
        }
        if ($withdrawal->isDone()) {
            return $this->addError($attribute, sprintf('Không thể xoá yêu cầu rút tiền này vì đang ở trạng thái DONE'));
        }
    }

    public function getWithdrawal()
    {
        if (!$this->_withdrawal) {
            $this->_withdrawal = WithdrawalWallet::findOne($this->id);
        }
        return $this->_withdrawal;
    }

    public function remove()
    {
        if (!$this->validate()) return false;
        $withdrawal = $this->getWithdrawal();
        return $withdrawal->delete();
    }
}

