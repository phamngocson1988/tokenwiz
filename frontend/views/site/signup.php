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
  <h2 class="page-ath-heading">Đăng ký <small>Tạo tài khoản mới</small></h2>
  <?php $form = ActiveForm::begin(['id' => 'singup-form']); ?>
    <?= $form->field($model, 'username', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'autofocus' => true, 'placeholder' => 'Tài khoản']
    ])->textInput()->label(false) ?>

    <?= $form->field($model, 'email', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'placeholder' => 'Email']
    ])->textInput()->label(false) ?>
    
    <?= $form->field($model, 'phone', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'placeholder' => 'Số điện thoại']
    ])->textInput()->label(false) ?>

    <?= $form->field($model, 'password', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'placeholder' => 'Mật khẩu']
    ])->passwordInput()->label(false) ?>

    <?= $form->field($model, 'repassword', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'placeholder' => 'Nhập lại mật khẩu']
    ])->passwordInput()->label(false) ?>

    <div class="input-item text-left">
      <input class="input-checkbox input-checkbox-md" id="term-condition" type="checkbox">
      <label for="term-condition">Bạn cần đồng ý với <a href="javascript:;">Chính sách bảo mật</a> &amp; <a href="javascript:;"> Điều khoản sử dụng.</a></label>
    </div>
    <button class="btn btn-primary btn-block">Tạo tài khoản</button>
  <?php ActiveForm::end(); ?>
  <div class="gaps-2x"></div>
  <div class="gaps-2x"></div>
  <div class="form-note">
    Đã có tài khoản ? <a href="<?=Url::to(['site/login']);?>"> <strong>Đăng nhập</strong></a>
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