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
		    		<?php $form = ActiveForm::begin([
				        'action' => ['artikel/search'],
				        'method' => 'get',
				        'options' => [
				            'data-pjax' => 1
				        ],
				    ]); ?>

				    <?= $form->field($model, 'judul')->textInput(['placeholder' => 'Cari Artikel'])->label(false) ?>

				    <?= $form->field($model, 'id_tag_artikel')->dropDownList(TagArtikel::getList(),['prompt'=>'- Pilih Tag Artikel -'])->label(false) ?>

				    <div class="form-group" style="text-align: right;">
				        <?= Html::submitButton('<i class="fa fa-search"></i> Cari', ['class' => 'btn btn-primary']) ?>
				    </div>

				    <?php ActiveForm::end(); ?>

				    <div class="box-artikel-terbaru">
				    	<h4 class="judul-box-terbaru">Artikel Terbaru</h4>
				    </div>

				    <div class="box-artikel-terbaru">
				    	<?php foreach ($model->findArtikelLimit() as $data): ?>	
			    			<li class="list-box-terbaru"><?= Html::a($data->judul, ['artikel/detail','slug' => $data->slug], ['option' => 'value']); ?></li>
				    	<?php endforeach ?>
				    </div>
				    
		    	</div>

		    </div>
	  	</div>
	</section>
</body>