<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use common\models\Anggota;
use common\models\Angkatan;
use kartik\grid\GridView; //  Untuk Membuat Pagenation Yii2

$this->title = 'Anggota';
?>
<div class="site-angkatan">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="box">
					<h2 style="text-align: justify;"><i class="fa fa-users"></i> Semua Anggota</h2><hr>		

						<?= GridView::widget([ // Pagenation
					        'dataProvider' => $dataProvider,
					        'columns' => [
					            [
					                'class' => 'yii\grid\SerialColumn',
					                'header' => 'No',
					                'headerOptions'=>['style'=>'text-align:center;width:20px;'],
					                'contentOptions'=>['style'=>'text-align:center;width:20px;']
					            ],
					            'kode',
					            'nama',
					            [
					                'attribute' => 'id_universitas',
					                'value' => function($data){
					                    return $data->getRelationField('universitas','nama');
					                },
					            ],
					            'jurusan',
					            [
					            'attribute' => 'id_angkatan',
					            'value' => function($data){
					                    return $data->getRelationField('angkatan','tahun');
					                }, 
					            ],
					        ],
					    ]); ?>

				</div>
			</div>

			<div class="col-sm-3">
				<div class="widget-tautan">
					<div class="title-tautan">
						<h4 style="text-align: center;">Angkatan</h4>
					</div>
					<?php foreach (Angkatan::find()->all() as $data) { ?>
						<div class="forum">
							<div class="forum-recent">
								<li><?= Html::a(''.$data->tahun , ['detail','id'=>$data->id,'id_angkatan' => $data->id,'tahun'=>$data->tahun]) ?></li>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>

		</div>
	</div>
</div>

					