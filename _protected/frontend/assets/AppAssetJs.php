<?php
/**
 * -----------------------------------------------------------------------------
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * -----------------------------------------------------------------------------
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use Yii;

// set @themes alias so we do not have to update baseUrl every time we change themes
Yii::setAlias('@themes', Yii::$app->view->theme->baseUrl);

/**
 * -----------------------------------------------------------------------------
 * @author Qiang Xue <qiang.xue@gmail.com>
 *
 * @since 2.0
 * -----------------------------------------------------------------------------
 */
class AppAssetJs extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@themes';

    public $css = [
//        'css/bootstrap.min.css',
//        'css/now-ui-kit.css',
//        'css/header.css',
//        'css/profilecard.css',
//        'css/daterangepicker.css',
//        'https://fonts.googleapis.com/css?family=Montserrat:400,700,200',
//        'https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
//        'https://use.fontawesome.com/releases/v5.0.13/css/all.css',
//        'https://fonts.googleapis.com/icon?family=Material+Icons',
    ];
    public $js = [
//        'js/core/popper.min.js',
        'js/core/jquery.3.2.1.min.js',
//        'js/core/bootstrap.min.js',
//        'js/now-ui-kit.js',
//        'js/plugins/bootstrap-switch.js',
//        'js/daterangepicker.js',
//        'js/plugins/moment.min.js',


    ];
//    public $css = [
//        'css/header.css',
//        'css/bootstrap.min.css',
//        'css/material-dashboard.css',
//        'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
//        'http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons',
//    ];
//    public $js = [
//        'js/material.min.js',
//        'js/chartist.min.js',
//        'js/bootstrap-notify.js',
//        'js/material-dashboard.js',
//        'js/superfish.js',
//    ];

    public $depends = [
        'yii\web\YiiAsset',
//        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',

    ];
}

