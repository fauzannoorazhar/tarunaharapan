<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

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
$this->registerJs($hide, $this::POS_END, '');
$this->registerJs($format_money, $this::POS_END, '');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <?= Html::csrfMetaTags() ?>
    <title>Sijakon</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'SIJAKON',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Beranda', 'url' => ['/site/index']],
            ['label' => 'Dokumen', 'url' => ['/site/about']],
            ['label' => 'Kontak', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?php foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
                echo '<div class="alert hide-alert alert-' . $key . '" style="border-radius:0px;margin-bottom:0px">' . $message . '</div>';
        } ?>
        <?= $content ?>
    </div>
</div>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
