<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Mapel;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model common\models\Guru */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary guru-form">
    <div class="box-header with-border">
        <h3 class="box-title">Form guru</h3>
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

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_mapel')->widget(select2::className(), [
        'data' => Mapel::getList(),
        'options' => [
            'placeholder' => 'Pilih Mata Pelajaran',
        ]
    ]) ?>

    <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="box-footer with-border form-group">
        <div class="col-sm-3 col-sm-offset-3">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
