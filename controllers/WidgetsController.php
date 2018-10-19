<?php

namespace app\controllers;

use yii\web\Controller;


class WidgetsController extends Controller
{
	
	public function actionMenu ()
	{
		return $this->render('menu', []);
	}
	
	public function actionActiveForm ()
	{
		return $this->render('active-form', []);
	}
	
	public function actionGrid ()
	{
		return $this->render('grid', []);
	}
}
