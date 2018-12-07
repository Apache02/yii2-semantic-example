<?php

/* @var $this yii\web\View */



use semantic\Menu;
use app\widgets\ExampleDataVar;
use app\widgets\ExampleView;

$this->title = 'Menu';

?>


<?php

$menu = [
	[
		'label'		=> 'Home',
		'url'		=> '/',
		'icon'		=> 'home',
		'active'	=> true,
	],
	[
		'label'		=> 'About',
		'url'		=> ['about'],
		'icon'		=> 'about',
	],
	[
		'label'		=> 'Contact',
		'url'		=> ['contact'],
		'icon'		=> 'mail',
	],
	[
		'label'		=> 'Dropdown',
		'items'		=> [
			[
				'label'		=> 'Item 1',
				'icon'		=> 'home',
			],
			[
				'label'		=> 'Item 2',
			],
			'divider',
			[
				'label'		=> 'Item 3',
			],
			[
				'label'		=> 'Item 3',
			],
		],
	],
];

?>

<div class="ui vertical very padded segment">
	<h2 class="ui header">Items code</h2>
	<?= ExampleDataVar::widget([
		'varName' => 'menu',
		'data' => $menu,
	]) ?>
</div>


<div class="ui vertical very padded segment">
	<h2 class="ui header">Simple menu</h2>
<?= ExampleView::widget([
	'viewFile'	=> 'example_01',
	'viewData'	=> ['menu' => $menu],
]) ?>
</div>


<div class="ui vertical very padded segment">
	<h2 class="ui header">Inverted blue menu</h2>
<?= ExampleView::widget([
	'viewFile'	=> 'example_01_inverted_blue',
	'viewData'	=> ['menu' => $menu],
]) ?>
</div>


<div class="ui vertical very padded segment">
	<h2 class="ui header">Menu inside menu</h2>
<?= ExampleView::widget([
	'viewFile'	=> 'example_02',
	'viewData'	=> ['menu' => $menu],
]) ?>
</div>


<div class="ui vertical very padded segment">
	<h2 class="ui header">Search</h2>
<?= ExampleView::widget([
	'viewFile'	=> 'example_03_search',
	'viewData'	=> ['menu' => $menu],
]) ?>
<?= ExampleView::widget([
	'viewFile'	=> 'example_03_search_filters',
	'viewData'	=> ['menu' => $menu],
]) ?>
</div>


