<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use common\models\Artikel;

$this->title = 'Artikel';
?>
<div class="site-artikel">
	<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="box">
						<h2 style="text-align: left;"><i class="fa fa-file-text"></i> Artikel</h2>
					</div>
						<?php foreach (Artikel::find()->all() as $data) { ?>
							<div class="box">
								<hr>
									<h2><?= Html::a(''.$data->judul,['detail','id' => $data->id]) ?></h2>
										<i class="fa fa-calendar"></i> <?= $data->waktu_dibuat; ?><div>&nbsp;</div>
									<div class="row">
										<div class="col-sm-3">
											<?= Html::img('@uploads/'.$data->gambar,['class'=>'box-gambar','width'=>'100%','height'=>'120px']); ?></a>
										</div>
										<div class="col-sm-9">
											<?= substr("$data->detail",0,450), Html::a('...[Selanjutnya]',['detail','id' => $data->id]) ?>
										</div>
									</div>
							</div>
						<?php } ?>
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