<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Helper;
use common\models\Artikel;
use common\models\StatusArtikel;

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
                                <?php if ($artikel->id_status_artikel == StatusArtikel::DIPROSES): ?>
                                    <span class="bg-green">
                                        Artikel Diproses
                                    </span> 
                                <?php elseif ($artikel->id_status_artikel == StatusArtikel::DITERIMA): ?>
                                    <span class="bg-blue">
                                        Artikel Diterima
                                    </span>
                                <?php elseif ($artikel->id_status_artikel == StatusArtikel::DITOLAK): ?>
                                    <span class="bg-red">
                                        Artikel Ditolak
                                    </span>
                                <?php endif ?>
                        </li>

                        <li>
                            <?php if ($artikel->id_status_artikel == StatusArtikel::DIPROSES): ?>
                                <i class="fa fa-refresh bg-green"></i> 
                            <?php elseif ($artikel->id_status_artikel == StatusArtikel::DITERIMA): ?>
                                <i class="fa fa-check bg-blue"></i>
                            <?php elseif ($artikel->id_status_artikel == StatusArtikel::DITOLAK): ?>
                                <i class="fa fa-close bg-red"></i>
                            <?php endif ?>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> <?= \Yii::$app->formatter->asDate($artikel->create_at, 'long');  ?></span>

                                <h3 class="timeline-header"><?= $artikel->getRelationField('anggota','nama') ?></h3>

                                <div class="timeline-body">
                                    <?= substr($artikel->isi, 0, 150) ?>
                                </div>
                            <div class="timeline-footer">
                                <?= Html::a('<i class="fa fa-eye"></i> View', ['artikel/view','id' => $artikel->id], ['class' => 'btn btn-primary btn-flat btn-xs']); ?>
                                <?= Html::a('<i class="fa fa-pencil"></i> Update', ['artikel/update','id' => $artikel->id], ['class' => 'btn btn-success btn-flat btn-xs']); ?>
                                <?= Html::a('<i class="fa fa-trash"></i> Delete', ['artikel/delete','id' => $artikel->id], ['class' => 'btn btn-danger btn-flat btn-xs','data' => ['confirm' => 'Apakah Anda Serius Ingin Menghapus Artikel Ini?','method' => 'post']]); ?>
                            </div>
                            </div>
                        </li>
                    </ul>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
