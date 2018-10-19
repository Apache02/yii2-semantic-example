<?php

$this->title = 'Tables';

?>

<h1><?= $this->title ?></h1>

<div class="ui segment">

	<div id="classes" class="ui segment equal width grid"></div>
	<code id="status"></code>

	<table class="ui basic table" id="target">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Symbol</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><div class="ui label ribbon">1</div></td>
				<td class="positive">Bitcoin</td>
				<td><div class="ui label">BTC</div></td>
				<td><div class="ui label green">Active</div></td>
			</tr>
			<tr>
				<td>2</td>
				<td class="negative">Etherium</td>
				<td><div class="ui label">ETH</div></td>
				<td><div class="ui label green">Active</div></td>
			</tr>
			<tr>
				<td>3</td>
				<td class="error">New Economy Movement</td>
				<td><div class="ui label">NEM</div> <div class="ui label">XEM</div></td>
				<td><div class="ui label green">Active</div></td>
			</tr>
			<tr>
				<td>4</td>
				<td class="warning">Warning</td>
				<td><div class="ui label">NEM</div> <div class="ui label">XEM</div></td>
				<td><div class="ui label green">Active</div></td>
			</tr>
			<tr class="disabled">
				<td>5</td>
				<td class="warning">YbCoin</td>
				<td><div class="ui label">YBC</div></td>
				<td><div class="ui label red">Disabled</div></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<th></th>
				<th>Footer</th>
				<th></th>
				<th><div class="ui label green">3</div> <div class="ui label red">1</div></th>
			</tr>
		</tfoot>
	</table>

</div>



<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {
	jQuery(function ($) {
		var $target = $('#target');
		var $status = $('#status');
		var $list = $('#classes');
		var list = [
			['unstackable', 'structured', 'collapsing', 'attached'],
			['celled', 'striped', 'basic', 'very basic'],
			['padded', 'very padded', 'compact', 'very compact'],
			['definition', 'fixed', 'selectable', 'sortable'],
			['small', 'large'],
			['inverted', 'red', 'green', 'blue', 'pink', 'teal', 'olive'],
		];
		function update ()
		{
			var className = ['ui'];
			$list.find('input[type="checkbox"]').each(function () {
				var $this = $(this);
				$this.is(':checked') && className.push($this.val());
			});
			className.push('table');
			className = className.join(' ');
			$target.attr('class', className);
			$status.text(className);
		}
		for ( var i=0; i<list.length; i++ ) {
			var $column = $('<div class="column"></div>');
			for ( var j=0; j<list[i].length; j++ ) {
				var className = list[i][j];
				var $cb = $('<input type="checkbox" value="'+className+'" />');
				$column.append(
					$('<div />').append($('<label/>').append($cb).append(' '+className))
				);
				$cb.on('change', update);
				$cb.attr('checked', $target.attr('class').indexOf(className) >= 0);
			}
			$list.append($column);
		}
	});
});
</script>
