<?php
use common\models\Artikel;
use yii\helpers\Html;
use common\components\Helper;
?>

<div class="col-md-8 col-sm-8">
    <article class="blog-item-v3">  
        <?php foreach (Artikel::find()->limit(2)->orderBy(['id' => SORT_DESC])->all() as $data) { ?>
            <?= Html::img('@uploads/'.$data->photo,['class'=>'img-responsive','height' => '50px']); ?>
                <div class="blog-content">
                    <h3><?= $data->judul; ?></h3>
                        <ul class="blog-author">
                            <li><a href="#."><i class="fa fa-user"></i><?= $data->id_user; ?></a></li>
                            <li><a href="#."><i class="fa fa-clock-o"></i><?= Helper::getTanggal($data->tanggal); ?></a></li>
                          </ul>

                        <p style="text-align: justify;"><?= substr("$data->isi ",0,450), Html::a('...[Selanjutnya]',['detail','id' => $data->id]) ?></p> 
                        <div>&nbsp;</div>
                </div>
        <?php } ?>
    </article>      
</div>

<!-- <img src="images/blog-detail.jpg" class="img-responsive" alt="Blog From Author">
<div class="blog-content">
<h3>Unique experience</h3>
<ul class="blog-author">
<li><a href="#."><i class="fa fa-user"></i>By Victor</a></li>
<li><a href="#."><i class="fa fa-comment-o"></i>Leave A Comment</a></li>
<li><a href="#."><i class="fa fa-clock-o"></i>September 3, 2016</a></li>
</ul>
<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
</div> -->