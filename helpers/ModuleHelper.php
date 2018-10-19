<?php

namespace app\helpers;

use yii\helpers\Inflector;


class ModuleHelper
{
	public static function getControllersList ( $module )
	{
		$controllerPath = $module->getControllerPath();
		
		$list = [];
		
		if ( is_dir($controllerPath) ) {
			$iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($controllerPath, \RecursiveDirectoryIterator::KEY_AS_PATHNAME));
			$iterator = new \RegexIterator($iterator, '/(.*)Controller\.php$/', \RecursiveRegexIterator::GET_MATCH);
			foreach ( $iterator as $matches ) {
				$file = $matches[0];
				$name = basename($matches[1]);
				$class = $module->controllerNamespace . '\\' . substr(basename($file), 0, -4);
				$id = Inflector::camel2id($name);
				$list[$id] = [
					'id' => $id,
					'class' => $class,
					'file' => $matches[0],
				];
			}
		}
		
		return $list;
	}
	
	public static function buildModuleMapMenu ( $module )
	{
		$len = strlen($module->controllerNamespace);
		return array_filter(array_map(function ( $item ) use ( $module, $len ) {
			$controllerClass = $item['class'];
			if ( !class_exists($controllerClass) ) {
				return null;
			}
			// find actions
			$class = new \ReflectionClass($controllerClass);
			$list = $class->getMethods(\ReflectionMethod::IS_PUBLIC);
			$list = array_filter(array_map(function ( $refl ) {
				if ( !preg_match('/^action([A-Z].+)$/', $refl->name, $matches) ) {
					return null;
				}
				$name = $matches[1];
				return [
					'id' => Inflector::camel2id($name),
					'name' => $name,
				];
			}, $list));
			
			$controllerId = $item['id'];
			$url = '/' . $module->uniqueId . '/' . $controllerId;
			return [
				'label' => substr($item['class'], $len+1, -10),
				'url' => [$url],
				'items' => array_map(function ( $item ) use ( $controllerId ) {
					return [
						'label' => $item['name'],
						'url' => [$controllerId . '/' . $item['id']],
					];
				}, $list),
			];
		}, static::getControllersList( $module )));
	}
}
