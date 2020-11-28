<?php
namespace common\behaviors;

use yii\behaviors\AttributeBehavior;
use common\models\Wallet;

class UserWalletBehavior extends AttributeBehavior
{
	public function totalWalletValue()
    {
	    $owner = $this->owner; // user
    	return Wallet::find()
    	->where(['user_id' => $owner->id])
    	->sum('amount');
    }
}
