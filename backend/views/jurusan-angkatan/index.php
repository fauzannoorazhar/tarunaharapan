<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use common\models\Jurusan;
use common\models\Angkatan;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JurusanAngkatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelola Jurusan Angkatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary jurusan-angkatan-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box-header with-border">
        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah Jurusan Angkatan', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        </p>
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
            [
                'attribute' => 'id_jurusan',
                'filter' => Jurusan::getList(),
                'value' => function($data) {
                    return $data->jurusan->nama;
                },
                'options' => ['style' => 'width:250px']
            ],
            [
                'attribute' => 'id_angkatan',
                'filter' => Angkatan::getList(),
                'value' => function ($data) {
                    return $data->angkatan->tahun;
                },
                'options' => ['style' => 'width:250px']
            ],
            [
                'class' => 'app\components\ToggleActionColumn',
                'headerOptions'=>['style'=>'text-align:center;width:80px'],
                'contentOptions'=>['style'=>'text-align:center']
            ],
        ],
    ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
