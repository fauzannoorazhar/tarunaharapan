<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pemeriksaan */

$this->title = 'Sunting Pemeriksaan';
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pemeriksaan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
