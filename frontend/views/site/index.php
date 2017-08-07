<?php

use yii\helpers\Html;
use ckarjun\owlcarousel\OwlCarouselWidget;
use common\models\Slide;
use common\models\Tokoh;
use common\models\Kegiatan;

/* @var $this yii\web\View */

$this->title = 'Taruna Harapan';
?>

<!-- Blog Starts Here -->
<section id="area-main" class="padding">
<h5 class="hidden">hidden</h5>
  <div class="container">
    <div class="row">

      <?= $this->render('_artikel'); ?>

      <?= $this->render('_side'); ?>
      
    </div>
  </div>
  
      <?= $this->render('_paralax'); ?>

</section>


<a href="#." class="go-top text-center"><i class="fa fa-angle-double-up"></i></a>