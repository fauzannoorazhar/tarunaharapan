<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Helper;

/* @var $this yii\web\View */
/* @var $model common\models\Eskul */


$this->params['breadcrumbs'][] = ['label' => 'Eskul', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary eskul-view">
    <div class="box-header with-border">
        <h1 class="box-title">Detail Eskul <?= Html::encode($this->title) ?></h1>
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
                        'nama',
                        [
                            'attribute' => 'urutan',
                        ],
                        [   
                            'attribute' => 'keterangan',
                            'format' => 'raw',
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
                    ],
                ]) ?>
            </div>
        </div>
        
    </div>
    <div class="box-footer with-border">
        <p>
            <?= Html::a('<i class="fa fa-pencil"></i> Sunting Ekstrakulikuler', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
            <?= Html::a('<i class="fa fa-list"></i> Daftar Ekstrakulikuler', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
        </p>
    </div>

</div>
