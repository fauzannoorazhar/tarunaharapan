<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use ckarjun\owlcarousel\OwlCarouselWidget;

/* @var $this yii\web\View */

$this->title = 'Taruna Harapan';
?>

<!-- Blog Starts Here -->
<section id="area-main" class="padding">
<h5 class="hidden">hidden</h5>
  	<div class="container">
		<section class="section-padding" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 canvas-box magin30 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="300ms">
                    <span class="text-center"><i class="fa fa-university colortema"></i></span>
                    <h4 class="colortema"><?= Html::a('BERITA SEKOLAH', ['site/index'], ['class' => 'colortema']); ?></h4>
                    <p style="text-align: justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-md-4 col-sm-4 canvas-box magin30 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="500ms">
                    <span class="text-center"><i class="fa fa-mortar-board colortema"></i></span>
                    <h4 class="colortema"><?= Html::a('INFORMASI ALUMNI', ['site/index'], ['class' => 'colortema']); ?></h4>
                    <p style="text-align: justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-md-4 col-sm-4 canvas-box magin30 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="700ms">
                    <span class="text-center"><i class="fa fa-newspaper-o colortema"></i></span>
                    <h4 class="colortema"><?= Html::a('ARTIKEL PENGETAHUAN', ['site/index'], ['class' => 'colortema']); ?></h4>
                    <p style="text-align: justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
    </section>
  	</div>

    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
  
    <?= $this->render('paralax'); ?>

</section>