<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use common\models\Anggota;
use common\models\Angkatan;

$this->title = 'Detail Angkatang';
?>
<div class="site-detail-angkatan">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="box">
                    <h2 style="text-align: justify;"><i class="fa fa-mortar-board"></i> Angkatan <?= $model->tahun ?></h2><hr>
                        <?php
                            $query = Anggota::find();
                            $query->where(['id_angkatan'=>$model->id]);
                        ?>

                        <table class="table table-consended table-hover table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Anggota</th>
                                <th>Universitas</th>
                                <th>Jurusan</th>
                                <th>Angkatan</th>
                            </tr>
                                <?php $i=1; foreach ($query->all() as $data) { ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $data->kode; ?></td>
                                        <td><?= $data->nama; ?></td>
                                        <td><?= $data->id_universitas; ?></td>
                                        <td><?= $data->jurusan; ?></td>
                                        <td><?= $data->id_angkatan; ?></td>
                                    </tr>
                                <?php $i++; } ?>
                        </table>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="widget-tautan">
                    <div class="title-tautan">
                        <h4 style="text-align: center;">Angkatan</h4>
                    </div>
                    
                    <?php foreach (Angkatan::find()->all() as $data) { ?>
                        <div class="forum">
                            <div class="forum-recent">
                                <li><?= Html::a(''.$data->tahun , ['detail','id'=>$data->id]) ?></li>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</div>




