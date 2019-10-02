<?php

class ElementoEmpleadoController extends Controller
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
				'actions'=>array('create','update','asignacion','entrega','devolucion'),
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
	public function actionCreate()
	{
		$model=new ElementoEmpleado;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ElementoEmpleado']))
		{
			$model->attributes=$_POST['ElementoEmpleado'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id_Elemento_Emp));
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['ElementoEmpleado']))
		{
			$model->attributes=$_POST['ElementoEmpleado'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id_Elemento_Emp));
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
		$dataProvider=new CActiveDataProvider('ElementoEmpleado');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ElementoEmpleado('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ElementoEmpleado']))
			$model->attributes=$_GET['ElementoEmpleado'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ElementoEmpleado the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ElementoEmpleado::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ElementoEmpleado $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='elemento-empleado-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAsignacion($e)
	{
		$model=new ElementoEmpleado;

		$model->scenario = 'elementos';

		$query_contrato= Yii::app()->db->createCommand('SELECT TOP 1 Id_Contrato, Id_Unidad_Gerencia, Id_Area, Id_Subarea, Id_Cargo FROM TH_CONTRATO_EMPLEADO WHERE Id_Empleado = '.$e.' AND Id_M_Retiro IS NULL ORDER BY 1 DESC')->queryRow();

		$id_contrato = $query_contrato['Id_Contrato'];
		
		$id_unidad_gerencia = $query_contrato['Id_Unidad_Gerencia'];

		if(is_null($id_unidad_gerencia)){
			$unidad_gerencia = "NO ASIGNADO";
		}else{
			$unidad_gerencia = UnidadGerencia::model()->findByPk($id_unidad_gerencia)->Unidad_Gerencia;	
		}

		$id_area = $query_contrato['Id_Area'];

		if(is_null($id_area)){
			$area = "NO ASIGNADO";
		}else{
			$area = Area::model()->findByPk($id_area)->Area;	
		}

		$id_subarea = $query_contrato['Id_Subarea'];

		if(is_null($id_subarea)){
			$subarea = "NO ASIGNADO";
		}else{
			$subarea = Subarea::model()->findByPk($id_subarea)->Subarea;	
		}

		$id_cargo = $query_contrato['Id_Cargo'];

		if(is_null($id_cargo)){
			$cargo = "NO ASIGNADO";
		}else{
			$cargo = Cargo::model()->findByPk($id_cargo)->Cargo;	
		}

		if(isset($_POST['ElementoEmpleado']))
		{
			$opc = $_POST['ElementoEmpleado']['opc'];

			if($opc == 0){
				//Cancelacion de asignación
				$array_ele = explode(",", $_POST['ElementoEmpleado']['elementos']);
				$array_cant_ele = explode(",", $_POST['ElementoEmpleado']['cant_ele']);
				UtilidadesElemento::desasigelementosempleado($e, $id_contrato, $array_ele, $array_cant_ele);
				$array_her = explode(",", $_POST['ElementoEmpleado']['herramientas']);
				UtilidadesHerramienta::desasigherramientasempleado($e, $id_contrato, $array_her);
			}

			if($opc == 1){
				//modificación de asignaciones e inclusión de nuevas asignaciones
				$array_ele = explode(",", $_POST['ElementoEmpleado']['elementos']);
				$array_cant_ele = explode(",", $_POST['ElementoEmpleado']['cant_ele']);
				UtilidadesElemento::asigelementosempleado($e, $id_contrato, $array_ele, $array_cant_ele);
				$array_her = explode(",", $_POST['ElementoEmpleado']['herramientas']);
				UtilidadesHerramienta::asigherramientasempleado($e, $id_contrato, $array_her);
			}

			

			$this->redirect(array('empleado/asignacion'));
		}

		$this->render('asignacion',array(
			'model'=>$model,
			'id_contrato'=> $id_contrato,
			'e'=> $e,
			'id_unidad_gerencia'=>$id_unidad_gerencia,
			'unidad_gerencia'=>$unidad_gerencia,
			'id_area'=>$id_area,
			'area'=>$area,
			'id_subarea'=>$id_subarea,
			'subarea'=>$subarea,
			'id_cargo'=>$id_cargo,
			'cargo'=>$cargo,
		));
	}

	public function actionEntrega($e)
	{
		$model=new ElementoEmpleado;

		$model->scenario = 'entrega_elementos';

		$query_contrato= Yii::app()->db->createCommand('SELECT TOP 1 Id_Contrato, Id_Unidad_Gerencia, Id_Area, Id_Subarea, Id_Cargo FROM TH_CONTRATO_EMPLEADO WHERE Id_Empleado = '.$e.' AND Id_M_Retiro IS NULL ORDER BY 1 DESC')->queryRow();

		$empleado = UtilidadesEmpleado::nombreempleado($e);

		$id_contrato = $query_contrato['Id_Contrato'];
		
		$id_unidad_gerencia = $query_contrato['Id_Unidad_Gerencia'];

		if(is_null($id_unidad_gerencia)){
			$unidad_gerencia = "NO ASIGNADO";
		}else{
			$unidad_gerencia = UnidadGerencia::model()->findByPk($id_unidad_gerencia)->Unidad_Gerencia;	
		}

		$id_area = $query_contrato['Id_Area'];

		if(is_null($id_area)){
			$area = "NO ASIGNADO";
		}else{
			$area = Area::model()->findByPk($id_area)->Area;	
		}

		$id_subarea = $query_contrato['Id_Subarea'];

		if(is_null($id_subarea)){
			$subarea = "NO ASIGNADO";
		}else{
			$subarea = Subarea::model()->findByPk($id_subarea)->Subarea;	
		}

		$id_cargo = $query_contrato['Id_Cargo'];

		if(is_null($id_cargo)){
			$cargo = "NO ASIGNADO";
		}else{
			$cargo = Cargo::model()->findByPk($id_cargo)->Cargo;	
		}

		if(isset($_POST['ElementoEmpleado']))
		{
			
			$array_ele = explode(",", $_POST['ElementoEmpleado']['elementos']);
			UtilidadesElemento::entregaelementosempleado($e, $id_contrato, $array_ele);
			$array_her = explode(",", $_POST['ElementoEmpleado']['herramientas']);
			UtilidadesHerramienta::entregaherramientasempleado($e, $id_contrato, $array_her);
			$this->redirect(array('empleado/entrega'));	
		}

		$this->render('entrega',array(
			'model'=>$model,
			'id_contrato'=> $id_contrato,
			'e'=> $e,
			'empleado'=> $empleado,
			'id_unidad_gerencia'=>$id_unidad_gerencia,
			'unidad_gerencia'=>$unidad_gerencia,
			'id_area'=>$id_area,
			'area'=>$area,
			'id_subarea'=>$id_subarea,
			'subarea'=>$subarea,
			'id_cargo'=>$id_cargo,
			'cargo'=>$cargo,
		));
	}


	public function actionDevolucion($e)
	{
		$model=new ElementoEmpleado;

		$model->scenario = 'retiro_elementos';

		$query_contrato= Yii::app()->db->createCommand('SELECT TOP 1 Id_Contrato, Id_Unidad_Gerencia, Id_Area, Id_Subarea, Id_Cargo FROM TH_CONTRATO_EMPLEADO WHERE Id_Empleado = '.$e.' AND Id_M_Retiro IS NULL ORDER BY 1 DESC')->queryRow();

		$empleado = UtilidadesEmpleado::nombreempleado($e);

		$id_contrato = $query_contrato['Id_Contrato'];
		
		$id_unidad_gerencia = $query_contrato['Id_Unidad_Gerencia'];

		if(is_null($id_unidad_gerencia)){
			$unidad_gerencia = "NO ASIGNADO";
		}else{
			$unidad_gerencia = UnidadGerencia::model()->findByPk($id_unidad_gerencia)->Unidad_Gerencia;	
		}

		$id_area = $query_contrato['Id_Area'];

		if(is_null($id_area)){
			$area = "NO ASIGNADO";
		}else{
			$area = Area::model()->findByPk($id_area)->Area;	
		}

		$id_subarea = $query_contrato['Id_Subarea'];

		if(is_null($id_subarea)){
			$subarea = "NO ASIGNADO";
		}else{
			$subarea = Subarea::model()->findByPk($id_subarea)->Subarea;	
		}

		$id_cargo = $query_contrato['Id_Cargo'];

		if(is_null($id_cargo)){
			$cargo = "NO ASIGNADO";
		}else{
			$cargo = Cargo::model()->findByPk($id_cargo)->Cargo;	
		}

		if(isset($_POST['ElementoEmpleado']))
		{
			
			$array_ele = explode(",", $_POST['ElementoEmpleado']['elementos']);
			UtilidadesElemento::devolucionelementosempleado($e, $id_contrato, $array_ele);
			$array_her = explode(",", $_POST['ElementoEmpleado']['herramientas']);
			UtilidadesHerramienta::devolucionherramientasempleado($e, $id_contrato, $array_her);
			$this->redirect(array('empleado/devolucion'));	
		}

		$this->render('devolucion',array(
			'model'=>$model,
			'id_contrato'=> $id_contrato,
			'e'=> $e,
			'empleado'=> $empleado,
			'id_unidad_gerencia'=>$id_unidad_gerencia,
			'unidad_gerencia'=>$unidad_gerencia,
			'id_area'=>$id_area,
			'area'=>$area,
			'id_subarea'=>$id_subarea,
			'subarea'=>$subarea,
			'id_cargo'=>$id_cargo,
			'cargo'=>$cargo,
		));
	}
}
