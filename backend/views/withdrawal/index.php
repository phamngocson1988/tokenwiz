<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use common\components\helpers\CommonHelper;
use yii\bootstrap\ActiveForm;
?>
<div class="page-content">
  <div class="container">
    <div class="content-area card">
      <div class="card-innr">
        <div class="card-head d-flex justify-content-between align-items-center">
          <h4 class="card-title">Các yêu cầu rút tiền</h4>
        </div>
        <table class="data-table admin-tnx">
          <thead>
            <tr class="data-item data-head">
              <th class="data-col dt-tnxno">Mã</th>
              <th class="data-col dt-amount">Số tiền</th>
              <th class="data-col dt-usd-amount">Mô tả</th>
              <th class="data-col dt-token">Trạng thái</th>
              <th class="data-col"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($wallets as $wallet) :?>
            <tr class="data-item">
              <td class="data-col dt-tnxno">
                <div class="d-flex align-items-center">
                  <div class="fake-class">
                    <span class="lead tnx-id"><?=sprintf("#%s", $wallet->id);?></span>
                    <span class="sub sub-date"><?=CommonHelper::dateFormat($wallet->created_at);?></span>
                  </div>
                </div>
              </td>
              <td class="data-col dt-amount">
                <span class="lead amount-pay"><?=number_format($wallet->amount);?></span>
                <span class="sub sub-symbol">VNĐ </span>
              </td>
              <td class="data-col dt-usd-amount">
                <?=nl2br($wallet->description);?>
              </td>
              <td class="data-col dt-token">
                <?php if ($wallet->isDone()):?>
                <span class="dt-type-md badge badge-outline badge-success badge-md">Hoàn thành</span>
                <span class="dt-type-sm badge badge-sq badge-outline badge-success badge-md">D</span>
                <span class="sub sub-date"><?=CommonHelper::dateFormat($wallet->done_at);?></span>
                <?php elseif ($wallet->isRequesting()):?>
                <span class="dt-type-md badge badge-outline badge-warning badge-md">Đã gửi yêu cầu</span>
                <span class="dt-type-sm badge badge-sq badge-outline badge-warning badge-md">R</span>
                <span class="sub sub-date"><?=CommonHelper::dateFormat($wallet->created_at);?></span>
                <?php endif;?>
              </td>

              <td class="data-col text-right">
                <?php if ($wallet->isRequesting()) : ?>
                <div class="relative d-inline-block d-md-none">
                  <a href="javascript:;" class="btn btn-light-alt btn-xs btn-icon toggle-tigger"><em class="ti ti-more-alt"></em></a>
                  <div class="toggle-class dropdown-content dropdown-content-center-left pd-2x">
                    <ul class="data-action-list">
                      <li><a href="javascript:;" data-toggle="modal" data-target="#confirm<?=$wallet->id;?>" class="btn btn-auto btn-primary btn-xs"><span>Xác <span class="d-none d-xl-inline-block">nhận</span></span><em class="ti ti-wallet"></em></a></li>
                      <li><a href="javascript:;" data-toggle="modal" data-target="#delete<?=$wallet->id;?>" class="btn btn-danger-alt btn-xs btn-icon"><em class="ti ti-trash"></em></a></li>
                    </ul>
                  </div>
                </div>
                <ul class="data-action-list d-none d-md-inline-flex">
                  <li><a href="javascript:;" data-toggle="modal" data-target="#confirm<?=$wallet->id;?>" class="btn btn-auto btn-primary btn-xs"><span>Xác <span class="d-none d-xl-inline-block">nhận</span></span><em class="ti ti-wallet"></em></a></li>
                  <li><a href="javascript:;" data-toggle="modal" data-target="#delete<?=$wallet->id;?>" class="btn btn-danger-alt btn-xs btn-icon"><em class="ti ti-trash"></em></a></li>
                </ul>
                <?php endif;?>
                <!-- <a href="#" data-toggle="modal" data-target="#transaction-details" class="btn btn-light-alt btn-xs btn-icon"><em class="ti ti-eye"></em></a> -->
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <!-- .card-innr -->
    </div>
    <!-- .card -->
  </div>
  <!-- .container -->
</div>
<!-- .page-content -->

