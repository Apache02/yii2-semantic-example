<?php

/* @var $this yii\web\View */


use app\widgets\ExampleView;

$this->title = 'ActiveForm';

?>


<div class="ui vertical segment">
	<h2 class="ui header">ActiveForm example #01</h2>
<?= ExampleView::widget([
	'viewFile'	=> 'example_01',
	'viewData'	=> ['model' => new \app\models\ExampleForm()],
	'tabHtml'	=> true,
]) ?>
</div>

<div class="ui vertical segment">
	<h2 class="ui header">ActiveForm example #02</h2>
<?= ExampleView::widget([
	'viewFile'	=> 'example_02',
	'viewData'	=> ['model' => new \app\models\ExampleForm2()],
	'tabHtml'	=> true,
]) ?>
</div>
