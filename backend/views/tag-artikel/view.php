<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TagArtikel */


/*$this->params['breadcrumbs'][] = ['label' => 'Tag Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="box box-primary tag-artikel-view">
    <div class="box-header with-border">
        <h1 class="box-title">Detail Tag Artikel <?= Html::encode($this->title) ?></h1>
    </div>
    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama',
        ],
    ]) ?>
        
    </div>
    <div class="box-footer with-border">
        <p>
            <?= Html::a('<i class="fa fa-pencil"></i> Sunting', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
            <?= Html::a('<i class="fa fa-list"></i> Daftar Tag Artikel', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
        </p>
    </div>

</div>
