<?php
namespace frontend\widgets;

use Yii;
use yii\base\Widget;

class SidebarUserSummaryWidget extends Widget
{
    public $modalId = 'choose-language';
    public $url;

    public function run()
    {
        return $this->render('sidebar_user_summary', [
            'user' => Yii::$app->user->isGuest ? null : Yii::$app->user->identity,
        ]);
    }
}