<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\components\Helper;
use common\models\StatusArtikel;
use common\models\User;
use common\models\TagArtikel;

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
            <?php /*if (!User::isAnggota()): ?>
                <?= Html::a('<i class="fa fa-eye"></i> Lihat Artikel', $url = null, ['class' => 'btn btn-info btn-flat']); ?>
            <?php endif*/ ?>
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
                    'attribute' => 'id_tag_artikel',
                    'format' => 'raw',
                    'filter' => TagArtikel::getList(), 
                    'options' => ['style' => 'width: 40px'],
                    'value' => function($data){
                        return $data->tagArtikel->nama;
                    },
                ],
                [
                    'attribute' => 'id_status_artikel',
                    'filter' => StatusArtikel::getList(),
                    'value' => function ($data) {
                        return $data->getStatus();
                    },
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'create_by',
                    'value' => function($data){
                        return $data->anggota->nama;
                    },
                ],
                [
                    'attribute' => 'create_at',
                    'value' => function($data){
                        return Helper::getWaktuWIB(Helper::convert($data->create_at, 'datetime'));
                    },
                ],
                [
                    'class' => 'app\components\ToggleActionColumn',
                    'template' => User::isAdmin() ? '{view} {update} {delete}' : '{update} {view}',
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
                    'label' => '',
                    'format' => 'raw',
                    'options' => ['style' => 'width: 40px'],
                    'contentOptions' => ['style' => 'text-align:center;'],
                    'value' => function($data) {
                        if ($data->id_status_artikel !== StatusArtikel::DITERIMA) {
                            return Html::a('<span class="fa fa-plus"></span>', ['galeri-artikel/create','id_artikel' => $data->id], [
                                        'data-toggle' =>'tooltip','title' => Yii::t('app', 'Tambah Photo Artikel Lainnya'),     
                                ]);
                        } else {
                            return Html::a('<span class="fa fa-plus"></span>', ['galeri-artikel/create','id_artikel' => $data->id], [
                                        'data-toggle' =>'tooltip','title' => Yii::t('app', 'Tambah Photo Artikel Lainnya'),
                                ]);
                        }
                    }
                ],
                /*[
                    'label' => '',
                    'format' => 'raw',
                    'options' => ['style' => 'width: 40px'],
                    'contentOptions' => ['style' => 'text-align:center;'],
                    'value' => function($data) {
                        if ($data->id_status_artikel == StatusArtikel::DITERIMA) {
                            return Html::a('<i class="fa fa-pencil">', ['update','id' => $data->id], ['data-toggle' => 'tooltip', 'title' => 'Update Artikel']);
                        } else {
                            return Html::a('<i class="fa fa-pencil">', ['update','id' => $data->id], ['data-toggle' => 'tooltip', 'title' => 'Update Artikel']);
                        }
                    }
                ],*/
                [
                    'class' => 'app\components\ToggleActionColumn',
                    'template' => '{view} {update} {delete}',
                    'headerOptions'=>['style'=>'text-align:center;width:10px'],
                    'contentOptions'=>['style'=>'text-align:center']
                ],
            ],
        ]); ?>
    <?php endif ?>
    </div>
</div>
