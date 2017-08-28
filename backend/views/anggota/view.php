<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Helper;
use common\models\JenisKelamin;
use common\models\Artikel;
use common\models\Anggota;

/* @var $this yii\web\View */
/* @var $model common\models\Anggota */


$this->params['breadcrumbs'][] = ['label' => 'Anggota', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary anggota-view">
    <div class="box-header with-border">
        <h1 class="box-title">Detail Anggota <?= Html::encode($this->title) ?></h1>
    </div>
    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama',
            'alamat:ntext',
            [
                'attribute' => 'id_jenis_kelamin',
                'filter' => JenisKelamin::getList(),
                'value' => function($data){
                    return $data->jenisKelamin->nama;
                },
            ],
            'email:email',
            [
                'attribute' => 'tanggal_lahir',
                'value' => function($data){
                    return Helper::getTanggal($data->tanggal_lahir);
                },
            ],
            [
                'attribute' => 'create_at',
                'value' => function($data){
                    return Helper::getWaktuWIB(Helper::convert($data->create_at, 'datetime'));
                },
            ],
        ],
    ]) ?>
        
    </div>
    <div class="box-footer with-border">
        <p>
            <?= Html::a('Sunting', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
            <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-flat',
                'data' => [
                    'confirm' => 'Yakin Akan Menghapus Data?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>

</div>

<div class="box box-primary">
    <div class="box-header with-border">
    </div>

    <div class="box-body">
        <table class="table table-bordered table-striped table-condensed">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <!-- <th>Dibuat Oleh</th> -->
                <th>Dibuat Tanggal</th>
                <th></th>
            </tr>
                <?php
                $i=1;
                 foreach ($model->artikel as $data) { ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data->judul; ?></td>
                <!-- <td><?= $data->anggota->nama ?></td> -->
                <td><?= Helper::getWaktuWIB(Helper::convert($data->create_at, 'datetime')); ?></td>
                <td><?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', ['artikel/view', 'id' => $data->id]) ?></td>
            </tr>
            <?php $i++; } ?>
        </table>
    </div>
</div>