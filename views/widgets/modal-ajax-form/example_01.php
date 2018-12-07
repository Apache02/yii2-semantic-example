<?php

/* @var $this yii\web\View */


use yii\helpers\Html;
use semantic\ModalAjaxForm;
use semantic\Semantic;

$this->title = 'ModalAjaxForm';

?>

<div class="ui vertical segment">
	<?= Html::a(Semantic::icon('plus') . ' Create new item', ['single-form-example'], ['class' => 'ui primary button action-modal-form']) ?>
</div>

<?= ModalAjaxForm::widget([
	'actionSelector' => '.action-modal-form',
]) ?> 

