<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Guru */

$this->title = 'Sunting Guru';
$this->params['breadcrumbs'][] = ['label' => 'Guru', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="guru-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
