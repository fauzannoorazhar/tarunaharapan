<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\widgets\Breadcrumbs;
use common\components\Helper;

/* @var $this yii\web\View */

$this->title = 'Tarpan One';
$this->params['breadcrumbs'][] = 'Ekstrakulikuler '.$model->nama;
?>
<body style="background: #F2F2F2">
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
				</div>
				<div class="col-md-3 col-xs-12">
				</div>
	  		</div>

	  		    <div class="row">
			    	<div class="col-md-9 col-xs-12">
						<div class="box-detail-artikel">
		    				<?= $model->getGambar(['class'=>'img-eskul']); ?>
			    			<h3 class="text-left" style="margin-top: -2%; margin-bottom: 1%">
			    				Ekstrakulikuler / Organisasi <?= $model->nama ?>
			    			</h3>
			    			<div style="padding-bottom: 2%">
				    			<i class="fa fa-edit"></i>
				    			<?= $model->user->anggota->nama ?>
				    			
				    			<i class="fa fa-calendar" style="padding-left: 1.5%"></i>
				    			<?= Helper::getTanggal(Helper::convert($model->create_at, 'datetime')); ?>
				    		</div>
							<div style="text-align: justify; text-indent: 30px">
								<?= $model->keterangan ?>
							</div>
						</div>
			    	</div>
			      
			    	<div class="col-md-3 col-xs-12">
			    		<div class="row">
			    			<?php foreach ($model->findEskulNotId() as $eskul): ?>	
				    			<div class="col-md-6 col-xs-6">
				    				<div class="box-photo-eskul">
				    					<?= Html::a($eskul->getGambar(['class' => 'img-responsive']), ['eskul/detail','slug' => $eskul->slug], ['data-toggle' => 'tooltip', 'title' => $eskul->nama]); ?>
				    				</div>
				    			</div>
			    			<?php endforeach ?>
			    		</div>
			    	</div>

		    	</div>
	  	</div>
	</section>
</body>