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
use common\models\Pengaturan;

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
<body>

<?= $this->render('_navbar');

$slide_pertama = Pengaturan::find()->where(['posisi' => Pengaturan::SLIDE1])->one();
$slide_kedua = Pengaturan::find()->where(['posisi' => Pengaturan::SLIDE2])->one();
$slide_ketiga = Pengaturan::find()->where(['posisi' => Pengaturan::SLIDE3])->one();

$slide_kecil_pertama = Pengaturan::find()->where(['posisi' => Pengaturan::SLIDEKECIL1])->one();
$slide_kecil_kedua = Pengaturan::find()->where(['posisi' => Pengaturan::SLIDEKECIL2])->one();
$slide_kecil_ketiga = Pengaturan::find()->where(['posisi' => Pengaturan::SLIDEKECIL3])->one();
?>
<section class="text-rotator">
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <div id="paralax-slider" class="owl-carousel">
                    <div class="item">
                        <div class="item-content text-center">
                            <p><?= $slide_kecil_pertama->nama ?></p>
                            <h2><?= $slide_pertama->nama ?></h2>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-content text-center">
                            <p><?= $slide_kecil_kedua->nama ?></p>
                            <h2><?= $slide_kedua->nama ?></h2>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-content text-center">
                            <p><?= $slide_kecil_ketiga->nama ?></p>
                            <h2><?= $slide_ketiga->nama; ?></h2>
                        </div>
                    </div>
                </div>
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
