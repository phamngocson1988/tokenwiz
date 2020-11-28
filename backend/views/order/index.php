<?php 
use yii\helpers\Url;
use common\components\helpers\CommonHelper;
?>
<div class="page-content">
  <div class="container">
    <div class="content-area card">
      <div class="card-innr">
        <div class="card-head">
          <h4 class="card-title">Quản lý đầu tư</h4>
        </div>
        <table class="data-table dt-filter-init admin-tnx">
          <thead>
            <tr class="data-item data-head">
              <th class="data-col dt-tnxno">Mã đầu tư</th>
              <th class="data-col dt-account">Tên gói đầu tư</th>
              <th class="data-col dt-token">Số lượng</th>
              <th class="data-col dt-amount">Giá tiền</th>
              <th class="data-col dt-usd-amount">Thành tiền</th>
              <th class="data-col dt-type">
                <div class="dt-type-text">Trạng thái</div>
              </th>
              <th class="data-col"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($orders as $order) :?>
            <tr class="data-item">
              <td class="data-col dt-tnxno">
                <div class="d-flex align-items-center">
                  <?php if ($order->isTemporary()):?>
                  <div class="data-state data-state-pending">
                    <span class="d-none">Temporary</span>
                  </div>
                  <?php elseif ($order->isSuccess() || $order->isRunning()):?>
                  <div class="data-state data-state-approved">
                    <span class="d-none">Success</span>
                  </div>
                  <?php elseif ($order->isStop()) :?>
                  <div class="data-state data-state-canceled">
                    <span class="d-none">Pending</span>
                  </div>
                  <?php endif;?>
                  <div class="fake-class">
                    <span class="lead tnx-id"><?=sprintf("#%s", $order->id);?></span>
                    <span class="sub sub-date"><?=CommonHelper::dateFormat($order->created_at);?></span>
                  </div>
                </div>
              </td>
              <td class="data-col dt-account">
                <span class="lead user-info"><?=$order->product->name;?></span>
                <span class="sub sub-date"><?=$order->isRunning() ? CommonHelper::dateFormat($order->started_at) : 'Waiting';?></span>
              </td>
              <td class="data-col dt-token">
                <span class="lead token-amount"><?=number_format($order->quantity);?></span>
                <span class="sub sub-symbol">Package</span>
              </td>
              <td class="data-col dt-amount">
                <span class="lead amount-pay"><?=number_format($order->price);?></span>
                <span class="sub sub-symbol"><?=$order->currency;?></span>
              </td>
              <td class="data-col dt-usd-amount">
                <span class="lead amount-pay"><?=number_format($order->total_price);?></span>
                <span class="sub sub-symbol"><?=$order->currency;?></span>
              </td>
              <td class="data-col dt-type">
                <?php if ($order->isTemporary()):?>
                <span class="dt-type-md badge badge-outline badge-warning badge-md">Temporary</span>
                <span class="dt-type-sm badge badge-sq badge-outline badge-warning badge-md">T</span>
                <?php elseif ($order->isSuccess()):?>
                <span class="dt-type-md badge badge-outline badge-success badge-md">Success</span>
                <span class="dt-type-sm badge badge-sq badge-outline badge-success badge-md">S</span>
                <?php elseif ($order->isRunning()):?>
                <span class="dt-type-md badge badge-outline badge-success badge-md">Running</span>
                <span class="dt-type-sm badge badge-sq badge-outline badge-success badge-md">R</span>
                <?php elseif ($order->isStop()) :?>
                <span class="dt-type-md badge badge-outline badge-danger badge-md">Pending</span>
                <span class="dt-type-sm badge badge-sq badge-outline badge-danger badge-md">P</span>
                <?php endif;?>
              </td>
              <td class="data-col text-right">
                <?php if (!$order->isStop()) :?>
                <div class="relative d-inline-block">
                  <a href="#" class="btn btn-light-alt btn-xs btn-icon toggle-tigger"><em class="ti ti-more-alt"></em></a>
                  <div class="toggle-class dropdown-content dropdown-content-top-left">
                    <ul class="dropdown-list">
                      <?php if ($order->isTemporary()):?>
                      <li><a href="<?=Url::to(['order/confirm', 'id' => $order->id]);?>"><em class="ti ti-check-box"></em> Confirm</a></li>
                      <?php elseif ($order->isSuccess()) :?>
                      <li><a href="<?=Url::to(['order/start', 'id' => $order->id]);?>"><em class="fa fa-play"></em> Start</a></li>
                      <?php elseif ($order->isRunning()):?>
                      <li><a href="<?=Url::to(['order/stop', 'id' => $order->id]);?>"><em class="fa fa-stop"></em> Stop</a></li>
                      <?php endif;?>
                    </ul>
                  </div>
                </div>
                <?php endif;?>
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