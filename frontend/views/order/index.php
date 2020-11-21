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
              <h4 class="card-title">ICO Distribution, Rate &amp; Sales Info</h4>
            </div>
            <div class="card-text">
              <p>To become a part of TokenWiz project, you can found all details of ICO. <br class="d-none d-sm-block"> You can contribute and <a href="#">buy TWZ tokens</a>.</p>
              <p>You can get a quick response and chat with our team in Telegram: <a href="#">htts://t.me/tokenwiz</a></p>
            </div>
            <div class="gaps-3x"></div>
            <div class="card-head">
              <h5 class="card-title card-title-md">ICO Schedule</h5>
            </div>
            <?php foreach ($orders as $order) : ?>
            <div class="schedule-item">
              <div class="row">
                <div class="col-xl-5 col-md-5 col-lg-6">
                  <div class="pdb-1x">
                    <h5 class="schedule-title">
                      <span><?=$order->product->name;?></span>
                      <?php if ($order->isTemporary()) : ?>
                      <span class="badge badge-disabled ucap badge-xs">Temporary</span>
                      <?php elseif ($order->isRunning()) : ;?>
                      <span class="badge badge-success ucap badge-xs">Running</span>                      
                      <?php elseif ($order->isStop()) : ?>
                      <span class="badge badge-danger ucap badge-xs">Stop</span>
                      <?php endif;?>
                    </h5>
                    <span>Start at: <?=$order->isRunning() ? CommonHelper::dateFormat($order->started_at) : '~';?></span>
                    <span>Created at: <?=CommonHelper::dateFormat($order->created_at);?></span>
                  </div>
                </div>
                <div class="col-xl-4 col-md col-lg-6">
                  <div class="pdb-1x">
                    <h5 class="schedule-title"><span>Detail</span></h5>
                    <span>Quantity: <?=number_format($order->quantity);?></span>
                    <span>Total Price: <?=sprintf('%s %s', number_format($order->total_price), $order->currency);?></span>
                  </div>
                </div>
                <?php if ($order->canStop()) :?>
                <div class="col-xl-3 col-md-3 align-self-center text-xl-right">
                  <div class="pdb-1x">
                    <span class="schedule-bonus">Stop</span>
                  </div>
                </div>
                <?php endif;?>
              </div>
            </div>
            <?php endforeach;?>
            <h6 class="text-light mb-0">* Time zone set in (GMT +6) Dhaka, Bangladesh</h6>
          </div>
        </div>
        <div class="content-area card">
          <div class="card-innr">
            <div class="card-head">
              <h5 class="card-title card-title-md">Invite your friends and family and receive free tokens</h5>
            </div>
            <div class="card-text">
              <p>Each member have a unique TWZ referral link to share with friends and family and receive a <strong>bonus - 15% of the value of their contribution</strong>. 
                If any one sign-up with this link, will be added to your referral program. 
                The referral link may be used during a token sales running.
              </p>
            </div>
            <div class="referral-form">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 font-bold">Referral URL</h5>
                <a href="#" class="link link-primary link-ucap">See Your referral</a>
              </div>
              <div class="copy-wrap mgb-1-5x mgt-1-5x">
                <span class="copy-feedback"></span>
                <em class="fas fa-link"></em>
                <input type="text" class="copy-address" value="https://demo.themenio.com/tokenwiz?ref=7d264f90653733592" disabled>
                <button class="copy-trigger copy-clipboard" data-clipboard-text="https://demo.themenio.com/tokenwiz?ref=7d264f90653733592"><em class="ti ti-files"></em></button>
              </div>
              <!-- .copy-wrap -->
            </div>
            <ul class="share-links">
              <li>Share with : </li>
              <li><a href="#"><em class="fab fa-google-plus-g"></em></a></li>
              <li><a href="#"><em class="fab fa-twitter"></em></a></li>
              <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
              <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- .col -->
      <div class="aside sidebar-right col-lg-4">
        <div class="token-statistics card card-token height-auto">
          <div class="card-innr">
            <div class="token-balance">
              <div class="token-balance-text">
                <h6 class="card-sub-title">Tokens Balance</h6>
                <span class="lead">120,000,000 <span>TWZ</span></span>
              </div>
            </div>
            <div class="token-balance token-balance-s2">
              <h6 class="card-sub-title">Your Contribution</h6>
              <ul class="token-balance-list">
                <li class="token-balance-sub">
                  <span class="lead">2.646</span>
                  <span class="sub">ETH</span>
                </li>
                <li class="token-balance-sub">
                  <span class="lead">1.265</span>
                  <span class="sub">BTC</span>
                </li>
                <li class="token-balance-sub">
                  <span class="lead">6.506</span>
                  <span class="sub">LTC</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="token-sales card">
          <div class="card-innr">
            <div class="card-head">
              <h5 class="card-title card-title-sm">Pre-Sale Token Sales</h5>
            </div>
            <div class="token-rate-wrap row">
              <div class="token-rate col-md-6 col-lg-12">
                <span class="card-sub-title">TWZ Token Price</span>
                <h4 class="font-mid text-dark">1 ETH = <span>12500 TWZ</span></h4>
              </div>
              <div class="token-rate col-md-6 col-lg-12">
                <span class="card-sub-title">Exchange Rate</span>
                <span>1 ETH = 196.98 USD = 0.032 BTC</span>
              </div>
            </div>
            <div class="token-bonus-current">
              <div class="fake-class">
                <span class="card-sub-title">Current Bonus</span>
                <div class="h3 mb-0">20 %</div>
              </div>
              <div class="token-bonus-date">End at <br> 10 Jan, 2019</div>
            </div>
          </div>
          <div class="sap"></div>
          <div class="card-innr">
            <div class="card-head">
              <h5 class="card-title card-title-sm">Token Sales Progress</h5>
            </div>
            <ul class="progress-info">
              <li><span>Raised</span> 2,758 TWZ</li>
              <li class="text-right"><span>TOTAL</span> 1,500,000 TWZ</li>
            </ul>
            <div class="progress-bar">
              <div class="progress-hcap" data-percent="83">
                <div>Hard cap <span>1,400,000</span></div>
              </div>
              <div class="progress-scap" data-percent="24">
                <div>Soft cap <span>40,000</span></div>
              </div>
              <div class="progress-percent" data-percent="28"></div>
            </div>
            <span class="card-sub-title mgb-0-5x">Sales END IN</span>
            <div class="countdown-clock" data-date="2019/02/05"></div>
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