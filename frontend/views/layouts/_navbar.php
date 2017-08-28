<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
?>
<header id="main-navigation">
  <div id="navigation" data-spy="affix" data-offset-top="20">
    <div class="container">
      <div class="row">
      <div class="col-md-12">
      <ul class="top-right text-right">
            <li><a href="#." class="facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#." class="twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#." class="instagram"><i class="icon-instagram"></i></a></li>
          </ul>

    <?php
        NavBar::begin([
              'options' => [
                  'class' => 'navbar-default',
              ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                  ['label' => 'Home', 'url' => ['/site/index']],
                  ['label' => 'Alumni', 'url' => ['/alumni/index']],
                  ['label' => 'Artikel', 'url' => ['/artikel/index']],
                  ['label'=>'Login', 'url'=>\Yii::$app->urlManagerFrontEnd->baseUrl],
              ],
        ]);
        NavBar::end();
    ?>

       </div>
       </div>
     </div>
  </div>
</header> 