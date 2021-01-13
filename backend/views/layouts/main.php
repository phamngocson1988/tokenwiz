<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="js">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="author" content="Softnio">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Fully featured and complete ICO Dashboard template for ICO backend management.">
  <!-- Fav Icon  -->
  <link rel="shortcut icon" href="/images/favicon.png">
  <?php $this->registerCsrfMetaTags() ?>
  <!-- Site Title  -->
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>
<body class="page-user">
  <?php $this->beginBody() ?>
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
                  <h6 class="user-status-title">Token balance</h6>
                  <div class="user-status-balance">12,000,000 <small>TWZ</small></div>
                </div>
                <ul class="user-links">
                  <li><a href="profile.html"><i class="ti ti-id-badge"></i>My Profile</a></li>
                  <li><a href="#"><i class="ti ti-infinite"></i>Referral</a></li>
                  <li><a href="activity.html"><i class="ti ti-eye"></i>Activity</a></li>
                </ul>
                <ul class="user-links bg-light">
                  <li><a href="<?=Url::to(['site/logout']);?>"><i class="ti ti-power-off"></i>Logout</a></li>
                </ul>
              </div>
            </li>
            <!-- .topbar-nav-item -->
          </ul>
          <?php else : ?>
          <ul class="topbar-nav">
            <li class="topbar-nav-item relative">
              <a href="<?=Url::to(['site/login']);?>"><span class="user-welcome d-none d-lg-inline-block">Login</span></a>
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
          <ul class="navbar-menu">
            <li><a href="<?=Url::to(['order/index']);?>"><em class="ikon ikon-dashboard"></em> Quản lý đầu tư</a></li>
            <li><a href="<?=Url::to(['wallet/index']);?>"><em class="ikon ikon-transactions"></em> Quản lý giao dịch</a></li>
            <li><a href="<?=Url::to(['user/index']);?>"><em class="ikon ikon-user"></em> Quản lý người dùng</a></li>
            <li><a href="<?=Url::to(['withdrawal/index']);?>"><em class="ikon ikon-coins"></em> Quản lý rút tiền</a></li>
          </ul>
        </div>
        <!-- .navbar-innr -->
      </div>
      <!-- .container -->
    </div>
    <!-- .navbar -->
  </div>
  <!-- .topbar-wrap -->
  <?= $content ?>

  <div class="footer-bar">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-8">
          <!-- <ul class="footer-links">
            <li><a href="#">Whitepaper</a></li>
            <li><a href="faq-page.html">FAQs</a></li>
            <li><a href="regular-page.html">Privacy Policy</a></li>
            <li><a href="regular-page.html">Terms of Condition</a></li>
          </ul> -->
        </div>
        <!-- .col -->
        <div class="col-md-4 mt-2 mt-sm-0">
          <div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
            <div class="copyright-text">Copyright 2020 &copy; <strong>Buôn Làng</strong></div>
            <!-- <div class="lang-switch relative">
              <a href="#" class="lang-switch-btn toggle-tigger">En <em class="ti ti-angle-up"></em></a>
              <div class="toggle-class dropdown-content dropdown-content-up">
                <ul class="lang-list">
                  <li><a href="#">Fr</a></li>
                  <li><a href="#">Bn</a></li>
                  <li><a href="#">Lt</a></li>
                </ul>
              </div>
            </div> -->
          </div>
        </div>
        <!-- .col -->
      </div>
      <!-- .row -->
    </div>
    <!-- .container -->
  </div>
<!-- .footer-bar -->
<!-- JavaScript (include all script here) -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>