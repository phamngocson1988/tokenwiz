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
              <h4 class="card-title">Hồ sơ cá nhân</h4>
            </div>
            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#personal-data">Thông tin người dùng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#password">Mật khẩu</a>
              </li>
            </ul>
            <!-- .nav-tabs-line -->
            <div class="tab-content" id="profile-details">
              <div class="tab-pane fade show active" id="personal-data">
                <?php $form = ActiveForm::begin(['action' => Url::to(['profile/update-profile']), 'options' => ['id' => 'update-profile-form']]); ?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-item input-with-label">
                      <label for="full-name" class="input-item-label">Tên đăng nhập</label>
                      <input class="input-bordered" type="text" id="full-name" name="full-name" value="<?=$user->username;?>" disabled>
                    </div>
                    <!-- .input-item -->
                  </div>
                  <div class="col-md-6">
                    <div class="input-item input-with-label">
                      <label for="email-address" class="input-item-label">Email</label>
                      <input class="input-bordered" type="text" id="email-address" name="email-address" value="<?=$user->email;?>" disabled>
                    </div>
                    <!-- .input-item -->
                  </div>
                  <div class="col-md-6">
                    <?= $form->field($updateProfileForm, 'phone', [
                        'options' => ['class' => 'input-item input-with-label'],
                        'labelOptions' => ['class' => 'old-pass'],
                        'inputOptions' => ['class' => 'input-bordered', 'id' => 'old-pass']
                      ])->textInput()->label('Số điện thoại');?>
                  </div>
                </div>
                <!-- .row -->
                <div class="gaps-1x"></div>
                <div class="d-sm-flex justify-content-between align-items-center">
                  <button class="btn btn-primary">Cập nhật</button>
                  <div class="gaps-2x d-sm-none"></div>
                  <span class="text-success d-none"><em class="ti ti-check-box"></em>  Thành công</span>
                </div>
                <?php ActiveForm::end();?>
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
                    <p>Mật khẩu có độ dài ít nhất 8 ký tự</p>
                  </div>
                  <div class="gaps-1x"></div>
                  <!-- 10px gap -->
                  <div class="d-sm-flex justify-content-between align-items-center">
                    <button class="btn btn-primary">Đổi mật khẩu</button>
                    <div class="gaps-2x d-sm-none"></div>
                    <span class="text-success d-none"><em class="ti ti-check-box"></em>  Mật khẩu đã thay đổi</span>
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
      </div>
      <?=\frontend\widgets\SidebarUserSummaryWidget::widget();?>
    </div>
    <!-- .container -->
  </div>
  <!-- .container -->
</div>
<!-- .page-content -->
<?php
$script = <<< JS
// Update Profile
var editPasswordForm = new AjaxFormSubmit({element: '#update-profile-form'});
editPasswordForm.success = function (data, form) {
  toastr.success(data.message);
  form.find('.text-success').removeClass('d-none');
  setTimeout(function() {
    form.find('.text-success').addClass('d-none');
  }, 4000);
}
editPasswordForm.error = function (errors) {  
  toastr.error(errors);
}


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