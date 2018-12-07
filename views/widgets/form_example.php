<?php

/* @var $model ExampleForm */

use semantic\ActiveForm;
use semantic\Semantic;
use semantic\DropDownInput;

?>

<div class="ui basic segment">

	<?php $form = ActiveForm::begin([]); ?>

	<?= $form->field($model, 'name', ['icon'=>'user', 'enableLabel'=>true])
			->textInput(['autofocus'=>true, 'placeholder'=>true])
	?>
	
	<?= $form->field($model, 'email', ['icon'=>'mail'])->textInput(['type'=>'email', 'placeholder'=>true]) ?>
	
	<?= $form->field($model, 'check')->checkbox(['class'=>'toggle', 'value'=>1]) ?>
	<?= $form->field($model, 'check')->checkbox(['class'=>'checkbox', 'label'=>'Custom label']) ?>
	
	<?= $form->field($model, 'text', ['enableLabel'=>true])->textarea() ?>
	
	<?= $form->errors($model) ?>
	
	<?php ActiveForm::end(); ?>

</div>
