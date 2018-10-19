<?php

use semantic\Menu;

$menu['search'] = [
	'html'	=> Menu::widget([
		'options'	=> ['class'=>'right menu'],
		'items'		=> [
			[
				'label'	=> 'Filters',
				'icon'	=> 'filter',
				'items'	=> [
					[
						'label'		=> 'Status = active',
					],
					[
						'label'		=> 'Status = not active',
					],
				],
			],
			'<div class="ui transparent icon input">'
				. '<input type="text" placeholder="Search">'
				. '<i class="search link icon"></i>'
			. '</div>'
		],
	]),
];

?>

<?= Menu::widget([
	'items'		=> $menu,
]) ?>
