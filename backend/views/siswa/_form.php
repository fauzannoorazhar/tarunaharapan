<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\JenisKelamin;
use common\models\JurusanAngkatan;
use kartik\select2\Select2;
use common\models\Siswa;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model common\models\Siswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary siswa-form">
    <div class="box-header with-border">
        <h3 class="box-title">Form siswa</h3>
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

    <?= $form->field($model, 'nisn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'photo')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::ClassName(),[
        'options' => ['placeholder' => 'Pilih Tanggal'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-d',
            'autoclose' =>true
        ],
    ]) ?>

    <?= $form->field($model, 'id_jenis_kelamin')->widget(select2::className(), [
        'data' => JenisKelamin::getList(),
        'options' => [
            'placeholder' => 'Pilih Jenis Kelamin',
        ]
    ]) ?>

    <?= $form->field($model, 'id_jurusan_angkatan')->widget(select2::className(), [
        'data' => JurusanAngkatan::getList(),
        'options' => [
            'placeholder' => 'Pilih Jurusan Angkatan',
        ]
    ]) ?>

    <?php /*$form->field($model, 'status')->widget(select2::className(), [
        'data' => Siswa::getListStatus(),
        'options' => [
            'placeholder' => 'Pilih Status',
        ]
    ])*/ ?>

    <?php /*$form->field($model, 'status')->radioList([
        1 => 'Belum Lulus', 
        2 => 'Alumni',
    ]);*/ ?>

    </div>
    <div class="box-footer with-border form-group">
        <div class="col-sm-3 col-sm-offset-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan', ['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>