<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'paypal' => [
            'class' => 'kongoon\yii2\paypal\Paypal',
            'clientId' => 'AZEjSYroI8kJ1jy3ULcb1Hqg2kG_6GG97O9aErj0gYYLpBlMhJdeVrd-kJMs9O7DUvcUmsOdu81xJYPJ', // เอา Client ID มาใส่ตรงนี้ล่ะ
            'clientSecret' => 'EGAYyikP_w2Z3T1slu2Udg-Ttf4_av-rcCBT_gGixdaxofLvX_PpZNKQfPsC2knGPWf7inyNfC8xAt3e', // เอา Secret มาใส่ตรงนี้ล่ะ
            'isProduction' => false,
            // This is config file for the PayPal system
            'config' => [
                'http.ConnectionTimeOut' => 30,
                'http.Retry' => 1,
                'mode' => 'sandbox', // development (sandbox) or production (live) mode
                'log.LogEnabled' => YII_DEBUG ? 1 : 0,
                //'log.FileName'           => '@runtime/logs/paypal.log',
                'log.LogLevel' => 'FINE',
            ]
        ],
        // here you can set theme used for your frontend application 
        // - template comes with: 'default', 'slate', 'spacelab' and 'cerulean'
        'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@webroot/themes/nowui/views'],
                'baseUrl' => '@web/themes/nowui',
            ],
        ],
        'session' => [
            'name' => 'FRONTENDSESSION'//ชื่อ Session
        ],
        'user' => [
            'identityClass' => 'common\models\UserIdentity',
            'enableAutoLogin' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
