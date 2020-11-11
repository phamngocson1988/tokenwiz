<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
?>
<div class="page-ath-form">
  <h2 class="page-ath-heading">Reset password <span>If you forgot your password, well, then we’ll email you instructions to reset your password.</span></h2>
  <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
    <?= $form->field($model, 'email', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'autofocus' => true, 'placeholder' => 'Your Email']
    ])->textInput()->label(false) ?>
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <button class="btn btn-primary btn-block">Send Reset Link</button>
      </div>
      <div>
        <a href="<?=Url::to(['site/login']);?>">Return to login</a>
      </div>
    </div>
    <div class="gaps-2x"></div>
  <?php ActiveForm::end(); ?>
</div>