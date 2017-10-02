<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Helper;
use common\models\Artikel;
use common\models\StatusArtikel;
use common\models\JenisKelamin;

/* @var $this yii\web\View */
/* @var $model common\models\Anggota */

$this->title = 'User Profil';
$this->params['breadcrumbs'][] = ['label' => 'Profil', 'url' => ['anggota']];
?>
<div class="row">
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <?= Html::a($model->getGambar(['class' => 'profile-user-img img-responsive img-circle']), ['set-photo','id' => $model->id], ['data' => ['confirm' => 'Apakah anda akan menggunakan photo default?','method' => 'post']]); ?>
                <h4 class="text-center" style="color: black"><?= $model->nama ?></h4>

                <p class="text-muted text-center"><?= $model->bio ?></p>
            </div>
            <div class="box-body box-profile">

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Artikel Diproses</b> <span class="pull-right badge bg-green"><?= Artikel::getArtikelProses() ?></span>
                </li>
                <li class="list-group-item">
                    <b>Artikel Diterima</b> <span class="pull-right badge bg-blue"><?= Artikel::getArtikelDiterima() ?></span>
                </li>
                <li class="list-group-item">
                    <b>Artikel Ditolak</b> <span class="pull-right badge bg-red"><?= Artikel::getArtikelDitolak() ?></span>
                </li>
            </ul>

            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="box box-primary anggota-view">
            <div class="box-header with-border">
                <h1 class="box-title">Detail <?= Html::encode($this->title) ?></h1>
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
                <?= Html::a('<i class="fa fa-pencil"></i> Sunting Profil', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
            </p>
        </div>

        </div>
    </div>
</div>

<div class="box box-info collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-newspaper-o"></i> Artikel</h3>
        <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Close" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
    </div>            

    <?php 
        $artikel = Artikel::find()->where(['create_by' => Yii::$app->user->identity->id])->all();

        if ($artikel == null) { ?>
            <div class="box-body">
                <h3 style="text-align: center;" class="text-danger"><i class="fa fa-exclamation-triangle"></i> Tidak Ada Artikel</h3>
            </div>
        <?php } else { ?>
            <div class="box-body box-overflow">
                <?php foreach ($model->artikel as $artikel): ?>    
                    <ul class="timeline timeline-inverse">
                        <li class="time-label">
                                <?php if ($artikel->id_status_artikel == StatusArtikel::DIPROSES): ?>
                                    <span class="bg-green">
                                        Artikel Diproses
                                    </span> 
                                <?php elseif ($artikel->id_status_artikel == StatusArtikel::DITERIMA): ?>
                                    <span class="bg-blue">
                                        Artikel Diterima
                                    </span>
                                <?php elseif ($artikel->id_status_artikel == StatusArtikel::DITOLAK): ?>
                                    <span class="bg-red">
                                        Artikel Ditolak
                                    </span>
                                <?php endif ?>
                        </li>

                        <li>
                            <?php if ($artikel->id_status_artikel == StatusArtikel::DIPROSES): ?>
                                <i class="fa fa-refresh bg-green"></i> 
                            <?php elseif ($artikel->id_status_artikel == StatusArtikel::DITERIMA): ?>
                                <i class="fa fa-check bg-blue"></i>
                            <?php elseif ($artikel->id_status_artikel == StatusArtikel::DITOLAK): ?>
                                <i class="fa fa-close bg-red"></i>
                            <?php endif ?>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 
                                    <?= \Yii::$app->formatter->asRelativeTime($artikel->create_at);
                                    ?>
                                </span>

                                <h3 class="timeline-header"><?= $artikel->judul ?></h3>

                                <div class="timeline-body">
                                    <?= substr($artikel->isi, 0, 150) ?>
                                </div>
                            <div class="timeline-footer">
                                <?= Html::a('<i class="fa fa-eye"></i>', ['artikel/view','id' => $artikel->id], ['class' => 'btn btn-primary btn-xs','data-toggle' => 'tooltip', 'title' => 'View']); ?>
                                <?= Html::a('<i class="fa fa-pencil"></i>', ['artikel/update','id' => $artikel->id], ['class' => 'btn btn-success btn-xs','data-toggle' => 'tooltip', 'title' => 'Update']); ?>
                                <?= Html::a('<i class="fa fa-trash"></i>', ['artikel/delete','id' => $artikel->id], ['class' => 'btn btn-danger btn-xs','data-toggle' => 'tooltip', 'title' => 'Delete', 'data' => ['confirm' => 'Apakah Anda Serius Ingin Menghapus Artikel Ini?','method' => 'post']]); ?>
                            </div>
                            </div>
                        </li>
                    </ul>
                <?php endforeach ?>
            </div>
        <?php } ?>
</div>