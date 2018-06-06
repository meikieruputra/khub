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
        'css/site.css',
        'http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic',
        'themes/sakato/css/bootstrap.css',
        'themes/sakato/css/style.css',
        'themes/sakato/css/swiper.css',
        'themes/sakato/css/dark.css',
        'themes/sakato/css/font-icons.css',
        'themes/sakato/css/animate.css',
        'themes/sakato/css/magnific-popup.css',
        'themes/sakato/css/responsive.css',
    ];
    public $js = [
        'themes/sakato/js/jquery.js',
        'themes/sakato/js/jquery.js',
        'themes/sakato/js/plugins.js',
        'themes/sakato/js/functions.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
