<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * Wallet model
 */
class Wallet extends ActiveRecord
{
    const TYPE_IN = 1;
    const TYPE_OUT = 2;
    
    public static function tableName()
    {
        return '{{%wallet}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => date('Y-m-d H:i:s')
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function isInput()
    {
        return $this->type === self::TYPE_IN;
    }

    public function isOutput()
    {
        return $this->type === self::TYPE_OUT;
    }
}