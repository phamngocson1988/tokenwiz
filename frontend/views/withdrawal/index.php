<?php 
use yii\helpers\Url;
use common\components\helpers\CommonHelper;
use yii\bootstrap\ActiveForm;
?>
<div class="page-content">
  <div class="container">
    <div class="content-area card">
      <div class="card-innr">
        <div class="card-head d-flex justify-content-between align-items-center">
          <h4 class="card-title">Lịch sử yêu cầu rút tiền</h4>
          <a href="javascript:;" data-toggle="modal" data-target="#create-withdrawal-form" class="btn btn-sm btn-auto btn-success btn-outline d-sm-block d-none"><em class="fa fa-plus mr-3"></em>Tạo yêu cầu</a>
        </div>
        <table class="data-table admin-tnx">
          <thead>
            <tr class="data-item data-head">
              <th class="data-col dt-tnxno">Mã</th>
              <th class="data-col dt-amount">Số tiền</th>
              <th class="data-col dt-usd-amount">Mô tả</th>
              <th class="data-col dt-token">Trạng thái</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($wallets as $wallet) :?>
            <tr class="data-item">
              <td class="data-col dt-tnxno">
                <div class="d-flex align-items-center">
                  <div class="fake-class">
                    <span class="lead tnx-id"><?=sprintf("#%s", $wallet->id);?></span>
                    <span class="sub sub-date"><?=CommonHelper::dateFormat($wallet->created_at);?></span>
                  </div>
                </div>
              </td>
              <td class="data-col dt-amount">
                <span class="lead amount-pay"><?=number_format($wallet->amount);?></span>
                <span class="sub sub-symbol">VNĐ </span>
              </td>
              <td class="data-col dt-usd-amount">
                <?=nl2br($wallet->description);?>
              </td>
              <td class="data-col dt-token">
                <?php if ($wallet->isDone()):?>
                <span class="dt-type-md badge badge-outline badge-success badge-md">Hoàn thành</span>
                <span class="dt-type-sm badge badge-sq badge-outline badge-success badge-md">D</span>
                <span class="sub sub-date"><?=CommonHelper::dateFormat($wallet->done_at);?></span>
                <?php elseif ($wallet->isRequesting()):?>
                <span class="dt-type-md badge badge-outline badge-warning badge-md">Đã gửi yêu cầu</span>
                <span class="dt-type-sm badge badge-sq badge-outline badge-warning badge-md">R</span>
                <span class="sub sub-date"><?=CommonHelper::dateFormat($wallet->created_at);?></span>
                <?php endif;?>
              </td>
            </tr>
            <?php endforeach;?>
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

<div class="modal fade" id="create-withdrawal-form" tabindex="-1">
  <div class="modal-dialog modal-dialog-md modal-dialog-centered">
    <div class="modal-content">
      <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
      <div class="popup-body">
        <h4 class="popup-title">Tạo yêu cầu rút tiền</h4>
        <div class="gaps-1x"></div>

        <?php $form = ActiveForm::begin(['id' => 'withdrawal-form', 'action' => Url::to(['withdrawal/create'])]); ?>
          <?= $form->field($createForm, 'amount', [
            'options' => ['class' => 'input-item input-with-label'],
            'labelOptions' => ['class' => 'input-item-label'],
            'inputOptions' => ['class' => 'input-bordered', 'placeholder' => 'Số tiền muốn rút']
          ])->textInput()->label('Số tiền muốn rút') ?>

          <?= $form->field($createForm, 'description', [
            'options' => ['class' => 'input-item input-with-label'],
            'labelOptions' => ['class' => 'input-item-label'],
            'inputOptions' => ['class' => 'input-bordered input-textarea', 'placeholder' => 'Thông tin ngân hàng']
          ])->textArea()->label('Thông tin ngân hàng') ?>
          <button class="btn btn-primary">Tạo yêu cầu <em class="ti ti-arrow-right mgl-4-5x"></em></button>
        <?php ActiveForm::end(); ?>

        <div class="gaps-3x"></div>
      </div>
    </div>
    <!-- .modal-content -->
  </div>
  <!-- .modal-dialog -->
</div>
<!-- Modal End -->