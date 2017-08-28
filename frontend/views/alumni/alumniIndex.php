<?php 

use yii\helpers\Url;

?>

<a href="<?= Url::to(['alumni/detail','slug'=>$model->slug]); ?>">
    <div class="box-alumni">
        <div class="col-md-2 col-xs-2" style="margin-bottom: 2%">
            <?= $model->jurusan->getGambar(['class'=>'img-responsive img-alumni','height' => '150px']); ?>
        </div>

        <div class="col-md-9 col-xs-10">
            <h4 class="title-alumni"><?= $model->jurusan->nama.' - '.$model->angkatan->tahun ?></h4>
        </div>

        <div>&nbsp;</div>
    </div>
</a>