<?php

use yii\helpers\Html; 
use kartik\grid\GridView; 
use common\components\Helper;
use common\models\User;

/* @var $this yii\web\View */ 
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */ 

$this->title = 'Kelola User'; 
$this->params['breadcrumbs'][] = $this->title; 
?> 
<div class="box box-primary user-index"> 

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?> 
    <div class="box-header with-border">  
    </div> 
    <div class="box-body"> 

    <?php if (User::isAdmin()) { ?>
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
                    'attribute'=>'nama_anggota',
                    'format'=>'raw',
                    'value'=> function($data){
                        return Html::a($data->getRelationField('anggota','nama'), ['anggota/view', 'id'=> $data->nama_anggota]);
                    },
                ],
                [
                    'attribute' => 'last_login',
                    'value' => function($data){
                        return Helper::getWaktuWIB(Helper::convert($data->last_login, 'datetime'));
                    },
                ],
                [
                    'label' => 'Status',
                    'format'=>'raw',
                    'headerOptions' => ['style'=>'text-align:center;width:20px;'],
                    'contentOptions'=>['style'=>'text-align:center;width:20px;'],
                    'value'=>function($data) {
                        if ($data->status == User::INACTIVE) {
                            return Html::a('<i class="fa fa-check"></i>',['user/status-aktif','id'=>$data->id],['data-toggle'=>'tooltip','title'=>'Aktifkan User']);
                        } else {
                            return '<i class="label label-success">User Aktif</i>';
                        }
                    }
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
                    'template' => '{view} {update}',
                    'headerOptions'=>['style'=>'text-align:center;width:80px'], 
                    'contentOptions'=>['style'=>'text-align:center'] 
                ], 
            ], 
        ]); ?> 
    <?php } else { ?>
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
                    'attribute'=>'nama_anggota',
                    'format'=>'raw',
                    'value'=> function($data){
                        return Html::a($data->getRelationField('anggota','nama'), ['anggota/view', 'id'=> $data->nama_anggota]);
                    },
                ],
                [
                    'attribute' => 'last_login',
                    'value' => function($data){
                        return Helper::getWaktuWIB(Helper::convert($data->last_login, 'datetime'));
                    },
                ],
                [
                    'label' => 'Status',
                    'format'=>'raw',
                    'headerOptions' => ['style'=>'text-align:center;width:20px;'],
                    'contentOptions'=>['style'=>'text-align:center;width:20px;'],
                    'value'=>function($data) {
                        if ($data->status == User::INACTIVE) {
                            return Html::a('<i class="fa fa-check"></i>',['user/status-aktif','id'=>$data->id],['data-toggle'=>'tooltip','title'=>'Aktifkan User']);
                        } else {
                            return '<i class="label label-success">User Aktif</i>';
                        }
                    }
                ],
                [ 
                    'class' => 'app\components\ToggleActionColumn',
                    'template' => '{view}',
                    'headerOptions'=>['style'=>'text-align:center;width:80px'], 
                    'contentOptions'=>['style'=>'text-align:center'] 
                ], 
            ], 
        ]); ?> 
    <?php } ?>

    </div> 
</div> 