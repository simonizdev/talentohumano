<?php

class HcoMedController extends Controller
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
				'actions'=>array('create','update', 'exportpdf'),
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
		$model=new HcoMed;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$tipo_examen= Yii::app()->db->createCommand('SELECT d.Id_Dominio_Medico, d.Dominio FROM TH_DOMINIO_MEDICO d WHERE Id_Padre = '.Yii::app()->params->tipo_examen.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$concepto= Yii::app()->db->createCommand('SELECT d.Id_Dominio_Medico, d.Dominio FROM TH_DOMINIO_MEDICO d WHERE Id_Padre = '.Yii::app()->params->concepto.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$funciones_p= Yii::app()->db->createCommand('SELECT d.Id_Dominio_Medico, d.Dominio FROM TH_DOMINIO_MEDICO d WHERE Id_Padre = '.Yii::app()->params->funciones_principales.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$tipo_riesgo= Yii::app()->db->createCommand('SELECT d.Id_Dominio_Medico, d.Dominio FROM TH_DOMINIO_MEDICO d WHERE Id_Padre = '.Yii::app()->params->tipo_riesgo.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$concepto_egreso= Yii::app()->db->createCommand('SELECT d.Id_Dominio_Medico, d.Dominio FROM TH_DOMINIO_MEDICO d WHERE Id_Padre = '.Yii::app()->params->concepto_egreso.' AND Estado = 1 ORDER BY d.Dominio')->queryAll(); 

		$piezas_dent= Yii::app()->db->createCommand('SELECT d.Id_Dominio_Medico, d.Dominio FROM TH_DOMINIO_MEDICO d WHERE Id_Padre = '.Yii::app()->params->piezas_dent.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$estado_piezas_dent= Yii::app()->db->createCommand('SELECT d.Id_Dominio_Medico, d.Dominio FROM TH_DOMINIO_MEDICO d WHERE Id_Padre = '.Yii::app()->params->estado_piezas_dent.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		if(isset($_POST['HcoMed']))
		{
			$model->attributes=$_POST['HcoMed'];
		
            $model->Id_Empleado = $e;
			$model->Id_Contrato = UtilidadesEmpleado::contratoactualempleado($e);
			$model->Id_Usuario_Creacion = Yii::app()->user->getState('id_user');
			$model->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
			$model->Fecha_Creacion = date('Y-m-d H:i:s');
			$model->Fecha_Actualizacion = date('Y-m-d H:i:s');
 
            if($model->save()){
                $this->redirect(array('empleado/viewmed','id'=>$e));
            }
		}

		$this->render('create',array(
			'model' => $model,
			'e'=> $e,
			'tipo_examen' => $tipo_examen,
			'concepto' => $concepto,
			'funciones_p' => $funciones_p,
			'tipo_riesgo' => $tipo_riesgo,
			'concepto_egreso' => $concepto_egreso,
			'piezas_dent' => $piezas_dent,
			'estado_piezas_dent' => $estado_piezas_dent,
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

		if(isset($_POST['HcoMed']))
		{
			$model->attributes=$_POST['HcoMed'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id_Hco));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('HcoMed');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new HcoMed('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['HcoMed']))
			$model->attributes=$_GET['HcoMed'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return HcoMed the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=HcoMed::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param HcoMed $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='hco-med-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionExportPdf($id)
	{		
		$this->renderPartial('export_pdf',array('id' => $id));	
	}
}
