<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\widgets\Breadcrumbs;
use common\components\Helper;
use common\models\JurusanAngkatan;
use common\models\Siswa;

/* @var $this yii\web\View */

$this->title = 'Tarpan One';
$this->params['breadcrumbs'][] = 'Siswa Alumni';
?>
<body style="background: #F2F2F2">
	<section id="area-main" class="padding">
	<h5 class="hidden">hidden</h5>
	  	<div class="container">
	  		<div class="row">
	  			<div class="col-md-12 col-xs-12">
		  			<?= Breadcrumbs::widget([
					    'homeLink' => [ 
					    'label' => Yii::t('yii', 'Home'),
					    'url' => ['site/index'],
					     ],
					    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					]) ?>
				</div>
	  		</div>

	  		    <div class="row">
	  		    	<?php foreach (JurusanAngkatan::find()->joinWith('siswa')->where(['status' => Siswa::ALUMNI])->all() as $data): ?>
				    	<div class="col-md-3 col-sm-4 col-xs-12">
							<div class="box-gambar-jurusan">
								<?= Html::a($data->jurusan->getGambar(['class' => 'img-responsive']), ['siswa/detail','slug' => $data->slug], ['option' => 'value']); ?>
								<div class="box-nama-jurusan">
									<?= Html::a($data->jurusan->nama.' '.$data->angkatan->tahun, ['siswa/detail','slug' => $data->slug], ['option' => 'value']); ?>
								</div>
							</div>
				    	</div>
	  		    	<?php endforeach ?>
		    	</div>
	  	</div>
	</section>
</body>