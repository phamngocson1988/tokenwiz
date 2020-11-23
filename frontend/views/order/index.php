<?php 
use common\components\helpers\CommonHelper;
?>
<div class="page-content">
  <div class="container">
    <div class="row">
      <div class="main-content col-lg-8">
        <div class="content-area card">
          <div class="card-innr">
            <div class="card-head">
              <h4 class="card-title">Quản lý đầu tư</h4>
            </div>
            <div class="card-text">
              <p>Các gói đầu tư của bạn sẽ được hiển thị bên dưới. Nếu có sai xót hoặc sự cố, xin thông cảm và vui lòng liên hệ đội ngũ Admin để xử lý</p>
              <p>Mọi chi tiết thắc mắc xin vui lòng liên hệ Hotline: 09xxxxxx hoặc đội ngũ hỗ trợ</p>
            </div>
            <div class="gaps-3x"></div>
            <div class="card-head">
              <h5 class="card-title card-title-md">Thông tin các gói đầu tư</h5>
            </div>
            <?php foreach ($orders as $order) : ?>
            <div class="schedule-item">
              <div class="row">
                <div class="col-xl-5 col-md-5 col-lg-6">
                  <div class="pdb-1x">
                    <h5 class="schedule-title">
                      <span><?=$order->product->name;?></span>
                      <?php if ($order->isTemporary()) : ?>
                      <span class="badge badge-disabled ucap badge-xs">Đang chờ</span>
                      <?php elseif ($order->isSuccess()) : ;?>
                      <span class="badge badge-success ucap badge-xs">Đã thanh toán</span>                      
                      <?php elseif ($order->isRunning()) : ;?>
                      <span class="badge badge-success ucap badge-xs">Hoạt động</span>                      
                      <?php elseif ($order->isStop()) : ?>
                      <span class="badge badge-danger ucap badge-xs">Tạm dừng</span>
                      <?php endif;?>
                    </h5>
                    <span>Ngày bắt đầu: <?=$order->isRunning() ? CommonHelper::dateFormat($order->started_at) : '~';?></span>
                    <span>Ngày kết thúc: <?=$order->isRunning() ? CommonHelper::dateFormat(date('Y-m-d', strtotime($order->created_at . ' 5 years'))) : '~';?></span>
                  </div>
                </div>
                <div class="col-xl-4 col-md col-lg-6">
                  <div class="pdb-1x">
                    <h5 class="schedule-title"><span><?=sprintf("#%s", $order->id);?></span></h5>
                    <span>Quantity: <?=number_format($order->quantity);?></span>
                    <span>Total Price: <?=sprintf('%s %s', number_format($order->total_price), $order->currency);?></span>
                  </div>
                </div>
                <?php if ($order->canStop()) :?>
                <div class="col-xl-3 col-md-3 align-self-center text-xl-right">
                  <div class="pdb-1x">
                    <span class="schedule-bonus">Rút lãi</span>
                  </div>
                </div>
                <?php endif;?>
              </div>
            </div>
            <?php endforeach;?>
            <h6 class="text-light mb-0">* Time zone set in (GMT +6) Dhaka, Bangladesh</h6>
          </div>
        </div>
      </div>
      <!-- .col -->
      <div class="aside sidebar-right col-lg-4">
        <div class="token-statistics card card-token height-auto">
          <div class="card-innr">
            <div class="token-balance">
              <div class="token-balance-text">
                <h6 class="card-sub-title">Tổng đầu tư</h6>
                <span class="lead"><?= Yii::$app->user->isGuest ? 0 : number_format(Yii::$app->user->identity->totalOrderValue());?> <span>VNĐ</span></span>
              </div>
            </div>
            <div class="token-balance token-balance-s2">
              <h6 class="card-sub-title">Tổng lợi nhuận</h6>
              <ul class="token-balance-list">
                <li class="token-balance-sub">
                  <span class="lead">2.646</span>
                  <span class="sub">VNĐ</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- .col -->
    </div>
    <!-- .container -->
  </div>
  <!-- .container -->
</div>
<!-- .page-content -->