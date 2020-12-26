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
        <h2 class="email-heading">Thiết lập lại mật khẩu</h2>
      </td>
    </tr>
    <tr>
      <td class="text-center pd-3x pt-0 pdb-2x">
        <p class="mgb-1x">Chào <?= Html::encode($user->username) ?>,</p>
        <p class="mgb-2-5x">Vui lòng nhấn vào link bên dưới để thiết lập lại mật khẩu của bạn.</p>
        <a class="email-btn">Thay đổi mật khẩu</a>
        <?= Html::a('Reset Password', $resetLink, ['class' => 'email-btn']) ?>
      </td>
    </tr>
    <tr>
      <td class="text-center pd-3x pdt-2x pdb-4x">
        <p>Nếu bạn không thực hiện yêu cầu này, vui lòng liên hệ với chúng tôi và bỏ qua email này.</p>
        <p class="email-note">Đây là email tự động, vui lòng không trả lời email này. Nếu bạn gặp bất kỳ vấn đề nào, xin liên hệ với chúng tôi qua địa chỉ email buonlang.com</p>
      </td>
    </tr>
  </tbody>
</table>