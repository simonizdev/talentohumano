<?php

class CPtjVentasController extends Controller
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
				'actions'=>array('create','offconfig','verifconfig'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
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
		$model=new CPtjVentas;

		$tipos = Yii::app()->db->createCommand('SELECT d.Id_Dominio, d.Dominio FROM TH_DOMINIO d WHERE Id_Padre = '.Yii::app()->params->tipos_comision.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CPtjVentas']))
		{
			$model->attributes=$_POST['CPtjVentas'];
			$model->ESTADO = 1;
			$model->ID_USUARIO_CREACION = Yii::app()->user->getState('id_user');
			$model->FECHA_CREACION = date('Y-m-d H:i:s');
			$model->ID_USUARIO_ACTUALIZACION = Yii::app()->user->getState('id_user');
			$model->FECHA_ACTUALIZACION = date('Y-m-d H:i:s');
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
			'tipos'=>$tipos,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CPtjVentas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$tipos = Yii::app()->db->createCommand('SELECT d.Id_Dominio, d.Dominio FROM TH_DOMINIO d WHERE Id_Padre = '.Yii::app()->params->tipos_comision.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$usuarios=Usuario::model()->findAll(array('order'=>'Usuario'));

		$model=new CPtjVentas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CPtjVentas']))
			$model->attributes=$_GET['CPtjVentas'];

		$this->render('admin',array(
			'model'=>$model,
			'tipos'=>$tipos,
			'usuarios'=>$usuarios,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CPtjVentas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CPtjVentas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CPtjVentas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cptj-ventas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionOffConfig($id)
	{
		$model=$this->loadModel($id);

		$model->ID_USUARIO_ACTUALIZACION = Yii::app()->user->getState('id_user');
		$model->FECHA_ACTUALIZACION = date('Y-m-d H:i:s');
		$model->ESTADO = 0;
		if($model->save()){
			Yii::app()->user->setFlash('success', "El porcentaje de comisión ".$model->ROWID." fue inactivado correctamente.");
			$this->redirect(array('admin'));
		}
	}

	public function actionVerifConfig()
	{
		$data = array();

		$tipo = $_POST['tipo'];

		$q = Yii::app()->db->createCommand("SELECT ROWID FROM TH_C_PTJ_VENTAS WHERE TIPO = ".$tipo." AND ESTADO = 1")->queryRow();
		
        $id = $q['ROWID'];

        if(!is_null($id)){
        	$valid = 0;
        	$id_row = $id;
        }else{
        	$valid = 1;
        	$id_row = 0;
        }

        $data['valid'] = $valid;
		$data['id'] = $id_row;

		echo json_encode($data);

		
	}
}
