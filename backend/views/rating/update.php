<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Rating */

$this->title = 'Sunting Rating';
$this->params['breadcrumbs'][] = ['label' => 'Rating', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="rating-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
