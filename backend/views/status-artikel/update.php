<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StatusArtikel */

$this->title = 'Sunting Status Artikel';
$this->params['breadcrumbs'][] = ['label' => 'Status Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="status-artikel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
