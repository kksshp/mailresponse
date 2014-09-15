<?php

class AdminController extends RController
{
	public $defaultAction = 'admin';
	
	
	private $_model;
	
	public function beforeAction($action) { 
		$this->layout = Helpdesk::module('helpdesk')->layout;
		return parent::beforeAction($action);
	}

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		 return array(
			'rights', // perform access control for CRUD operations
		    );
	}
	
	public function actionAdmin()
	{
		$model = new MailResponses();
		$this->render('index', array('model'=>$model));
	}
	
	public function actionCreate()
	{
		$model = new MailResponses;
		if(isset($_POST['MailResponses']))
		{
			$model->attributes = $_POST['MailResponses'];
			$this->performAjaxValidation($model);
			if($model->validate())
			{
				if($model->save(false))
				{
					$this->redirect(array('admin'));
					Yii::app()->end;
				}
			}
		}
		
		$this->render('create', array('model'=>$model));
	}
	
	public function actionUpdate($id = null)
	{
		$model =  MailResponses::model()->findByPk($id);
		if(isset($_POST['MailResponses']))
		{
			$model->attributes = $_POST['MailResponses'];
			if($model->validate())
			{
				if($model->save(false))
				{
					$this->redirect(array('//mailresponse/admin/admin'));die;
				}
			}
			
		}
		$this->render('update', array('model'=>$model));
	}
	public function actionView($id = null)
	{
		$model =  MailResponses::model()->findByPk($id);
		$this->render('view', array('model'=>$model));
	}
	
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']))
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}