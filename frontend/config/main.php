<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'view' => [
            // 'class' => 'frontend\components\web\View',
            'title' => 'TokenWiz - ICO User Dashboard Admin Template',
            // 'on afterRender' => function($event) {
            //     $view = $event->sender;
            //     $view->registerMetaTag(['property' => 'og:type', 'content' => 'website'], 'og:type');
            //     $view->registerMetaTag(['property' => 'og:url', 'content' => \yii\helpers\Url::current([], true)], 'og:url');
            //     if (!isset($view->metaTags['og:image'])) {
            //         $view->registerMetaTag(['property' => 'og:image', 'content' => Yii::$app->settings->get('ApplicationSettingForm', 'logo', '/images/logo.png')], 'og:image');
            //     }
            //     if (!isset($view->metaTags['og:title'])) {
            //         $view->registerMetaTag(['property' => 'og:title', 'content' => $view->title], 'og:title');
            //     }
            //     if (!isset($view->metaTags['og:description'])) {
            //         $view->registerMetaTag(['property' => 'og:description', 'content' => 'Kinggems US website is a market of games, providers and customers'], 'og:description');
            //     }
            // }
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [
                        'vendor/assets/js/jquery.bundle.js?ver=104',
                    ]
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => require('router.php'),
    ],
    'params' => $params,
];
