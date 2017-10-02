<?php
use yii\helpers\Html;
use common\models\Siswa;
use common\models\Eskul;
use common\components\Helper;
use common\models\Pengaturan;

$paralax_kecil = Pengaturan::find()->where(['posisi' => Pengaturan::PARALAX_KECIL])->one();
$paralax = Pengaturan::find()->where(['posisi' => Pengaturan::PARALAX])->one();
?>
<div style="position:relative;" class="top-padding">
    <section id="bg-paralax">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p style="color: white; font-size: 180%"><?= $paralax_kecil->nama ?></p>
                    <h2 class="magin30" style="font-size: 350%"><?= $paralax->nama ?>?</h2>
                </div>
            </div>
        </div>
    </section>
</div>

<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

<section id="publication" class="section-padding padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="title">SMK TARUNA HARAPAN 1 CIPATAT</p>
                <h2 class="heading">EKSTRAKULIKULER</h2>
            </div>
        </div>
        <div class="row">
            <div id="publication-slider" class="owl-carousel">
                <?php foreach (Eskul::find()->orderBy(['urutan' => SORT_ASC])->all() as $eskul) { ?>
                    <div class="item">
                        <div class="image">
                            <?= Html::a($eskul->getGambar(), ['eskul/detail','slug' => $eskul->slug], ['option' => 'value']); ?>
                        </div>
                            <h5><i class="fa fa-edit"></i>
                                Oleh <?= $eskul->user->anggota->nama ?>
                                <i class="fa fa-calendar"></i>
                                <?= Helper::getTanggal(Helper::convert($eskul->create_at, 'datetime')); ?>
                            </h5>
                            <h4>
                                <?= Html::a($eskul->nama, ['eskul/detail','slug' => $eskul->slug], ['option' => 'value']); ?>
                            </h4>
                            <p style="text-align: justify;">
                                <?= $eskul->getKeterangan() ?>
                            </p>
                            <?= Html::a('Baca Selengkapnya', ['eskul/detail','slug' => $eskul->slug], ['option' => 'value']); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<!-- <div>&nbsp;</div> -->

<!-- <section class="we-do bg-grey padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center wow fadeIn">
                <p class="title"></p>
                <h2 class="heading"></h2>
            </div>
            
        </div>
    </div>
</section>
 -->