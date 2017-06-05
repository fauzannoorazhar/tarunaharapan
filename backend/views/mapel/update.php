<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mapel */

$this->title = 'Sunting Mapel';
$this->params['breadcrumbs'][] = ['label' => 'Mapel', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="mapel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
