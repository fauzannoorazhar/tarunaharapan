<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\models\JenisKelamin;
use common\components\Helper;
use common\models\Anggota;
use common\widgets\Label;
use common\models\User;

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
        'responsive'=>true,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions'=>['style'=>'text-align:center;width:20px;'],
                'contentOptions'=>['style'=>'text-align:center;width:20px;']
            ],
            [
                'attribute'=>'nama',
                'format'=>'raw',
                /*'value'=> function($data){
                    return Html::a($data->getRelationField('user','username'), ['user/view', 'id'=> $data->nama]);
                },*/
            ],
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
                'header' => 'Jumlah Artikel',
                'format' => 'raw',
                'value' => function($data) {
                    return Label::widget([
                            'context' => 'warning',
                            'text' => $data->getArtikelCount()
                        ]);
                },
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            [
                'class' => 'app\components\ToggleActionColumn',
                'template' => User::isAdmin() ? '{view} {update} {delete}' : '{view}',
                'headerOptions'=>['style'=>'text-align:center;width:80px'],
                'contentOptions'=>['style'=>'text-align:center']
            ],
        ],
    ]); ?>
    </div>
</div>