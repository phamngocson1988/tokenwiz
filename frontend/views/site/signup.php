<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
?>
<div class="page-ath-form">
  <h2 class="page-ath-heading">Sign up <small>Create New TokenWiz Account</small></h2>
  <?php $form = ActiveForm::begin(['id' => 'singup-form']); ?>
    <?= $form->field($model, 'username', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'autofocus' => true, 'placeholder' => 'User name']
    ])->textInput()->label(false) ?>

    <?= $form->field($model, 'email', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'placeholder' => 'Your Email']
    ])->textInput()->label(false) ?>

    <?= $form->field($model, 'password', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'placeholder' => 'Password']
    ])->passwordInput()->label(false) ?>

    <?= $form->field($model, 'repassword', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'placeholder' => 'Repeat Password']
    ])->passwordInput()->label(false) ?>

    <div class="input-item text-left">
      <input class="input-checkbox input-checkbox-md" id="term-condition" type="checkbox">
      <label for="term-condition">I agree to TokenWiz’s <a href="javascript:;">Privacy Policy</a> &amp; <a href="javascript:;"> Terms.</a></label>
    </div>
    <button class="btn btn-primary btn-block">Create Account</button>
  <?php ActiveForm::end(); ?>
  <div class="sap-text"><span>Or Sign Up With</span></div>
  <ul class="row guttar-20px guttar-vr-20px">
    <li class="col"><a href="#" class="btn btn-outline btn-dark btn-facebook btn-block"><em class="fab fa-facebook-f"></em><span>Facebook</span></a></li>
    <li class="col"><a href="#" class="btn btn-outline btn-dark btn-google btn-block"><em class="fab fa-google"></em><span>Google</span></a></li>
  </ul>
  <div class="gaps-2x"></div>
  <div class="gaps-2x"></div>
  <div class="form-note">
    Already have an account ? <a href="<?=Url::to(['site/login']);?>"> <strong>Sign in instead</strong></a>
  </div>
</div>
<?php
$script = <<< JS
$('form#singup-form').on('submit', function() {
  if (!$('#term-condition').is(':checked')) {
    toastr.error('You need to agree with our policies');
    return false;
  }
});
JS;
$this->registerJs($script);
?>