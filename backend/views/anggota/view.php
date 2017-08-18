<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Helper;
use common\models\JenisKelamin;

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
            'tanggal_lahir',
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
