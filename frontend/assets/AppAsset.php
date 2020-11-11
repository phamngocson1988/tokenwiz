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
        'vendor/theme.css'
    ];
    public $js = [
        'vendor/assets/js/jquery.bundle.js?ver=104',
        'vendor/assets/js/script.js?ver=104',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
