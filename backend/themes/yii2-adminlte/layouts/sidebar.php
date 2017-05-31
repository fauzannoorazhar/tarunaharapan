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
		<?php if(/*User::isAdmin() OR User::isSuperAdmin()*/true) { ?>
		<ul class="sidebar-menu">
			<li class="header">MENU NAVIGASI</li>
			<!-- Optionally, you can add icons to the links -->
			<li><a href="<?= Url::to(['site/index'])?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
			<li><a href="<?= Url::to(['alumni/index'])?>"><i class="fa fa-mortar-board"></i> <span>Alumni</span></a></li>
			<li><a href="<?= Url::to(['angkatan/index'])?>"><i class="fa fa-users"></i> <span>Angkatan</span></a></li>
			<li><a href="<?= Url::to(['guru/index'])?>"><i class="fa fa-user-circle"></i> <span>Guru</span></a></li>
			<li><a href="<?= Url::to(['jurusan/index'])?>"><i class="fa fa-steam"></i> <span>Jurusan</span></a></li>
			<li><a href="<?= Url::to(['siswa/index'])?>"><i class="fa fa-user"></i> <span>Siswa</span></a></li>
			<li><a href="<?= Url::to(['user/index'])?>"><i class="fa fa-user-o"></i> <span>User</span></a></li>
            <?php 
			//TODO: tambahkan pada array jika menambah menu baru ke dalam menu pengaturan
			if(Yii::$app->controller->id === 'user' ) { 
				$class_active = 'active'; 
				$class_menu_open = 'menu-open'; 
			} else {
				$class_active = ''; 
				$class_menu_open = ''; 
			} ?>

			
			<li><a href="<?= Url::to(['site/logout'])?>" data-method="post"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>

		</ul><!-- /.sidebar-menu -->
		<?php } ?>
	</section>
</aside>
