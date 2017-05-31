<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use common\models\Angkatan;

/* @var $this yii\web\View */
/* @var $model common\models\Jurusan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary jurusan-form">
    <div class="box-header with-border">
        <h3 class="box-title">Form jurusan</h3>
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

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_angkatan')->widget(select2::className(), [
        'data' => Angkatan::getList(),
        'options' => [
            'placeholder' => 'Pilih Angkatan',
        ]
    ]) ?>

    </div>
    <div class="box-footer with-border form-group">
        <div class="col-sm-3 col-sm-offset-3">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
