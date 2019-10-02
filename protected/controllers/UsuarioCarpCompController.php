<?php

class UsuarioCarpCompController extends Controller
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
				'actions'=>array('create','update','inact','act','verificarduplicidad'),
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
	public function actionCreate($carp)
	{
		$model=new UsuarioCarpComp;

		$user = Yii::app()->user->getState('id_user');

		$model_carp = CarpComp::model()->findByPk($carp);

		if($model_carp->Tipo_Acceso == 1){
			$model->scenario = 'create_gen';
		}else{
			$model->scenario = 'create_per';
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UsuarioCarpComp']))
		{

			$model->attributes=$_POST['UsuarioCarpComp'];

			$model->Id_Carp_Comp = $model_carp->Id_Carpeta_Comp;
			$model->Id_Empleado = $_POST['UsuarioCarpComp']['Id_Empleado'];

			if($model_carp->Tipo_Acceso == 1){
				$model->Usuario = NULL;
				$model->Password = NULL;
				$model->Permiso = NULL;
			}else{
				$model->Usuario = $_POST['UsuarioCarpComp']['Usuario'];
				$model->Password = UtilidadesCuenta::generateRandomString().$_POST['UsuarioCarpComp']['Password'].UtilidadesCuenta::generateRandomString();
				$model->Permiso = $_POST['UsuarioCarpComp']['Permiso'];
			}

			$model->Id_Usuario_Creacion = $user;
			$model->Id_Usuario_Actualizacion = $user;
			$model->Fecha_Creacion = date('Y-m-d H:i:s');
			$model->Fecha_Actualizacion = date('Y-m-d H:i:s');
			$model->Estado = 1;

			if($model->save())
				$this->redirect(array('carpComp/update', 'id' => $model->Id_Carp_Comp));
		}

		$this->render('create',array(
			'model'=>$model,
			'model_carp'=>$model_carp,
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

		$password_act = $model->Password;

		$model->scenario = 'update';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UsuarioCarpComp']))
		{
			
			$model->Usuario = $_POST['UsuarioCarpComp']['Usuario'];

			if($_POST['UsuarioCarpComp']['Password'] != $password_act){
				$password = UtilidadesCuenta::generateRandomString().$_POST['UsuarioCarpComp']['Password'].UtilidadesCuenta::generateRandomString();
				$model->Password = $password;
			}else{
				$model->Password = $password_act;	
			}

			$model->Permiso = $_POST['UsuarioCarpComp']['Permiso'];
			$model->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
			$model->Fecha_Actualizacion = date('Y-m-d H:i:s');

			if($model->save())
				$this->redirect(array('carpComp/update', 'id' => $model->Id_Carp_Comp));
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
		$dataProvider=new CActiveDataProvider('UsuarioCarpComp');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UsuarioCarpComp('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UsuarioCarpComp']))
			$model->attributes=$_GET['UsuarioCarpComp'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UsuarioCarpComp the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UsuarioCarpComp::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UsuarioCarpComp $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-carp-comp-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionInact($id)
	{
		$model=$this->loadModel($id);
		$model->scenario = 'inact';

		$model->Estado = 0;
		$model->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
		$model->Fecha_Actualizacion = date('Y-m-d H:i:s');

		$modelo_carp = CarpComp::model()->findByPk($model->Id_Carp_Comp);

		if($model->save()){
			if($modelo_carp->Tipo_Acceso == 1){
				//GENÉRICO
				Yii::app()->user->setFlash('success', "El acceso del empleado ".UtilidadesEmpleado::nombreempleado($model->Id_Empleado)." fue inactivado correctamente.");
			$this->redirect(array('carpComp/update', 'id' => $model->Id_Carp_Comp));	

			}else{
				//PERSONAL
				Yii::app()->user->setFlash('success', "El acceso del empleado ".UtilidadesEmpleado::nombreempleado($model->Id_Empleado)." (".$model->Usuario.") fue inactivado correctamente.");
			$this->redirect(array('carpComp/update', 'id' => $model->Id_Carp_Comp));
			}
	
		}
		
	}

	public function actionAct($id)
	{
		$model=$this->loadModel($id);
		$model->scenario = 'act';

		$model->Estado = 1;
		$model->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
		$model->Fecha_Actualizacion = date('Y-m-d H:i:s');

		$modelo_carp = CarpComp::model()->findByPk($model->Id_Carp_Comp);

		if($model->save()){
			if($modelo_carp->Tipo_Acceso == 1){
				//GENÉRICO
				Yii::app()->user->setFlash('success', "El acceso del empleado ".UtilidadesEmpleado::nombreempleado($model->Id_Empleado)." fue activado correctamente.");
			$this->redirect(array('carpComp/update', 'id' => $model->Id_Carp_Comp));	

			}else{
				//PERSONAL
				Yii::app()->user->setFlash('success', "El acceso del empleado ".UtilidadesEmpleado::nombreempleado($model->Id_Empleado)." (".$model->Usuario.") fue activado correctamente.");
			$this->redirect(array('carpComp/update', 'id' => $model->Id_Carp_Comp));
			}
	
		}
		
	}

	public function actionVerificarDuplicidad()
	{
		$id_empleado = $_POST['id_empleado'];
		$id_carp = $_POST['id_carp'];

		$model_usuario_carpeta = UsuarioCarpComp::model()->findByAttributes(array('Id_Carp_Comp' => $id_carp, 'Id_Empleado' => $id_empleado));

		if(empty($model_usuario_carpeta)){
			echo 1;
		}else{
			echo 0;
		}
	}
}
 