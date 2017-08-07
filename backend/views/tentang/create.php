<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Tentang */

$this->title = 'Tambah Tentang';
$this->params['breadcrumbs'][] = ['label' => 'Tentang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tentang-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
