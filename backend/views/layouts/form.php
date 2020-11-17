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
  <div class="page-ath-wrap">
		<div class="page-ath-content">
			<div class="page-ath-header">
			  <a href="./" class="page-ath-logo"><img src="/images/logo.png" srcset="/images/logo2x.png 2x" alt="logo"></a>
			</div>
    	<?= $content ?>
	    <div class="page-ath-footer">
			  <ul class="footer-links">
			    <li><a href="regular-page.html">Privacy Policy</a></li>
			    <li><a href="regular-page.html">Terms</a></li>
			    <li>&copy; 2018 TokenWiz.</li>
			  </ul>
			</div>
		</div>
		<div class="page-ath-gfx">
		  <div class="w-100 d-flex justify-content-center">
		    <div class="col-md-8 col-xl-5">
		      <img src="/images/ath-gfx.png" alt="image">
		    </div>
		  </div>
		</div>
	</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>