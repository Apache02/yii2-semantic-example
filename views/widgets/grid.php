<?php

/* @var $this yii\web\View */
/* @var $model ExampleForm */



use app\widgets\ExampleView;
use yii\data\ArrayDataProvider;

$this->title = 'GridView';


// rows data
$items = [
	[
		'id'		=> 1,
		'name'		=> 'Bitcoin',
		'symbol'	=> 'BTC',
		'amount'	=> rand(10, 10000),
		'status'	=> 1,
		'description' => "Hello,\nthis is description text for item #1",
		'type'		=> 1,
	],
	[
		'id'		=> 2,
		'name'		=> 'Etherium',
		'symbol'	=> 'ETH',
		'amount'	=> rand(10, 10000),
		'status'	=> 0,
		'type'		=> 2,
	],
	[
		'id'		=> 3,
		'name'		=> 'XRP',
		'symbol'	=> 'XRM',
		'amount'	=> rand(10, 10000),
		'status'	=> 0,
		'type'		=> 3,
	],
	[
		'id'		=> 4,
		'name'		=> 'New Economy Movement',
		'symbol'	=> 'XEM',
		'amount'	=> rand(10, 10000),
		'status'	=> 1,
		'type'		=> 3,
	],
	[
		'id'		=> 5,
		'name'		=> 'Bitcoin Cash',
		'symbol'	=> 'BCH',
		'amount'	=> rand(10, 10000),
		'status'	=> 0,
		'type'		=> 1,
	],
];
$dataProvider = new ArrayDataProvider([
	'allModels'		=> $items,
	'sort'			=> [
		'attributes'	=> ['id','name','symbol','amount','status'],
	],
	'pagination'	=> [
		'pageSize'		=> 10,
	],
]);


?>


<div class="ui vertical segment">
	<h2 class="ui header">Grid example</h2>
<?= ExampleView::widget([
	'viewFile'	=> 'grid_example_01',
	'viewData'	=> ['dataProvider' => $dataProvider],
	'tabHtml'	=> true,
]) ?>
</div>
