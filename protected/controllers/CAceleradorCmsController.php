<?php

class CAceleradorCmsController extends Controller
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
				'actions'=>array('create','searchitem','searchitembyid','loadcriterios'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','offconfig','verifconfig'),
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
		$model=new CAceleradorCms;

		$tipos = Yii::app()->db->createCommand('SELECT d.Id_Dominio, d.Dominio FROM TH_DOMINIO d WHERE Id_Padre = '.Yii::app()->params->tipos_comision.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$aceler = Yii::app()->db->createCommand('SELECT d.Id_Dominio, d.Dominio FROM TH_DOMINIO d WHERE Id_Padre = '.Yii::app()->params->tipos_acelerador.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$planes = Yii::app()->db->createCommand('SELECT DISTINCT Id_Plan, Plan_Descripcion FROM [Portal_Reportes].[dbo].[TH_CRITERIOS_ITEMS] ORDER BY 2')->queryAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CAceleradorCms']))
		{
			//print_r($_POST['CAceleradorCms']);die();
			$model->attributes=$_POST['CAceleradorCms'];
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
			'tipos' => $tipos,
			'aceler' => $aceler,
			'planes'=>$planes,	
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CAceleradorCms');
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

		$aceler = Yii::app()->db->createCommand('SELECT d.Id_Dominio, d.Dominio FROM TH_DOMINIO d WHERE Id_Padre = '.Yii::app()->params->tipos_acelerador.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$planes = Yii::app()->db->createCommand('SELECT DISTINCT Id_Plan, Plan_Descripcion FROM [Portal_Reportes].[dbo].[TH_CRITERIOS_ITEMS] ORDER BY 2')->queryAll();

		$usuarios=Usuario::model()->findAll(array('order'=>'Usuario'));

		$model=new CAceleradorCms('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CAceleradorCms']))
			$model->attributes=$_GET['CAceleradorCms'];

		$this->render('admin',array(
			'model'=>$model,
			'tipos' => $tipos,
			'aceler' => $aceler,
			'planes'=>$planes,	
			'usuarios'=>$usuarios,	
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CAceleradorCms the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CAceleradorCms::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CAceleradorCms $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cacelerador-cms-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionSearchItem(){
		$filtro = $_GET['q'];
        $data = CAceleradorCms::model()->searchByItem($filtro);
        $result = array();
        foreach($data as $item):
           $result[] = array(
               'id'   => $item['I_ID_ITEM'],
               'text' => $item['ITEM'],
           );
        endforeach;
        header('Content-type: application/json');
        echo CJSON::encode( $result );
        Yii::app()->end(); 
 	}

	public function actionSearchItemById(){
		$filtro = $_GET['id'];
        $data = CAceleradorCms::model()->searchById($filtro);

        $result = array();
        foreach($data as $item):
           $result[] = array(
               'id'   => $item['I_ID_ITEM'],
               'text' => $item['ITEM'],
           );
        endforeach;

        header('Content-type: application/json');
        echo CJSON::encode( $result );
        Yii::app()->end(); 
 	}

 	public function actionLoadCriterios()
	{
		$plan = $_POST['plan'];
 

		$criterios = Yii::app()->db->createCommand("

        	SELECT Id_Criterio, Criterio_Descripcion FROM [Portal_Reportes].[dbo].[TH_CRITERIOS_ITEMS] WHERE  Id_Plan = '".$plan."' ORDER BY Criterio_Descripcion")->queryAll();

		$i = 0;
		$array_criterios = array();
		
		foreach ($criterios as $c) {
			$array_criterios[$i] = array('id' => trim($c['Id_Criterio']),  'text' => $c['Criterio_Descripcion']);
			$i++; 

		}
		
		//se retorna un json con las opciones
		echo json_encode($array_criterios);

	}

	public function actionOffConfig($id)
	{
		$model=$this->loadModel($id);

		$model->ID_USUARIO_ACTUALIZACION = Yii::app()->user->getState('id_user');
		$model->FECHA_ACTUALIZACION = date('Y-m-d H:i:s');
		$model->ESTADO = 0;
		if($model->save()){
			Yii::app()->user->setFlash('success', "El Configuación ".$model->ROWID." fue inactivada correctamente.");
			$this->redirect(array('admin'));
		}
	}

	public function actionVerifConfig()
	{
		$data = array();

		$tipo = $_POST['tipo'];
		$acelerador = $_POST['acelerador'];
		$item = $_POST['item'];
		$plan = $_POST['plan'];
		$criterio = $_POST['criterio'];
		$fecha_inicial = $_POST['fecha_inicial'];
		$fecha_final = $_POST['fecha_final'];

		if($acelerador == Yii::app()->params->ac_item){
			//item

			$q = Yii::app()->db->createCommand("SELECT ROWID FROM TH_C_ACELERADOR_CMS WHERE TIPO = ".$tipo." AND ID_ACELERADOR = ".$acelerador." AND ITEM = ".$item." AND (('".$fecha_inicial."' BETWEEN FECHA_INICIAL AND FECHA_FINAL) OR ('".$fecha_final."' BETWEEN FECHA_INICIAL AND FECHA_FINAL) OR ('".$fecha_inicial."' < FECHA_INICIAL AND '".$fecha_final."' > FECHA_FINAL)) AND ESTADO = 1")->queryRow();

		}

		if($acelerador == Yii::app()->params->ac_criterio){
			//plan, criterio

			$q = Yii::app()->db->createCommand("SELECT ROWID FROM TH_C_ACELERADOR_CMS WHERE TIPO = ".$tipo." AND ID_ACELERADOR = ".$acelerador." AND ID_PLAN = ".$plan." AND CRITERIO = '".$item."' AND (('".$fecha_inicial."' BETWEEN FECHA_INICIAL AND FECHA_FINAL) OR ('".$fecha_final."' BETWEEN FECHA_INICIAL AND FECHA_FINAL) OR ('".$fecha_inicial."' < FECHA_INICIAL AND '".$fecha_final."' > FECHA_FINAL)) AND ESTADO = 1")->queryRow();
		}

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
