<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Html; 
use common\models\Siswa;

$this->title = 'Alumni';
$this->params['breadcrumbs'][] = ['label' => 'Jurusan - Angkatan', 'url' => ['alumni/index']];
$this->params['breadcrumbs'][] = $model->jurusan->nama.' - '. $model->angkatan->tahun;
?>
<body style="background: rgb(232, 232, 232)">
	<section id="area-main" class="padding">
	<h5 class="hidden">hidden</h5>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8">	

				<?= Breadcrumbs::widget([
				    'homeLink' => [ 
				    'label' => Yii::t('yii', 'Home'),
				    'url' => ['alumni/index'],
				     ],
				    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
				]) ?>

				<h4 style="margin-bottom: 30px; text-align: center;"><?= $model->jurusan->nama.' - '. $model->angkatan->tahun; ?></h4>
					<table class="table table-striped table-bordered table-condensed">
						<tr>
							<th>No</th>
							<th>Nama Siswa</th>
							<th>Nisn</th>
							<th>Status</th>
							<th>Jurusan Angkatan</th>
							<th></th>
						</tr>
						<?php 
							$i = 1;
							foreach ($model->findSiswaByJurusanAngkatan() as $data) { ?>
						<tr>
							<td><?= $i; ?></td>
							<td><?= $data->nama; ?></td>
							<td><?= $data->nisn; ?></td>
							<td><?= $data->getStatus(); ?></td>
							<td><?= $model->jurusan->nama . ' - ' . $model->angkatan->tahun; ?></td>
							<td><?= Html::a('<i class="fa fa-eye"></i>',['siswa/detail-siswa','id' => $data->id]) ?></td>
						</tr>
						<?php $i++; } ?>
					</table>

				</div>

			</div>
		</div>
	</section>
</body>