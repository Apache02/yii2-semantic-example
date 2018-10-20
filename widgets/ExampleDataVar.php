<?php

namespace app\widgets;

use yii\helpers\Html;
use yii\base\Exception;
use app\widgets\Example;


class ExampleDataVar extends Example
{
	const SRC_TABS = 1;
	const SRC_SHORT_ARRAY = 2;
	
	public $varName = 'data';
	public $data = null;
	
	
	public static function varToPhp ( $var, $name, $flags = null )
	{
		if ( $flags === null ) {
			$flags = static::SRC_SHORT_ARRAY | static::SRC_TABS;
		}
		$src = var_export($var, true);
		$src = preg_replace('/\=\>\s*\n\s*array/', '=> array', $src);
		$src = preg_replace('/\d+\s=>\s/', '', $src);
		if ( $flags & static::SRC_SHORT_ARRAY ) {
			$src = str_replace(['array (', ')'], ['[', ']'], $src);
		}
		if ( $flags & static::SRC_TABS ) {
			$src = str_replace('  ', "\t", $src);
		}
		return '$'.$name.' = ' . $src . ';';
	}
	
	private function checkOptions ()
	{
		if ( is_null($this->data) ) {
			throw new Exception('Attribute "data" is not defined.');
		}
	}
	
	public function init ()
	{
		parent::init();
		$this->checkOptions();
	}
	
	public function run ()
	{
		$src = $this::varToPhp($this->data, $this->varName);
		$this->tabs = [[
			'label'		=> 'PHP',
			'icon'		=> 'code',
			'cssClass'	=> 'code php',
			'content'	=> '<pre>' . $src . '</pre>',
		]];
		parent::run();
	}
	
}
