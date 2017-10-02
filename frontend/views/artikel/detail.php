<?php 

use common\components\Helper;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\ActiveForm;
use kartik\social\FacebookPlugin;
use kartik\rating\StarRating;
use common\models\TagArtikel;
use common\models\Artikel;
use common\models\StatusArtikel;
use yii\helpers\Html;

$this->title = 'Tarpan One';
$this->params['breadcrumbs'][] = $model->judul;
?>
<body style="background: rgb(236, 240, 245)">
	<section id="area-main" class="padding">
	<h5 class="hidden">hidden</h5>
	  	<div class="container">
		    <div class="row">

		    	<div class="col-md-9 col-xs-12">

		    		<div class="box-detail-artikel">
		    			<div class="artikel-detail">
			    			<h3 style="padding-bottom: 1%; text-align: left;"><i class="fa fa-newspaper-o"></i> <?= $model->judul ?></h3>
			    			<i class="fa fa-user"></i> 
			    				<?= $model->user->anggota->nama ?>
			    			<span style="padding-left: 1%">
				                <?= Html::a($model->labelTag(), ['tag-artikel/index', 'slug' => $model->tagArtikel->slug], ['option' => 'value']); ?>
				            </span> 
			    			<i class="fa fa-calendar" style="padding-left: 1%"></i> 
			    				<?= \Yii::$app->formatter->asRelativeTime($model->create_at) ?>
			    			<i class="fa fa-eye" style="padding-left: 1%"></i>
			    				<?= $model->populer ?>
			    		</div>

			    		<div class="row">

			    			<div class="col-md-12 col-sm-12 col-xs-12">
		    					<?= $model->getGambar(['class'=>'img-responsive img-artikel']); ?>
			    			</div>

		    			</div>

		    			<div style="text-align: justify; padding-top: 2%; text-indent: 20px">
		    				<?= $model->isi ?>
		    			</div>

						<div class="post-tag clearfix" style="text-align: left;"> 
							<ul class="tag-cloud pull-left">
								<li><?= Html::a('<i class="fa fa-tags"></i> '.$model->tagArtikel->nama, ['tag-artikel/index','slug' => $model->tagArtikel->slug], ['data-toggle' => 'tooltip', 'title' => 'Tags']); ?></a></li>
								<li><?= Html::a('<i class="fa fa-eye"></i> '.$model->populer, $url = null, ['data-toggle' => 'tooltip', 'title' => 'Views By']); ?></a></li>
								<li><?= Html::a('<i class="fa fa-user"></i> '.$model->user->anggota->nama, $url = null, ['data-toggle' => 'tooltip', 'title' => 'Create By']); ?></a></li>
							</ul>
							<ul class="social-link pull-right">
								<li><a href="#." class="text-center"><i class="fa fa-facebook"></i><span></span></a></li>
								<li><a href="#." class="text-center"><i class="fa fa-instagram"></i><span></span></a></li>
								<li><a href="#." class="text-center"><i class="fa fa-google-plus"></i><span></span></a></li>
							</ul>
						</div>
		    		</div>

		    		<!-- <div class="text-left">			    			
		    			<?php /*FacebookPlugin::widget(['type'=>FacebookPlugin::LIKE, 'settings' => ['size'=>'small']]);*/ ?>
		    			<?php /*FacebookPlugin::widget(['type'=>FacebookPlugin::SHARE, 'settings' => ['size'=>'small', 'layout'=>'button_count', 'mobile_iframe'=>'false']]);*/ ?>
			    	</div> -->

		    		<div class="box-detail-artikel">
		    			<?= FacebookPlugin::widget(['type'=>FacebookPlugin::COMMENT, 'settings' => ['data-width'=>'100%', 'data-numposts'=>5]]); ?>
		    		</div>

		    	</div>
		      
		    	<div class="col-md-3 col-xs-12">
		    		<div class="widget"> 
			          <h4>TAGS</h4>
							<ul class="tag-cloud">
								<?php foreach (TagArtikel::find()->all() as $data): ?>
									<li>
										<?= Html::a('('.$data->getJumlahArtikel().') ' .$data->nama, ['tag-artikel/index', 'slug' => $data->slug], ['option' => 'value']); ?>
									</li>
								<?php endforeach ?>
							</ul>
			        </div>
				    <?php if ($terkait = $model->findArtikelNotId() != null) { ?>
				        	<h4 class="judul-box-terbaru" style="padding-bottom: 3%;">ARTIKEL TERKAIT</h4>
			        		<div style="border-bottom: 1px dashed; margin-bottom: 4%"></div>
			       	<?php foreach ($model->findArtikelNotId() as $data): ?>
					        <div class="box-side-artikel">
					        <h4 class="judul-box-terbaru"><?= Html::a($data->judul, ['artikel/detail','slug' => $data->slug], ['option' => 'value']); ?></h4>
					        </div>
			        <?php endforeach ?>
				    <?php } ?>
		    	</div>
		    </div>
		</div>
	</section>
</body>