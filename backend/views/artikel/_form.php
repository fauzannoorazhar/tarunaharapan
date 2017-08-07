<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Artikel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary artikel-form">
    <div class="box-header with-border">
        <h3 class="box-title">Form artikel</h3>
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

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'gambar')->fileInput() ?>

    <?php /*$form->field($model, 'tanggal')->widget(DatePicker::ClassName(),[
        'options' => ['placeholder' => 'Pilih Tanggal'],
        'pluginOptions' => [
        'format' => 'dd-mm-yyyy',
        'autoclose' =>true
        ]
    ])*/ ?>

    </div>
    <div class="box-footer with-border form-group">
        <div class="col-sm-3 col-sm-offset-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan', ['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
