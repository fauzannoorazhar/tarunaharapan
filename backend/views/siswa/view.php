<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Siswa */
$this->params['breadcrumbs'][] = ['label' => 'Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>&nbsp;</div>
<div class="box box-primary siswa-view">
    <div class="box-header with-border">
        <h1 class="box-title">Detail Siswa <?= Html::encode($this->title) ?></h1>
    </div>
    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama',
            'nisn',
            [
            'attribute'=>'id_jurusan',
            'value' => function($data){
                    return $data->getRelationField('jurusan','nama');
                },
            ],
            [
            'attribute'=>'id_angkatan',
            'value' => function($data){
                    return $data->getRelationField('angkatan','tahun');
                },
            ],
            'alamat:ntext',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return $data->getStatus();
                }
            ],
            'photo',
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
