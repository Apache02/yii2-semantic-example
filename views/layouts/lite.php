<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use semantic\Menu;
use semantic\GridColumnsMenu;
use app\assets\AppAsset;


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
	
	<div class="ui main vertical segment">
		<div class="ui container" id="content">
			<?= $content ?>
		</div>
	</div>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
