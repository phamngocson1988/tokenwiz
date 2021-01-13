<?php
namespace backend\forms;

use Yii;
use yii\base\Model;
use common\models\WithdrawalWallet;
use common\models\Wallet;

class ConfirmWithdrawalForm extends Model
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
            return $this->addError($attribute, sprintf('Yêu cầu rút tiền này không hợp lệ vì đang ở trạng thái DONE'));
        }

        $user = $withdrawal->user;
        $totalWalletValue = $user->totalWalletValue();
        if ($totalWalletValue < $withdrawal->amount) {
            return $this->addError($attribute, sprintf('Tài khoản của bạn còn %s VNĐ. Bạn không thể rút tiền vì số tiền yêu cầu lớn hơn số tài khoản hiện có.', number_format($totalWalletValue)));
        }
    }

    public function getWithdrawal()
    {
        if (!$this->_withdrawal) {
            $this->_withdrawal = WithdrawalWallet::findOne($this->id);
        }
        return $this->_withdrawal;
    }

    public function confirm()
    {
        if (!$this->validate()) return false;
        $connection = Yii::$app->db;
        $transaction = $connection->beginTransaction();
        $withdrawal = $this->getWithdrawal();
        $date = date('Y-m-d H:i:s');
        try {
            $withdrawal->status = WithdrawalWallet::STATUS_DONE;
            $withdrawal->done_at = $date;
            $withdrawal->done_by = Yii::$app->user->id;
            $withdrawal->save();

            // Withdraw wallet
            $wallet = new Wallet();
            $wallet->type = Wallet::TYPE_OUT;
            $wallet->user_id = $withdrawal->user_id;
            $wallet->amount = abs($withdrawal->amount) * (-1);
            $wallet->currency = 'VND';
            $wallet->ref_obj = WithdrawalWallet::className();
            $wallet->ref_key = $withdrawal->id;
            $wallet->description = sprintf("Rút tiền từ yêu cầu số #%s at %s", $withdrawal->id, $date);
            $wallet->save();
            $transaction->commit();
            return true;
        } catch(Exception $e) {
            $transaction->rollback();
            return false;
        }
    }
}

