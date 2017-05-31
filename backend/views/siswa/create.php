<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Siswa */

$this->title = 'Tambah Siswa';
$this->params['breadcrumbs'][] = ['label' => 'Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
