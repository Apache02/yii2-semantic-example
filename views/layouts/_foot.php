<?php

/* @var $this \yii\web\View */

use yii\helpers\Html;
use semantic\Semantic;
use semantic\GridColumnsMenu;


$menu = [
	'app' => [
		'header'		=> 'Application',
		'wide'			=> 3,
		'items'			=> [
			['label'=>'Home', 'url'=>['/']],
			['label'=>'About', 'url'=>['site/about']],
		],
	],
	'other' => [
		'header'		=> 'Links',
		'wide'			=> 3,
		'items'			=> [
			[
				'label'=>'GitHub',
				'icon'=>'inverted github',
				'url'=>'https://github.com/Apache02/yii2-semantic-example',
				'options'=>['target'=>'_blank'],
			]
		],
	],
	'about' => [
		'header'		=> 'About',
		'wide'			=> 10,
		'content'		=> implode([
			strtr('<div>Powered by <a href="{url}" target="_blank">Yii framework</a> v.{version}</div>', [
				'{url}'		=> 'https://www.yiiframework.com/',
				'{version}'	=> Yii::getVersion(),
			]),
			strtr('<div>Powered by <a href="{url}" target="_blank">Semantic UI</a> v.{version}</div>', [
				'{url}'		=> 'https://semantic-ui.com/',
				'{version}'	=> Semantic::getVersion(),
			]),
			'<div class="ui divider"></div>',
			strtr('<p>&copy; {appname} {year}</p>', [
				'{appname}'	=> Html::encode(Yii::$app->name),
				'{year}'	=> '2018',
			]),
		]),
	],
];


?>
	
<footer id="footer" class="ui vertical inverted very padded segment">
	<div class="ui container">
<?= GridColumnsMenu::widget([
	'type' => ['equal height', 'divided', 'stackable', 'inverted'],
	'items'	=> $menu,
]) ?>
	</div>
</footer>
