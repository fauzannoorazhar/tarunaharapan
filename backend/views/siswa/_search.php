<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LirikSearch */
/* @var $form yii\widgets\ActiveForm */
$iconPencarian = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-search form-control-feedback'></span>"
];
?>

<div class="lirik-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

<div class="row">
    <div class="col-xs-12">
    <?= $form->field($model, 'globalSearch', $iconPencarian)->textInput(['class' => 'form-control input-sm','placeholder' => 'Pencarian Siswa'])->label(false) ?>
    </div>
</div>

</div>
  <?php ActiveForm::end(); ?>