<?php

namespace app\themes;

class AdminlteAsset extends \yii\web\AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/yii2-adminlte/css/AdminLTE.css',
        'themes/yii2-adminlte/css/skins/_all-skins.min.css'
    ];
    public $js = [
        'themes/yii2-adminlte/js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        
    ];

}