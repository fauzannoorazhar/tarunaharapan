<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

$this->title = 'Tarpan One';
$this->params['breadcrumbs'][] = 'Not Found (#404)';
?>
<body style="background: #F2F2F2">
    <section id="area-main" class="padding">
    <h5 class="hidden">hidden</h5>
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                </div>

                <div class="col-md-10 col-xs-12">
                    <?= Breadcrumbs::widget([
                        'homeLink' => [ 
                        'label' => Yii::t('yii', 'Home'),
                        'url' => ['site/index'],
                         ],
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                </div>

                <div class="col-md-1">
                </div>
            </div>

                <div class="row">
                    <div class="col-md-1">
                    </div>

                    <div class="col-md-10" style="text-align: center;">
                        <span class="fa fa-warning fa-5x text-danger"></span> <h2>Oops! Page not found :(</h2>
                    </div>

                    <div class="col-md-1">
                    </div>
                </div>
        </div>
    </section>
</body>