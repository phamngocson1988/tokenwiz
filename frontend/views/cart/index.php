<?php
use yii\helpers\Html;

use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
?>
<div class="page-content">
  <div class="container">
    <div class="row">
      <div class="main-content col-lg-8">
      <?php $form = ActiveForm::begin(['options' => [
        'id' => 'purchase-form', 
        'data-calculatecart-url' => Url::to(['cart/calculate']),
        'data-purchase-url' => Url::to(['cart/purchase'])
      ]]); ?>
        <div class="d-lg-none">
          <a href="#" data-toggle="modal" data-target="#add-wallet" class="btn btn-danger btn-xl btn-between w-100 mgb-1-5x">Add your wallet address before buy <em class="ti ti-arrow-right"></em></a>
          <div class="gaps-1x mgb-0-5x d-lg-none d-none d-sm-block"></div>
        </div>
        <div class="content-area card">
          <div class="card-innr">
            <div class="card-head">
              <span class="card-sub-title text-primary font-mid">Bước 1</span>
              <h4 class="card-title">Chọn gói đầu tư</h4>
            </div>
            <div class="token-currency-choose">
              <div class="row guttar-15px">
                <?= $form->field($checkoutForm, 'product_id', [
                  'options' => ['class' => 'col-12'],
                ])->widget(\frontend\widgets\ProductRadioListInput::className(), [
                  'items' => $checkoutForm->fetchProducts(),
                  'options' => ['class' => 'pay-option']
                ])->label(false);?>
              </div>
              <!-- .row -->
            </div>
            <div class="card-head">
              <span class="card-sub-title text-primary font-mid">Bước 2</span>
              <h4 class="card-title">Chọn số lượng đầu tư</h4>
            </div>
            <div class="card-text">
              <p>Nhập vào số lượng đầu tư</p>
            </div>
            <div class="token-contribute">
              <div class="token-calc">
                <?= $form->field($checkoutForm, 'quantity', [
                  'options' => ['class' => 'token-pay-amount'],
                  'inputOptions' => ['class' => 'input-bordered', 'id' => 'quantity', 'type' => 'number', 'style' => 'width: 100px'],
                  'template' => '{input}'
                ])->textInput(); ?>
                <div class="token-received">
                  <div class="token-eq-sign">=</div>
                  <div class="token-received-amount">
                    <h5 class="token-amount" id="price"><?=number_format($checkoutForm->getTotalPrice());?></h5>
                    <div class="token-symbol">VNĐ</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="token-overview-wrap">
              <div class="token-overview">
                <div class="row">
                  <div class="col-md-4 col-sm-6">
                    <div class="token-bonus token-bonus-sale">
                      <span class="token-overview-title">+ Lãi suất 3% mỗi tháng</span>
                      <span class="token-overview-value bonus-on-sale">1,200,000₫</span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <div class="token-bonus token-bonus-amount">
                      <span class="token-overview-title">+ Lãi suất 1 năm</span>
                      <span class="token-overview-value bonus-on-amount">14,400,000₫</span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="token-total">
                      <span class="token-overview-title font-bold">Lãi suất 5 năm</span>
                      <span class="token-overview-value token-total-amount text-primary">72,000,000₫</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-head">
              <span class="card-sub-title text-primary font-mid">Bước 3</span>
              <h4 class="card-title">Hình thức thanh toán</h4>
            </div>
            <div class="card-text">
              <p>Thanh toán chuyển khoản</p>
            </div>
            <div class="pay-buttons">
              <div class="pay-button"><a href="javascript:;" data-toggle="modal" data-target="#pay-online" class="btn btn-primary btn-between w-100">Đầu tư <em class="ti ti-arrow-right"></em></a></div>
            </div>
            <div class="pay-notes">
              <div class="note note-plane note-light note-md font-italic">
                <em class="fas fa-info-circle"></em>
                <p>Gói đầu tư sẽ bắt đầu tính lãi vào ngày tiếp theo ngay sau ngày thanh toán.</p>
              </div>
            </div>
          </div>
          <!-- .card-innr -->
        </div>
        <!-- .content-area -->
      <?php ActiveForm::end(); ?>
      </div>
      <?=\frontend\widgets\SidebarUserSummaryWidget::widget();?>
      <!-- .col -->
    </div>
    <!-- .container -->
  </div>
  <!-- .container -->
