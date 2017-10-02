<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use common\models\TagArtikel;

/* @var $this yii\web\View */

$this->title = 'Taruna Harapan';
?>
<body style="background: #F2F2F2">
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
							'itemView' =>'listView',
						]) ?>
					<?php Pjax::end(); ?>
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
		    	</div>

		    </div>
	  	</div>
	</section>
</body>