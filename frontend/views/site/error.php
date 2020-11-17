<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="error-content">
  <span class="error-text-large"><?= Html::encode($exception->statusCode) ?></span>
  <h4 class="text-dark"><?= nl2br(Html::encode($message)) ?></h4>
  <p>We are very sorry for inconvenience. It looks like you’re try to access a page that either has been deleted or never existed.</p>
  <a href="/" class="btn btn-primary">Back to Home</a>
</div>