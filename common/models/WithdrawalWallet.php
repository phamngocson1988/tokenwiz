<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * WithdrawalWallet model
 */
class WithdrawalWallet extends ActiveRecord
{
    const STATUS_REQUESTING = 0;
    const STATUS_DONE = 1;

    public static function tableName()
    {
        return '{{%withdrawal_wallet}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => date('Y-m-d H:i:s')
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => false,
            ],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function isRequesting()
    {
        return $this->status === self::STATUS_REQUESTING;
    }

    public function isDone()
    {
        return $this->status === self::STATUS_DONE;
    }
}