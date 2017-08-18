<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\BizoneAsset;
use common\widgets\Alert;

AppAsset::register($this);
BizoneAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!-- <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1"/> -->
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
<body>

<div class="loader">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<?= $this->render('_navbar'); ?>

<section class="innerpage-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left wow fadeInDown" data-wow-duration="500ms" data-wow-delay="200ms">
                <h2>SMK TARPAN ONE</h2>
                <p class="tagline wow fadeInDown">Taruna Harapan 1  Cipatat</p>
            </div>
        </div>
    </div>
</section>

<?php $this->beginBody() ?>

    <?= Alert::widget() ?>
    
    <?= $content ?>

    <a href="#." class="go-top text-center"><i class="fa fa-angle-double-up"></i></a>

<?= $this->render('_footer'); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
