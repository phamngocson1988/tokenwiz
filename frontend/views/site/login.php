<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-ath-form">
  <h2 class="page-ath-heading">Sign in <small>with your TokenWiz Account</small></h2>
  <form action="index.html">
    <div class="input-item">
      <input type="text" placeholder="Your Email" class="input-bordered">
    </div>
    <div class="input-item">
      <input type="password" placeholder="Password" class="input-bordered">
    </div>
    <div class="d-flex justify-content-between align-items-center">
      <div class="input-item text-left">
        <input class="input-checkbox input-checkbox-md" id="remember-me" type="checkbox">
        <label for="remember-me">Remember Me</label>
      </div>
      <div>
        <a href="forgot.html">Forgot password?</a>
        <div class="gaps-2x"></div>
      </div>
    </div>
    <button class="btn btn-primary btn-block">Sign In</button>
  </form>
  <div class="sap-text"><span>Or Sign In With</span></div>
  <ul class="row guttar-20px guttar-vr-20px">
    <li class="col"><a href="#" class="btn btn-outline btn-dark btn-facebook btn-block"><em class="fab fa-facebook-f"></em><span>Facebook</span></a></li>
    <li class="col"><a href="#" class="btn btn-outline btn-dark btn-google btn-block"><em class="fab fa-google"></em><span>Google</span></a></li>
  </ul>
  <div class="gaps-2x"></div>
  <div class="gaps-2x"></div>
  <div class="form-note">
    Don’t have an account? <a href="sign-up.html"> <strong>Sign up here</strong></a>
  </div>
</div>
