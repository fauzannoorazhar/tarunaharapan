<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pengaturan */

$this->title = 'Sunting Pengaturan';
$this->params['breadcrumbs'][] = ['label' => 'Pengaturan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="pengaturan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
