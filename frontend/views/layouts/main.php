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
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About Us', 'url' => ['/site/about']],
        ['label' => 'Menu', 'url' => ['site/menu']],
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
            ['label' => 'KEPENGURUSAN', 'url' => ['/site/kepengurusan']],
            ['label' => 'ANGGOTA', 'url' => ['angkatan/index']],
            ['label' => 'SEJARAH', 'url' => ['/site/sejarah']],
            ['label' => 'ARTIKEL', 'url' => ['artikel/index']],
            ['label' => 'KEGIATAN', 'url' => ['kegiatan/index']],
            ['label' => 'GALERI', 'url' => ['/site/galeri']],
            ['label' => 'FORUM', 'url' => ['/site/forum']],
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
    <div class="slide-container-fluid">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-3">
                    <a class="icon-footer" href="https://www.facebook.com/PerhimpunanMahasiswaBandung/" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
                    <a class="icon-footer" href="https://twitter.com/PMB_1948" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
                    <a class="icon-footer" href="https://twitter.com/PMB_1948" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
                    <p class="icon-footer">arsip.pmb1948@gmail.com
                    pmb.1948@yahoo.com</p>
                </div>

                <div class="col-sm-5">
                    <div class="row">
                        <h3>Link Terkait</h3>
                            <div class="col-sm-6">
                                <ul>
                                    <li style="font-size: 15px">
                                        <a class="icon-footer" href="#" target="_blank">
                                        Perhimpunan Mahasiswa Jakarta (PMJ)
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul>
                                    <li style="font-size: 15px">
                                        <a class="icon-footer" href="#" target="_blank">
                                        Perhimpunan Mahasiswa Belanda
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul>
                                    <li style="font-size: 15px">
                                        <a class="icon-footer" href="#" target="_blank">
                                        Perhimpunan Mahasiswa Jepang
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul>
                                    <li style="font-size: 15px">
                                        <a class="icon-footer" href="#" target="_blank">
                                        Perhimpunan Mahasiswa Surabaya
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul>
                                    <li style="font-size: 15px">
                                        <a class="icon-footer" href="#" target="_blank">
                                        Join With Us
                                        </a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <p style="text-align: right; margin-right: 88px;"><?= Html::img('@web/pictures/logo_kecil.png',['width'=>'250px','height'=>'100%']); ?></p>
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
