<?php

use yii\helpers\Html;
use app\helpers\ModuleHelper;
use semantic\LinksTree;


$this->title = 'Home';

$menu = ModuleHelper::buildModuleMapMenu($this->context->module);

?>

<h1>Sitemap</h1>


<?= LinksTree::widget(['items' => $menu, 'id'=>'module-map']) ?>

<style type="text/css">
#module-map ul {
	padding-left: 2rem;
}
</style>