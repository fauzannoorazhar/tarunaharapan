<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */


$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary <?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">
    <div class="box-header with-border">
        <h1 class="box-title">Detail <?= StringHelper::basename($generator->modelClass)." <?= " ?>Html::encode($this->title) ?></h1>
    </div>
    <div class="box-body">

    <?= "<?= " ?>DetailView::widget([
        'model' => $model,
        'attributes' => [
<?php
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        echo "            '" . $name . "',\n";
    }
} else {
    foreach ($generator->getTableSchema()->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
    }
}
?>
        ],
    ]) ?>
        
    </div>
    <div class="box-footer with-border">
        <p>
            <?= "<?= " ?>Html::a(<?= $generator->generateString('Sunting') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary btn-flat']) ?>
            <?= "<?= " ?>Html::a(<?= $generator->generateString('Hapus') ?>, ['delete', <?= $urlParams ?>], [
                'class' => 'btn btn-danger btn-flat',
                'data' => [
                    'confirm' => <?= $generator->generateString('Yakin Akan Menghapus Data?') ?>,
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>

</div>
