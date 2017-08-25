<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TentangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Artikel Status Tolak';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary tentang-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box-header with-border">
        <h3 class="box-title"><?= $this->title; ?></h3>
    </div>
    <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'bordered' => true,
        'striped' => false,
        'responsive'=>true,
        'floatHeader'=>false,
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'persistResize'=>false,
        'pjax'=>true,
        'responsiveWrap' => false,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions'=>['style'=>'text-align:center;width:20px;'],
                'contentOptions'=>['style'=>'text-align:center;width:20px;']
            ],
            'judul',
            [
                'attribute' => 'create_by',
                'value' => function($data){
                    return $data->getRelationField('anggota','nama');
                },
            ],
            [
                'attribute' => 'create_at',
                'value' => function($data){
                    return Helper::getWaktuWIB(Helper::convert($data->create_at, 'datetime'));
                },
            ],
            /*'update_by',
            [
                'attribute' => 'update_at',
                'value' => function($data){
                    return Helper::getWaktuWIB(Helper::convert($data->update_at, 'datetime'));
                },
            ],*/
            [
                'class' => 'app\components\ToggleActionColumn',
                'template' => '{view}',
                'headerOptions'=>['style'=>'text-align:center;width:10px'],
                'contentOptions'=>['style'=>'text-align:center']
            ],
        ],
    ]); ?>
    </div>
</div>
