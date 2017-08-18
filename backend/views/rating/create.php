<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Rating */

$this->title = 'Tambah Rating';
$this->params['breadcrumbs'][] = ['label' => 'Rating', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rating-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
