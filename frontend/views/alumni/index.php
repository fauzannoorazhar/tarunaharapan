<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Html; 
use common\components\Helper;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = 'Alumni';
$this->params['breadcrumbs']['alumni/index'] = ['label' => 'Jurusan - Angkatan'];
?>
<body style="background: #F2F2F2">
	<section id="area-main" class="padding">
	<h5 class="hidden">hidden</h5>
		<div class="container">
			<div class="box-judul-artikel">
			    <h4><i class="fa fa-mortar-board"></i> Alumni</h4>
			</div>

			<div class="row">
				<div class="col-md-9 col-xs-12">	

				<?php Pjax::begin(); ?>
					<?= ListView::widget([
					    'dataProvider' => $dataProvider,
					    'itemOptions' => ['class' => 'item'],
					    'summary' => 'Menampilkan <strong>{begin} - {end}</strong> dari <strong>{totalCount}</strong> Jurusan Angkatan',
					    'itemView' => 'alumniIndex',
					]); ?>
				<?php Pjax::end() ?>

				</div>

			</div>
		</div>
	</section>
</body>