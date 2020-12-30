<?php
use yii\helpers\Html;
?>
<table class="email-body" style="width: 96%;max-width: 620px;margin: 0 auto;background: #ffffff;border: 1px solid #e6effb;border-bottom: 4px solid #1babfe;">
  <tbody>
    <tr>
      <td class="pd-3x pdb-1-5x" style="padding-bottom: 15px;padding: 30px;">
        <h2 class="email-heading" style="margin-bottom: 0;font-size: 18px;color: #1babfe;font-weight: 600;margin: 0;line-height: 1.3;">Kích hoạt gói đầu tư thành công tại Invest.BuonLang.Com</h2>
      </td>
    </tr>
    <tr>
      <td class="pdl-3x pdr-3x pdb-2x" style="padding-bottom: 20px;padding-right: 30px;padding-left: 30px;">
        <p class="mgb-1x" style="margin-bottom: 10px;font-size:1em;">xin chào <?= Html::encode($user->username) ?>,</p>
        <p class="mgb-1x" style="margin-bottom: 10px;font-size:1em;">Chúng tôi xin thông báo tới quý khách hàng.</p>
        <p class="mgb-1x" style="margin-bottom: 10px;font-size:1em;">Gói đầu tư mang mã số <?=$order->id;?> đã được kích hoạt thành công vào lúc <?=$order->confirmed_at;?>.</p>
        <p class="mgb-2-5x" style="margin-bottom: 25px;font-size: 1em;">Vui lòng xem thông tin các gói đầu tư tại mục "Quản lý đầu tư" để biết thêm chi tiết.</p>
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