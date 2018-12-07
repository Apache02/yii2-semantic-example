<?php

/* @var $this yii\web\View */



use app\widgets\ExampleView;
use app\widgets\ExampleDataVar;

$this->title = 'Breadcrumbs';

?>


<?php

$items = [
	[
		'label'		=> 'Mails',
		'url'		=> '#',
		'icon'		=> 'mail',
	],
	'New mail from support'
];

?>

<div class="ui vertical very padded segment">
	<h2 class="ui header">Items code</h2>
	<?= ExampleDataVar::widget([
		'varName' => 'items',
		'data' => $items,
	]) ?>
</div>


<div class="ui vertical very padded segment">
	<h2 class="ui header">Example #01 (default)</h2>
	<p class="ui text">Home link created automaticly.</p>
	<?= ExampleView::widget([
		'viewFile'	=> 'example_01',
		'viewData'	=> ['items' => $items],
		'tabHtml'	=> true,
	]) ?>
</div>


<div class="ui vertical very padded segment">
	<h2 class="ui header">Example #02 (customized)</h2>
	<?= ExampleView::widget([
		'viewFile'	=> 'example_02_customized',
		'viewData'	=> ['items' => $items],
		'tabHtml'	=> true,
	]) ?>
</div>


