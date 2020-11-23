<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Thay đổi mật khẩu';
?>
<div class="page-ath-form">
  <h2 class="page-ath-heading">Đổi mật khẩu <span>Nhập mật khẩu mới vào ô bên dưới.</span></h2>
  <?php $form = ActiveForm::begin(['id' => 'change-password-form']); ?>
    <?= $form->field($model, 'password', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'autofocus' => true, 'placeholder' => 'Nhập mật khẩu mới']
    ])->passwordInput()->label(false) ?>
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <button class="btn btn-primary btn-block">Đổi mật khẩu</button>
      </div>
      <div>
        <a href="<?=Url::to(['site/login']);?>">Về trang đăng nhập</a>
      </div>
    </div>
    <div class="gaps-2x"></div>
  <?php ActiveForm::end(); ?>
</div>