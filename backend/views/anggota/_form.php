<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use common\models\JenisKelamin;

/* @var $this yii\web\View */
/* @var $model common\models\Anggota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary anggota-form">
    <div class="box-header with-border">
        <h3 class="box-title">Form anggota</h3>
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

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_jenis_kelamin')->widget(select2::className(), [
        'data' => JenisKelamin::getList(),
        'options' => [
            'placeholder' => 'Pilih Jenis Kelamin',
        ]
    ]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::ClassName(),[
        'options' => ['placeholder' => 'Pilih Tanggal'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-d',
            'autoclose' =>true
        ],
    ]) ?>
    
    </div>
    <div class="box-footer with-border form-group">
        <div class="col-sm-3 col-sm-offset-3">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
