<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * Order model
 */
class Order extends ActiveRecord
{
    const STATUS_TEMPORARY = 1;
    const STATUS_RUNNING = 2;
    const STATUS_STOP = 3;
    
	public static function tableName()
    {
        return '{{%order}}';
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

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function isTemporary()
    {
        return $this->status === self::STATUS_TEMPORARY;
    }

    public function isRunning() 
    {
        return $this->status === self::STATUS_RUNNING;
    }

    public function isStop()
    {
        return $this->status === self::STATUS_STOP;
    }

    public function canStop()
    {
        if ($this->isRunning()) {
            $date1 = date_create($this->started_at);
            $date2 = date_create(date('now'));
            $diff = date_diff($date1, $date2);
            $days = $diff->format("%a");
            return $days >= 180;
        }
        return false;
    }
}