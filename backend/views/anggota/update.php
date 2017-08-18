<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Anggota */

$this->title = 'Sunting Anggota';
$this->params['breadcrumbs'][] = ['label' => 'Anggota', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="anggota-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
