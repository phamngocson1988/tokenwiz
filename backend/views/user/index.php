<?php 
use yii\helpers\Url;
use common\components\helpers\CommonHelper;
?>
<div class="page-content">
  <div class="container">
    <div class="card content-area">
      <div class="card-innr">
        <div class="card-head">
          <h4 class="card-title">Quản lý khách hàng</h4>
        </div>
        <table class="data-table dt-init user-list">
          <thead>
            <tr class="data-item data-head">
              <th class="data-col dt-user">Khách hàng</th>
              <th class="data-col dt-email">Email</th>
              <th class="data-col dt-token">Số tiền đầu tư</th>
              <th class="data-col dt-verify">Trạng thái</th>
              <th class="data-col dt-login">Ngày tham gia</th>
              <th class="data-col"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user) : ?>
            <tr class="data-item">
              <td class="data-col dt-user">
                <span class="lead user-name"><?=$user->username;?></span>
                <span class="sub user-id">#<?=$user->id;?></span>
              </td>
              <td class="data-col dt-email">
                <span class="sub sub-s2 sub-email"><?=$user->email;?></span>
              </td>
              <td class="data-col dt-token">
                <span class="lead lead-btoken"><?=number_format($user->totalOrderValue());?></span>
              </td>
              <td class="data-col dt-verify">
                <ul class="data-vr-list">
                  <li>
                    <?php if ($user->isActive()) : ?>
                    <div class="data-state data-state-sm data-state-approved"></div> Active
                    <?php else : ?>
                    <div class="data-state data-state-sm data-state-pending"></div> Waiting
                    <?php endif;?>
                  </li>
                </ul>
              </td>
              <td class="data-col dt-login">
                <span class="sub sub-s2 sub-time"><?=CommonHelper::dateFormat(date('Y-m-d', $user->created_at));?></span>
              </td>
              <td class="data-col text-right">
                <div class="relative d-inline-block">
                  <a href="#" class="btn btn-light-alt btn-xs btn-icon toggle-tigger"><em class="ti ti-more-alt"></em></a>
                  <div class="toggle-class dropdown-content dropdown-content-top-left">
                    <ul class="dropdown-list">
                      <?php if ($user->isActive()) : ?>
                      <li><a href="<?=Url::to(['user/inactive', 'id' => $user->id]);?>"><em class="ti ti-na"></em> Disable</a></li>
                      <?php elseif ($user->isInactive()) : ?>
                      <li><a href="<?=Url::to(['user/active', 'id' => $user->id]);?>"><em class="ti ti-eye"></em> Enable</a></li>
                      <?php endif;?>
                    </ul>
                  </div>
                </div>
              </td>
            </tr>
            <?php endforeach;?>
            <!-- .data-item -->
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