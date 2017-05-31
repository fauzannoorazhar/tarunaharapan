<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Alumni */

$this->title = 'Sunting Alumni';
$this->params['breadcrumbs'][] = ['label' => 'Alumni', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="alumni-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
