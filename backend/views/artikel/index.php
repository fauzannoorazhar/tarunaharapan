<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use common\components\Helper;
use common\models\Artikel;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ArtikelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelola Artikel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary artikel-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box-header with-border">
        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah Artikel', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
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
            'judul',
            'create_by',
            'update_by',
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