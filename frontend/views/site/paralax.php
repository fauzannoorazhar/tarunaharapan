<?php
use common\models\Siswa;
use ckarjun\owlcarousel\OwlCarouselWidget;
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

<?php OwlCarouselWidget::begin([
    'container' => 'div',
    'containerOptions' => [
        'id' => 'my-container-id',
        'class' => 'my-container-class'
    ],
    'pluginOptions' => [
        'autoPlay' => 3000,
        'items' => 4,
        'itemsDesktop' => [1199,3],
        'itemsDesktopSmall' => [979,3]
    ]
])?>

<div class="my-item-class"><img src="my-image-1" alt="My Image"></div>
<div class="my-item-class"><img src="my-image-2" alt="My Image"></div>
<div class="my-item-class"><img src="my-image-3" alt="My Image"></div>
<div class="my-item-class"><img src="my-image-4" alt="My Image"></div>


<?php OwlCarouselWidget::end(); ?>