<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TentangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelola Tentang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary tentang-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box-header with-border">
        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah Tentang', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        </p>
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
            'create_by',
            [
                'attribute' => 'create_at',
                'value' => function($data){
                    return Helper::getWaktuWIB(Helper::convert($data->create_at, 'datetime'));
                },
            ],
            'update_by',
            [
                'attribute' => 'update_at',
                'value' => function($data){
                    return Helper::getWaktuWIB(Helper::convert($data->update_at, 'datetime'));
                },
            ],
            [
                'class' => 'app\components\ToggleActionColumn',
                'headerOptions'=>['style'=>'text-align:center;width:10px'],
                'contentOptions'=>['style'=>'text-align:center']
            ],
        ],
    ]); ?>
    </div>
</div>
