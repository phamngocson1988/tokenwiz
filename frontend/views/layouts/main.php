<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
          <a class="topbar-logo" href="./">
          <img src="/images/logo-light2x.png" srcset="/images/logo-light2x.png 2x" alt="logo">
          </a>
          <ul class="topbar-nav">
            <li class="topbar-nav-item relative">
              <span class="user-welcome d-none d-lg-inline-block">Welcome! Stefan Harary</span>
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
                  <li><a href="sign-in.html"><i class="ti ti-power-off"></i>Logout</a></li>
                </ul>
              </div>
            </li>
            <!-- .topbar-nav-item -->
          </ul>
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
            <li><a href="index.html"><em class="ikon ikon-dashboard"></em> Dashboard</a></li>
            <li><a href="buy-token.html"><em class="ikon ikon-coins"></em> Buy Tokens</a></li>
            <li><a href="ico-distribution.html"><em class="ikon ikon-distribution"></em> ICO Distribution</a></li>
            <li><a href="transactions.html"><em class="ikon ikon-transactions"></em> Transactions</a></li>
            <li><a href="profile.html"><em class="ikon ikon-user"></em> Profile</a></li>
            <li class="has-dropdown page-links-all">
              <a class="drop-toggle" href="#"><em class="ikon ikon-exchange"></em> Pages</a>
              <ul class="navbar-dropdown">
                <li class="has-dropdown">
                  <a class="drop-toggle" href="#">Dashboards</a>
                  <ul class="navbar-dropdown">
                    <li><a href="index.html">Dashboard v1</a></li>
                    <li><a href="index-v2.html">Dashboard v2 <span class="badge badge-warning">New</span></a></li>
                  </ul>
                </li>
                <li class="has-dropdown">
                  <a class="drop-toggle" href="#">UI Elements</a>
                  <ul class="navbar-dropdown">
                    <li><a href="form-elements.html">Form Elements</a></li>
                    <li><a href="form-layout.html">Form Layout</a></li>
                    <li><a href="form-validation.html">Form Validation <span class="badge badge-danger">Hot</span></a></li>
                    <li><a href="form-wizard.html">Form Wizard <span class="badge badge-danger">Hot</span></a></li>
                    <li><a href="buttons.html">Button</a></li>
                    <li><a href="badges.html">Badge</a></li>
                    <li><a href="cards.html">Cards</a></li>
                    <li><a href="tabs.html">Tabs</a></li>
                    <li><a href="accordions.html">Accordions</a></li>
                    <li><a href="modals.html">Modals</a></li>
                    <li><a href="alerts.html">Alerts</a></li>
                    <li><a href="alert-toastr.html">Toastr Alerts</a></li>
                    <li><a href="alert-sweat.html">Sweat Alerts <span class="badge badge-danger">Hot</span></a></li>
                  </ul>
                </li>
                <li class="has-dropdown">
                  <a class="drop-toggle" href="#">Misc Pages</a>
                  <ul class="navbar-dropdown">
                    <li><a href="404-error.html">404 Error</a></li>
                    <li><a href="sign-in.html">Sign In / Login</a></li>
                    <li><a href="sign-up.html">Sign Up / Registration</a></li>
                    <li><a href="signup-success.html">Signup Success</a></li>
                    <li><a href="email-verified.html">Email Verified</a></li>
                    <li><a href="forgot.html">Forgot Password</a></li>
                    <li><a href="faq-page.html">Faq Page</a></li>
                    <li><a href="regular-page.html">Regular Page - v1</a></li>
                    <li><a href="regular-page-v2.html">Regular Page - v2</a></li>
                    <li><a href="timeline.html">Timeline <span class="badge badge-warning">New</span></a></li>
                    <li><a href="thank-you.html">Thank You</a></li>
                    <li><a href="_blank.html">Blank Page</a></li>
                  </ul>
                </li>
                <li class="has-dropdown">
                  <a class="drop-toggle" href="#">KYC / AML</a>
                  <ul class="navbar-dropdown">
                    <li><a href="kyc-application.html">KYC Default</a></li>
                    <li><a href="kyc-form.html">KYC Form</a></li>
                    <li><a href="kyc-thank-you.html">KYC Thank You</a></li>
                    <li><a href="kyc-list.html">KYC Lists - Admin</a></li>
                    <li><a href="kyc-details.html">KYC Details - Admin</a></li>
                  </ul>
                </li>
                <li class="has-dropdown">
                  <a class="drop-toggle" href="#">User Pages</a>
                  <ul class="navbar-dropdown">
                    <li><a href="profile.html">Profile Page</a></li>
                    <li><a href="activity.html">User Activity <span class="badge badge-warning">New</span></a></li>
                    <li><a href="user-list-sidebar.html">User List - Sidebar <span class="badge badge-warning">New</span></a></li>
                    <li><a href="user-list.html">User List - Admin</a></li>
                    <li><a href="user-details.html">User Details - Admin</a></li>
                  </ul>
                </li>
                <li class="has-dropdown">
                  <a class="drop-toggle" href="#">Transactions</a>
                  <ul class="navbar-dropdown">
                    <li><a href="transactions.html">Transactions - User</a></li>
                    <li><a href="admin-transactions.html">Transactions - Admin</a></li>
                    <li><a href="transaction-details.html">Transaction Details</a></li>
                  </ul>
                </li>
                <li class="has-dropdown">
                  <a class="drop-toggle" href="#">Token Purchase</a>
                  <ul class="navbar-dropdown">
                    <li><a href="buy-token.html">Buy Token - Modern</a></li>
                    <li><a href="buy-token-s2.html">Buy Token - Simple</a></li>
                  </ul>
                </li>
                <li><a href="chat.html">Chat App <span class="badge badge-warning">New</span> <span class="badge badge-danger">Hot</span></a></li>
                <li><a href="email-templates.html">Email Templates <span class="badge badge-success">Free</span></a></li>
              </ul>
            </li>
          </ul>
          <ul class="navbar-btns">
            <li><a href="kyc-application.html" class="btn btn-sm btn-outline btn-light"><em class="text-primary ti ti-files"></em><span>KYC Application</span></a></li>
            <li class="d-none"><span class="badge badge-outline badge-success badge-lg"><em class="text-success ti ti-files mgr-1x"></em><span class="text-success">KYC Approved</span></span></li>
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
          <ul class="footer-links">
            <li><a href="#">Whitepaper</a></li>
            <li><a href="faq-page.html">FAQs</a></li>
            <li><a href="regular-page.html">Privacy Policy</a></li>
            <li><a href="regular-page.html">Terms of Condition</a></li>
          </ul>
        </div>
        <!-- .col -->
        <div class="col-md-4 mt-2 mt-sm-0">
          <div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
            <div class="copyright-text">&copy; 2018 TokenWiz.</div>
            <div class="lang-switch relative">
              <a href="#" class="lang-switch-btn toggle-tigger">En <em class="ti ti-angle-up"></em></a>
              <div class="toggle-class dropdown-content dropdown-content-up">
                <ul class="lang-list">
                  <li><a href="#">Fr</a></li>
                  <li><a href="#">Bn</a></li>
                  <li><a href="#">Lt</a></li>
                </ul>
              </div>
            </div>
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