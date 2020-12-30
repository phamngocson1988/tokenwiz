<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
<table class="email-body" style="width: 96%;max-width: 620px;margin: 0 auto;background: #ffffff;border: 1px solid #e6effb;border-bottom: 4px solid #1babfe;">
  <tbody style="box-sizing: border-box;display: table-row-group;vertical-align: middle;border-color: inherit;">
    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
      <td class="pd-3x pdb-1-5x" style="padding-bottom: 15px; padding: 30px;">
        <h2 class="email-heading" style="font-size: 18px;color: #1babfe;font-weight: 600;margin: 0;">Xác nhận email tại Invest.BuonLang.Com</h2>
      </td>
    </tr>
    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
      <td class="pdl-3x pdr-3x pdb-2x" style="padding-bottom: 20px;padding-right: 30px;padding-left: 30px;">
        <p class="mgb-1x" style="margin-bottom: 10px;font-size:1em;">xin chào <?= Html::encode($user->username) ?>,</p>
        <p class="mgb-1x" style="margin-bottom: 10px;font-size:1em;">Bạn nhận được email này vì đã đăng ký thành công trên website của chúng tôi.</p>
        <p class="mgb-1x" style="margin-bottom: 10px;font-size:1em;">Nhấn vào đường dẫn bên dưới để kích hoạt tài khoản của bạn trên https://invest.buonlang.com</p>
        <p class="mgb-2-5x" style="margin-bottom: 25px;font-size:1em;">Đường dẫn kích hoạt sẽ hết hạn trong vòng 15 phút và chỉ được sử dụng 1 lần.</p>
        <?= Html::a('Xác mình email', $verifyLink, ['style' => 'word-break: break-all;background: #1babfe;border-radius: 4px;color: #ffffff !important;display: inline-block;font-size: 13px;font-weight: 600;line-height: 44px;text-align: center;text-decoration: none;text-transform: uppercase;padding: 0 30px;outline: 0;transition: all 0.5s;']) ?>
      </td>
    </tr>
    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
      <td class="pdl-3x pdr-3x" style="padding-right: 30px;padding-left: 30px;">
        <h4 class="email-heading-s2" style="font-size: 15px;color: #000000;font-weight: 600;margin: 0;text-transform: uppercase;margin-bottom: 10px;">hoặc</h4>
        <p class="mgb-1x" style="margin-bottom: 10px;font-size:1em;">Nếu nút kích hoạt không hoạt động, bạn vui lòng dán đường dẫn sau vào trình duyệt:</p>
        <?= Html::a(Html::encode($verifyLink), $verifyLink, ['class' => 'link-block', ['style' => 'display: block;color: #1babfe;word-break: break-all;text-decoration: none;outline: 0;transition: all 0.5s;']]) ?>
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