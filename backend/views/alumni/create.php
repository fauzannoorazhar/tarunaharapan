<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Alumni */

$this->title = 'Tambah Alumni';
$this->params['breadcrumbs'][] = ['label' => 'Alumni', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumni-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
