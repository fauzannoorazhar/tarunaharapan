<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tentang */

$this->title = 'Sunting Tentang';
$this->params['breadcrumbs'][] = ['label' => 'Tentang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="tentang-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
