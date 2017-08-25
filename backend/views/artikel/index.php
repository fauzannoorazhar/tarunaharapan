<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\components\Helper;
use common\models\StatusArtikel;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TentangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelola Artikel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary tentang-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box-header with-border">
        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah Artikel', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        </p>
    </div>
    <div class="box-body">

    <?php if (User::isAdmin() || User::isOperator()): ?>
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
                    'attribute' => 'id_status_artikel',
                    'filter' => StatusArtikel::getList(),
                    'value' => function ($data) {
                        return $data->getStatus();
                    },
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'create_at',
                    'value' => function($data){
                        return Helper::getWaktuWIB(Helper::convert($data->create_at, 'datetime'));
                    },
                ],
                [
                    'class' => 'app\components\ToggleActionColumn',
                    'headerOptions'=>['style'=>'text-align:center;width:10px'],
                    'contentOptions'=>['style'=>'text-align:center']
                ],
            ],
        ]); ?>
    <?php else: ?>
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
                    'attribute' => 'id_status_artikel',
                    'filter' => StatusArtikel::getList(),
                    'value' => function ($data) {
                        return $data->getStatus();
                    },
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'create_at',
                    'value' => function($data){
                        return Helper::getWaktuWIB(Helper::convert($data->create_at, 'datetime'));
                    },
                ],
                [
                    'class' => 'app\components\ToggleActionColumn',
                    'contentOptions'=>['style'=>'text-align:center'],
                        'template' => '{tambah}',
                        'buttons' => [
                            'tambah' => function ($url, $model) {
                                return Html::a('<span class="fa fa-plus"></span>', ['galeri-artikel/create','id_artikel' => $model->id], [
                                        'data-toggle' =>'tooltip','title' => Yii::t('app', 'Tambah Gambar Artikel Lainnya'),
                                        
                                ]);
                            },
                        ],
                ],
                [
                    'class' => 'app\components\ToggleActionColumn',
                    'headerOptions'=>['style'=>'text-align:center;width:10px'],
                    'contentOptions'=>['style'=>'text-align:center']
                ],
            ],
        ]); ?>
    <?php endif ?>
    </div>
</div>
