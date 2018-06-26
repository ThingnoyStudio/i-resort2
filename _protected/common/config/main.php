<?php
return [
    'name' => 'I-Resort',
    //'language' => 'sr',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [

        'paypal' => [
            'class' => 'kongoon\yii2\paypal\Paypal',
            'clientId' => 'AZEjSYroI8kJ1jy3ULcb1Hqg2kG_6GG97O9aErj0gYYLpBlMhJdeVrd-kJMs9O7DUvcUmsOdu81xJYPJ', // เอา Client ID มาใส่ตรงนี้ล่ะ
            'clientSecret' => 'EGAYyikP_w2Z3T1slu2Udg-Ttf4_av-rcCBT_gGixdaxofLvX_PpZNKQfPsC2knGPWf7inyNfC8xAt3e', // เอา Secret มาใส่ตรงนี้ล่ะ
            'isProduction' => false,
            // This is config file for the PayPal system
            'config' => [
                'http.ConnectionTimeOut' => 30,
                'http.Retry' => 1,
                'mode' => 'SANDBOX', // development (sandbox) or production (live) mode
                'log.LogEnabled' => YII_DEBUG ? 1 : 0,
                //'log.FileName'           => '@runtime/logs/paypal.log',
                'log.LogLevel' => 'FINE',
            ]
        ],

        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php:Y-m-d',
            'datetimeFormat' => 'php:d/m/Y H:i:s',
            'timeFormat' => 'php:H:i:s',
            'timeZone' => 'Asia/Bangkok',

        ],

        'assetManager' => [
            'bundles' => [
                // we will use bootstrap css from our theme
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [], // do not use yii default one
                ],
                'yii2mod\alert\AlertAsset' => [
                    'css' => [
                        'dist/sweetalert.css',
                        'themes/twitter/twitter.css',
                    ]
                ],


//                'yii\web\JqueryAsset' => [
//                    'sourcePath' => '@webroot/@themes/js/core',
//                    'js' => ['jquery.3.2.1.min.js']
////                    'depends' => '@themes/js/core/jquery.3.2.1.min.js',
//                ],


                // // use bootstrap js from CDN
                // 'yii\bootstrap\BootstrapPluginAsset' => [
                //     'sourcePath' => null,   // do not use file from our server
                //     'js' => [
                //         'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js']
                // ],
                // // use jquery from CDN
//                'yii\web\JqueryAsset' => [
//                    'sourcePath' => null,   // do not use file from our server
//                    'js' => [
////                         'ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js',
////                        'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',
//                        '/i-resort2/themes/nowui/js/core/jquery.3.2.1.min.js',
//
//                    ]
//                ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/translations',
                    'sourceLanguage' => 'en',
                ],
                'yii' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/translations',
                    'sourceLanguage' => 'en'
                ],
            ],
        ],
    ], // components

    // set allias for our uploads folder so it can be shared by both frontend and backend applications
    // @appRoot alias is definded in common/config/bootstrap.php file
    'aliases' => [
        '@uploads' => '@appRoot/uploads'
    ],
];
