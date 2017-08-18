<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Helper;
use common\models\Artikel;
use common\models\Rating;
use common\models\StatusArtikel;
use kartik\rating\StarRating;

/* @var $this yii\web\View */
/* @var $model common\models\Artikel */

$this->params['breadcrumbs'][] = ['label' => 'Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary artikel-view">
    <div class="box-header with-border">
        <h1 class="box-title">Detail Artikel <?= Html::encode($this->title) ?></h1>
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
                        'judul',
                        [
                            'attribute' => 'isi',
                            'format' => 'raw',
                        ],
                        'create_by',
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
                            'attribute' => 'id_status_artikel',
                            'value' => function ($data) {
                                return $data->getStatus();
                            },
                            'format' => 'raw',
                        ],
                    ],
                ]) ?>
            </div>
        </div>
        
    </div>
    <div class="box-footer with-border">
        <p> <?= Html::a('<i class="fa fa-list"></i> Daftar Artikel', Yii::$app->request->referrer, ['class' => 'btn btn-success btn-flat']); ?>
            <?php 
            if ($model->id_status_artikel == StatusArtikel::DIPROSES) { ?>
                <?= Html::a('<i class="fa fa-check"></i> Ubah Menjadi Diterima', ['ubah-status', 'id' => $model->id,'id_status_artikel' => StatusArtikel::DITERIMA], ['class' => 'btn btn-primary btn-flat', 'data-confirm' => 'Yakin akan menerima artikel ini?']); ?>
                <?= Html::a('<i class="fa fa-remove"></i> Tolak Artikel', ['ubah-status', 'id' => $model->id,'id_status_artikel' => StatusArtikel::DITOLAK], ['class' => 'btn btn-danger btn-flat', 'data-confirm' => 'Yakin akan menolak artikel ini?']); ?>
            <?php } ?>
        </p>
    </div>

</div>