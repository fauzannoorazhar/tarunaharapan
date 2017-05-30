<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/fusioncharts/js/fusioncharts.js',
        'js/fusioncharts/js/themes/fusioncharts.theme.fint.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'rmrevin\yii\fontawesome\AssetBundle'
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
}
