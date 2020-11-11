<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Change password';
?>
<div class="page-ath-form">
  <h2 class="page-ath-heading">Change password <span>Type your new password input textbox below.</span></h2>
  <?php $form = ActiveForm::begin(['id' => 'change-password-form']); ?>
    <?= $form->field($model, 'password', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'autofocus' => true, 'placeholder' => 'Type your new password']
    ])->passwordInput()->label(false) ?>
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <button class="btn btn-primary btn-block">Change password</button>
      </div>
      <div>
        <a href="<?=Url::to(['site/login']);?>">Return to login</a>
      </div>
    </div>
    <div class="gaps-2x"></div>
  <?php ActiveForm::end(); ?>
</div>