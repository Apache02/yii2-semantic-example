<?php

namespace app\widgets;

use yii\helpers\Html;
use yii\base\Exception;
use semantic\Semantic;
use semantic\Widget;
use nezhelskoy\highlight\HighlightAsset;



class Example extends Widget
{
	public $viewData = [];
	public $options = ['class' => 'example'];
	public $tabs = [];
	
	public function run ()
	{
		$content = $this->renderTabs($this->tabs);
		
		$options = $this->options;
		$options['id'] = $this->id;
		
		echo Html::tag('div', $content, $options);
		
		$this->getView()->registerJs("$('#{$this->id} .item').tab();");
	}
	
	public function renderTabs ( $tabs )
	{
		// prepare tabs indexes
		$index = 0;
		$activate = true;
		foreach ( $tabs as &$tab ) {
			if ( !empty($tab['active']) ) {
				$activate = false;
			} else {
				$tab['active'] = false;
			}
			$tab['index'] = $index ++;
		}
		if ( $activate ) {
			// activate first tab
			foreach ( $tabs as &$tab ) {
				$tab['active'] = true;
				break;
			}
		}
		
		$content = implode(array_map([$this, 'renderTabsMenuItem'], $tabs));
		return Html::tag('div', $content, ['class' => 'ui top attached tabular menu'])
			. implode(array_map([$this, 'renderTabsContentItem'],  $tabs));
	}
	
	public function renderTabsMenuItem ( $item )
	{
		$options = [
			'class'		=> 'item',
			'data-tab'	=> $this->resolveDataTab($item['index']),
		];
		if ( !empty($item['active']) ) {
			Html::addCssClass($options, 'active');
		}
		$content = Html::encode($item['label']);
		if ( !empty($item['icon']) ) {
			$content = Semantic::icon($item['icon']) . ' ' . $content;
		}
		return Html::tag('div', $content, $options);
	}
	
	public function renderTabsContentItem ( $item )
	{
		$options = [
			'class'		=> 'ui bottom attached tab segment',
			'data-tab'	=> $this->resolveDataTab($item['index']),
		];
		if ( !empty($item['active']) ) {
			Html::addCssClass($options, 'active');
		}
		if ( isset($item['cssClass']) ) {
			$cssClass = $item['cssClass'];
			Html::addCssClass($options, $cssClass);
			if ( $cssClass == 'code php' ) {
				$view = $this->getView();
				HighlightAsset::register($view);
				$view->registerJs("$('#{$this->id} .code pre').each(function (i, block) {hljs.highlightBlock(block);});");
			}
		}
		$content = $item['content'];
		return Html::tag('div', $content, $options);
	}
	
	
	public function resolveDataTab ( $index )
	{
		return $this->id . '_' . $index;
	}
}
