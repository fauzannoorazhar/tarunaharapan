<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JenisKelamin */

$this->title = 'Sunting Jenis Kelamin';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Kelamin', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="jenis-kelamin-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
