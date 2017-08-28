<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Mapel */

$this->title = 'Tambah Mapel';
$this->params['breadcrumbs'][] = ['label' => 'Mapel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mapel-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
