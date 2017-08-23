<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Helper;

/* @var $this yii\web\View */
/* @var $model common\models\Jurusan */


$this->params['breadcrumbs'][] = ['label' => 'Jurusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary jurusan-view">
    <div class="box-header with-border">
        <h1 class="box-title">Detail Jurusan <?= Html::encode($this->title) ?></h1>
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

<div class="box box-primary">
    <div class="box-header with-border">
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
                <td><?= $data->jurusanAngkatan->jurusan->nama.' - '.$data->jurusanAngkatan->angkatan->tahun ?></td>
                <td><?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', ['siswa/view', 'id' => $data->id]) ?></td>
            </tr>
            <?php $i++; } ?>
        </table>
    </div>
</div>