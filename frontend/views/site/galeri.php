<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use common\models\Artikel;
use common\models\Kegiatan;
use branchonline\lightbox\Lightbox;

$this->title = 'Galeri';
?>
<div class="site-about">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="box">
					<h2 style="text-align: justify;"><i class="fa fa-photo"></i> Galeri Foto</h2><hr>
						<div class="row">
							<?php foreach (Artikel::find()->all() as $data) { ?>
								<div class="col-sm-4">
									<div class="galeri-list">
										<?php
											echo Lightbox::widget([
											    'files' => [
											        [
											            'thumb' => ''.('@uploads/'.$data->gambar),
											            'original' => ''.('@uploads/'.$data->gambar),
											        ],
											    ]
											]); ?>
									</div>
								</div>
							<?php } ?>

							<?php foreach (Kegiatan::find()->all() as $data) { ?>
								<div class="col-sm-4">
									<div class="galeri-list">
										<?php
											echo Lightbox::widget([
											    'files' => [
											        [
											            'thumb' => ''.('@uploads/'.$data->gambar),
											            'original' => ''.('@uploads/'.$data->gambar),
											        ],
											    ]
											]); ?>
									</div>
								</div>
							<?php } ?>
						</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="box">
					<a class="twitter-timeline"
							  href="https://twitter.com/PMB_1948"
							  data-width="300"
							  data-height="500">
							  Tweets by PMB_1948
						</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
