<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Guru */

$this->title = 'Tambah Guru';
$this->params['breadcrumbs'][] = ['label' => 'Guru', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
