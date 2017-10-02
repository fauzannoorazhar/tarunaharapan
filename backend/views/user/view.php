<?php

use yii\helpers\Html; 
use yii\widgets\DetailView; 
use common\components\Helper;
use common\models\User;

/* @var $this yii\web\View */ 
/* @var $model common\models\User */ 


$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']]; 
$this->params['breadcrumbs'][] = $this->title; 
?> 
<div class="box box-primary user-view"> 
    <div class="box-header with-border"> 
        <h1 class="box-title">Detail User <?= Html::encode($this->title) ?></h1> 
    </div> 
    <div class="box-body"> 

    <?php if (User::isAdmin()) { ?>
        <?= DetailView::widget([ 
            'model' => $model, 
            'attributes' => [ 
                [
                    'attribute'=>'nama_anggota',
                    'format'=>'raw',
                    'value'=> function($data){
                        return Html::a($data->getRelationField('anggota','nama'), ['anggota/view', 'id'=> $data->nama_anggota]);
                    },
                ],
                'username',
                'model',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function($data){
                        return $data->getStatus();
                    },
                ],
                [
                    'attribute' => 'create_at',
                    'value' => function($data){
                        return Helper::getWaktuWIB(Helper::convert($data->create_at, 'datetime'));
                    },
                ],
                /*[
                    'attribute' => 'update_at',
                    'value' => function($data){
                        return Helper::getWaktuWIB(Helper::convert($data->update_at, 'datetime'));
                    },
                ],*/
                [
                    'attribute' => 'last_login',
                    'value' => function($data){
                        return Helper::getWaktuWIB(Helper::convert($data->last_login, 'datetime'));
                    },
                ],
            ], 
        ]) ?> 
        <?php } elseif (User::isOperator()) { ?>
            <?= DetailView::widget([ 
            'model' => $model, 
            'attributes' => [ 
                [
                    'attribute'=>'nama_anggota',
                    'format'=>'raw',
                    'value'=> function($data){
                        return Html::a($data->getRelationField('anggota','nama'), ['anggota/view', 'id'=> $data->nama_anggota]);
                    },
                ],
                'username',
                'password',
                [
                    'attribute' => 'last_login',
                    'value' => function($data){
                        return Helper::getWaktuWIB(Helper::convert($data->last_login, 'datetime'));
                    },
                ],
            ], 
        ]) ?> 
        <?php } ?>
         
    </div> 
    <div class="box-footer with-border"> 
        
    </div> 
</div> 