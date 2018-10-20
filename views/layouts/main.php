<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use semantic\Menu;
use semantic\GridColumnsMenu;
use app\assets\AppAsset;


$asset = AppAsset::register($this);

$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => $asset->baseUrl . '/favicon.ico']);

$menu = [
	'logo'		=> [
		'content'	=> '<div class="ui image logo">'
			. Html::img($asset->baseUrl.'/logo.png', ['title'=>Yii::$app->name])
			. '</div> &nbsp; Semantic',
		'url'		=> ['/' . $this->context->module->uniqueId],
		'options'	=> ['class'=>'header'],
	],
	
	'basic'		=> [
		'label'		=> 'Basic',
		'items'		=> [
			'index'		=> [
				'label'		=> 'Index page',
				'icon'		=> 'home',
				'url'		=> ['pages/index'],
			],
			'sandboxes'	=> [
				'label'		=> 'Sandboxes',
				'icon'		=> 'check square outline',
				'items'		=> [
					'table'		=> [
						'label'		=> 'Table',
						'icon'		=> 'table',
						'url'		=> ['pages/index', 'id'=>'table'],
					],
					'menu'		=> [
						'label'		=> 'Menu',
						'icon'		=> 'sidebar',
						'url'		=> ['pages/index', 'id'=>'menu'],
					],
				],
			],
			'divider',
			'icons'		=> [
				'label'		=> 'Icons',
				'icon'		=> 'smile',
				'url'		=> ['pages/index', 'id'=>'icons'],
			],
			'flags'		=> [
				'label'		=> 'Flags',
				'icon'		=> 'flag',
				'url'		=> ['pages/index', 'id'=>'flags'],
			],
		],
	],
	'widgets'	=> [
		'label'		=> 'Widgets',
		'items'		=> [
			[
				'label'		=> 'Breadcrumbs',
				'icon'		=> 'cube',
				'url'		=> ['widgets/breadcrumbs'],
			],
			'menu'		=> [
				'label'		=> 'Menu',
				'icon'		=> 'sidebar',
				'url'		=> ['widgets/menu'],
			],
			'af'		=> [
				'label'		=> 'ActiveForm',
				'icon'		=> 'wpforms',
				'url'		=> ['widgets/active-form'],
			],
			'grid'		=> [
				'label'		=> 'GridView',
				'icon'		=> 'table',
				'url'		=> ['widgets/grid'],
			],
		],
	],
];

$title = Html::encode(strtr('{page} | {app}', [
	'{page}'	=> $this->title ? $this->title : 'Undefined page',
	'{app}'		=> Yii::$app->name,
]));

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<?php $this->head() ?>

	<title><?= $title ?></title>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
	
	<?= Menu::widget([
		'id' => 'topmenu',
		'items' => $menu,
		'options' => ['class'=>'ui large menu'],
		'container' => true,
	]) ?>

	<div class="ui main vertical segment">
		<div class="ui container" id="content">
			<?= $content ?>
		</div>
	</div>
	
<?= $this->render('//layouts/_foot') ?>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
