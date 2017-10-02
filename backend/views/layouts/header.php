<?php

use yii\helpers\Html;
use common\components\Helper;
use common\models\User;
use common\models\Artikel;
use common\models\Anggota;
use common\models\StatusArtikel;

/* @var $this \yii\web\View */
/* @var $content string */
$model = Anggota::find()
->where(['id' => Yii::$app->user->identity->nama_anggota])
->one();
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">ONE</span><span class="logo-lg">TARUNA HARAPAN</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php if (User::isAdmin() || User::isOperator()) { ?>
                    <!-- notifications pengajuan artikel -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                            <?= Artikel::getCountLabelArtikelProses() ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?= Artikel::getArtikelProsesNotif() ?>
                                <?php foreach (Artikel::findArtikelProses() as $artikel) { ?>
                                    <li>
                                        <ul class="menu">
                                            <li>
                                                <?= Html::a('<i class="fa fa-refresh text-green"></i>'.$artikel->judul, ['artikel/view','id' => $artikel->id], ['option' => 'value']); ?>
                                            </li>
                                        </ul>
                                    </li>
                                <?php } ?>
                            <li class="footer">
                                <?= Html::a('Views All', ['artikel/proses','id_status_artikel' => StatusArtikel::DIPROSES], ['option' => 'value']); ?>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user-circle-o fa-lg"></i>
                        <span class="hidden-xs"><?= ucwords(User::getNamaUser()) ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?= $model->getGambar(['class' => 'gambar-profil']); ?>

                            <p>
                                <?= ucwords($model->nama) ?>
                                <small>
                                    <?php 
                                        echo $model->bio; 
                                    ?>
                                </small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-12 text-center">
                                Terakhir Login : <?= User::getLastLogin() ?>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a('<i class="fa fa-user-circle-o"></i> Akun', ['user/profil'], ['class' => 'btn btn-default btn-flat']); ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    '<i class="fa fa-power-off"></i> Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
