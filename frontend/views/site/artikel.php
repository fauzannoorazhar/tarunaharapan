<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = 'Taruna Harapan';
?>

<!-- Blog Starts Here -->
<section id="area-main" class="padding">
<h5 class="hidden">hidden</h5>
  	<div class="container">

  	<div class="row">

	    	<div class="col-md-9 col-xs-12">
				<?php Pjax::begin(); ?>
					<?= ListView::widget([
						'dataProvider' => $dataProvider,
						'itemOptions' => ['class' => 'item'],
						'summary' => '',
						/*Menampilkan <strong>{begin} - {end}</strong> dari <strong>{totalCount}</strong> Artikel*/
						'pager' => [
						'maxButtonCount' => 2,
						],
						'itemView' =>'home',
					]) ?>
				<?php Pjax::end(); ?>
	    	</div>
	      
	    	<div class="col-md-3 col-xs-12">
	    		<?php /*$this->render('about');*/ ?>
	    	</div>

	    </div>
  	</div>
</section>