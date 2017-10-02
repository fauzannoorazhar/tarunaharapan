<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use common\models\Pengaturan;

/* @var $this yii\web\View */
/* @var $model common\models\Pengaturan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary pengaturan-form">
    <div class="box-header with-border">
        <h3 class="box-title">Form pengaturan</h3>
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

    <?= $form->field($model, 'nama')->textArea(['rows' => 4])->label('Isian') ?>

    <?= $form->field($model, 'posisi')->widget(select2::className(), [
        'data' => Pengaturan::getList(),
        'options' => [
            'placeholder' => 'Posisi',
        ]
    ]) ?>

    </div>
    <div class="box-footer with-border form-group">
        <div class="col-sm-3 col-sm-offset-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan', ['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>