<?php
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\Artikel;
use common\components\Helper;
use common\models\User;

$this->title = 'Selamat Datang';
?>

<div class="row">
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= Artikel::getArtikelProsesAll() ?></h3>
                <p>Semua Artikel Diproses</p>
            </div>
            <div class="icon">
                <i class="fa fa-refresh"></i>
            </div>
            <a href="<?= Url::to(['artikel/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?= Artikel::getArtikelDiterimaAll() ?></h3>
                <p>Semua Artikel Diterima</p>
            </div>
            <div class="icon">
                <i class="fa fa-check"></i>
            </div>
            <a href="<?= Url::to(['artikel/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= Artikel::getArtikelDitolakAll() ?></h3>
                <p>Semua Artikel Ditolak</p>
            </div>
            <div class="icon">
                <i class="fa fa-close"></i>
            </div>
            <a href="<?= Url::to(['artikel/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Artikel Bulan Ini</h3>
    </div>

    <div class="box-body">
        <table class="table table-bordered table-striped table-condensed"> 
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Status Artikel</th>
                <th>Tag Artikel</th>
                <th>Dibuat Oleh</th>
                <th>Waktu Dibuat</th>
            </tr>
            <?php $no = 1; foreach (Artikel::findArtikelBulanIni() as $data): ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $data->judul ?></td>
                <td><?= $data->getStatus(); ?></td>
                <td><?= $data->tagArtikel->nama ?></td>
                <td><?= $data->anggota->nama; ?></td>
                <td><?= Helper::getTanggalSingkat(Helper::convert($data->create_at, 'datetime')) ?></td>
            </tr>
            <?php $no++; endforeach ?>
        </table>
    </div>
</div>

<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Anggota Login Terakhir</h3>
    </div>

    <div class="box-body">
        <table class="table table-bordered table-striped table-condensed"> 
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Nama Akun</th>
                <th>Login Terakhir</th>
            </tr>
            <?php $i=1; foreach (User::find()->where(['id_role' => 3])->all() as $user): ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= Html::a($user->anggota->nama, ['anggota/view','id' => $user->nama_anggota], ['option' => 'value']); ?></td>
                <td><?= $user->username ?></td>
                <td><?= Helper::getWaktuWIB(Helper::convert($user->last_login, 'datetime')) ?></td>
            </tr>
            <?php $i++; endforeach ?>
        </table>
    </div>
</div>