<!-- Modal Large -->
<div class="modal fade" id="transaction-details" tabindex="-1">
  <div class="modal-dialog modal-dialog-lg modal-dialog-centered">
    <div class="modal-content">
      <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
      <div class="popup-body popup-body-lg">
        <div class="content-area">
          <div class="card-head d-flex justify-content-between align-items-center">
            <h4 class="card-title mb-0">Transaction Details</h4>
          </div>
          <div class="gaps-1-5x"></div>
          <div class="data-details d-md-flex">
            <div class="fake-class">
              <span class="data-details-title">Tranx Date</span>
              <span class="data-details-info">24 Jul, 2018 10:11PM</span>
            </div>
            <div class="fake-class">
              <span class="data-details-title">Tranx Status</span>
              <span class="badge badge-success ucap">Approved</span>
            </div>
            <div class="fake-class">
              <span class="data-details-title">Tranx Approved Note</span>
              <span class="data-details-info">By <strong>Admin</strong> at 24 Jul, 2018 10:12PM</span>
            </div>
          </div>
          <div class="gaps-3x"></div>
          <h6 class="card-sub-title">Transaction Info</h6>
          <ul class="data-details-list">
            <li>
              <div class="data-details-head">Transaction Type</div>
              <div class="data-details-des"><strong>Purchase</strong></div>
            </li>
            <!-- li -->
            <li>
              <div class="data-details-head">Payment Getway</div>
              <div class="data-details-des"><strong>Ethereum <small>- Offline Payment</small></strong></div>
            </li>
            <!-- li -->
            <li>
              <div class="data-details-head">Deposit From</div>
              <div class="data-details-des"><strong>0xa87d264f935920005810653734156d3342d5c385</strong></div>
            </li>
            <!-- li -->
            <li>
              <div class="data-details-head">Tx Hash</div>
              <div class="data-details-des"><span>Tx156d3342d5c87d264f9359200xa058106537340385c87d264f93</span> <span></span></div>
            </li>
            <!-- li -->
            <li>
              <div class="data-details-head">Deposit To</div>
              <div class="data-details-des"><span>0xa058106537340385156d3342d5c87d264f935920</span> <span></span></div>
            </li>
            <!-- li -->
            <li>
              <div class="data-details-head">Details</div>
              <div class="data-details-des">Tokens Purchase</div>
            </li>
            <!-- li -->
          </ul>
          <!-- .data-details -->
          <div class="gaps-3x"></div>
          <h6 class="card-sub-title">Token Details</h6>
          <ul class="data-details-list">
            <li>
              <div class="data-details-head">Stage Name</div>
              <div class="data-details-des"><strong>ICO Phase 3</strong></div>
            </li>
            <!-- li -->
            <li>
              <div class="data-details-head">Contribution</div>
              <div class="data-details-des">
                <span><strong>1.000 ETH</strong> <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="1 ETH = 100 TWZ"></em></span>
                <span><em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="1 ETH = 100 TWZ"></em> $2540.65</span>
              </div>
            </li>
            <!-- li -->
            <li>
              <div class="data-details-head">Tokens Added To</div>
              <div class="data-details-des"><strong>UD1020001 <small>- infoicox@gmail..com</small></strong></div>
            </li>
            <!-- li -->
            <li>
              <div class="data-details-head">Token (T)</div>
              <div class="data-details-des">
                <span>4,780.00</span>
                <span>(4780 * 1)</span>
              </div>
            </li>
            <!-- li -->
            <li>
              <div class="data-details-head">Bonus Tokens (B)</div>
              <div class="data-details-des">
                <span>956.00</span>
                <span>(956 * 1)</span>
              </div>
            </li>
            <!-- li -->
            <li>
              <div class="data-details-head">Total Tokens</div>
              <div class="data-details-des">
                <span><strong>5,736.00</strong></span>
                <span>(T+B)</span>
              </div>
            </li>
            <!-- li -->
          </ul>
          <!-- .data-details -->
        </div>
        <!-- .card -->
      </div>
    </div>
    <!-- .modal-content -->
  </div>
  <!-- .modal-dialog -->
</div>
<!-- Modal End -->

<?php foreach ($wallets as $wallet) : ?>
<?php if ($wallet->isRequesting()) : ?>
<div class="modal fade" id="confirm<?=$wallet->id;?>" tabindex="-1">
  <div class="modal-dialog modal-dialog-sm modal-dialog-centered">
    <div class="modal-content">
      <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
      <div class="popup-body">
        <?= Html::beginForm(['withdrawal/confirm', 'id' => $wallet->id], 'post') ?>
        <h3 class="popup-title">Xác nhận thanh toán yêu cầu rút tiền</h3>
        <p><?=sprintf('Bạn có chắc chắn muốn xác nhận <strong style="color:red">yêu cầu thanh toán số %s</strong> không? Ngay sau khi nhấn nút Xác Nhận, <strong style="color:red">số tiền %sVNĐ</strong> sẽ được trừ vào trong tài khoản khách hàng', $wallet->id, number_format($wallet->amount));?></p>
        <button class="btn btn-primary">Xác nhận</button>
        <?= Html::endForm() ?>
      </div>
    </div>
    <!-- .modal-content -->
  </div>
  <!-- .modal-dialog -->
</div>
<div class="modal fade" id="delete<?=$wallet->id;?>" tabindex="-1">
  <div class="modal-dialog modal-dialog-sm modal-dialog-centered">
    <div class="modal-content">
      <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
      <div class="popup-body">
        <?= Html::beginForm(['withdrawal/delete', 'id' => $wallet->id], 'post') ?>
        <h3 class="popup-title">Xoá yêu cầu rút tiền</h3>
        <p><?=sprintf('Bạn có chắc chắn muốn xoá <strong style="color:red">yêu cầu thanh toán số %s</strong> không?', $wallet->id);?></p>
        <button class="btn btn-primary">Xoá</button>
        <?= Html::endForm() ?>
      </div>
    </div>
    <!-- .modal-content -->
  </div>
  <!-- .modal-dialog -->
</div>
<?php endif;?>
<?php endforeach;?>