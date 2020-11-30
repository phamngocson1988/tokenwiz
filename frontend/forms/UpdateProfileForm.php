<?php
namespace frontend\forms;

use Yii;
use yii\base\Model;

class UpdateProfileForm extends Model
{
    public $phone;

    private $_user;

     /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'string', 'max' => 32],
        ];
    }

    public function change()
    {
        $user = $this->getUser();
        $user->phone = $this->phone;
        return $user->save(false);
    }


    protected function getUser()
    {
        return Yii::$app->user->getIdentity();
    }

    public function loadData()
    {
        $user = $this->getUser();
        $this->phone = $user->phone;
    }
}

