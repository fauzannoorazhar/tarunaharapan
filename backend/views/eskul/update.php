<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Eskul */

$this->title = 'Sunting Eskul';
$this->params['breadcrumbs'][] = ['label' => 'Eskul', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="eskul-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
