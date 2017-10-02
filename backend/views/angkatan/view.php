<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Helper;

/* @var $this yii\web\View */
/* @var $model common\models\Angkatan */


$this->params['breadcrumbs'][] = ['label' => 'Angkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary angkatan-view">
    <div class="box-header with-border">
        <h1 class="box-title">Detail Angkatan <?= Html::encode($this->title) ?></h1>
    </div>
    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tahun',
        ],
    ]) ?>
        
    </div>
    <div class="box-footer with-border">
        <p>
            <?= Html::a('<i class="fa fa-pencil"></i> Sunting Angkatan', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
            <?= Html::a('<i class="fa fa-list"></i> Daftar Angkatan', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
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
                <td><?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', ['siswa/view', 'id' => $data->id]) ?>
            </tr>
            <?php $i++; } ?>
        </table>
    </div>
</div>