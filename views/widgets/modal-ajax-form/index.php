<?php

/* @var $this yii\web\View */


use app\widgets\ExampleView;

$this->title = 'ModalAjaxForm';

?>

<div class="ui vertical text segment">
	ModalAjaxForm - modal window, loaded by AJAX. Use it when you want to edit item in the same page.
</div>


<div class="ui vertical segment">
	<h2 class="ui header">Form example</h2>
<?= ExampleView::widget([
	'viewFile'	=> '../form_example',
	'tabView'	=> false,
]) ?>
</div> 

<div class="ui vertical segment">
	<h2 class="ui header">ModalAjaxForm</h2>
<?= ExampleView::widget([
	'viewFile'	=> 'example_01',
	'tabHtml'	=> true,
]) ?>
</div> 

