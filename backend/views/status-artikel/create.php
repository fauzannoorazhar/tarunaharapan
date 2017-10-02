<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StatusArtikel */

$this->title = 'Tambah Status Artikel';
$this->params['breadcrumbs'][] = ['label' => 'Status Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-artikel-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
