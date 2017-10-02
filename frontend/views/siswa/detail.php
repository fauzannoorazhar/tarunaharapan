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
$this->params['breadcrumbs'][] = 'Alumni '.$model->jurusan->nama.' - '.$model->angkatan->tahun;
?>
<body style="background: #F2F2F2">
	<section id="area-main" class="padding">
	<h5 class="hidden">hidden</h5>
	  	<div class="container">
	  		<div class="row">
	  			<div class="col-md-1">
	  		    </div>

	  			<div class="col-md-10 col-xs-12">
		  			<?= Breadcrumbs::widget([
					    'homeLink' => [ 
					    'label' => Yii::t('yii', 'Home'),
					    'url' => ['site/index'],
					     ],
					    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					]) ?>
				</div>

				<div class="col-md-1">
	  		    </div>
	  		</div>

	  		    <div class="row">
	  		    	<div class="col-md-1">
	  		    	</div>

	  		    	<div class="col-md-10">
		  		    	<table class="table table-bordered table-striped table-condensed">
		  		    		<tr>
		  		    			<th class="text-center">No.</th>
		  		    			<th class="text-center">Nama</th>
		  		    			<th class="text-center">NISN</th>
		  		    			<th class="text-center">Jenis Kelamin</th>
		  		    			<th class="text-center">Jurusan Angkatan</th>
		  		    		</tr>
		  		    		<?php 
		  		    		$no = 1;
		  		    		foreach (Siswa::find()->where(['status' => 2,'id_jurusan_angkatan' => $model->id])->all() as $siswa): ?>
		  		    		<tr>
		  		    			<td class="text-center"><?= $no ?></td>
		  		    			<td class="text-center"><?= $siswa->nama ?></td>
		  		    			<td class="text-center"><?= $siswa->nisn ?></td>
		  		    			<td class="text-center"><?= $siswa->jenisKelamin->nama ?></td>
		  		    			<td class="text-center"><?= $siswa->jurusanAngkatan->jurusan->nama.' - '.$siswa->angkatan->tahun ?></td>
		  		    		</tr>
		  		    		<?php $no++; endforeach ?>
		  		    	</table>
		  		    </div>

		  		    <div class="col-md-1">
	  		    	</div>
		    	</div>
	  	</div>
	</section>
</body>