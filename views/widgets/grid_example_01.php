<?php

/* @var $dataProvider yii\data\BaseDataProvider */

use semantic\grid\GridView;
use semantic\grid\PriceColumn;
use semantic\grid\BooleanColumn;
use semantic\grid\EnumColumn;
use semantic\Semantic;


$typeLabels = [
	0		=> '<div class="ui label">None</div>',
	1		=> '<div class="ui label green">Cryptocurrency</div>',
	2		=> '<div class="ui label orange">Token</div>',
	3		=> '<div class="ui label teal"><i class="icon money"></i>Fiat</div>',
];

?>

<?php

echo GridView::widget([
	'dataProvider'		=> $dataProvider,
	'columns'			=> [
		'id' => [
			'attribute'	=> 'id',
			'label'		=> '#',
		],
		'name' => [
			'attribute'	=> 'name',
			'label'		=> 'Name',
		],
		'description' => [
			'attribute'	=> 'description',
			'label'		=> 'Description',
			'format'	=> 'ntext',
		],
		'symbol' => [
			'attribute'	=> 'symbol',
			'label'		=> 'Symbol',
		],
		'amount' => [
			'attribute'	=> 'amount',
			'label'		=> 'Amount',
			'format'	=> ['decimal'],
		],
		// prices columns
		[
			'label'		=> 'USD',
			'value'		=> function ( $item ) {
				return $item['amount'] * (1/$item['id']);
			},
			'format'	=> ['currency', 'USD'],
		],
		[
			'class'		=> PriceColumn::class,
			'label'		=> 'BTC',
			'icon'		=> 'btc',
			'decimals'	=> 8,
			'value'		=> function ( $item ) {
				return ($item['amount'] * (1/$item['id'])) / 6000;
			},
		],
		
		'status' => [
			'attribute'	=> 'status',
			'label'		=> 'Active',
			'format'	=> 'boolean',
		],
		'status_' => [
			'class'		=> BooleanColumn::class,
			'attribute'	=> 'status',
			'label'		=> 'Active',
		],
		'type' => [
			'class'		=> EnumColumn::class,
			'attribute'	=> 'type',
			'label'		=> 'Type',
			'labels'	=> $typeLabels,
		],
	],
]);

?>