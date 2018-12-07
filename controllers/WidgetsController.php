<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


class WidgetsController extends Controller
{
	
	public function actionSingleFormExample ()
	{
		$request = Yii::$app->request;
		if ( $request->isPost ) {
			return $this->redirect($request->referrer);
		}
		if ( $request->isAjax ) {
			$this->layout = 'lite';
		}
		return $this->render('form_example', [
			'model' => new \app\models\ExampleForm(),
		]);
	}
	
	public function actionBreadcrumbs ()
	{
		return $this->render('breadcrumbs/index');
	}
	
	public function actionMenu ()
	{
		return $this->render('menu/index');
	}
	
	public function actionActiveForm ()
	{
		return $this->render('active-form/index');
	}
	
	public function actionGrid ()
	{
		return $this->render('grid/index');
	}
	
	public function actionGridMenu ()
	{
		return $this->render('gridmenu/index');
	}
	
	public function actionModalAjaxForm ()
	{
		return $this->render('modal-ajax-form/index');
	}
	
}
