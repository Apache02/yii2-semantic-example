<?php

use semantic\Menu;


$this->title = 'Menu';


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

<h1><?= $this->title ?></h1>

<div class="ui segment">
	
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