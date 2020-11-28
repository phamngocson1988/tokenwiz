<?php 
use yii\helpers\Url;
use common\components\helpers\CommonHelper;
?>
<div class="page-content">
  <div class="container">
    <div class="content-area card">
      <div class="card-innr">
        <div class="card-head">
          <h4 class="card-title">Quản lý giao dịch</h4>
        </div>
        <table class="data-table dt-filter-init admin-tnx">
          <thead>
            <tr class="data-item data-head">
              <th class="data-col dt-tnxno">Mã giao dịch</th>
              <th class="data-col dt-account">Khách hàng</th>
              <th class="data-col dt-token">Loại giao dịch</th>
              <th class="data-col dt-amount">Số tiền</th>
              <th class="data-col dt-usd-amount">Mô tả</th>
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
              <td class="data-col dt-account">
                <span class="lead user-info"><?=$wallet->user->username;?></span>
              </td>
              <td class="data-col dt-token">
                <?php if ($wallet->isInput()):?>
                <span class="dt-type-md badge badge-outline badge-success badge-md">Nạp vào</span>
                <span class="dt-type-sm badge badge-sq badge-outline badge-success badge-md">N</span>
                <?php elseif ($wallet->isOutput()):?>
                <span class="dt-type-md badge badge-outline badge-warning badge-md">Rút ra</span>
                <span class="dt-type-sm badge badge-sq badge-outline badge-warning badge-md">R</span>
                <?php endif;?>
              </td>
              <td class="data-col dt-amount">
                <span class="lead amount-pay"><?=number_format($wallet->amount);?></span>
                <span class="sub sub-symbol"><?=$wallet->currency;?> </span>
              </td>
              <td class="data-col dt-usd-amount">
                <?=nl2br($wallet->description);?>
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