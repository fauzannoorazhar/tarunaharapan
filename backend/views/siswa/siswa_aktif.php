<?php
use yii\helpers\Html;
use common\models\Siswa;

$this->title = 'Siswa Aktif';
$this->params['breadcrumbs'][] = ['label' => 'Aktif', 'url' => ['siswa/siswa-aktif']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php foreach (Siswa::findSiswaGroupByStatusAktif() as $JurusanAngkatanAktif) { ?>
    <?php $length = strlen($JurusanAngkatanAktif->jurusanAngkatan->jurusan->nama); 
            if ($length <= 20) {
                echo '<div class="box box-primary collapsed-box">';
            } elseif ($length <= 21) {
                echo '<div class="box box-success collapsed-box">';
            } elseif ($length <= 22) {
                echo '<div class="box box-warning collapsed-box">';
            } elseif ($length <= 23) {
                echo '<div class="box box-info collapsed-box">';
            } elseif ($length <= 24) {
                echo '<div class="box box-danger collapsed-box">';
            } else {
                echo '<div class="box box-success collapsed-box">';
            }
        ?>
        <div class="box-header with-border">
            <h3 class="box-title"><?= $JurusanAngkatanAktif->jurusanAngkatan->jurusan->nama.' - '.$JurusanAngkatanAktif->jurusanAngkatan->angkatan->tahun ?></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Close" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nisn</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>Jurusan Angkatan</th>
                        <th></th>
                    </tr>
                </thead>

                <?php 
                $i = 1; 
                foreach (Siswa::findSiswaByJurusanAngkatanAktif($JurusanAngkatanAktif) as $siswa) { ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $siswa->nama ?></td>
                        <td><?= $siswa->nisn ?></td>
                        <td><?= $siswa->jenisKelamin->nama ?></td>
                        <td><?= $siswa->getStatus() ?></td>
                        <td><?= $siswa->jurusanAngkatan->jurusan->nama . ' - ' . $siswa->jurusanAngkatan->angkatan->tahun; ?></td>
                        <th><?= Html::a('<i class="fa fa-eye"></i>', ['view','id' => $siswa->id]); ?></th>
                    </tr>
                <?php $i++; } ?>

            </table>
        </div>
    </div>
<?php } ?>