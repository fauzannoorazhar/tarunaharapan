<?php
use common\models\Artikel;
use yii\helpers\Html;
use common\components\Helper;
?>
<div class="box-judul-artikel">
    <h4><i class="fa fa-newspaper-o"></i> <?= $model->judul ?></h4>
</div>

<div class="box-artikel">
    <div class="col-md-2 col-xs-12">
        <?= Html::a($model->getGambar(['class'=>'img-responsive img-artikel-list']), ['artikel/detail','slug' => $model->slug],['target' => '_blank']); ?>
    </div>

    <div class="col-md-10 col-xs-12">
        <div class="artikel-detail" style="text-align: left;">
            <i class="fa fa-user"></i>
                <?= $model->user->anggota->nama ?>
            <span style="padding-left: 1%">
                <?= Html::a($model->labelTag(), ['tag-artikel/index', 'slug' => $model->tagArtikel->slug], ['option' => 'value']); ?>
            </span> 
            <i class="fa fa-calendar" style="padding-left: 1%"></i>
                <?= Helper::getTanggalSingkat(Helper::convert($model->create_at, 'datetime')) ?>
            <i class="fa fa-eye" style="padding-left: 1%"></i>
                <?= $model->populer ?>
        </div>
        <div style="text-align: justify;">
            <?= substr($model->isi, 0, 350) ?>
            <?= Html::a('...[Selanjutnya]',['artikel/detail','slug' => $model->slug],['target' => '_blank']) ?>
        </div>
    </div>

    <div>&nbsp;</div>
</div>