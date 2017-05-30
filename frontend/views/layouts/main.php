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
<?php $this->beginBody() ?>

<div class="wrap" id="nav">
    <?php
    NavBar::begin([
        'options' => [
            'class' => 'navbar-inverse',
        ],
    ]);
    $menuItems = [

    ];
    /*if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }*/
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right fixed-top'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</div>
    
    <div class="slide-container-fluid">
        <div class="container-fluid">
            <div>&nbsp;</div>
                <div class="row">
                    <div class="col-md-1">
                        <br>
                        <?= Html::img('@web/pictures/logo.jpg',['width'=>'85px','height'=>'100%']); ?>
                    </div>

                    <div class="col-md-11">
                        <p><h1><strong>Perhimpunan Mahasiswa Bandung</strong></h1></p>
                        <p><strong>Badan Hukum Nomor : J. A. 5/33/18 Tanggal.27-04-1956</strong></p> 
                    </div>
                </div>
            <div>&nbsp;</div>
        </div>
    </div>

    <div id="bottom-nav">
        <?php
        NavBar::begin([
            'options' => [
                'class' => 'navbar-default',
            ],
        ]);
        $menuItems = [
            ['label' => 'HOME', 'url' => ['tokoh/index']],
            ['label' => 'ABOUT US', 'url' => ['/site/about']],
            ['label' => 'KEPENGURUSAN', 'url' => ['/site/kepengurusan']],
            ['label' => 'ANGGOTA', 'url' => ['anggota/index']],
            ['label' => 'SEJARAH', 'url' => ['/site/sejarah']],
            ['label' => 'ARTIKEL', 'url' => ['artikel/index']],
            ['label' => 'KEGIATAN', 'url' => ['kegiatan/index']],
            ['label' => 'GALERI', 'url' => ['/site/galeri']],
        ];
        /*if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
        }*/
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
    </div>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>
            <?= Alert::widget() ?>
            <?= $content ?>
<div>&nbsp;</div>

<footer>
    <div class="footer2">  
        <div class="container">
            <div class="row">

                <div class="col-sm-4">
                    <?= Html::img('@web/pictures/lambang-pmb.png',['width'=>'100px','height'=>'130px']); ?>
                </div>

                <div class="col-sm-4">
                    <div class="row">  
                        <div class="col-sm-12">
                            <!-- <strong><h4 style="text-align: center;">Perhimpunan Mahasiswa Bandung</h4></strong> -->
                        </div>
                        <div class="col-sm-12" style="text-align: center">
                            <p style="text-align: center;">arsip.pmb1948@gmail.com / pmb.1948@yahoo.com</p>
                            <p style="text-align: center;">Sekretariat PMB Jalan Merdeka No.7 Bandung.</p>
                            <a class="icon-footer" href="https://www.facebook.com/PerhimpunanMahasiswaBandung/" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
                            <a class="icon-footer" href="https://twitter.com/PMB_1948" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="pull-right">
                        <?= Html::img('@web/pictures/logo_kecil.png',['width'=>'270px','height'=>'35px']); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>

<div class="footer-bottom">
    <p>Copyright &copy; Perhimpunan Mahasiswa Bandung <?= date('Y') ?></p>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
