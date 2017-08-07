<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LirikSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lirik-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'globalSearch')->textInput(['class' => 'form-control input-sm','placeholder' => 'Pencarian Siswa'])->label(false) ?>

</div>
  <?php ActiveForm::end(); ?>