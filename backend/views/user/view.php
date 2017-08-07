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

    <?php if (User::isSuperAdmin()) { ?>
        <?= DetailView::widget([ 
            'model' => $model, 
            'attributes' => [ 
                'username',
                'password',
                'model',
                [
                    'attribute' => 'create_at',
                    'value' => function($data){
                        return Helper::getWaktuWIB(Helper::convert($data->create_at, 'datetime'));
                    },
                ],
                [
                    'attribute' => 'update_at',
                    'value' => function($data){
                        return Helper::getWaktuWIB(Helper::convert($data->update_at, 'datetime'));
                    },
                ],
                [
                    'attribute' => 'last_login',
                    'value' => function($data){
                        return Helper::getWaktuWIB(Helper::convert($data->last_login, 'datetime'));
                    },
                ],
            ], 
        ]) ?> 
        <?php } elseif (User::isAdmin()) { ?>
            <?= DetailView::widget([ 
            'model' => $model, 
            'attributes' => [ 
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
            <p><?= Html::a('<i class="fa fa-pencil"></i> Sunting', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?> 
        <?php if (User::isSuperAdmin()) { ?>
            <?= Html::a('<i class="fa fa-trash"></i> Hapus', ['delete', 'id' => $model->id], [ 
                'class' => 'btn btn-danger btn-flat', 
                'data' => [ 
                    'confirm' => 'Yakin Akan Menghapus Data?', 
                    'method' => 'post', 
                ], 
            ]) ?> 
        <?php } ?>
        </p> 
    </div> 

</div> 