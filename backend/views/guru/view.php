<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Guru */
$this->params['breadcrumbs'][] = ['label' => 'Guru', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>&nbsp;</div>
<div class="box box-primary guru-view">
    <div class="box-header with-border">
        <h1 class="box-title">Detail Guru <?= Html::encode($this->title) ?></h1>
    </div>
    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama',
            [
            'attribute'=>'id_mapel',
            'value' => function($data){
                    return $data->getRelationField('mapel','nama');
                },
            ],
            'nip',
            'alamat:ntext',
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
