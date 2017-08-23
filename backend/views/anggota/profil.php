<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Helper;
use common\models\Artikel;

/* @var $this yii\web\View */
/* @var $model common\models\Anggota */

$this->title = 'Profil';
$this->params['breadcrumbs'][] = ['label' => 'Profil', 'url' => ['anggota']];
?>
<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="bg-yellow">
                <div class="box-body box-profile">
                    <?= Html::img('images/avatar5.png', ['class' => 'profile-user-img img-responsive img-circle']); ?>
                    <h4 class="text-center" style="color: white"><?= $model->nama ?></h4>

                    <p class="text-muted text-center">Software Engineer</p>
                </div>
            </div>
            <div class="box-body box-profile">

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Artikel Diproses</b> <span class="pull-right badge bg-green"><?= Artikel::getArtikelProses() ?></span>
                </li>
                <li class="list-group-item">
                    <b>Artikel Diterima</b> <span class="pull-right badge bg-blue"><?= Artikel::getArtikelDiterima() ?></span>
                </li>
                <li class="list-group-item">
                    <b>Artikel Ditolak</b> <span class="pull-right badge bg-red"><?= Artikel::getArtikelDitolak() ?></span>
                </li>
            </ul>

            <?= Html::a('<i class="fa fa-pencil"></i> Sunting Profil', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-newspaper-o"></i> Artikel</h3>
            </div>            

            <div class="box-body box-overflow">
                <?php foreach ($model->artikel as $artikel): ?>    
                    <ul class="timeline timeline-inverse">
                        <li class="time-label">
                            <span class="bg-red">
                            <?= \Yii::$app->formatter->asDate($artikel->create_at, 'long');  ?>
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-newspaper-o bg-blue"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                <div class="timeline-body">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                    quora plaxo ideeli hulu weebly balihoo...
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-primary btn-flat btn-xs">Read more</a>
                                    <a class="btn btn-danger btn-flat btn-xs">Delete</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-clock-o bg-gray"></i>
                        </li>
                        <div>&nbsp;</div>
                    </ul>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>