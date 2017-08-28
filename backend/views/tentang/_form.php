<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Tentang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary tentang-form">
    <div class="box-header with-border">
        <h3 class="box-title">Form tentang</h3>
    </div>
    <div class="box-body">
    <?php $form = ActiveForm::begin([            
            'layout'=>'horizontal',
            'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'wrapper' => 'col-sm-4',
                'error' => '',
                'hint' => '',
        ],
    ]]); ?>

    <?= $form->field($model, 'isi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'gambar')->fileInput() ?>

    </div>
    <div class="box-footer with-border form-group">
        <div class="col-sm-3 col-sm-offset-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan', ['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
