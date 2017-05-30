<?php

use yii\helpers\Html;
use ckarjun\owlcarousel\OwlCarouselWidget;
use common\models\Slide;
use common\models\Tokoh;
use common\models\Kegiatan;

/* @var $this yii\web\View */

$this->title = 'Perhimpunan Mahasiswa Bandung';
?>

<div class="site-index">
	<div id="terbaru" class="carousel slide" data-ride="carousel">
	<!-- Indikator -->
		<ol class="carousel-indicators">
			<li data-target="#terbaru" data-slide-to="0" class="active"></li>
			<li data-target="#terbaru" data-slide-to="1"></li>	
			<li data-target="#terbaru" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper Slide -->
		<div class="carousel-inner" role="listbox">
			<?php $status=null; $i=1; foreach (Slide::find()->all() as $data) {
				if($i==1){
					$status = 'active'; } else{
						$status=null;	
					}
				 ?>
				<div class="item <?= $status; ?>">
						<?= Html::img('@uploads/'.$data->gambar,['width'=>'100%','height'=>'407px']); ?>
					<div class="carousel-caption">
						<?= $data->nama; ?> 
					</div>
				</div>
				<?php $i++; } ?>
		</div>

	<!-- Kontrol -->
		<a class="left carousel-control" href="#terbaru" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#terbaru" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

<div class="berita-container-fluid">
	<div class="container">
			<h3 style="padding-top: 10px;"><strong><i class="fa fa-user-circle-o"></i> TOKOH</strong></h3>
		<hr>
		   <!-- Carousel -->
		<?php OwlCarouselWidget::begin([
		    'container' => 'div',
		    'containerOptions' => [
		        'id' => 'my-container-id',
		        'class' => 'my-container-class'
		    ],
		    'pluginOptions' => [
		        'autoPlay' => 3000,
		        'items' => 3,
		        'itemsDesktop' => [1199,3],
		        'itemsDesktopSmall' => [979,3]
		    ]
		]);?>

			<?php foreach (Tokoh::find()->all() as $data) { ?>
				<div class="my-item-class" style="text-align: center; padding: 20px">
					<?= Html::img('@uploads/'.$data->gambar,['class' => 'img-circle']); ?>
					<div>&nbsp;</div>
						<strong><?= $data->nama; ?></strong>
						<div>&nbsp;</div>
						<p style="text-align: justify; text-indent: 0.4in;">
							<?= substr("$data->keterangan.",0,500), Html::a('...Selanjutnya',['detail','id' => $data->id]) ?>
						</p>
				</div>
			<?php } ?>
		<?php OwlCarouselWidget::end(); ?>
	</div>
</div>

<div class="container">
	<hr>
</div>

	<div class="container">
			<h3><strong><i class="fa fa-book"></i> KEGIATAN</strong></h3>
		<div>&nbsp;</div>
		<div class="row">
			<?php foreach (Kegiatan::find()->all() as $data) { ?>
			<div class="col-sm-4">
				<div class="feed-kegiatan">
					<?= Html::a(Html::img('@uploads/'.$data->gambar,['width'=>'100%','height'=>'200px']),['kegiatan/detail','id' => $data->id]) ?>
				</div>
				<div class="box-kegiatan">
					<h4 style="font-weight: bold;"><?= $data->judul ?></h4>
				</div>
				<div class="title-kegiatan">
					<i class="fa fa-calendar"></i> <?= $data->tanggal; ?> <?= $data->waktu; ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
