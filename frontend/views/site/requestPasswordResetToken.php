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
  <h2 class="page-ath-heading">Tạo lại mật khẩu</h2>
  <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
    <?= $form->field($model, 'email', [
      'options' => ['class' => 'input-item'],
      'inputOptions' => ['class' => 'input-bordered', 'autofocus' => true, 'placeholder' => 'Nhập email']
    ])->textInput()->label(false) ?>
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <button class="btn btn-primary btn-block">Gửi thông tin tạo lại mật khẩu</button>
      </div>
      <div>
        <a href="<?=Url::to(['site/login']);?>">Trở về trang đăng nhập</a>
      </div>
    </div>
    <div class="gaps-2x"></div>
  <?php ActiveForm::end(); ?>
</div>