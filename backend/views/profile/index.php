<?php 
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<div class="page-content">
  <div class="container">
    <div class="row">
      <div class="main-content col-lg-8">
        <div class="content-area card">
          <div class="card-innr">
            <div class="card-head">
              <h4 class="card-title">Profile Details</h4>
            </div>
            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#personal-data">Personal Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#password">Password</a>
              </li>
            </ul>
            <!-- .nav-tabs-line -->
            <div class="tab-content" id="profile-details">
              <div class="tab-pane fade show active" id="personal-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-item input-with-label">
                      <label for="full-name" class="input-item-label">Username</label>
                      <input class="input-bordered" type="text" id="full-name" name="full-name" value="<?=$user->username;?>" disabled>
                    </div>
                    <!-- .input-item -->
                  </div>
                  <div class="col-md-6">
                    <div class="input-item input-with-label">
                      <label for="email-address" class="input-item-label">Email Address</label>
                      <input class="input-bordered" type="text" id="email-address" name="email-address" value="<?=$user->email;?>" disabled>
                    </div>
                    <!-- .input-item -->
                  </div>
                </div>
                <!-- .row -->
                <div class="gaps-1x"></div>
              </div>
              <div class="tab-pane fade" id="password">
                <?php $form = ActiveForm::begin(['action' => Url::to(['profile/update-password']), 'options' => ['id' => 'update-password-form']]); ?>

                  <div class="row">
                    <div class="col-md-6">
                      <?= $form->field($changePasswordForm, 'old_password', [
                        'options' => ['class' => 'input-item input-with-label'],
                        'labelOptions' => ['class' => 'old-pass'],
                        'inputOptions' => ['class' => 'input-bordered', 'id' => 'old-pass']
                      ])->passwordInput()->label('Old Password');?>
                    </div>
                    <!-- .col -->
                  </div>
                  <!-- .row -->
                  <div class="row">
                    <div class="col-md-6">
                      <?= $form->field($changePasswordForm, 'new_password', [
                        'options' => ['class' => 'input-item input-with-label'],
                        'labelOptions' => ['class' => 'input-item-label'],
                        'inputOptions' => ['class' => 'input-bordered', 'id' => 'new-pass']
                      ])->passwordInput()->label('New Password');?>
                      <!-- .input-item -->
                    </div>
                    <!-- .col -->
                    <div class="col-md-6">
                      <?= $form->field($changePasswordForm, 're_password', [
                        'options' => ['class' => 'input-item input-with-label'],
                        'labelOptions' => ['class' => 'input-item-label'],
                        'inputOptions' => ['class' => 'input-bordered', 'id' => 'confirm-pass']
                      ])->passwordInput()->label('Confirm New Password');?>
                    </div>
                    <!-- .col -->
                  </div>
                  <!-- .row -->
                  <div class="note note-plane note-info pdb-1x">
                    <em class="fas fa-info-circle"></em>
                    <p>Password should be minmum 8 letter and include lower and uppercase letter.</p>
                  </div>
                  <div class="gaps-1x"></div>
                  <!-- 10px gap -->
                  <div class="d-sm-flex justify-content-between align-items-center">
                    <button class="btn btn-primary">Update</button>
                    <div class="gaps-2x d-sm-none"></div>
                    <span class="text-success d-none"><em class="ti ti-check-box"></em>  Changed Password</span>
                  </div>
                <?php ActiveForm::end();?>
              </div>
              <!-- .tab-pane -->
            </div>
            <!-- .tab-content -->
          </div>
          <!-- .card-innr -->
        </div>
        <!-- .card -->
        <div class="content-area card">
          <div class="card-innr">
            <div class="card-head">
              <h4 class="card-title">Two-Factor Verification</h4>
            </div>
            <p>Two-factor authentication is a method for protection your web account. When it is activated you need to enter not only your password, but also a special code. You can receive this code by in mobile app. Even if third person will find your password, then can't access with that code.</p>
            <div class="d-sm-flex justify-content-between align-items-center pdt-1-5x">
              <span class="text-light ucap d-inline-flex align-items-center">
              <span class="mb-0"><small>Current Status:</small></span> 
              <span class="badge badge-disabled ml-2">Disabled</span>
              </span>
              <div class="gaps-2x d-sm-none"></div>
              <button class="order-sm-first btn btn-primary">Enable 2FA</button>
            </div>
          </div>
          <!-- .card-innr -->
        </div>
        <!-- .card -->
      </div>
      <!-- .col -->
      <div class="aside sidebar-right col-lg-4">
        <div class="account-info card">
          <div class="card-innr">
            <h6 class="card-title card-title-sm">Your Account Status</h6>
            <ul class="btn-grp">
              <li><a href="#" class="btn btn-auto btn-xs btn-success">Email Verified</a></li>
              <li><a href="#" class="btn btn-auto btn-xs btn-warning">KYC Pending</a></li>
            </ul>
            <div class="gaps-2-5x"></div>
            <h6 class="card-title card-title-sm">Receiving Wallet</h6>
            <div class="d-flex justify-content-between">
              <span><span>0x39deb3.....e2ac64rd</span> <em class="fas fa-info-circle text-exlight" data-toggle="tooltip" data-placement="bottom" title="1 ETH = 100 TWZ"></em></span>
              <a href="#" data-toggle="modal" data-target="#edit-wallet" class="link link-ucap">Edit</a>
            </div>
          </div>
        </div>
        <div class="referral-info card">
          <div class="card-innr">
            <h6 class="card-title card-title-sm">Earn with Referral</h6>
            <p class=" pdb-0-5x">Invite your friends &amp; family and receive a <strong><span class="text-primary">bonus - 15%</span> of the value of contribution.</strong></p>
            <div class="copy-wrap mgb-0-5x">
              <span class="copy-feedback"></span>
              <em class="fas fa-link"></em>
              <input type="text" class="copy-address" value="https://demo.themenio.com/ico?ref=7d264f90653733592" disabled>
              <button class="copy-trigger copy-clipboard" data-clipboard-text="https://demo.themenio.com/ico?ref=7d264f90653733592"><em class="ti ti-files"></em></button>
            </div>
            <!-- .copy-wrap -->
          </div>
        </div>
        <div class="kyc-info card">
          <div class="card-innr">
            <h6 class="card-title card-title-sm">Identity Verification - KYC</h6>
            <p>To comply with regulation, participant will have to go through indentity verification.</p>
            <p class="lead text-light pdb-0-5x">You have not submitted your KYC application to verify your indentity.</p>
            <a href="#" class="btn btn-primary btn-block">Click to Proceed</a>
            <h6 class="kyc-alert text-danger">* KYC verification required for purchase token</h6>
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
<?php
$script = <<< JS
// Update Password
var editPasswordForm = new AjaxFormSubmit({element: '#update-password-form'});
editPasswordForm.success = function (data, form) {
  toastr.success(data.message);
  form.find('input').val('');
  form.find('.text-success').removeClass('d-none');
  setTimeout(function() {
    form.find('.text-success').addClass('d-none');
  }, 4000);
}
editPasswordForm.error = function (errors) {  
  toastr.error(errors);
}
JS;
$this->registerJs($script);
?>