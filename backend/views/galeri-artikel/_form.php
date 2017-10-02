<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\GaleriArtikel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary galeri-artikel-form">
    <div class="box-header with-border">
        <h3 class="box-title">Form Galeri Artikel</h3>
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

   <?= $form->field($model, 'gambar')->fileInput() ?>

    </div>
    <div class="box-footer with-border form-group">
        <div class="col-sm-3 col-sm-offset-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan', ['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
