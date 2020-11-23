<?php
use yii\helpers\Url;
?>
<div class="topbar-wrap">
  <div class="topbar is-sticky">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <ul class="topbar-nav d-lg-none">
          <li class="topbar-nav-item relative">
            <a class="toggle-nav" href="#">
              <div class="toggle-icon">
                <span class="toggle-line"></span>
                <span class="toggle-line"></span>
                <span class="toggle-line"></span>
                <span class="toggle-line"></span>
              </div>
            </a>
          </li>
          <!-- .topbar-nav-item -->
        </ul>
        <!-- .topbar-nav -->
        
        <a class="topbar-logo" href="/">
          <img src="/images/logo-light2x.png" srcset="/images/logo-light2x.png 2x" alt="logo">
        </a>
        <?php if (!Yii::$app->user->isGuest) : ?>
        <?php $loginUser = Yii::$app->user->identity;?>
        <ul class="topbar-nav">
          <li class="topbar-nav-item relative">
            <span class="user-welcome d-none d-lg-inline-block">Xin chào! <?=$loginUser->username;?></span>
            <a class="toggle-tigger user-thumb" href="#"><em class="ti ti-user"></em></a>
            <div class="toggle-class dropdown-content dropdown-content-right dropdown-arrow-right user-dropdown">
              <div class="user-status">
                <h6 class="user-status-title">Tổng đầu tư</h6>
                <div class="user-status-balance"><?=number_format($loginUser->totalOrderValue())?> <small>VNĐ</small></div>
              </div>
              <ul class="user-links">
                <li><a href="profile.html"><i class="ti ti-id-badge"></i>Hồ sơ cá nhân</a></li>
                <li><a href="<?=Url::to(['site/logout']);?>"><i class="ti ti-power-off"></i>Đăng xuất</a></li>
              </ul>
            </div>
          </li>
          <!-- .topbar-nav-item -->
        </ul>
        <?php else : ?>
        <ul class="topbar-nav">
          <li class="topbar-nav-item relative">
            <a href="<?=Url::to(['site/login']);?>"><span class="user-welcome d-none d-lg-inline-block">Đăng nhập</span></a>
          </li>
        </ul>
        <?php endif;?>
        <!-- .topbar-nav -->
      </div>
    </div>
    <!-- .container -->
  </div>
  <!-- .topbar -->
  <div class="navbar">
    <div class="container">
      <div class="navbar-innr">
        <?php echo yii\widgets\Menu::widget([
          'options' => ['class' => 'navbar-menu'],
          'items' => [
              // Add one more record
              ['label' => '<em class="ikon ikon-coins"></em> Đầu tư', 'url' => ['cart/index'], 'encode' => false],
              ['label' => '<em class="ikon ikon-distribution"></em> Quản lý đầu tư', 'url' => ['order/index'], 'encode' => false, 'visible' => !Yii::$app->user->isGuest],
              ['label' => '<em class="ikon ikon-transactions"></em> Giao dịch', 'url' => ['transaction/index'], 'encode' => false, 'visible' => !Yii::$app->user->isGuest],
            ],
          ]);
        ?>
      </div>
    </div>
  </div>
</div>