<?php

/* @var $this yii\web\View */



use semantic\Menu;
use app\widgets\Example;
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

$menuSrc = var_export($menu, true);
$menuSrc = preg_replace('/\=\>\s*\n\s*array/', '=> array', $menuSrc);
$menuSrc = str_replace(['array (', ')'], ['[', ']'], $menuSrc);
$menuSrc = str_replace('  ', "\t", $menuSrc);
$menuSrc = '$menu = ' . $menuSrc . ';';

?>

<div class="ui vertical segment">
	<h2 class="ui header">Example menu code</h2>
<?= Example::widget([
		'tabs'	=> [[
			'label'		=> 'PHP',
			'icon'		=> 'code',
			'cssClass'	=> 'code php',
			'content'	=> '<pre>'
				. $menuSrc
				. '</pre>',
		]],
	]) ?>
</div>


<div class="ui vertical segment">
	<h2 class="ui header">Simple menu</h2>
<?= ExampleView::widget([
	'viewFile'	=> 'menu_example_01',
	'viewData'	=> ['menu' => $menu],
]) ?>
</div>


<div class="ui vertical segment">
	<h2 class="ui header">Inverted blue menu</h2>
<?= ExampleView::widget([
	'viewFile'	=> 'menu_example_01_inverted_blue',
	'viewData'	=> ['menu' => $menu],
]) ?>
</div>


<div class="ui vertical segment">
	<h2 class="ui header">Menu inside menu</h2>
<?= ExampleView::widget([
	'viewFile'	=> 'menu_example_02',
	'viewData'	=> ['menu' => $menu],
]) ?>
</div>


<div class="ui vertical segment">
	<h2 class="ui header">Search</h2>
<?= ExampleView::widget([
	'viewFile'	=> 'menu_example_03_search',
	'viewData'	=> ['menu' => $menu],
]) ?>
<?= ExampleView::widget([
	'viewFile'	=> 'menu_example_03_search_filters',
	'viewData'	=> ['menu' => $menu],
]) ?>
</div>


<div class="ui vertical segment">
	<h2>All classes</h2>
	
	<div id="classes" class="ui segment equal width grid"></div>
	<code id="status"></code>
	
<?= Menu::widget([
	'items'	=> $menu,
	'id'	=> 'target',
]) ?>
</div>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {
jQuery(function ($) {
	var $target = $('#target');
	var $status = $('#status');
	var $list = $('#classes');
	var list = [
		['attached', 'compact', 'stackable', 'vertical', 'pagination', 'fluid', 'four item'],
		['top fixed', 'bottom fixed', 'left fixed', 'right fixed'],
		['secondary', 'tabular', 'pointing', 'text', 'labeled', 'icon', 'fitted', 'borderless'],
		['mini', 'tiny', 'small', 'large', 'huge', 'massive'],
		['inverted', 'red', 'green', 'blue', 'pink', 'teal', 'olive'],
	];
	function update ()
	{
		var className = ['ui'];
		$list.find('input[type="checkbox"]').each(function () {
			var $this = $(this);
			$this.is(':checked') && className.push($this.val());
		});
		className.push('menu');
		className = className.join(' ');
		$target.attr('class', className);
		$status.text(className);
	}
	for ( var i=0; i<list.length; i++ ) {
		var $column = $('<div class="column"></div>');
		for ( var j=0; j<list[i].length; j++ ) {
			var className = list[i][j];
			var $cb = $('<input type="checkbox" value="'+className+'" />');
			$column.append(
				$('<div />').append($('<label/>').append($cb).append(' '+className))
			);
			$cb.on('change', update);
			$cb.attr('checked', $target.attr('class').indexOf(className) >= 0);
		}
		$list.append($column);
	}
});
});
</script>