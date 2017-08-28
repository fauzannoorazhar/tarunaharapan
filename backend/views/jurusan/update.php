<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Jurusan */

$this->title = 'Sunting Jurusan';
$this->params['breadcrumbs'][] = ['label' => 'Jurusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="jurusan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
