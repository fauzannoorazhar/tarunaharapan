<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
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
      <div class="col-md-12 text-left">
        <h2>SMK TARPAN ONE</h2>
        <p class="tagline">Taruna Harapan 1  Cipatat</p>
      </div>
    </div>
  </div>
</section>

<?php $this->beginBody() ?>

    <?= Alert::widget() ?>

    <?= $content ?>

<?= $this->render('_footer'); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
