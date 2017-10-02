<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JurusanAngkatan */

$this->title = 'Sunting Jurusan Angkatan';
$this->params['breadcrumbs'][] = ['label' => 'Jurusan Angkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="jurusan-angkatan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
