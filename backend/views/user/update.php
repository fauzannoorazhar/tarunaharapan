<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Sunting User';
$this->params['breadcrumbs'][] = ['label' => $model->username];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="user-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
