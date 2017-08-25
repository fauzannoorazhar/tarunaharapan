<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
$script = <<< JS
$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click(); }, 3000);
});
JS;
$this->registerJs($script);
?>

<?php Pjax::begin(); ?>
	<?= Html::a('<i class="fa fa-clock"></i> Time', ['site/dev'], ['class' => 'btn btn-md btn-primary', 'id' => 'refreshButton']) ?>
	<?= Html::a('<i class="fa fa-clock"></i> Date', ['site/date'], ['class' => 'btn btn-md btn-success', 'id' => 'refreshButton']) ?>
	<h1>Current time: <?= $time ?></h1>
<?php Pjax::end(); ?>
