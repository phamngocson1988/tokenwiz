<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<table class="email-body" style="width: 96%;max-width: 620px;margin: 0 auto;background: #ffffff;border: 1px solid #e6effb;border-bottom: 4px solid #1babfe;">
  <tbody style="box-sizing: border-box;display: table-row-group;vertical-align: middle;border-color: inherit;">
    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
      <td class="text-center pd-3x pdb-1-5x" style="padding-bottom: 15px;padding: 30px;text-align: center!important;">
        <h2 class="email-heading" style="margin-bottom: 0;font-size: 18px;color: #1babfe;font-weight: 600;margin: 0;line-height: 1.3;">Thiết lập lại mật khẩu</h2>
      </td>
    </tr>
    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
      <td class="text-center pd-3x pt-0 pdb-2x" style="padding-bottom: 20px;padding: 30px;text-align: center!important;padding-top: 0!important">
        <p class="mgb-1x" style="margin-bottom: 10px;font-size:1em;">Chào <?= Html::encode($user->username) ?>,</p>
        <p class="mgb-2-5x" style="margin-bottom: 25px;font-size: 1em;">Vui lòng nhấn vào link bên dưới để thiết lập lại mật khẩu của bạn.</p>
        <?= Html::a('Thay đổi mật khẩu', $resetLink, ['style' => 'word-break: break-all;background: #1babfe;border-radius: 4px;color: #ffffff !important;display: inline-block;font-size: 13px;font-weight: 600;line-height: 44px;text-align: center;text-decoration: none;text-transform: uppercase;padding: 0 30px;outline: 0;transition: all 0.5s;']) ?>
      </td>
    </tr>
    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
      <td class="pd-3x pdt-2x pdb-3x" style="padding-bottom: 30px;padding-top: 20px;padding: 30px;display: table-cell;vertical-align: inherit;">
        <p class="font-size: 1em;margin-top: 0;">Nếu bạn không thực hiện yêu cầu này, vui lòng liên hệ với chúng tôi và bỏ qua email này.</p>
        <p class="email-note" style="margin-bottom: 0;margin: 0;font-size: 13px;line-height: 22px;color: #6e81a9;">Đây là email tự động, vui lòng không trả lời email này. Nếu bạn gặp bất kỳ vấn đề nào, xin liên hệ với chúng tôi qua địa chỉ email buonlang.com</p>
      </td>
    </tr>
  </tbody>
</table>