<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Angkatan */

$this->title = 'Sunting Angkatan';
$this->params['breadcrumbs'][] = ['label' => 'Angkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="angkatan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
