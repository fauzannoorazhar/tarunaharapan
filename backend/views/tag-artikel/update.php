<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TagArtikel */

$this->title = 'Sunting Tag Artikel';
$this->params['breadcrumbs'][] = ['label' => 'Tag Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="tag-artikel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
