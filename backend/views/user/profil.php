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
                        return Html::a($data->nama_anggota, ['anggota/view', 'id'=> $data->getRelationField("anggota","nama")]);
                    },
                ],
                'username',
                'password',
                'model',
                [
                    'attribute' => 'status',
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
        <?php } elseif (User::isOperator()) { ?>
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
        <?php } elseif (User::isAnggota()) { ?>
            <?= DetailView::widget([ 
                'model' => $model, 
                'attributes' => [ 
                    'username',
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
            <p><?= Html::a('<i class="fa fa-pencil"></i> Sunting Akun', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?> 
            <?= Html::a('<i class="fa fa-eye"></i> Kelola Profil', ['anggota/profil', 'id'=> $model->nama_anggota], ['class' => 'btn btn-primary btn-flat']) ?>
        <?php if (User::isAdmin()) { ?>
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

