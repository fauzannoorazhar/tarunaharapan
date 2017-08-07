<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\JenisKelamin */

$this->title = 'Tambah Jenis Kelamin';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Kelamin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-kelamin-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
