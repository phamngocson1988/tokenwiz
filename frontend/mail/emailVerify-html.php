<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
<table class="email-body">
  <tbody>
    <tr>
      <td class="pd-3x pdb-1-5x">
        <h2 class="email-heading">Confirm Your E-Mail Address</h2>
      </td>
    </tr>
    <tr>
      <td class="pdl-3x pdr-3x pdb-2x">
        <p class="mgb-1x">Hi <?= Html::encode($user->username) ?>,</p>
        <p class="mgb-1x">Welcome! <br> You are receiving this email because you have registered on our site.</p>
        <p class="mgb-1x">Click the link below to active your Tokenwiz account.</p>
        <p class="mgb-2-5x">This link will expire in 15 minutes and can only be used once.</p>
        <?= Html::a('Verify Email', $verifyLink) ?>
      </td>
    </tr>
    <tr>
      <td class="pdl-3x pdr-3x">
        <h4 class="email-heading-s2">or</h4>
        <p class="mgb-1x">If the button above does not work, paste this link into your web browser:</p>
        <?= Html::a(Html::encode($verifyLink), $verifyLink, ['class' => 'link-block']) ?>
      </td>
    </tr>
    <tr>
      <td class="pd-3x pdt-2x pdb-3x">
        <p>If you did not make this request, please contact us or ignore this message.</p>
        <p class="email-note">This is an automatically generated email please do not reply to this email. If you face any issues, please contact us at  help@icocrypto.com</p>
      </td>
    </tr>
  </tbody>
</table>