<?php

/* @var $model ExampleForm */

use semantic\ActiveForm;
use semantic\Semantic;
use semantic\DropDownInput;
use semantic\TelInput;

$form = ActiveForm::begin([]);

?>

<div class="ui basic segment">

	<?= $form->field($model, 'name', ['icon'=>'user', 'enableLabel'=>true])
			->textInput(['autofocus'=>true, 'placeholder'=>true])
	?>
	

	<?= $form->field($model, 'email', ['icon'=>'mail'])->textInput(['type'=>'email', 'placeholder'=>true]) ?>
	
	<?= $form->field($model, 'check')->checkbox(['class'=>'toggle', 'value'=>1]) ?>
	<?= $form->field($model, 'check')->checkbox(['class'=>'checkbox', 'label'=>'Custom label']) ?>
	
	<?= $form->field($model, 'text', ['enableLabel'=>true])->textarea() ?>
	
	<?= $form->field($model, 'status', ['enableLabel'=>true])->dropDownList($model::statusLabels()) ?>
	<?= $form->field($model, 'status2', ['enableLabel'=>true])->dropDownListEx($model::statusLabels()) ?>
	<?= $form->field($model, 'country', ['enableLabel'=>true])
		->widget(DropDownInput::class, [
			'items' => Semantic::dataCountryList($model::countryList()),
			'options' => ['placeholder'=>'Select country...'],
		])
	?>
	<?= $form->field($model, 'phone', ['enableLabel'=>true])
		->widget(TelInput::class, ['defaultCountry'=>'','list'=>array_keys($model::countryList())])
	?>
	
	<?= $form->errors($model) ?>
	
	<?= $form->message(
		'<i class="icon users"></i><div class="content"><div class="header">Hello!</div><p>Closeable <code class="ui label">info</code> message example</p></div>',
		'icon info', ['closeable'=>true]
	) ?>
	
	<div class="ui divider"></div>
	
	<?= $form->button('Save', 'primary submit', ['icon'=>'save']) ?>

</div>


<?php
ActiveForm::end();
?>
