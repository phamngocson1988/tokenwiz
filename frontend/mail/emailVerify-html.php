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
        <h2 class="email-heading">Xác nhận email tại Invest.BuonLang.Com</h2>
      </td>
    </tr>
    <tr>
      <td class="pdl-3x pdr-3x pdb-2x">
        <p class="mgb-1x">xin chào <?= Html::encode($user->username) ?>,</p>
        <p class="mgb-1x">Bạn nhận được email này vì đã đăng ký thành công trên website của chúng tôi.</p>
        <p class="mgb-1x">Nhấn vào đường dẫn bên dưới để kích hoạt tài khoản của bạn trên https://invest.buonlang.com</p>
        <p class="mgb-2-5x">Đường dẫn kích hoạt sẽ hết hạn trong vòng 15 phút và chỉ được sử dụng 1 lần.</p>
        <?= Html::a('Xác mình email', $verifyLink) ?>
      </td>
    </tr>
    <tr>
      <td class="pdl-3x pdr-3x">
        <h4 class="email-heading-s2">hoặc</h4>
        <p class="mgb-1x">Nếu nút kích hoạt không hoạt động, bạn vui lòng dán đường dẫn sau vào trình duyệt:</p>
        <?= Html::a(Html::encode($verifyLink), $verifyLink, ['class' => 'link-block']) ?>
      </td>
    </tr>
    <tr>
      <td class="pd-3x pdt-2x pdb-3x">
        <p>Nếu bạn không thực hiện yêu cầu này, vui lòng liên hệ với chúng tôi và bỏ qua email này.</p>
        <p class="email-note">Đây là email tự động, vui lòng không trả lời email này. Nếu bạn gặp bất kỳ vấn đề nào, xin liên hệ với chúng tôi qua địa chỉ email buonlang.com</p>
      </td>
    </tr>
  </tbody>
</table>