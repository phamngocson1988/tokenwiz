<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
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
<body class="page-ath">	
  <?php $this->beginBody() ?>
  <div class="vh100 d-flex align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-7 col-xl-6 text-center">
        <?=$content;?>
      </div>
    </div>
  </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>