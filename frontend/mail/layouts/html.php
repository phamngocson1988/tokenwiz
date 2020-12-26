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
          		<table class="email-wraper">
							  <tbody>
							    <tr>
							      <td class="pdt-4x pdb-4x">
          						<?=$content;?>
	          					<table class="email-footer">
							          <tbody>
							            <tr>
							              <td class="text-center pdt-2-5x pdl-2x pdr-2x">
							                <ul class="email-social">
							                  <li><a href="javascript:;"><img src="https://invest.buonlang.com/images/brand-b.png" alt="brand"></a></li>
							                  <li><a href="javascript:;"><img src="https://invest.buonlang.com/images/brand-e.png" alt="brand"></a></li>
							                  <li><a href="javascript:;"><img src="https://invest.buonlang.com/images/brand-d.png" alt="brand"></a></li>
							                  <li><a href="javascript:;"><img src="https://invest.buonlang.com/images/brand-a.png" alt="brand"></a></li>
							                  <li><a href="javascript:;"><img src="https://invest.buonlang.com/images/brand-c.png" alt="brand"></a></li>
							                </ul>
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