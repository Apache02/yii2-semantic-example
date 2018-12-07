<?php

namespace app\widgets;

use yii\helpers\Html;
use yii\base\Exception;
use app\widgets\Example;


class ExampleView extends Example
{
	public $viewFile = null;
	public $viewData = [];
	public $tabHtml = false;
	public $tabView = true;
	public $tabPHP = true;
	
	
	public function run ()
	{
		if ( is_null($this->viewFile) ) {
			throw new Exception('Attribute "viewFile" is not defined');
		}
		
		$view = $this->getView();
		$filePath = dirname($view->getViewFile())
			. DIRECTORY_SEPARATOR . $this->viewFile
			. '.' . $view->defaultExtension;
		
		if ( !is_file($filePath) ) {
			throw new Exception('File path "'.$filePath.'" is not found');
		}
		
		$srcHtml = '<pre>'
			. Html::encode(file_get_contents($filePath))
			. '</pre>';
		
		$this->tabs = [];
		
		if ( $this->tabView || $this->tabHtml ) {
			$viewHtml = $view->renderFile($filePath, $this->viewData);
		}
		
		if ( $this->tabView ) {
			$this->tabs[] = [
				'label'		=> 'View',
				'icon'		=> 'eye',
				'content'	=> $viewHtml,
			];
		}
		
		if ( $this->tabPHP ) {
			$this->tabs[] = [
				'label'		=> 'PHP',
				'icon'		=> 'code',
				'content'	=> $srcHtml,
				'cssClass'	=> 'code php',
			];
		}
		
		if ( $this->tabHtml ) {
			$this->tabs[] = [
				'label'		=> 'HTML',
				'icon'		=> 'code',
				'content'	=> '<pre>'
					. Html::encode($viewHtml)
					. '</pre>',
				'cssClass'	=> 'code html',
			];
		}
		
		parent::run();
	}
	
}
