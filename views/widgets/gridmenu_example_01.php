<?php

use semantic\GridColumnsMenu;

?>

<?= GridColumnsMenu::widget([
	'type' => ['equal height', 'divided', 'stackable'],
	'items'	=> $menu,
]) ?>
