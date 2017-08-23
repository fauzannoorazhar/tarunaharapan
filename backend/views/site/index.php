<?php
use yii\helpers\Url;
use common\models\Siswa;
use common\models\Jurusan;
use common\models\guru;
use common\models\Angkatan;
$this->title = 'Selamat Datang';
?>

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?= Siswa::getJumlahRpl() ?></h3>
                        <p>Rekayasa Peragkat Lunak</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-laptop"></i>
                    </div>
                    <a href="<?= Url::to(['jurusan/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= Siswa::getJumlahAka() ?></h3>
                        <p>Akutansi</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar"></i>
                    </div>
                    <a href="<?= Url::to(['jurusan/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= Siswa::getJumlahPm() ?></h3>
                        <p>Pemasaran</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-area-chart"></i>
                    </div>
                    <a href="<?= Url::to(['jurusan/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= Siswa::getJumlahTkr() ?></h3>
                        <p>Teknik Kendaraan Ringan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-car"></i>
                    </div>
                    <a href="<?= Url::to(['jurusan/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= Siswa::getJumlahTsm() ?></h3>
                        <p>Teknik Sepedah Motor</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-motorcycle"></i>
                    </div>
                    <a href="<?= Url::to(['jurusan/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

<?php
    /*$hitunghari['awal'] = '1998-12-09';
    $hitunghari['akhir'] = date('Y-m-d');
    $lahir = $hitunghari['awal'];

    $selisih = time() - strtotime ($lahir);

    print $selisih.'<br>';
    print time().'<br>';
    print strtotime('1998-01-01').'<br>';

    $tahun = floor ($selisih / 31536000);

    print $tahun.'<br>';
    print floor('1998-01-01' / 31536000);

    $bulan = floor (($selisih % 31536000) / 2592000);
        foreach ($hitunghari as $key => $val)
        {
            $hitunghari[$key] = strtotime ($val);
        }
    $hitunghari['selisih'] = $hitunghari['akhir'] - $hitunghari['awal'];
    $hitunghari['selisih'] = number_format ($hitunghari['selisih'] / 86400, 2) . 'hari';*/
    /*echo $tahun.' Tahun';*/
?>