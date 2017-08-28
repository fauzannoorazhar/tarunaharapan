<?php
use common\models\Artikel;
use yii\helpers\Html;
use common\components\Helper;
?>
<div class="box-judul-artikel">
    <h4><i class="fa fa-newspaper-o"></i> <?= $model->judul ?></h4>
</div>

<div class="box-artikel">
    <div class="col-md-2 col-xs-2" style="margin-bottom: 2%">
        <?= Html::a($model->getGambar(['class'=>'img-responsive','height' => '150px']), ['artikel/detail','slug' => $model->slug],['target' => '_blank']); ?>
    </div>

    <div class="col-md-10 col-xs-10">
        <div class="artikel-detail">
            <i class="fa fa-user"></i> <?= $model->getRelationField('user','username') ?> |
            <i class="fa fa-calendar-o"></i> <?= Helper::getWaktuWIB(Helper::convert($model->create_at, 'datetime')) ?>
        </div>
        <?= substr($model->isi,0,400), Html::a('...[Selanjutnya]',['artikel/detail','slug' => $model->slug],['target' => '_blank']) ?>
    </div>

    <div>&nbsp;</div>
</div>