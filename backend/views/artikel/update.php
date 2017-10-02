<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Artikel */

$this->title = 'Sunting Artikel';
$this->params['breadcrumbs'][] = ['label' => 'Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="artikel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