</div>
<!-- .page-content -->

<div class="modal fade" id="pay-online" tabindex="-1">
  <div class="modal-dialog modal-dialog-md modal-dialog-centered">
    <div class="modal-content pb-0">
      <div class="popup-body text-center">
        <h3>Xác nhận đặt hàng</h3>
        <div class="gaps-2x"></div>
        <a href="javascript:;" id="purchase-buton" class="btn btn-primary">Đặt hàng</a>
        <div class="gaps-1x"></div>
      </div>
    </div>
    <!-- .modal-content -->
  </div>
  <!-- .modal-dialog -->
</div>
<!-- Modal End -->

<div class="modal fade" id="pay-review" tabindex="-1">
  <div class="modal-dialog modal-dialog-md modal-dialog-centered">
    <div class="modal-content">
      <div class="popup-body text-center">
        <div class="gaps-2x"></div>
        <div class="pay-status pay-status-success">
          <em class="ti ti-check"></em>
        </div>
        <div class="gaps-2x"></div>
        <h3>Chúng tôi vừa nhận được yêu cầu đầu tư của bạn</h3>
        <p>Đơn hàng sẽ được tính lãi suất vào ngày tiếp theo kể từ ngày thanh toán.</p>
        <div class="gaps-2x"></div>
        <a href="<?=Url::to(['order/index']);?>" class="btn btn-primary">Xem đơn hàng</a>
        <div class="gaps-1x"></div>
      </div>
    </div>
    <!-- .modal-content -->
  </div>
  <!-- .modal-dialog -->
</div>
<!-- Modal End -->
<div class="modal fade" id="pay-failed" tabindex="-1">
  <div class="modal-dialog modal-dialog-md modal-dialog-centered">
    <div class="modal-content">
      <div class="popup-body text-center">
        <div class="gaps-2x"></div>
        <div class="pay-status pay-status-error">
          <em class="ti ti-alert"></em>
        </div>
        <div class="gaps-2x"></div>
        <h3>Oops! Quá trình đặt hàng bị lỗi!</h3>
        <p>Xin lỗi, dường như có một vài vấn đề xảy ra và bạn không thể thực hiện việc thanh toán đơn hàng. Chắc chắn rằng bạn đã <strong>đăng nhập vào tài khoản và thực hiện đầy đủ các thao tác</strong>. Nếu bạn tiếp tục gặp vấn đề này, vui lòng liên hệ với chúng tôi.</p>
        <div class="gaps-2x"></div>
        <a href="<?=Url::to(['cart/index']);?>" class="btn btn-primary">Thực hiện lại</a>
        <div class="gaps-1x"></div>
      </div>
    </div>
    <!-- .modal-content -->
  </div>
  <!-- .modal-dialog -->
</div>
<!-- Modal End -->
<?php
$script = <<< JS
function calculateCart() {
  var form = $('form#purchase-form');
  var calculateUrl = form.data('calculatecart-url');
  $.ajax({
      url: calculateUrl,
      type: 'POST',
      dataType : 'json',
      data: form.serialize(),
      success: function (result, textStatus, jqXHR) {
        if (result.status == false) {
            toastr.error(result.errors);
        } else {
            $('#price').html(result.data.amount);
        }
      },
  });
}
function purchase() {
  var form = $('form#purchase-form');
  var purchaseUrl = form.data('purchase-url');
  $('#pay-online').modal('hide');
  $.ajax({
      url: purchaseUrl,
      type: 'POST',
      dataType : 'json',
      data: form.serialize(),
      success: function (result, textStatus, jqXHR) {
        if (result.status == false) {
            // toastr.error(result.errors);
            $('#pay-failed').modal();
        } else {
            $('#pay-review').modal();
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        $('#pay-failed').modal();
        // alert(xhr.status);
        // alert(thrownError);
      },
  });
}
$('#quantity').on('change', function() {  
  var quantity = $(this).val();
  if (quantity <= 0) {
    $(this).val(1);
  } 
  calculateCart();
});
$('#purchase-buton').on('click', function() {
  return purchase();
})
JS;
$this->registerJs($script);
?>