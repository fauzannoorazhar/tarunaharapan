<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use common\models\JenisKelamin;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';
$fieldNama = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldEmail = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];


$fieldUsername = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldPassword = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

?>

<div class="login-box" style="margin-top: 2%;">
    <div class="login-logo">
        <b>TARPAN</b>ONE
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><strong>Registrasi</strong></p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form->field($model, 'nama', $fieldNama)
        ->textInput(['placeholder' => 'Nama Lengkap'])
        ->label(false) ?>

        <?= $form->field($model, 'email', $fieldEmail)
        ->textInput(['placeholder' => 'Email'])
        ->label(false) ?>

        <?= $form->field($model, 'username', $fieldUsername)
        ->textInput(['placeholder' => 'Username'])
        ->label(false) ?>

        <?= $form->field($model, 'password', $fieldPassword)
        ->passwordInput(['placeholder' => 'Password'])
        ->label(false) ?>

        <?= $form->field($model, 'password_konfirmasi', $fieldPassword)
        ->passwordInput(['placeholder' => 'Password Konfirmasi'])
        ->label(false) ?>

        <?= $form->field($model, 'id_jenis_kelamin')
        ->widget(select2::className(), [
            'data' => JenisKelamin::getList(),
            'options' => [
                'placeholder' => 'Pilih Jenis Kelamin',
            ]
        ])
        ->label(false) ?>

        <?= $form->field($model, 'alamat')
        ->textarea(['rows' => 3,'placeholder' => 'Alamat'])
        ->label(false) ?>

        <?= $form->field($model, 'tanggal_lahir')
        ->widget(DatePicker::ClassName(),[
            'options' => ['placeholder' => 'Pilih Tanggal Lahir'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-d',
                'autoclose' =>true
            ],
        ])
        ->label(false) ?>

        <div class="row">
            <div class="col-xs-10">
                <?php /*$form->field($model, 'reCaptcha')
                ->widget(
                    \himiklab\yii2\recaptcha\ReCaptcha::className(),
                    ['siteKey' => '6LeolSwUAAAAAFd9t_ioxQIkO23T2XLVo4yTcVT_'])
                ->label(false)*/
                 ?>
            </div>
        </div>        

        <div class="row">
            <div class="col-xs-4">
                <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>

            <div class="col-xs-8">
            </div>
        </div>

        <p style="color: red">*<em style="color: #999999">Silahkan Cek Email Yang Anda Cantumkan, Untuk Mengaktifkan Akun!!</em></p>

        <hr>

        <div class="row">
            <div class="col-xs-6" style="text-align: left">
            </div>

            <div class="col-xs-6" style="text-align: right">
                <?= Html::a('Sudah Memiliki Akun', ['login'], ['class' => 'text-info']); ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>