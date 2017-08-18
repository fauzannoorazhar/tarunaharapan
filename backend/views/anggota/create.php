<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Anggota */

$this->title = 'Tambah Anggota';
$this->params['breadcrumbs'][] = ['label' => 'Anggota', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
