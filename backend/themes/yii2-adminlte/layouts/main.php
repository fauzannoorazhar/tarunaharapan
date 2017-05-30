<?php

use yii\helpers\Html;
use yii\web\View;
use app\themes\AdminlteAsset;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AdminlteAsset::register($this);

AppAsset::register($this);
$breadcrumbs = isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [];

$hide = "$('.hide-alert').animate({opacity: 1.0}, 3000).fadeOut('slow')";
$js = <<< 'SCRIPT'
$('body').tooltip({
    selector: '[data-toggle="tooltip"]'
});
SCRIPT;

$format_money = '$(document).ready(function(){
    $(".format-money").on("keyup", function(){
        var _this = $(this);
        var value = _this.val().replace(/\.| /g,"");
        _this.val(accounting.formatMoney(value, "", 0, ".", ","))
    });

});';

// Register tooltip/popover initialization javascript
$this->registerJs($js);
$this->registerJs($hide, View::POS_END, '');
$this->registerJs($format_money, View::POS_END, '');

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <?php $this->beginBody() ?>
    <body class="skin-blue sidebar-mini">
        <div class="wrapper">
            <?= $this->render('header'); ?>
            <?= $this->render('sidebar'); ?>
            <div class="content-wrapper">
            	
            	<?php foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
						echo '<div class="alert hide-alert alert-' . $key . '" style="border-radius:0px;margin-bottom:0px">' . $message . '</div>';
				} ?>

                <section class="content-header">
                    <h1><?= $this->title; ?></h1>
                    <?= Breadcrumbs::widget([
                        'tag' => 'ol',
                        'encodeLabels' => false,
                        'homeLink' => ['label' => '<i class="fa fa-dashboard"></i> Home/Dashboard', 'url' => ['/site/index']],
                        'links' => $breadcrumbs,
                    ]) ?>
                </section>

                <section class="content">
                    <?= $content ?>
                </section>
                
            </div>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    Version 1.0 Beta
                </div>
                Copyright &copy; <?= date('Y') ?> PERHIMPUNAN MAHASISWA BANDUNG
            </footer>
        </div>
        <?php $this->endBody() ?>


    </body>
</html>
<?php $this->endPage() ?>
