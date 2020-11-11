<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<table class="email-body">
  <tbody>
    <tr>
      <td class="text-center pd-3x pdb-1-5x">
        <h2 class="email-heading">Reset Password</h2>
      </td>
    </tr>
    <tr>
      <td class="text-center pd-3x pt-0 pdb-2x">
        <p class="mgb-1x">Hi <?= Html::encode($user->username) ?>,</p>
        <p class="mgb-2-5x">Click On The link blow to reset tour password.</p>
        <a class="email-btn">Reset Password</a>
        <?= Html::a('Reset Password', $resetLink, ['class' => 'email-btn']) ?>
      </td>
    </tr>
    <tr>
      <td class="text-center pd-3x pdt-2x pdb-4x">
        <p>If you did not make this request, please contact us or ignore this message.</p>
        <p class="email-note">This is an automatically generated email please do not reply to this email. If you face any issues, please contact us at  help@icocrypto.com</p>
      </td>
    </tr>
  </tbody>
</table>