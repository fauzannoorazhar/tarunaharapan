<?php
use yii\web\UrlNormalizer;

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
    'timeZone' => 'Asia/Jakarta',
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to  
            // use your own export download action or custom translation 
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'social' => [
            // the module class
            'class' => 'kartik\social\Module',
     
            // the global settings for the facebook widget
            'facebook' => [
                'appId' => '1943341949212865',
            ],
        ],
    ],
    'components' => [
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                /*'<artikel:\w+>/<detail:\w+>/<slug>' => '<artikel>/<detail>',*/
                'Artikel/<slug>' => 'artikel/detail',
                'Alumni/<slug>' => 'alumni/detail',
            ],
            'normalizer' => [
                'class' => UrlNormalizer::className(),
                'collapseSlashes' => true,
                'normalizeTrailingSlash' => true,
            ],
        ],
        'urlManagerFrontEnd' => [
            'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => false,
            'showScriptName' => false,
            'baseUrl' => 'http://127.0.0.1/tarunaharapan2/backend/web/index.php?r=site%2Flogin',
        ],
    ],
    'params' => $params,
];
