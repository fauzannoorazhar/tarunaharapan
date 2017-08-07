<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Helper;
use common\models\Tentang;

/* @var $this yii\web\View */
/* @var $model common\models\Tentang */


$this->params['breadcrumbs'][] = ['label' => 'Tentang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary tentang-view">
    <div class="box-header with-border">
        <h1 class="box-title">Detail Tentang <?= Html::encode($this->title) ?></h1>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-2">
                <?= $model->getGambar(['style' => 'width:150px']); ?>
            </div>

            <div class="col-sm-10">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'isi:ntext',
                        [   
                            'attribute' => 'create_by',
                            /*'value' => function($data){
                                return Tentang::getUser($data->create_by);
                            },*/
                        ],
                        'update_by',
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
                    ],
                ]) ?>
            </div>
        </div>
        
    </div>
    <div class="box-footer with-border">
        <p>
            <?= Html::a('<i class="fa fa-pencil"></i> Sunting', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
            <?= Html::a('<i class="fa fa-trash"></i> Hapus', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-flat',
                'data' => [
                    'confirm' => 'Yakin Akan Menghapus Data?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>

</div>
