<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\models\JenisKelamin;
use common\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AnggotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelola Anggota';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary anggota-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box-header with-border">
    </div>
    <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions'=>['style'=>'text-align:center;width:20px;'],
                'contentOptions'=>['style'=>'text-align:center;width:20px;']
            ],
            'nama',
            'email:email',
            [
                'attribute' => 'id_jenis_kelamin',
                'filter' => JenisKelamin::getList(),
                'value' => function($data){
                    return $data->jenisKelamin->nama;
                },
            ],
            [
                'attribute' => 'tanggal_lahir',
                'value' => function($data){
                    return Helper::getTanggal($data->tanggal_lahir);
                },
            ],

            [
                'class' => 'app\components\ToggleActionColumn',
                'headerOptions'=>['style'=>'text-align:center;width:80px'],
                'contentOptions'=>['style'=>'text-align:center']
            ],
        ],
    ]); ?>
    </div>
</div>