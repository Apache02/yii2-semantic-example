<?php

/* @var $this yii\web\View */


use app\widgets\ExampleView;

$this->title = 'ActiveForm';

?>


<div class="ui vertical segment">
	<h2 class="ui header">ActiveForm example</h2>
<?= ExampleView::widget([
	'viewFile'	=> 'active-form_example_01',
	'viewData'	=> ['model' => new \app\models\ExampleForm()],
	'tabHtml'	=> true,
]) ?>
</div>

<div class="ui vertical segment">
	<h2 class="ui header">One more ActiveForm example</h2>
<?= ExampleView::widget([
	'viewFile'	=> 'active-form_example_02',
	'viewData'	=> ['model' => new \app\models\ExampleForm2()],
	'tabHtml'	=> true,
]) ?>
</div>
