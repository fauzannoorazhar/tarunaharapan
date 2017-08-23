<?php
use yii\helpers\Url;
use common\models\Artikel;

$this->title = 'Selamat Datang';
?>

<div class="row">
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= Artikel::getArtikelProses() ?></h3>
                <p>Artikel Diproses</p>
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
                <h3><?= Artikel::getArtikelDiterima() ?></h3>
                <p>Artikel Diterima</p>
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
                <h3><?= Artikel::getArtikelDitolak() ?></h3>
                <p>Artikel Ditolak</p>
            </div>
            <div class="icon">
                <i class="fa fa-close"></i>
            </div>
            <a href="<?= Url::to(['artikel/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>