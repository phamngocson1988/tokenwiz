<?php
use yii\helpers\Html;
?>
<table class="email-body">
  <tbody>
    <tr>
      <td class="pd-3x pdb-1-5x">
        <h2 class="email-heading">Kích hoạt gói đầu tư thành công tại Invest.BuonLang.Com</h2>
      </td>
    </tr>
    <tr>
      <td class="pdl-3x pdr-3x pdb-2x">
        <p class="mgb-1x">xin chào <?= Html::encode($user->username) ?>,</p>
        <p class="mgb-1x">Chúng tôi xin thông báo tới quý khách hàng.</p>
        <p class="mgb-1x">Gói đầu tư mang mã số <?=$order->id;?> đã được kích hoạt thành công vào lúc <?=$order->confirmed_at;?>.</p>
        <p class="mgb-2-5x">Vui lòng xem thông tin các gói đầu tư tại mục "Quản lý đầu tư" để biết thêm chi tiết.</p>
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