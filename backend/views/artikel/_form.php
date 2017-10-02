<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use common\models\TagArtikel;
/*use kartik\rating\StarRating;*/


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
        'options' => ['enctype' => 'multipart/form-data'],      
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

    <?= $form->field($model, 'id_tag_artikel')->widget(select2::className(), [
        'data' => TagArtikel::getList(),
        'options' => [
            'placeholder' => 'Pilih Tag',
        ]
    ]) ?>

    <?= $form->field($model, 'isi',[
        'horizontalCssClasses' => [
            'label' => 'col-sm-3',
            'wrapper' => 'col-sm-9',
            'error' => '',
            'hint' => '',
        ],
        ])->widget(CKEditor::className(), [
        'options' => ['rows' => 3],
        'preset' => 'advanced'
    ]) ?>

    <?= $form->field($model, 'gambar')->fileInput()->label('Cover Artikel') ?>

    </div>
    <div class="box-footer with-border form-group">
        <div class="col-sm-3 col-sm-offset-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan', ['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>