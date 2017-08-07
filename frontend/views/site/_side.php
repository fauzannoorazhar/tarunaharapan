<?php
use common\models\Tentang;
use common\models\Artikel;
use common\components\Helper;
use yii\helpers\Html;
?>

<aside class="col-md-4 col-sm-4">
  <div class="widget search_box"> 
    <form>
      <input type="search" placeholder="Search">
      <i class="fa fa-search"></i>
    </form>
  </div>
  <div class="widget"> 
      <?php foreach (Tentang::find()->limit(1)->orderBy(['id' => SORT_DESC])->all() as $data) { ?>
      <h4>Tentang Kami</h4>
        <?= Html::img('@uploads/'.$data->photo,['class'=>'img-responsive']); ?>
      <p style="text-align: justify;"><p style="text-align: justify;"><?= substr("$data->isi ",0,350), Html::a('...[Selanjutnya]',['detail','id' => $data->id]) ?></p> </p>
      <?php } ?>
  </div>
    <div class="widget wow fadeInDown" data-wow-duration="500ms" data-wow-delay="900ms"> 
      <h4>Artikel Lainnya</h4>
      <ul class="category">
        <?php foreach (Artikel::find()->limit(5)->all() as $data) { ?>
            <li><a href="#."><?= $data->judul ?><span class="date"><?= Helper::getTanggal($data->tanggal) ?></span></a></li>
        <?php } ?>
      </ul>
    </div>
    <!-- <div class="widget"> 
      <h4>Categories</h4>
      <ul class="category">
        <li><a href="#.">Destination (6)</a></li>
        <li><a href="#.">Food (2)</a></li>
        <li><a href="#.">Landscape (4)</a></li>
        <li><a href="#.">NAature (4)</a></li>
        <li><a href="#.">Photogrohy (4)</a></li>
        <li><a href="#.">Travel (4)</a></li>
      </ul>
    </div> -->
  <div class="widget"> 
    <h4>tags</h4>
    <ul class="tag-cloud">
      <li><a href="#.">ANALYSIS</a></li>
      <li><a href="#.">BOARD</a></li>
      <li><a href="#.">CAREERS</a></li>
      <li><a href="#.">DIVIDEND</a></li>
      <li><a href="#.">EMPLOYMENT</a></li>
      <li><a href="#.">FINANCE</a></li>
      <li><a href="#.">news</a></li>
      <li><a href="#.">office</a></li>
      <li><a href="#.">ANALYSIS</a></li>
      <li><a href="#.">BOARD</a></li>
      <li><a href="#.">CAREERS</a></li>
      <li><a href="#.">DIVIDEND</a></li>
      <li><a href="#.">EMPLOYMENT</a></li>
      <li><a href="#.">FINANCE</a></li>
    </ul>
  </div>
</aside>