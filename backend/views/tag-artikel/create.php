<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TagArtikel */

$this->title = 'Tambah Tag Artikel';
$this->params['breadcrumbs'][] = ['label' => 'Tag Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-artikel-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
