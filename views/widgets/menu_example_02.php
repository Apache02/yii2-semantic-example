<?php

use semantic\Menu;

?>

<?= Menu::widget([
	'items'		=> [
		[
			'label'		=> 'test',
			'icon'		=> 'home',
		],
		[
			'label'		=> 'Menu',
			'icon'		=> 'sidebar',
			'items'		=> $menu,
		],
		[
			'html'	=> Menu::widget([
				'options'	=> ['class'=>'right menu'],
				'items'		=> $menu,
			]),
		],
	],
	'options'	=> ['class'=>'ui inverted teal menu'],
]) ?>
