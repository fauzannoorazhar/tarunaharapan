<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use ckarjun\owlcarousel\OwlCarouselWidget;
use common\models\Pengaturan;

/* @var $this yii\web\View */
$berita = Pengaturan::find()->where(['posisi' => Pengaturan::BERITA])->one();
$judul_berita = Pengaturan::find()->where(['posisi' => Pengaturan::J_BERITA])->one();

$informasi = Pengaturan::find()->where(['posisi' => Pengaturan::INFORMASI])->one();
$judul_informasi = Pengaturan::find()->where(['posisi' => Pengaturan::J_INFORMASI])->one();

$artikel = Pengaturan::find()->where(['posisi' => Pengaturan::ARTIKEL_PENGETAHUAN])->one();
$judul_artikel = Pengaturan::find()->where(['posisi' => Pengaturan::J_ARTIKEL_PENGETAHUAN])->one();

$perekapan = Pengaturan::find()->where(['posisi' => Pengaturan::PEREKAPAN])->one();
$judul_perekapan = Pengaturan::find()->where(['posisi' => Pengaturan::J_PEREKAPAN])->one();

$informasi_sekolah = Pengaturan::find()->where(['posisi' => Pengaturan::INFORMASI_SEKOLAH])->one();
$judul_informasi_sekolah = Pengaturan::find()->where(['posisi' => Pengaturan::J_INFORMASI_SEKOLAH])->one();

$this->title = 'Taruna Harapan';
?>

<!-- Blog Starts Here -->
<section id="area-main" class="padding">
<h5 class="hidden">hidden</h5>
  	<div class="container">
		<section class="section-padding" id="about">
            <h2 class="heading text-center wow fadeInDown" data-wow-duration="300ms" data-wow-delay="200ms">
                TENTANG KAMI
            </h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 canvas-box magin30 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="300ms">
                        <span class="text-center"><i class="icon-megaphone2 color10"></i></span>
                        <h4 class="color10"><?= Html::a(strtoupper($judul_berita->nama), ['site/index'], ['class' => 'color10']); ?></h4>
                        <p class="font-depan">
                            <?= $berita->nama ?>
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 canvas-box magin30 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="500ms">
                        <span class="text-center"><i class="icon-study color20"></i></span>
                        <h4 class="color20"><?= Html::a(strtoupper($judul_informasi->nama), ['site/index'], ['class' => 'color20']); ?></h4>
                        <p class="font-depan">
                            <?= $informasi->nama ?>
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 canvas-box magin30 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="700ms">
                        <span class="text-center"><i class="icon-icons96 color30"></i></span>
                        <h4 class="color30"><?= Html::a(strtoupper($judul_artikel->nama), ['site/index'], ['class' => 'color30']); ?></h4>
                        <p class="font-depan">
                            <?= $artikel->nama ?>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 canvas-box magin30 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="900ms">
                        <span class="text-center"><i class="icon-icons42 color40"></i></span>
                        <h4 class="color40"><?= Html::a(strtoupper($judul_perekapan->nama), ['site/index'], ['class' => 'color40']); ?></h4>
                        <p class="font-depan">
                            <?= $perekapan->nama ?>
                        </p>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12 canvas-box magin30 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1200ms">
                        <span class="text-center"><i class="icon-genius color50"></i></span>
                        <h4 class="color50"><?= Html::a(strtoupper($judul_informasi_sekolah->nama), ['site/index'], ['class' => 'color50']); ?></h4>
                        <p class="font-depan">
                            <?= $informasi_sekolah->nama ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div>&nbsp;</div>
    <div>&nbsp;</div>
    
    <?= $this->render('paralax'); ?>

</section>