<?php 

use common\components\Helper;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\ActiveForm;
use kartik\social\FacebookPlugin;
use kartik\rating\StarRating;

$this->title = 'Tarpan One';
$this->params['breadcrumbs'][] = $model->judul;
?>
<body style="background: rgb(236, 240, 245)">
	<section id="area-main" class="padding">
	<h5 class="hidden">hidden</h5>
	  	<div class="container">
		    <div class="row">

		    	<div class="col-md-9 col-xs-12">

		    	<?= Breadcrumbs::widget([
				    'homeLink' => [ 
				    'label' => Yii::t('yii', 'Home'),
				    'url' => ['site/index'],
				     ],
				    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
				]) ?>

		    		<div class="box-detail-artikel">

		    			<div class="artikel-detail">
			    			<h3 style="padding-bottom: 1%"><i class="fa fa-newspaper-o"></i> <?= $model->judul ?></h3>
			    			<i class="fa fa-user"></i> <?= $model->create_by ?> |
			    			<i class="fa fa-calendar-o"></i> <?= Helper::getWaktuWIB(Helper::convert($model->create_at,'datetime')) ?>
			    		</div>

			    		<div class="row">
			    			<div class="col-md-1 col-sm-1">
			    			</div>

			    			<div class="col-md-10 col-sm-10 col-xs-12">
		    				<?= $model->getGambar(['class'=>'img-responsive img-artikel']); ?>
			    			</div>

			    			<div class="col-md-1 col-sm-1">
			    			</div>
		    			</div>


		    			<p style="text-align: justify; padding-top: 2%"><?= $model->isi ?></p>

		    			<?= FacebookPlugin::widget(['type'=>FacebookPlugin::LIKE, 'settings' => ['size'=>'small']]); ?>
		    			<?= FacebookPlugin::widget(['type'=>FacebookPlugin::SHARE, 'settings' => ['size'=>'small', 'layout'=>'button_count', 'mobile_iframe'=>'false']]); ?>

		    		</div>

		    		<div class="box-detail-artikel">
		    			<?= FacebookPlugin::widget(['type'=>FacebookPlugin::COMMENT, 'settings' => ['data-width'=>'100%', 'data-numposts'=>5]]); ?>
		    		</div>

		    	</div>
		      
		    	<div class="col-md-3 col-xs-12">
		    		
		    	</div>
		    </div>
	  	</div>
	</section>
</section>