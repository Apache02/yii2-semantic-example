<?php

/* @var $model ExampleForm */

use semantic\ActiveForm;
use semantic\Semantic;
use semantic\DropDownInput;
use semantic\TelInput;

$form = ActiveForm::begin([]);

?>

<div class="ui basic segment">

	<div class="two fields">
		<?= $form->field($model, 'name', ['icon'=>'user'])
				->textInput(['autofocus'=>true, 'placeholder'=>true])
		?>
		<?= $form->field($model, 'email', ['icon'=>'mail'])->textInput(['type'=>'email', 'placeholder'=>true]) ?>
	</div>
	
	<?= $form->field($model, 'text', ['enableLabel'=>true])->textarea() ?>
	
	<div class="three fields">
		<?= $form->field($model, 'status')->dropDownList($model::statusLabels()) ?>
		<?= $form->field($model, 'status2')->dropDownListEx($model::statusLabels()) ?>
		<?= $form->field($model, 'country')
			->widget(DropDownInput::class, [
				'items' => Semantic::dataCountryList($model::countryList()),
				'options' => ['placeholder'=>'Select country...'],
			])
		?>
	</div>
	
	<?= $form->field($model, 'phone')->widget(TelInput::class) ?>
	
	<?= $form->errors($model) ?>
	
	<div class="ui divider"></div>
	
	<?= $form->button('Save', 'primary submit', ['icon'=>'save']) ?>

</div>


<?php
ActiveForm::end();
?>
