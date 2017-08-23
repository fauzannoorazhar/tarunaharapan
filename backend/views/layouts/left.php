<?php
use common\models\User;
use common\models\StatusArtikel;
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= User::getNamaUser(); ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->
<?php if(!Yii::$app->user->isGuest){ ?>
    <?php if (User::isAdmin()) { ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Frontend', 'icon' => 'circle-o', 'url' => \Yii::$app->urlManagerFrontEnd->baseUrl,['target' => '_blank']],
                    ['label' => 'MENU NAVIGASI', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['site/index']],

                    ['label' => 'MENU JURUSAN DAN ANGKATAN', 'options' => ['class' => 'header']],
                    ['label' => 'Angkatan', 'icon' => 'mortar-board', 'url' => ['angkatan/index']],
                    ['label' => 'Jurusan', 'icon' => 'mortar-board', 'url' => ['jurusan/index']],
                    ['label' => 'Jurusan Angkatan', 'icon' => 'mortar-board', 'url' => ['jurusan-angkatan/index']],

                    ['label' => 'MENU KESISWAAN', 'options' => ['class' => 'header']],
                    ['label' => 'Seluruh Siswa', 'icon' => 'users', 'url' => ['siswa/index']],
                    ['label' => 'Siswa Alumni', 'icon' => 'graduation-cap', 'url' => ['siswa/alumni']],
                    ['label' => 'Siswa Aktif', 'icon' => 'check', 'url' => ['siswa/siswa-aktif']],
                    /*[
                        'label' => 'SISWA',
                        'icon' => 'universal-access',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Lainnya',
                                'icon' => 'level-down',
                                'url' => '#',
                                'items' => [
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],*/

                    ['label' => 'MENU ANGGOTA', 'options' => ['class' => 'header']],
                    ['label' => 'Anggota', 'icon' => 'user', 'url' => ['anggota/index']],

                    ['label' => 'MENU ARTIKEL', 'options' => ['class' => 'header']],
                    ['label' => 'Artikel', 'icon' => 'newspaper-o', 'url' => ['artikel/index']],
                    ['label' => 'Proses', 'icon' => 'newspaper-o', 'url' => ['artikel/proses','id_status_artikel' => StatusArtikel::DIPROSES]],
                    ['label' => 'Diterima', 'icon' => 'newspaper-o', 'url' => ['artikel/terima','id_status_artikel' => StatusArtikel::DITERIMA]],
                    ['label' => 'Ditolak', 'icon' => 'newspaper-o', 'url' => ['artikel/tolak','id_status_artikel' => StatusArtikel::DITOLAK]],

                    ['label' => 'MENU LAINNYA', 'options' => ['class' => 'header']],
                    ['label' => 'Tentang', 'icon' => 'info-circle', 'url' => ['tentang/index']],
                    
                    ['label' => 'PENGATURAN AKUN', 'options' => ['class' => 'header']],
                    ['label' => 'User', 'icon' => 'user-circle-o', 'url' => ['user/index']],
                    ['label' => 'Logout', 'icon' => 'power-off', 'url' => ['site/logout']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>
    <?php } elseif (User::isOperator()){ ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Frontend', 'icon' => 'circle-o', 'url' => \Yii::$app->urlManagerFrontEnd->baseUrl],
                    ['label' => 'MENU NAVIGASI', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['site/index']],

                    ['label' => 'MENU JURUSAN DAN ANGKATAN', 'options' => ['class' => 'header']],
                    ['label' => 'Angkatan', 'icon' => 'mortar-board', 'url' => ['angkatan/index']],
                    ['label' => 'Jurusan', 'icon' => 'mortar-board', 'url' => ['jurusan/index']],
                    ['label' => 'Jurusan Angkatan', 'icon' => 'mortar-board', 'url' => ['jurusan-angkatan/index']],

                    ['label' => 'MENU KESISWAAN', 'options' => ['class' => 'header']],
                    ['label' => 'Seluruh Siswa', 'icon' => 'users', 'url' => ['siswa/index']],
                    ['label' => 'Siswa Alumni', 'icon' => 'graduation-cap', 'url' => ['siswa/alumni']],
                    ['label' => 'Siswa Aktif', 'icon' => 'check', 'url' => ['siswa/siswa-aktif']],

                    ['label' => 'MENU ANGGOTA', 'options' => ['class' => 'header']],
                    ['label' => 'Anggota', 'icon' => 'user', 'url' => ['anggota/index']],

                    ['label' => 'MENU ARTIKEL', 'options' => ['class' => 'header']],
                    ['label' => 'Artikel', 'icon' => 'newspaper-o', 'url' => ['artikel/index']],
                    ['label' => 'Proses', 'icon' => 'newspaper-o', 'url' => ['artikel/proses','id_status_artikel' => StatusArtikel::DIPROSES]],
                    ['label' => 'Diterima', 'icon' => 'newspaper-o', 'url' => ['artikel/terima','id_status_artikel' => StatusArtikel::DITERIMA]],
                    ['label' => 'Ditolak', 'icon' => 'newspaper-o', 'url' => ['artikel/tolak','id_status_artikel' => StatusArtikel::DITOLAK]],

                    ['label' => 'PENGATURAN AKUN', 'options' => ['class' => 'header']],
                    ['label' => 'Profil', 'icon' => 'user-circle-o', 'url' => ['user/profil']],
                    ['label' => 'Ganti Password', 'icon' => 'unlock-alt', 'url' => ['user/set-password']],
                    ['label' => 'Logout', 'icon' => 'power-off', 'url' => ['site/logout']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>
    <?php } elseif (User::isAnggota()){ ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Halaman Depan', 'icon' => 'circle-o', 'url' => \Yii::$app->urlManagerFrontEnd->baseUrl,['target' => '_blank']],
                    ['label' => 'MENU NAVIGASI', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['site/anggota']],
                    ['label' => 'Artikel', 'icon' => 'newspaper-o', 'url' => ['artikel/index']],

                    ['label' => 'PENGATURAN AKUN', 'options' => ['class' => 'header']],
                    ['label' => 'Akun', 'icon' => 'user-circle-o', 'url' => ['user/profil']],
                    ['label' => 'Ganti Password', 'icon' => 'unlock-alt', 'url' => ['user/set-password']],
                    ['label' => 'Logout', 'icon' => 'power-off', 'url' => ['site/logout']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>
    <?php } ?>
    <?php } ?>
    </section>

</aside>
