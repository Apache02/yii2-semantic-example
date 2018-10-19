<?php

use semantic\Menu;

$menu['search'] = [
	'html'	=> '<div class="right item">'
			. '<div class="ui transparent icon input">'
				. '<input type="text" placeholder="Search">'
				. '<i class="search icon"></i>'
			. '</div>'
		. '</div>'
];

?>

<?= Menu::widget([
	'items'		=> $menu,
]) ?>
