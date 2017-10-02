<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Eskul */

$this->title = 'Tambah Eskul';
$this->params['breadcrumbs'][] = ['label' => 'Eskul', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eskul-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
