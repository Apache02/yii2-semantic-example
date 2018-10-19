<?php

namespace app\assets;

use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
	public $sourcePath = __DIR__ . '/assets';
 	public $css = [
		'style.css',
	];
	public $js = [
	];
	public $depends = [
		'semantic\AssetBundle',
	];
}
