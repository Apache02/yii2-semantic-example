<?php

/* @var $items array */

use semantic\Breadcrumbs;
use semantic\Semantic;


?>

<?= Breadcrumbs::widget([
	'links' => $items,
	'tag' => 'h3',
	'size' => 'big',
	'divider' => Semantic::icon('green arrow right divider'),
]) ?>