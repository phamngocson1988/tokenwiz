<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="page-ath-form">
  <h2 class="page-ath-heading">Sign in <small>with your TokenWiz Account</small></h2>
  <?php $form = ActiveForm::begin(['id' => 'singin-form']); ?>
    <?= $form->field($model, 'username', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'autofocus' => true, 'placeholder' => 'User name']
    ])->textInput()->label(false) ?>
    <?= $form->field($model, 'password', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'placeholder' => 'Password']
    ])->passwordInput()->label(false) ?>
    <div class="d-flex justify-content-between align-items-center">
      <?=$form->field($model, 'rememberMe', [
        'options' => ['class' => 'input-item text-left'],
        'template' => '{input}{label}'
      ])->checkbox(['class' => 'input-checkbox input-checkbox-md', 'id' => 'remember-me'], false)->label('Remember Me');?>
      <div>
        <a href="<?=Url::to(['site/request-password-reset']);?>">Forgot password?</a>
        <div class="gaps-2x"></div>
      </div>
    </div>
    <button class="btn btn-primary btn-block">Sign In</button>
  <?php ActiveForm::end(); ?>
  <div class="sap-text"><span>Or Sign In With</span></div>
  <ul class="row guttar-20px guttar-vr-20px">
    <li class="col"><a href="#" class="btn btn-outline btn-dark btn-facebook btn-block"><em class="fab fa-facebook-f"></em><span>Facebook</span></a></li>
    <li class="col"><a href="#" class="btn btn-outline btn-dark btn-google btn-block"><em class="fab fa-google"></em><span>Google</span></a></li>
  </ul>
  <div class="gaps-2x"></div>
  <div class="gaps-2x"></div>
  <div class="form-note">
    Don’t have an account? <a href="<?=Url::to(['site/signup']);?>"> <strong>Sign up here</strong></a>
  </div>
</div>
