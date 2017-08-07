<?php

use yii\helpers\Html; 
use kartik\grid\GridView; 
use common\components\Helper;

/* @var $this yii\web\View */ 
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */ 

$this->title = 'Kelola User'; 
$this->params['breadcrumbs'][] = $this->title; 
?> 
<div class="box box-primary user-index"> 

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?> 
    <div class="box-header with-border"> 
        <p> 
            <?= Html::a('<i class="fa fa-plus"></i> Tambah User', ['create'], ['class' => 'btn btn-success btn-flat']) ?> 
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
            'username',
            [
                'attribute' => 'last_login',
                'value' => function($data){
                    return Helper::getWaktuWIB(Helper::convert($data->last_login, 'datetime'));
                },
            ],
            [
                'format'=>'raw',
                'headerOptions' => ['style'=>'text-align:center;width:20px;'],
                'value'=>function($data) {
                    return Html::a('<i class="fa fa-key"></i>',['user/set-password','id'=>$data->id],['data-toggle'=>'tooltip','title'=>'Set Password']);
                    }
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