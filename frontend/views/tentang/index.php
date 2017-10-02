<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use common\models\TagArtikel;
use common\models\Tentang;

/* @var $this yii\web\View */

$this->title = 'Taruna Harapan';
$tentang = Tentang::find()->where(['id' => 14])->one();
$visi = Tentang::find()->where(['id' => 15])->one();
$misi = Tentang::find()->where(['id' => 16])->one();
?>
<body style="background: #F2F2F2">
	<section id="area-main" class="padding">
		<h5 class="hidden">hidden</h5>
		  	<div class="container">
		  		    <div class="row">
		  		    	<div class="col-md-12">
		  		    		<h3 style="padding-bottom: 2%"><span class="fa fa-info-circle"></span> <?= strtoupper($tentang->nama) ?></h3>
		  		    		<div class="box-detail-artikel">
				    			<?= $tentang->getGambar(['class'=>'img-responsive']); ?>
					    		<div style="text-align: justify; padding-top: 3%; text-indent: 30px">
					    			<?= $tentang->isi ?>
					    		</div>
					    	</div>
		  		    	</div>
		  		    </div>

		  		    <div class="row">
				    	<div class="col-md-6 col-xs-12">
				    		<h3 style="padding-bottom: 3%"><span class="fa fa-info-circle"></span> <?= strtoupper($visi->nama) ?></h3>
				    		<div class="box-detail-artikel">
				    			<?= $visi->getGambar(['class'=>'img-visi-misi']); ?>
				    			<div style="text-align: justify; padding-top: 3%; text-indent: 30px">
					    			<?= $visi->isi ?>
					    		</div>
				    		</div>
				    	</div>
				    	<div class="col-md-6 col-xs-12">
				    		<h3 style="padding-bottom: 3%"><span class="fa fa-info-circle"></span> <?= strtoupper($misi->nama) ?></h3>
				    		<div class="box-detail-artikel">
				    			<?= $tentang->getGambar(['class'=>'img-visi-misi']); ?>
				    			<div style="text-align: justify; padding-top: 3%; text-indent: 30px">
					    			<?= $misi->isi ?>
					    		</div>
				    		</div>
				    	</div>
				    </div>

			    </div>
		  	</div>
	</section>
</body>