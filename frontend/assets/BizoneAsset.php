<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class BizOneAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/animate.min.css',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/icomoon-fonts.css',
        'css/jPushMenu.css',
        'css/jquery.fancybox.css',
        'css/jquery.fancybox-thumbs.css',
        'css/loader.css',
        'css/loader-colorful.css',
        'css/one-color.css',
        'css/onepage.css',
        'css/owl.carousel.css',
        'css/owl.transitions.css',
    ];
    public $js = [
        'js/jquery-2.1.4.js',
        'js/bootstrap.min.js',
        'js/jquery.themepunch.tools.min.js',
        'js/jquery.themepunch.revolution.min.js',
        'js/jquery.easing.min.js',
        'js/owl.carousel.min.js',
        'js/jquery-countTo.js',
        'js/jquery.appear.js', 
        'js/jquery.circliful.js',
        'js/jquery.mixitup.min.js',
        'js/wow.min.js',
        'js/jquery.parallax-1.1.3.js',
        'js/jquery.fancybox.js',
        'js/jquery.fancybox-thumbs.js',
        'js/jquery.fancybox-media.js',
        'js/jPushMenu.js',
        'js/functions.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'rmrevin\yii\fontawesome\AssetBundle'
    ];
}
