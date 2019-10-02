<?php

class SoporteMedController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($e)
	{
		$model=new SoporteMed;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SoporteMed']))
		{
			$rnd = rand(0,99999);  // genera un numero ramdom entre 0-99999
            $model->attributes=$_POST['SoporteMed'];
 			
        	$modeloempleado = Empleado::model()->findByPk($e);

            $model->Id_Empleado = $e;
			$model->Id_Contrato = UtilidadesEmpleado::contratoactualempleado($e);
			$model->Id_Usuario_Creacion = Yii::app()->user->getState('id_user');
			$model->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
			$model->Fecha_Creacion = date('Y-m-d H:i:s');
			$model->Fecha_Actualizacion = date('Y-m-d H:i:s');

            $soporte_subido = CUploadedFile::getInstance($model,'Soporte');
            $nombre_archivo = "{$modeloempleado->Identificacion}-{$rnd}-{$soporte_subido}"; 
            $model->Soporte = $nombre_archivo;
 
            if($model->save()){
                $soporte_subido->saveAs(Yii::app()->basePath.'/../images/soporte_medico/'.$nombre_archivo); 
                $this->redirect(array('empleado/viewmed','id'=>$e));
            }
		}

		$this->render('create',array(
			'model'=>$model,
			'e'=>$e,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SoporteMed']))
		{
			$model->attributes=$_POST['SoporteMed'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id_Soporte));
		}

		$this->render('update',array(
			'model'=>$model,
			'e'=>$model->Id_Empleado,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SoporteMed');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SoporteMed('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SoporteMed']))
			$model->attributes=$_GET['SoporteMed'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SoporteMed the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SoporteMed::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SoporteMed $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='soporte-med-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
