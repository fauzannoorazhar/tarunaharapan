<?php
use common\models\Siswa;
?>
<div style="position:relative;" class="top-padding">
      <section id="bg-paralax">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <p style="color: white">Unleash your creative potential with BizOne</p>
                      <h2 class="magin30">Looking For Exclusive Digital Services?</h2>

                      <a class="btn-green btn-common bounce-top page-scroll" href="#letstalk">Let's Talk</a>
                  </div>
              </div>
          </div>
      </section>
</div>

<section id="experties" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="title">2014 - 2017</p>
                    <h2 class="heading">Alumni</h2>
                </div>
                <div class="col-md-12">
                    <div class="some clearfix text-center">
                        <div class="myStat2" data-text=<?= Siswa::getJumlahRpl(); ?> data-width="10" data-fontsize="14" data-percent=<?= Siswa::getJumlah(); ?> data-fgcolor="#07aaa5" data-bgcolor="#eee" data-bordersize="15">
                            <p>Rekayasa Perangkat Lunak</p>
                        </div>
                        <div class="myStat2" data-text=<?= Siswa::getJumlahAka() ?> data-width="30" data-fontsize="14" data-percent=<?= Siswa::getJumlahAka() ?> data-fgcolor="#82b440" data-bgcolor="#eee" data-bordersize="15">
                            <p>Akutansi</p>
                        </div>
                        <div class="myStat2" data-text=<?= Siswa::getJumlahPm() ?> data-width="30" data-fontsize="14" data-percent=<?= Siswa::getJumlahPm() ?> data-fgcolor="#07aaa5" data-bgcolor="#eee" data-bordersize="15">
                            <p>Pemasaran</p>
                        </div>
                        <div class="myStat2" data-text=<?= Siswa::getJumlahTkr() ?> data-width="30" data-fontsize="14" data-percent=<?= Siswa::getJumlahTkr() ?> data-fgcolor="#82b440" data-bgcolor="#eee" data-bordersize="15">
                            <p>Teknik Kendaraan Ringan</p>
                        </div>
                        <div class="myStat2" data-text=<?= Siswa::getJumlahTsm() ?> data-width="30" data-fontsize="14" data-percent=<?= Siswa::getJumlahTsm() ?> data-fgcolor="#07aaa5" data-bgcolor="#eee" data-bordersize="15">
                            <p>Teknik Sepeda Motor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>