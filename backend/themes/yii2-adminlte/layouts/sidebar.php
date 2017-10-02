<?php

use yii\web\View;
use app\themes\SideNav;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\User;
//use common\models\UserRole;

//use yii\helpers\Html;

/* @var $this View */

$items = ArrayHelper::getValue($this->params, 'sideMenu', []);
?>
<aside class="main-sidebar">r
	<div class="user-panel">
		<div class="pull-left image">
			<img src="<?= Yii::getAlias('@web/themes/yii2-adminlte') ?>/img/avatar.png" class="img-circle" alt="User Image">
		</div>
		<div class="pull-left info">
			<p><?= Yii::$app->user->identity->username ?></p>
			<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		</div>
	</div><!-- /.user-panel -->
	<?php $class_active = ''; $class_menu_open = ''; ?>
	<section class="sidebar">
		<?php if(!Yii::$app->user->isGuest) { ?>
			<?php if(User::isAdmin()) { ?>
			<ul class="sidebar-menu">
				<li class="header">MENU NAVIGASI</li>
				<!-- Optionally, you can add icons to the links -->
				<li><a href="<?= Url::to(['site/index'])?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
				<li><a href="<?= Url::to(['jurusan/index'])?>"><i class="fa fa-circle-o"></i> <span>Jurusan</span></a></li>
				<li><a href="<?= Url::to(['angkatan/index'])?>"><i class="fa fa-circle-o"></i> <span>Angkatan</span></a></li>
				<li><a href="<?= Url::to(['jurusan-angkatan/index'])?>"><i class="fa fa-circle-o"></i> <span>Jurusan Angkatan</span></a></li>
				<li><a href="<?= Url::to(['mapel/index'])?>"><i class="fa fa-circle-o"></i> <span>Mapel Guru</span></a></li>
				<li><a href="<?= Url::to(['guru/index'])?>"><i class="fa fa-circle-o"></i> <span>Guru</span></a></li>
				<li><a href="<?= Url::to(['siswa/index'])?>"><i class="fa fa-circle-o"></i> <span>Siswa</span></a></li>

				<li><a href="<?= Url::to(['user/index'])?>"><i class="fa fa-user-o"></i> <span>User</span></a></li>
				<li><a href="<?= Url::to(['site/logout'])?>" data-method="post"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
			</ul>
			<?php } elseif (User::isSiswa()) { ?>
			<ul class="sidebar-menu">
				<li class="header">MENU NAVIGASI</li>
				<!-- Optionally, you can add icons to the links -->
				<li><a href="<?= Url::to(['site/index'])?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
				<li><a href="<?= Url::to(['jurusan/index'])?>"><i class="fa fa-circle-o"></i> <span>Jurusan</span></a></li>
				<li><a href="<?= Url::to(['angkatan/index'])?>"><i class="fa fa-circle-o"></i> <span>Angkatan</span></a></li>
				<li><a href="<?= Url::to(['jurusan-angkatan/index'])?>"><i class="fa fa-circle-o"></i> <span>Jurusan Angkatan</span></a></li>
				<li><a href="<?= Url::to(['mapel/index'])?>"><i class="fa fa-circle-o"></i> <span>Mapel Guru</span></a></li>
				<li><a href="<?= Url::to(['guru/index'])?>"><i class="fa fa-circle-o"></i> <span>Guru</span></a></li>
				<li><a href="<?= Url::to(['siswa/index'])?>"><i class="fa fa-circle-o"></i> <span>Siswa</span></a></li>
				<li><a href="<?= Url::to(['site/logout'])?>" data-method="post"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
			</ul>
			<?php } elseif (User::isGuru()) { ?>
			<ul class="sidebar-menu">
				<li class="header">MENU NAVIGASI</li>
				<!-- Optionally, you can add icons to the links -->
				<li><a href="<?= Url::to(['site/index'])?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
				<li><a href="<?= Url::to(['jurusan/index'])?>"><i class="fa fa-circle-o"></i> <span>Jurusan</span></a></li>
				<li><a href="<?= Url::to(['angkatan/index'])?>"><i class="fa fa-circle-o"></i> <span>Angkatan</span></a></li>
				<li><a href="<?= Url::to(['jurusan-angkatan/index'])?>"><i class="fa fa-circle-o"></i> <span>Jurusan Angkatan</span></a></li>
				<li><a href="<?= Url::to(['mapel/index'])?>"><i class="fa fa-circle-o"></i> <span>Mapel Guru</span></a></li>
				<li><a href="<?= Url::to(['guru/index'])?>"><i class="fa fa-circle-o"></i> <span>Guru</span></a></li>
				<li><a href="<?= Url::to(['siswa/index'])?>"><i class="fa fa-circle-o"></i> <span>Siswa</span></a></li>
				<li><a href="<?= Url::to(['user/index'])?>"><i class="fa fa-user-o"></i> <span>User</span></a></li>
				<li><a href="<?= Url::to(['site/logout'])?>" data-method="post"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
			</ul>
			<?php } ?>
		<?php } ?>
	</section>
</aside>
