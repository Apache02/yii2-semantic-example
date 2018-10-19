<?php

$this->title = 'Icons';

$list = require(Yii::getAlias('@semantic/data/icons.php'));

?>
<h1>Icons (<code id="count"></code>)</h1>

<div class="ui icons list grid four columns" id="list">
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
		['i', 'icon '+className],
		['div', 'content', ['div', 'ui label', className]],
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
#list i.icon {
	font-size: 24px;
	width: 32px;
	height: 32px;
}
#list .item {
	display: inline-block;
	margin: .5rem .5rem .5rem 0;
	padding: .5rem;
	min-width: 12rem;
	width: 24%;
	border-bottom: 2px solid #555;
}
#list .item:hover {
	border-bottom-color: #00B5AD;
}
</style>