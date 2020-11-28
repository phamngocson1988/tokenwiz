<?php
return [
    'class' => 'yii\web\UrlManager',
    'baseUrl' => '',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => true,
    'suffix' => '.html',
    'rules' => [
        // Site
        '/' => 'cart/index',
        'about-us' => 'site/about',
        'contact-us' => 'site/contact',
        'login' => 'site/login',
        'logout' => 'site/logout',
        'signup' => 'site/signup',
        'activate' => 'site/activate',
        'forgot' => 'site/request-password-reset',
        'reset-password' => 'site/reset-password',

        'profile' => 'profile/index',

        'plan' => 'order/index',

        'wallet' => 'wallet/index',

        'buy' => 'cart/index',

        '<controller>/<action>' => '<controller>/<action>',
    ],
];