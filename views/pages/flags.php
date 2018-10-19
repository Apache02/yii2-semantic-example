<?php

$this->title = 'Flags';

$list = require(Yii::getAlias('@semantic/data/flags.php'));

?>
<h1>Flags (<code id="count"></code>)</h1>

<div class="ui icons list" id="list">
</div>


<script type="text/javascript">
var list = <?= json_encode($list) ?>;

function append ( tag, obj )
{
	if ( obj instanceof Array ) {
		obj.forEach(tag.appendChild.bind(tag));
	} else {
		tag.appendChild(obj);
	}
}
function tag ( descr )
{
	var tagName = descr[0];
	if ( typeof tagName == 'object' ) {
		return descr.map(tag);
	}
	var className = descr[1] || false;
	var content = descr[2] || false;
	var _tag = document.createElement(tagName);
	
	if ( className ) {
		_tag.setAttribute('class', className);
	}
	if ( content ) {
		switch ( typeof content ) {
			case 'string':
			case 'number':
				_tag.textContent = content;
				break;
			case 'object':
				append(_tag, tag(content));
				break;
		}
	}
	return _tag;
}

function createTagItem ( className )
{
	return tag(['div', 'item', [
		['i', 'flag '+className],
		['span', '', className],
	]]);
}

append(document.getElementById('list'), list.map(createTagItem));
document.getElementById('count').textContent = list.length;

</script>


<style type="text/css">
#list {
	padding: 0;
	margin: 0;
}
#list .item {
	display: inline-block;
	margin: .5rem 0;
	min-width: 12rem;
	width: 25%;
}
</style>