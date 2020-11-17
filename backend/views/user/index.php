<?php 
use yii\helpers\Url;
?>
<div class="page-content">
  <div class="container">
    <div class="card content-area">
      <div class="card-innr">
        <div class="card-head">
          <h4 class="card-title">User List</h4>
        </div>
        <table class="data-table dt-init user-list">
          <thead>
            <tr class="data-item data-head">
              <th class="data-col dt-user">User</th>
              <th class="data-col dt-email">Email</th>
              <th class="data-col dt-token">Tokens</th>
              <th class="data-col dt-verify">Verified Status</th>
              <th class="data-col dt-login">Created Date</th>
              <th class="data-col dt-status">
                <div class="dt-status-text">Status</div>
              </th>
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
                <span class="lead lead-btoken">35,040</span>
              </td>
              <td class="data-col dt-verify">
                <ul class="data-vr-list">
                  <li>
                    <?php if ($user->isActive()) : ?>
                    <div class="data-state data-state-sm data-state-approved"></div>
                    <?php else : ?>
                    <div class="data-state data-state-sm data-state-pending"></div>
                    <?php endif;?>
                    Email
                  </li>
                </ul>
              </td>
              <td class="data-col dt-login">
                <span class="sub sub-s2 sub-time"><?=date('Y-m-d', $user->created_at);?></span>
              </td>
              <td class="data-col dt-status">
                <?php if ($user->isActive()) : ?>
                <span class="dt-status-md badge badge-outline badge-success badge-md">Active</span>
                <span class="dt-status-sm badge badge-sq badge-outline badge-success badge-md">A</span>
                <?php else : ?>
                <span class="dt-status-md badge badge-outline badge-danger badge-md">Suspended</span>
                <span class="dt-status-sm badge badge-sq badge-outline badge-danger badge-md">s</span>
                <?php endif;?>
              </td>
              <td class="data-col text-right">
                <div class="relative d-inline-block">
                  <a href="#" class="btn btn-light-alt btn-xs btn-icon toggle-tigger"><em class="ti ti-more-alt"></em></a>
                  <div class="toggle-class dropdown-content dropdown-content-top-left">
                    <ul class="dropdown-list">
                      <!-- <li><a href="#"><em class="ti ti-eye"></em> View Details</a></li> -->
                      <li><a href="<?=Url::to(['user/inactive', 'id' => $user->id]);?>"><em class="ti ti-na"></em> Suspend</a></li>
                      <li><a href="<?=Url::to(['user/delete', 'id' => $user->id]);?>"><em class="ti ti-trash"></em> Delete</a></li>
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