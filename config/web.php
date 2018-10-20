<?php

$params = require __DIR__ . '/params.php';

$config = [
	'id' => 'basic',
	'name' => 'Yii2 Semantic Examples',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'sourceLanguage' => 'en',
	'language' => 'en',
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
	],
	'components' => [
		'request' => [
			'cookieValidationKey' => 'Luax8uz8tK3JOw8Fjj3_YarfYdbFwaqU',
		],
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [
			],
		],
		'i18n' => [
			'translations' => [
				'*' => [
					'class' => 'yii\i18n\PhpMessageSource',
					'basePath' => '@app/messages',
				],
			],
		], 
	],
	'params' => $params,
];

return $config;
