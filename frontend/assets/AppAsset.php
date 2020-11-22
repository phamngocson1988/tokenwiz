<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendor/assets/css/vendor.bundle.css?ver=104',
        'vendor/assets/css/style.css',
        'vendor/css/theme.css'
    ];
    public $js = [
        'vendor/assets/js/jquery.bundle.js?ver=104',
        'vendor/assets/js/script.js?ver=104',
        'vendor/js/ajax_actions.js',
        ['https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js', 'defer' => true],
        ['https://www.gstatic.com/firebasejs/8.1.1/firebase-auth.js', 'defer' => true],
        ['vendor/js/init-firebase.js', 'defer' => true],
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
