<?php

class CarpCompController extends Controller
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
	public function actionCreate()
	{
		$model=new CarpComp;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CarpComp']))
		{
			$model->attributes=$_POST['CarpComp'];

			$user = Yii::app()->user->getState('id_user');

			if($model->Tipo_Acceso == 1){
				//GENERICO
				$model->Usuario = $_POST['CarpComp']['usuario_gen'];
				$model->Password = UtilidadesCuenta::generateRandomString().$_POST['CarpComp']['password_gen'].UtilidadesCuenta::generateRandomString();
			}else{
				//PERSONAL
				$model->Usuario = NULL;
				$model->Password = NULL;
			}

			$model->Id_Usuario_Creacion = $user;
			$model->Id_Usuario_Actualizacion = $user;
			$model->Fecha_Creacion = date('Y-m-d H:i:s');
			$model->Fecha_Actualizacion = date('Y-m-d H:i:s');
			$model->Estado = 1;

			if($model->save()){

				if($model->Tipo_Acceso == 1){
					//GENERICO
						
					$array_emps = explode(",", $_POST['CarpComp']['cad_emps']);
					$num_reg = count($array_emps);

					for ($i = 0; $i < $num_reg; $i++) {
						$nuevo_usuario_carpeta = new UsuarioCarpComp;
						$nuevo_usuario_carpeta->Id_Carp_Comp = $model->Id_Carpeta_Comp;
						$nuevo_usuario_carpeta->Id_Empleado = $array_emps[$i];
						$nuevo_usuario_carpeta->Usuario = NULL;
						$nuevo_usuario_carpeta->Password = NULL;
						$nuevo_usuario_carpeta->Permiso = NULL;
						$nuevo_usuario_carpeta->Id_Usuario_Creacion = $user;
						$nuevo_usuario_carpeta->Id_Usuario_Actualizacion = $user;
						$nuevo_usuario_carpeta->Fecha_Creacion = date('Y-m-d H:i:s');
						$nuevo_usuario_carpeta->Fecha_Actualizacion = date('Y-m-d H:i:s');
						$nuevo_usuario_carpeta->Estado = 1;
						$nuevo_usuario_carpeta->save();
					}

				}else{
					//PERSONAL

					$array_emps = explode(",", $_POST['CarpComp']['cad_emps']);
					$array_usuarios = explode(",", $_POST['CarpComp']['cad_usuarios']);
					$array_passwords = explode(",", $_POST['CarpComp']['cad_passwords']);
					$array_permisos = explode(",", $_POST['CarpComp']['cad_permisos']);

					$num_reg = count($array_emps);

					for ($i = 0; $i < $num_reg; $i++) {
				 		$nuevo_usuario_carpeta = new UsuarioCarpComp;
						$nuevo_usuario_carpeta->Id_Carp_Comp = $model->Id_Carpeta_Comp;
						$nuevo_usuario_carpeta->Id_Empleado = $array_emps[$i];
						$nuevo_usuario_carpeta->Usuario = $array_usuarios[$i];
						$nuevo_usuario_carpeta->Password = UtilidadesCuenta::generateRandomString().$array_passwords[$i].UtilidadesCuenta::generateRandomString();
						$nuevo_usuario_carpeta->Permiso = $array_permisos[$i];
						$nuevo_usuario_carpeta->Id_Usuario_Creacion = $user;
						$nuevo_usuario_carpeta->Id_Usuario_Actualizacion = $user;
						$nuevo_usuario_carpeta->Fecha_Creacion = date('Y-m-d H:i:s');
						$nuevo_usuario_carpeta->Fecha_Actualizacion = date('Y-m-d H:i:s');
						$nuevo_usuario_carpeta->Estado = 1;
						$nuevo_usuario_carpeta->save(); 
					}
					
				}

				$this->redirect(array('admin'));

			}
			
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

		$password_act = $model->Password;

		$user = Yii::app()->user->getState('id_user');

		//usuarios asociados
		$detalle=new UsuarioCarpComp('search');
		$detalle->unsetAttributes();  // clear any default values
		$detalle->Id_Carp_Comp = $id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CarpComp']))
		{
			$model->attributes=$_POST['CarpComp'];
			
			if($model->Tipo_Acceso == 1){
				$model->Usuario = $_POST['CarpComp']['Usuario'];

				if($_POST['CarpComp']['Password'] != $password_act){
					$password = UtilidadesCuenta::generateRandomString().$_POST['CarpComp']['Password'].UtilidadesCuenta::generateRandomString();
					$model->Password = $password;
				}else{
					$model->Password = $password_act;	
				}

			}else{
				$model->Usuario = NULL;
				$model->Password = NULL;
			}


			
			$model->Id_Usuario_Actualizacion = $user;
			$model->Fecha_Actualizacion = date('Y-m-d H:i:s');

			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
			'detalle'=>$detalle,
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
		$dataProvider=new CActiveDataProvider('CarpComp');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CarpComp('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CarpComp']))
			$model->attributes=$_GET['CarpComp'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CarpComp the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CarpComp::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CarpComp $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='carp-comp-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
