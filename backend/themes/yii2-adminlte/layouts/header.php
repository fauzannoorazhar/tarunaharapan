<?php

use yii\web\View;
use app\themes\Nav;
use yii\helpers\ArrayHelper;

/* @var $this View */
?>
<header class="main-header">
	<a href="<?= Yii::$app->homeUrl; ?>" class="logo">
		<span class="logo-mini"><?= ArrayHelper::getValue(Yii::$app->params, 'app.name.small', 'ONE')?></span>
		<span class="logo-lg">TARPAN ONE</span>
	</a>
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
	            <li class="dropdown user user-menu">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
		                  <span class="hidden-xs">Muhammad Fauzan Noor Azhar</span>
	                </a>
	                <ul class="dropdown-menu">
	                  <!-- User image -->
		                <li class="user-header">
		                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
		                    <p>
			                    Fauzan Noor - Web Developer
			                    <small>Lorem Ipsum	</small>
		                    </p>
		                </li>
	                  <!-- Menu Body -->
		                <li class="user-body">
		                    <div class="col-xs-4 text-center">
		                      	<a href="#">Followers</a>
		                    </div>
		                    <div class="col-xs-4 text-center">
		                      	<a href="#">Sales</a>
		                    </div>
		                    <div class="col-xs-4 text-center">
		                      	<a href="#">Friends</a>
		                    </div>
		                </li>
	                  <!-- Menu Footer-->
		                  	<li class="user-footer">
			                    <div class="pull-left">
			                      <a href="#" class="btn btn-default btn-flat">Profile</a>
			                    </div>
			                    <div class="pull-right">
			                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
			                    </div>
		                  	</li>
	                </ul>
	            </li>
            </ul>
        </div>
	</nav>
</header>