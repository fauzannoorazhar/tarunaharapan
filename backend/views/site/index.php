<?php
use yii\helpers\Url;
use common\models\Siswa;
use common\models\Jurusan;
use common\models\guru;
use common\models\Angkatan;
$this->title = 'Selamat Datang';
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Data Alumni</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <p>Rekayasa Peragkat Lunak</p>
                        <h3><?= Siswa::getJumlahRpl() ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-laptop"></i>
                    </div>
                    <a href="<?= Url::to(['penduduk/index','jenis'=>'induk']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <p>Akutansi</p>
                        <h3><?= Siswa::getJumlahAka() ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-area-chart"></i>
                    </div>
                    <a href="<?= Url::to(['penduduk/index','jenis'=>'induk']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <p>Pemasaran</p>
                        <h3><?= Siswa::getJumlahPm() ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar"></i>
                    </div>
                    <a href="<?= Url::to(['penduduk/index','jenis'=>'induk']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <p>Teknik Kendaraan Ringan</p>
                        <h3><?= Siswa::getJumlahTkr() ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-car"></i>
                    </div>
                    <a href="<?= Url::to(['penduduk/index','jenis'=>'induk']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <p>Teknik Sepedah Motor</p>
                        <h3><?= Siswa::getJumlahTsm() ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-motorcycle"></i>
                    </div>
                    <a href="<?= Url::to(['penduduk/index','jenis'=>'induk']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>