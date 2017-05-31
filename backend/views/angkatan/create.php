<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Angkatan */

$this->title = 'Tambah Angkatan';
$this->params['breadcrumbs'][] = ['label' => 'Angkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="angkatan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
