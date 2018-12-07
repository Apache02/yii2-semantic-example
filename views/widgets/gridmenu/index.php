<?php

/* @var $this yii\web\View */



use yii\helpers\Html;
use app\widgets\ExampleView;
use app\widgets\ExampleDataVar;
use semantic\Semantic;

$this->title = 'GridColumnsMenu';


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

<div class="ui vertical very padded segment">
	<h2 class="ui header">Items code</h2>
	<?= ExampleDataVar::widget([
		'varName' => 'menu',
		'data' => $menu,
	]) ?>
</div>


<div class="ui vertical very padded segment">
	<h2 class="ui header">Example #1 (layout footer)</h2>
<?= ExampleView::widget([
	'viewFile'	=> 'example_01',
	'viewData'	=> ['menu' => $menu],
	'tabHtml'	=> true,
]) ?>
</div>
