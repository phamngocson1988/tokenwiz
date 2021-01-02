<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

// AppAsset::register($this);
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
  <link rel="shortcut icon" href="https://invest.buonlang.com/images/favicon.png">
  <?php $this->registerCsrfMetaTags() ?>
  <!-- Site Title  -->
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>
<body class="page-user">
  <?php $this->beginBody() ?>
  <div class="page-content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-10">
          <div class="content-area card">
            <div class="card-innr">
              <table class="email-wraper" style="background: #e0e8f3;font-size: 14px;line-height: 22px;font-weight: 400;color: #758698;width: 100%;">
                <tbody style="box-sizing: border-box;display: table-row-group;vertical-align: middle;border-color: inherit;">
                  <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
                    <td class="pdt-4x pdb-4x" style="padding-bottom: 40px;padding-top: 40px;">
                      <?=$content;?>
                      <table class="email-footer" style="width: 100%;max-width: 620px;margin: 0 auto;">
                        <tbody style="box-sizing: border-box;display: table-row-group;vertical-align: middle;border-color: inherit;">
                          <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
                            <td class="text-center pdt-2-5x pdl-2x pdr-2x" style="padding-top: 25px;padding-right: 20px;padding-left: 20px;text-align: center!important;">
                              <p class="email-copyright-text" style="font-size: 13px;">Copyright 2020 &copy; <strong>Buôn Làng</strong></p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- .card-innr -->
          </div>
          <!-- .card -->
        </div>
        <!-- .col -->
      </div>
      <!-- .row -->
    </div>
    <!-- .container -->
  </div>
  <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>