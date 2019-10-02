<?php

class HerramientaController extends Controller
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
				'actions'=>array('create','update','getherramientas','getherramientaspendentempleado','getherramientasentempleado'),
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
		$model=new Herramienta;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Herramienta']))
		{
			$rnd = rand(0,99999);  // genera un numero ramdom entre 0-99999
            $model->attributes=$_POST['Herramienta'];
 			
			$model->Id_Usuario_Creacion = Yii::app()->user->getState('id_user');
			$model->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
			$model->Fecha_Creacion = date('Y-m-d H:i:s');
			$model->Fecha_Actualizacion = date('Y-m-d H:i:s');

            $imagen_subida = CUploadedFile::getInstance($model,'img');
            $nombre_archivo = "{$rnd}-{$imagen_subida}"; 
            $model->Imagen = $nombre_archivo;
 
            if($model->save()){
                $imagen_subida->saveAs(Yii::app()->basePath.'/../images/herramientas/'.$nombre_archivo); 
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
		
		$opc = 0;

		$model=$this->loadModel($id);

		$ruta_imagen_actual = Yii::app()->basePath.'/../images/herramientas/'.$model->Imagen;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Herramienta']))
		{
			if($_FILES['Herramienta']['name']['img']  != "") {
		    	$rnd = rand(0,99999);  // genera un numero ramdom entre 0-99999
		        $imagen_subida = CUploadedFile::getInstance($model,'img');
	            $nombre_archivo = "{$rnd}-{$imagen_subida}"; 
	            $model->Imagen = $nombre_archivo;
	            $opc = 1;
		    } 

			$model->attributes=$_POST['Herramienta'];
			$model->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
			$model->Fecha_Actualizacion = date('Y-m-d H:i:s');
 
            if($model->save()){
            	if($opc == 1){
            		unlink($ruta_imagen_actual);
                	$imagen_subida->saveAs(Yii::app()->basePath.'/../images/herramientas/'.$nombre_archivo);
            	}
                $this->redirect(array('admin'));
            }
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
		
		$model=$this->loadModel($id);

		$ruta_img_act = Yii::app()->basePath.'/../images/herramientas/'.$model->Imagen;
		unlink($ruta_img_act);

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
		$dataProvider=new CActiveDataProvider('Herramienta');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Herramienta('search');
		$usuarios=Usuario::model()->findAll(array('order'=>'Usuario'));

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Herramienta']))
			$model->attributes=$_GET['Herramienta'];

		$this->render('admin',array(
			'model'=>$model,
			'usuarios'=>$usuarios,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Herramienta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Herramienta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Herramienta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='herramienta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionGetHerramientas()
	{
		$id_contrato = $_POST['id_contrato'];

		$opc_elementos = UtilidadesHerramienta::getherramientas($id_contrato);
		echo $opc_elementos;
	}

	public function actionGetHerramientasPendEntEmpleado()
	{
		$id_contrato = $_POST['id_contrato'];

		$opc_elementos = UtilidadesHerramienta::getherramientaspendentempleado($id_contrato);
		echo $opc_elementos;
	}

	public function actionGetHerramientasEntEmpleado()
	{
		$id_contrato = $_POST['id_contrato'];

		$opc_elementos = UtilidadesHerramienta::getherramientasentempleado($id_contrato);
		echo $opc_elementos;
	}
}
