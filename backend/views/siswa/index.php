<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use common\models\Siswa;
use common\models\JenisKelamin;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelola Siswa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary siswa-index">

    <?php Pjax::begin(); ?>
    
    <div class="box-header with-border">
        <p>
            <div class="row">
                <div class="col-md-6 col-xs-7">
                    <?= Html::a('<i class="fa fa-plus"></i> Tambah Siswa', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
                    <?= Html::a('<i class="fa fa-mortar-board"></i> Siswa Alumni', ['alumni'], ['class' => 'btn btn-primary btn-flat']) ?>
                    <?= Html::a('<i class="fa fa-check"></i> Siswa Aktif', ['aktif'], ['class' => 'btn btn-primary btn-flat']) ?>
                </div>
                <div class="col-md-6 col-xs-5">
                    <div class="pull-right">
                        <div class="has-feedback"> 
                            <?= $this->render('_search', ['model' => $searchModel]); ?>
                        </div>
                    </div>
                </div>
            </div>
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
            'nama',
            [
                'attribute' => 'nisn',
                'options' => ['style' => 'width:200px']
            ],
            [
                'attribute' => 'id_jenis_kelamin',
                'filter' => JenisKelamin::getList(),
                'value' => function($data){
                    return $data->jenisKelamin->nama;
                },
            ],
            [
                'attribute' => 'status',
                'filter' => Siswa::getListStatus(),
                'value' => function ($data) {
                    return $data->getStatus();
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'id_jurusan_angkatan',
                'filter' => Siswa::getList(),
                'value' => function($data) {
                    return $data->jurusanAngkatan->jurusan->nama . ' - ' . $data->jurusanAngkatan->angkatan->tahun;
                }
            ],
            //'photo',

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