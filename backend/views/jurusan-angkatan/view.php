<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\JurusanAngkatan;
use common\components\Helper;

/* @var $this yii\web\View */
/* @var $model common\models\JurusanAngkatan */


$this->params['breadcrumbs'][] = ['label' => 'Jurusan Angkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary jurusan-angkatan-view">
    <div class="box-header with-border">
        <h1 class="box-title">Detail JurusanAngkatan <?= Html::encode($this->title) ?></h1>
    </div>
    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id_jurusan',
                'value' => function ($data) {
                    return $data->jurusan->nama;
                },
            ],
            [
                'attribute' => 'id_angkatan',
                'value' => function ($data) {
                    return $data->angkatan->tahun;
                },
            ],
            /*'create_by',
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
            ],*/
        ],
    ]) ?>
        
    </div>
    <div class="box-footer with-border">
        <p>
            <?= Html::a('<i class="fa fa-pencil"></i> Sunting Jurusan Angkatan', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
            <?= Html::a('<i class="fa fa-list"></i> Daftar Jurusan Angkatan', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
        </p>
    </div>

</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Siswa', ['siswa/create', 'id_jurusan_angkatan' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <div class="box-body">
        <table class="table table-bordered table-striped table-condensed">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nisn</th>
                <th>Status</th>
                <th>Jurusan Angkatan</th>
                <th></th>
            </tr>
                <?php
                $i=1;
                 foreach ($model->siswa as $data) { ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data->nama; ?></td>
                <td><?= $data->nisn; ?></td>
                <td><?= $data->getStatus(); ?></td>
                <td><?= $model->jurusan->nama . ' - ' . $model->angkatan->tahun; ?></td>
                <td><?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', ['siswa/view', 'id' => $data->id]) ?>
            </tr>
            <?php $i++; } ?>
        </table>
    </div>
</div>