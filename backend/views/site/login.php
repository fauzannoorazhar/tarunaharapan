<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div  class="login-pages">
            <div class="login-logo" style="text-align: left">
              <img style="margin-top: -3px; width: 80px; height: 109px;" src="<?php echo Yii::$app->request->baseUrl; ?>/images/logo-pmb.png">
              <p style="font-weight: bold;text-transform: uppercase;line-height: 40px">PMB</p>
              <p class="txt-l"></p>
              <p class="txt-l">Perhimpunan Mahasiswa Bandung 1948</p>

            </div>

<div class="login-box">
    <div class="login-box-body">
    <p class="login-box-msg">Silahkan login terlebih dahulu</p>
        <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'form-signin'],
        ]); ?>
        
        <?= $form->field($model, 'username')->textInput(['placeholder'=>'Username'])->label(false); ?>

        

        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password'])->label(false); ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <div class="col-xs-4">

                <?= Html::submitButton('Login', 
                    [
                        'id' => 'btnLogin',
                        'class' => 'btn btn-flat btn-primary btn-block btn-signin', 
                        'name' => 'login-button'
                    ]) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
