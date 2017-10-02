<?php
use yii\helpers\Html;
use common\models\Siswa;

$this->title = 'Siswa Alumni';
$this->params['breadcrumbs'][] = ['label' => 'Alumni', 'url' => ['siswa/alumni']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php foreach (Siswa::findSiswaGroupByStatusAlumni() as $JurusanAngkatan) { ?>
        <?php $length = strlen($JurusanAngkatan->jurusanAngkatan->jurusan->nama); 
            if ($length <= 8) {
                echo '<div class="box box-primary collapsed-box">';
            } elseif ($length <= 10) {
                echo '<div class="box box-success collapsed-box">';
            } elseif ($length <= 15) {
                echo '<div class="box box-warning collapsed-box">';
            } elseif ($length <= 20) {
                echo '<div class="box box-info collapsed-box">';
            } else {
                echo '<div class="box box-danger collapsed-box">';
            }
        ?>
        <div class="box-header with-border">
            <h3 class="box-title">
                <?= $JurusanAngkatan->jurusanAngkatan->jurusan->nama.' - '.$JurusanAngkatan->jurusanAngkatan->angkatan->tahun
                ?>
            </h3>
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
                foreach (Siswa::findSiswaByJurusanAngkatanAlumni($JurusanAngkatan) as $siswa) { ?>
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