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
  <h2 class="page-ath-heading">Đăng nhập</h2>
  <?php $form = ActiveForm::begin(['id' => 'singin-form']); ?>
    <?= $form->field($model, 'username', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'autofocus' => true, 'placeholder' => 'Tài khoản']
    ])->textInput()->label(false) ?>
    <?= $form->field($model, 'password', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'placeholder' => 'Mật khẩu']
    ])->passwordInput()->label(false) ?>
    <div class="d-flex justify-content-between align-items-center">
      <?=$form->field($model, 'rememberMe', [
        'options' => ['class' => 'input-item text-left'],
        'template' => '{input}{label}'
      ])->checkbox(['class' => 'input-checkbox input-checkbox-md', 'id' => 'remember-me'], false)->label('Ghi nhớ đăng nhập');?>
      <div>
        <a href="<?=Url::to(['site/request-password-reset']);?>">Quên mật khẩu?</a>
        <div class="gaps-2x"></div>
      </div>
    </div>
    <button class="btn btn-primary btn-block">Đăng nhập</button>
  <?php ActiveForm::end(); ?>
  <div class="gaps-2x"></div>
  <div class="gaps-2x"></div>
  <div class="form-note">
    Chưa có tài khoản? <a href="<?=Url::to(['site/signup']);?>"> <strong>Đăng ký</strong></a>
  </div>
</div>
<?php
$script = <<< JS
$('.btn-google1').on('click', function() {
  console.log('btn-google');
  var provider = new firebase.auth.GoogleAuthProvider();
  firebase.auth().signInWithPopup(provider).then(function(result) {
    console.log('result', result);
    // This gives you a Google Access Token. You can use it to access the Google API.
    var token = result.credential.accessToken;
    // The signed-in user info.
    var user = result.user;
    var email = user.email;
    var uid = user.uid;
    // ...
  }).catch(function(error) {
    console.log('error', error);
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    // The email of the user's account used.
    var email = error.email;
    // The firebase.auth.AuthCredential type that was used.
    var credential = error.credential;
    // ...
  });
});
$('.btn-facebook1').on('click', function() {
  var phoneNumber = '+84986803325';
  window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
    'size': 'invisible',
    'callback': function(response) {
      console.log('response', response);
      

    },
  });

  var appVerifier = window.recaptchaVerifier;
  firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
    .then(function (confirmationResult) {
      window.confirmationResult = confirmationResult;
    }).catch(function (error) {
    });
});

$('#check').on('click', function() {
  var code = $('#code').val();
  window.confirmationResult.confirm(code).then(function (result) {
    var user = result.user;
    console.log('user', user.phoneNumber);
  }).catch(function (error) {
    console.log('error', error);
  })
});
JS;
$this->registerJs($script);
?>
