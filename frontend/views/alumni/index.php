<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Html; 
use common\models\JurusanAngkatan;
use common\models\Tentang;
use common\models\Artikel;
use common\components\Helper;

$this->title = 'Alumni';
$this->params['breadcrumbs']['alumni/index'] = ['label' => 'Jurusan - Angkatan'];
?>
<section id="area-main" class="padding">
<h5 class="hidden">hidden</h5>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8">	

			<?= Breadcrumbs::widget([
			    'homeLink' => [ 
			    'label' => Yii::t('yii', 'Home'),
			    'url' => ['site/index'],
			     ],
			    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]) ?>

				<div class="row">
					<?php foreach (JurusanAngkatan::findJurusanAngkatanStatus() as $data) { ?>
						<div class="col-md-3">
							<div class="box-alumni">
								<?= Html::a(Html::img('@web/pictures/logo.png',['class'=>'img-responsive','width'=>'720px','height'=>'100%']),['alumni/detail','id' => $data->id]); ?>
							</div>

							<div class="box-nama" style="padding-top: 10px">
								<p style="text-align: center;"><?= Html::a($data->jurusan->nama.' - '. $data->angkatan->tahun,['alumni/detail','id' => $data->id]); ?>
								</p>
							</div>
						</div>
					<?php } ?>
				</div>

			</div>

			<aside class="col-md-4 col-sm-4">
				<div class="widget search_box"> 
					<form>
						<input type="search" placeholder="Search">
						<i class="fa fa-search"></i>
					</form>
				</div>
				<div class="widget wow fadeInDown" data-wow-duration="500ms" data-wow-delay="900ms"> 
					<h4>Artikel Lainnya</h4>
						<ul class="category">
				<?php foreach (Artikel::find()->limit(5)->all() as $data) { ?>
						<li><a href="#."><?= $data->judul ?><span class="date"><?= Helper::getTanggal($data->tanggal) ?></span></a></li>
				<?php } ?>
						</ul>
				</div>
				<div class="widget"> 
					<h4>tags</h4>
						<ul class="tag-cloud">
							<li><a href="#.">ANALYSIS</a></li>
							<li><a href="#.">BOARD</a></li>
							<li><a href="#.">CAREERS</a></li>
							<li><a href="#.">DIVIDEND</a></li>
							<li><a href="#.">EMPLOYMENT</a></li>
							<li><a href="#.">FINANCE</a></li>
							<li><a href="#.">news</a></li>
							<li><a href="#.">office</a></li>
							<li><a href="#.">ANALYSIS</a></li>
							<li><a href="#.">BOARD</a></li>
							<li><a href="#.">CAREERS</a></li>
							<li><a href="#.">DIVIDEND</a></li>
							<li><a href="#.">EMPLOYMENT</a></li>
							<li><a href="#.">FINANCE</a></li>
						</ul>
				</div>
			</aside>

		</div>
	</div>
</section>