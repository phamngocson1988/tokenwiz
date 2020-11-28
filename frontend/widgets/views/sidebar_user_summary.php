<div class="aside sidebar-right col-lg-4">
  <div class="token-statistics card card-token height-auto">
    <div class="card-innr">
      <div class="token-balance">
        <div class="token-balance-text">
          <h6 class="card-sub-title">Tổng đầu tư</h6>
          <span class="lead"><?=!$user ? 0 : number_format($user->totalOrderValue());?> <span>VNĐ</span></span>
        </div>
      </div>
      <div class="token-balance token-balance-s2">
        <h6 class="card-sub-title">Tổng lợi nhuận</h6>
        <ul class="token-balance-list">
          <li class="token-balance-sub">
            <span class="lead"><?=!$user ? 0 : number_format($user->totalWalletValue());?></span>
            <span class="sub">VNĐ</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>