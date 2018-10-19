<?php

namespace app\controllers;

use yii\web\Controller;


class PagesController extends Controller
{
	public function actions ()
	{
		return [
			'index'		=> [
				'class'		=> '\yii\web\ViewAction',
				'viewPrefix'=> '',
				'viewParam'	=> 'id',
			],
		];
	}
}
