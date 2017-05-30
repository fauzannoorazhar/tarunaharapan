<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use common\models\Tokoh;

$this->title = 'Detail Tokoh';
?>
<div class="site-detail-tokoh">
	<div class="container">
			<div class="row">
				<div class="col-sm-8">
						<div class="box">
							<h2><i class="fa fa-user-circle"></i> <?= $model->nama; ?></h2>
							<hr>
								<div class="row">
									<div class="col-sm-4">
										<?= Html::img('@uploads/'.$model->gambar,['class'=>'box-tokoh','width'=>'220px','height'=>'200px']); ?></a>
									</div>

									<div class="col-sm-8">
										<p style="text-align: justify;"><?= $model->keterangan; ?></p>
									</div>
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
							
								