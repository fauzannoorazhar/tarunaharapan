<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use common\models\Kegiatan;

$this->title = 'Detail Kegiatan';
?>
<div class="site-detail-kegiatan">
	<div class="container">
			<div class="row">
				<div class="col-sm-8">
						<div class="box">
							<h2><?= $model->judul; ?></h2>
								<i class="fa fa-calendar"></i> <?= $model->tanggal; ?> <?= $model->waktu; ?>
							<hr>
								<?= Html::img('@uploads/'.$model->gambar,['class'=>'box-gambar','width'=>'100%','height'=>'450px']); ?></a>
								<div>&nbsp;</div>
								<?= $model->detail; ?>
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