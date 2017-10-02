<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Helper;
use common\models\Artikel;
use common\models\User;
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
            <div class="col-sm-2 col-xs-12" align="create">
                <?= $model->getGambar(['style' => 'width:130px;']); ?>
                <div>&nbsp;</div>
            </div>

            <div class="col-sm-10 col-xs-12">
               <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'judul',
                        [
                            'attribute' => 'id_tag_artikel',
                            'format' => 'raw',
                            'value' => function($data){
                                return $data->labelTag();
                            },
                        ],
                        [
                            'attribute' => 'isi',
                            'format' => 'raw',
                        ],
                        /*[
                            'attribute' => 'create_at',
                            'value' => function($data){
                                return Helper::getWaktuWIB(Helper::convert($data->create_at, 'datetime'));
                            },
                        ],
                        [
                            'attribute' => 'create_by',
                            'value' => function($data){
                                return $data->getRelationField('user','username');
                            },
                        ],*/
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
        <p>
            <?= Html::a('<i class="fa fa-list"></i> Daftar Artikel', ['index'], ['class' => 'btn btn-warning btn-flat']); ?>

            <?php if (!User::isAnggota() AND $model->id_status_artikel === StatusArtikel::DITERIMA): ?>
                <?= Html::a('<i class="fa fa-close"></i> Tolak Artikel', ['ubah-status', 'id' => $model->id,'id_status_artikel' => StatusArtikel::DITOLAK], ['class' => 'btn btn-danger btn-flat','data' => ['confirm' => 'Apakah Anda Ingin Menolak Artikel Ini?']]); ?>
            <?php endif ?>

            <?php if (!User::isAnggota() AND $model->id_status_artikel !== StatusArtikel::DITERIMA AND $model->id_status_artikel !== StatusArtikel::DITOLAK): ?>
                <?= Html::a('<i class="fa fa-check"></i> Terima Artikel', ['ubah-status', 'id' => $model->id,'id_status_artikel' => StatusArtikel::DITERIMA], ['class' => 'btn btn-info btn-flat','data' => ['confirm' => 'Apakah Anda Ingin Menerima Artikel Ini?']]); ?>
                <?= Html::a('<i class="fa fa-close"></i> Tolak Artikel', ['ubah-status', 'id' => $model->id,'id_status_artikel' => StatusArtikel::DITOLAK], ['class' => 'btn btn-danger btn-flat','data' => ['confirm' => 'Apakah Anda Ingin Menolak Artikel Ini?']]); ?>
            <?php endif ?>

            <?php if ($model->create_by == User::getUser()) { ?>
                <?= Html::a('<i class="fa fa-plus"></i> Tambah Gambar', ['galeri-artikel/create', 'id_artikel' => $model->id], ['class' => 'btn btn-success btn-flat']);
            }
                if ($model->id_status_artikel == StatusArtikel::DITOLAK AND $model->create_by == User::getUser()) { ?>
                    <?= Html::a('<i class="fa fa-paper-plane"></i> Ajukan Kembali', ['ubah-status','id' => $model->id,'id_status_artikel' => StatusArtikel::DIPROSES], ['class' => 'btn btn-info btn-flat','data' => ['confirm' => 'Apakah Anda Ingin Mengirim Kembali Artikel Untuk Diposting?']]);
                } ?>
        </p>
    </div>

</div>


<div class="box box-success collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title">Gambar Lainnya</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <?php foreach ($model->galeriArtikel as $gambar): ?>
            <?= $gambar->getGambar(['class' => 'gambar-artikel']) ?>
        <?php endforeach ?>
    </div>
</div>  