<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pengaturan */

$this->title = 'Tambah Pengaturan';
$this->params['breadcrumbs'][] = ['label' => 'Pengaturan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengaturan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
