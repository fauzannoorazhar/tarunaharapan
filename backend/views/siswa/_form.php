<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use common\models\Angkatan;
use common\models\Jurusan;

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

    <?= $form->field($model, 'id_jurusan')->widget(select2::className(), [
        'data' => Jurusan::getList(),
        'options' => [
            'placeholder' => 'Pilih Jurusan',
        ]
    ]) ?>

    <?= $form->field($model, 'id_angkatan')->widget(select2::className(), [
        'data' => Angkatan::getList(),
        'options' => [
            'placeholder' => 'Pilih Angkatan',
        ]
    ]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->widget(Select2::classname(), [
        'data' => [
            0 => 'Belum Lulus',
            1 => 'Alumni',
        ],
        'options' => ['placeholder' => 'Pilih Status'],
        'pluginOptions' => [
        'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'photo')->fileInput(['maxlength' => true]) ?>

    </div>
    <div class="box-footer with-border form-group">
        <div class="col-sm-3 col-sm-offset-3">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
