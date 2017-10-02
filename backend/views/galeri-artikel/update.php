<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GaleriArtikel */

$this->title = 'Sunting Galeri Artikel';
$this->params['breadcrumbs'][] = ['label' => 'Galeri Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="galeri-artikel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
