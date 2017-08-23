<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GaleriArtikel */

$this->title = 'Tambah Galeri Artikel';
$this->params['breadcrumbs'][] = ['label' => 'Galeri Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galeri-artikel-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
