<div class="box box-primary artikel-form">
    <div class="box-header with-border">
        <h3 class="box-title">Form artikel</h3>
    </div>
    <div class="box-body">

    <?= \kato\DropZone::widget([
       'options' => [
       		'url' => 'index.php?r=galeri-artikel/upload',
        	'maxFilesize' => '2',
       ],
       'clientEvents' => [
           'complete' => "function(file){console.log(file)}",
           'removedfile' => "function(file){alert(file.name + ' is removed')}"
       ],
	]); ?>

    </div>
    <div class="box-footer with-border form-group">

    </div>
</div>