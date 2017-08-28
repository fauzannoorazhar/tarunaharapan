<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Helper;
use common\models\Siswa;

/* @var $this yii\web\View */
/* @var $model common\models\Siswa */


$this->params['breadcrumbs'][] = ['label' => 'Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary siswa-view">
    <div class="box-header with-border">
        <h1 class="box-title">Detail Siswa <?= Html::encode($this->title) ?></h1>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-2">
                <div><?= $model->getGambar(['class'=>'img-responsive']); ?></div>
            </div>

            <div class="col-sm-5">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'nama',
                        'nisn',
                        'alamat:ntext',
                        [
                            'attribute' => 'tanggal_lahir',
                            'value' => function($data){
                                return Helper::getTanggal($data->tanggal_lahir);
                            },
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function($data) {
                                return $data->getStatus();
                            },
                            'format' => 'raw',
                        ],
                        [
                            'attribute' => 'id_jurusan_angkatan',
                            'filter' => Siswa::getList(),
                            'value' => function($data) {
                                return $data->jurusanAngkatan->jurusan->nama . ' - ' . $data->jurusanAngkatan->angkatan->tahun;
                            }
                        ],
                        [
                            'attribute' => 'id_jenis_kelamin',
                            'value' => function($data) {
                                return $data->jenisKelamin->nama;
                            },
                        ],
                    ],
                ]) ?>
            </div>

            <div class="col-sm-5">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
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