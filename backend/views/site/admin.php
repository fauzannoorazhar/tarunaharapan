<?php
use yii\helpers\Url;
use common\models\Siswa;
use common\models\Jurusan;
use common\models\guru;
use common\models\Angkatan;
$this->title = 'Selamat Datang';

$date = date('Y');
$OneAgo = strtotime($date.' - 1 year');
$TwoAgo = strtotime($date.' - 2 year');
$OneYearAgo = date('Y', $OneAgo);
$TwoYearAgo = date('Y', $TwoAgo);
?>

<div class="row">
    <div class="col-lg-6 col-xs-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <p>Jumlah Siswa Aktif</p>
                <h3><?= Siswa::getJumlahSiswaAktif() ?><sup class="small-box-sup"></sup></h3>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?= Url::to(['siswa/siswa-aktif']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-6 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <p>Jumlah Siswa Alumni</p>
                <h3><?= Siswa::getJumlahSiswaAlumni() ?></h3>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?= Url::to(['siswa/alumni']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <?php foreach (Siswa::findSiswaGroupByStatusAlumni() as $siswa): ?>
        <div class="col-lg-3 col-xs-6">
            <?php 
            switch (substr($siswa->jurusanAngkatan->angkatan->tahun, 3)) {
                case 1:
                    echo '<div class="small-box bg-purple">';
                    break;
                case 2:
                    echo '<div class="small-box bg-yellow">';
                    break;
                case 3:
                    echo '<div class="small-box bg-maroon">';
                    break;
                case 4:
                    echo '<div class="small-box bg-aqua">';
                    break;
                case 5:
                    echo '<div class="small-box bg-green">';
                    break;
                case 6:
                    echo '<div class="small-box bg-danger">';
                    break;
                case 7:
                    echo '<div class="small-box bg-primary">';
                    break;
                case 8:
                    echo '<div class="small-box bg-maroon">';
                    break;
                case 9:
                    echo '<div class="small-box bg-green">';
                    break;
                default:
                    echo '<div class="small-box bg-danger">';
                    break;
            } ?>
                <div class="inner">
                    <p>Lulusan Angkatan <?= $tahun = $siswa->jurusanAngkatan->angkatan->tahun ?></p>
                    <h3><?= Siswa::getJumlahAlumni($tahun) ?><sup class="small-box-sup"></sup></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-mortar-board"></i>
                </div>
                <a href="<?= Url::to(['siswa/alumni']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php endforeach ?>
</div>

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Grafik Siswa Tahun <?= date('Y') ?></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?= $this->render('/grafik/_grafikSiswaPertama') ?>
            </div>
        </div>      
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Grafik Siswa Tahun <?= $OneYearAgo ?></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?= $this->render('/grafik/_grafikSiswaKedua') ?>
            </div>
        </div>      
    </div> 
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Grafik Siswa Tahun <?= $TwoYearAgo ?></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?= $this->render('/grafik/_grafikSiswaKetiga') ?>
            </div>
        </div>      
    </div>  
</div>