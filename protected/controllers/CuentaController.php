<?php

class CuentaController extends Controller
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
				'actions'=>array('create','update','searchCorreo','searchCorreobyid','searchAllCorreos','export', 'exportexcel',''),
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
		$model=new Cuenta;

		$tipos_asoc= Yii::app()->db->createCommand('SELECT d.Id_Dominio, d.Dominio FROM TH_DOMINIO d WHERE Id_Padre = '.Yii::app()->params->tipo_asociacion.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$tipos= Yii::app()->db->createCommand('SELECT d.Id_Dominio, d.Dominio FROM TH_DOMINIO d WHERE Id_Padre = '.Yii::app()->params->tipo_correo.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$dominios= Yii::app()->db->createCommand('SELECT d.Id_Dominio_Web, d.Dominio FROM TH_DOMINIO_WEB d WHERE Estado = 1 ORDER BY d.Dominio')->queryAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cuenta']))
		{
			
			$tipo_asoc = $_POST['Cuenta']['Tipo_Asociacion'];

			$model->Tipo_Asociacion = $tipo_asoc;
				
			if($_POST['Cuenta']['Id_Empleado'] == ""){
				$model->Id_Empleado = NULL;
			}else{
				$model->Id_Empleado = $_POST['Cuenta']['Id_Empleado'];	
			}

			if($tipo_asoc == Yii::app()->params->ta_correo){
				//CORREO
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];
				$model->Password_Correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
				$model->Cuenta_Skype = NULL;
				$model->Password_Skype = NULL;
				$model->Usuario_Siesa = NULL;
				$model->Password_Siesa = NULL;
				$model->Usuario_Glpi = NULL;
				$model->Password_Glpi = NULL;
				$model->Usuario_Papercut = NULL;
				$model->Password_Papercut = NULL;
			}

			if($tipo_asoc == Yii::app()->params->ta_correo_glpi_papercut){
				//CORREO -  GLPI - PAPERCUT	
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];
				$model->Password_Correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
				$model->Cuenta_Skype = NULL;
				$model->Password_Skype = NULL;
				$model->Usuario_Siesa = NULL;
				$model->Password_Siesa = NULL;
				$model->Usuario_Glpi = $_POST['Cuenta']['Usuario_Glpi'];
				$model->Password_Glpi = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Glpi'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Papercut = $_POST['Cuenta']['Usuario_Papercut'];
				$model->Password_Papercut = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Papercut'].UtilidadesCuenta::generateRandomString();
			}

			if($tipo_asoc == Yii::app()->params->ta_correo_siesa_papercut){
				//CORREO - SIESA - PAPERCUT
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];
				$model->Password_Correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
				$model->Cuenta_Skype = NULL;
				$model->Password_Skype = NULL;
				$model->Usuario_Siesa = $_POST['Cuenta']['Usuario_Siesa'];
				$model->Password_Siesa = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Siesa'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Glpi = NULL;
				$model->Password_Glpi = NULL;
				$model->Usuario_Papercut = $_POST['Cuenta']['Usuario_Papercut'];
				$model->Password_Papercut = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Papercut'].UtilidadesCuenta::generateRandomString();
			}

			if($tipo_asoc == Yii::app()->params->ta_correo_siesa_glpi_papercut){
				//CORREO - SIESA - GLPI - PAPERCUT
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];
				$model->Password_Correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
				$model->Cuenta_Skype = NULL;
				$model->Password_Skype = NULL;
				$model->Usuario_Siesa = $_POST['Cuenta']['Usuario_Siesa'];
				$model->Password_Siesa = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Siesa'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Glpi = $_POST['Cuenta']['Usuario_Glpi'];
				$model->Password_Glpi = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Glpi'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Papercut = $_POST['Cuenta']['Usuario_Papercut'];
				$model->Password_Papercut = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Papercut'].UtilidadesCuenta::generateRandomString();	
			}

			if($tipo_asoc == Yii::app()->params->ta_correo_skype_papercut){
				//CORREO - SKYPE - PAPERCUT
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];
				$model->Password_Correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
				$model->Cuenta_Skype = $_POST['Cuenta']['Cuenta_Skype'];
				$model->Password_Skype = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Skype'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Siesa = NULL;
				$model->Password_Siesa = NULL;
				$model->Usuario_Glpi = NULL;
				$model->Password_Glpi = NULL;
				$model->Usuario_Papercut = $_POST['Cuenta']['Usuario_Papercut'];
				$model->Password_Papercut = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Papercut'].UtilidadesCuenta::generateRandomString();	
			}

			

			if($tipo_asoc == Yii::app()->params->ta_correo_skype_glpi_papercut){
				//CORREO - SKYPE - GLPI - PAPERCUT
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];
				$model->Password_Correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
				$model->Cuenta_Skype = $_POST['Cuenta']['Cuenta_Skype'];
				$model->Password_Skype = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Skype'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Siesa = NULL;
				$model->Password_Siesa = NULL;
				$model->Usuario_Glpi = $_POST['Cuenta']['Usuario_Glpi'];
				$model->Password_Glpi = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Glpi'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Papercut = $_POST['Cuenta']['Usuario_Papercut'];
				$model->Password_Papercut = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Papercut'].UtilidadesCuenta::generateRandomString();	
			}

			if($tipo_asoc == Yii::app()->params->ta_correo_skype_siesa_papercut){
				//CORREO - SKYPE - SIESA
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];
				$model->Password_Correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
				$model->Cuenta_Skype = $_POST['Cuenta']['Cuenta_Skype'];
				$model->Password_Skype = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Skype'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Siesa = $_POST['Cuenta']['Usuario_Siesa'];
				$model->Password_Siesa = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Siesa'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Glpi = NULL;
				$model->Password_Glpi = NULL;
				$model->Usuario_Papercut = $_POST['Cuenta']['Usuario_Papercut'];
				$model->Password_Papercut = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Papercut'].UtilidadesCuenta::generateRandomString();
			}

			if($tipo_asoc == Yii::app()->params->ta_correo_skype_siesa_glpi_papercut){
				//CORREO - SKYPE - SIESA - GLPI - PAPERCUT
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];
				$model->Password_Correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
				$model->Cuenta_Skype = $_POST['Cuenta']['Cuenta_Skype'];
				$model->Password_Skype = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Skype'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Siesa = $_POST['Cuenta']['Usuario_Siesa'];
				$model->Password_Siesa = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Siesa'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Glpi = $_POST['Cuenta']['Usuario_Glpi'];
				$model->Password_Glpi = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Glpi'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Papercut = $_POST['Cuenta']['Usuario_Papercut'];
				$model->Password_Papercut = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Papercut'].UtilidadesCuenta::generateRandomString();
			}

			if($tipo_asoc == Yii::app()->params->ta_glpi){
				//GLPI
				$model->Tipo = NULL;
				$model->Usuario = NULL;
				$model->Dominio = NULL;
				$model->Cuenta_Correo = NULL;
				$model->Password_Correo = NULL;
				$model->Cuenta_Skype = NULL;
				$model->Password_Skype = NULL;
				$model->Usuario_Siesa = NULL;
				$model->Password_Siesa = NULL;
				$model->Usuario_Glpi = $_POST['Cuenta']['Usuario_Glpi'];
				$model->Password_Glpi = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Glpi'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Papercut = NULL;
				$model->Password_Papercut = NULL;	
			}

			if($tipo_asoc == Yii::app()->params->ta_siesa){
				//SIESA
				$model->Tipo = NULL;
				$model->Usuario = NULL;
				$model->Dominio = NULL;
				$model->Cuenta_Correo = NULL;
				$model->Password_Correo = NULL;
				$model->Cuenta_Skype = NULL;
				$model->Password_Skype = NULL;
				$model->Usuario_Siesa = $_POST['Cuenta']['Usuario_Siesa'];
				$model->Password_Siesa = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Siesa'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Glpi = NULL;
				$model->Password_Glpi = NULL;
				$model->Usuario_Papercut = NULL;
				$model->Password_Papercut = NULL;	
			}

			if($tipo_asoc == Yii::app()->params->ta_siesa_glpi){
				//SIESA - GLPI
				$model->Tipo = NULL;
				$model->Usuario = NULL;
				$model->Dominio = NULL;
				$model->Cuenta_Correo = NULL;
				$model->Password_Correo = NULL;
				$model->Cuenta_Skype = NULL;
				$model->Password_Skype = NULL;
				$model->Usuario_Siesa = $_POST['Cuenta']['Usuario_Siesa'];
				$model->Password_Siesa = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Siesa'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Glpi = $_POST['Cuenta']['Usuario_Glpi'];
				$model->Password_Glpi = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Glpi'].UtilidadesCuenta::generateRandomString();
				$model->Usuario_Papercut = NULL;
				$model->Password_Papercut = NULL; 	
			}

			$model->Cuenta_Correo_Red = NULL;
			$model->Estado = Yii::app()->params->estado_act;

			if($_POST['Cuenta']['Observaciones'] == ""){
				$model->Observaciones = NULL;
			}else{
				$model->Observaciones = $_POST['Cuenta']['Observaciones'];	
			}

			$model->Id_Usuario_Creacion = Yii::app()->user->getState('id_user');
			$model->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
			$model->Fecha_Creacion = date('Y-m-d H:i:s');
			$model->Fecha_Actualizacion = date('Y-m-d H:i:s');
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
			'tipos_asoc'=>$tipos_asoc,
			'tipos'=>$tipos,
			'dominios'=>$dominios,
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

		$tipo_asociacion_act = $model->Tipo_Asociacion;
		$id_empleado_act = $model->Id_Empleado;
		
		$tipo_act = $model->Tipo;
		
		$usuario_act = $model->Usuario;
		$dominio_act = $model->Dominio;
		
		$cuenta_correo_act = $model->Cuenta_Correo;
		$password_cuenta_act = $model->Password_Correo;

		$cuenta_correo_red_act = $model->Cuenta_Correo_Red;
		
		$cuenta_skype_act = $model->Cuenta_Skype;
		$password_skype_act = $model->Password_Skype;
		
		$usuario_siesa_act = $model->Usuario_Siesa;
		$password_siesa_act = $model->Password_Siesa;

		$usuario_glpi_act = $model->Usuario_Glpi;
		$password_glpi_act = $model->Password_Glpi;

		$usuario_papercut_act = $model->Usuario_Papercut;
		$password_papercut_act = $model->Password_Papercut;
		
		$estado_act = $model->Estado;
		
		$observaciones_act = $model->Observaciones;

		$tipos_asoc= Yii::app()->db->createCommand('SELECT d.Id_Dominio, d.Dominio FROM TH_DOMINIO d WHERE Id_Padre = '.Yii::app()->params->tipo_asociacion.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$tipos= Yii::app()->db->createCommand('SELECT d.Id_Dominio, d.Dominio FROM TH_DOMINIO d WHERE Id_Padre = '.Yii::app()->params->tipo_correo.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$dominios= Yii::app()->db->createCommand('SELECT d.Id_Dominio_Web, d.Dominio FROM TH_DOMINIO_WEB d WHERE Estado = 1 ORDER BY d.Dominio')->queryAll();

		$estados_all = Yii::app()->db->createCommand('SELECT d.Id_Dominio, d.Dominio FROM TH_DOMINIO d WHERE Id_Padre = '.Yii::app()->params->estado_correo.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$estados= Yii::app()->db->createCommand('SELECT d.Id_Dominio, d.Dominio FROM TH_DOMINIO d WHERE Id_Dominio IN ('.Yii::app()->params->estado_act.','.Yii::app()->params->estado_eli.') AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cuenta']))
		{

			$tipo_asoc = $_POST['Cuenta']['Tipo_Asociacion'];

			$model->Tipo_Asociacion = $tipo_asoc;
				
			if($_POST['Cuenta']['Id_Empleado'] == ""){
				$model->Id_Empleado = NULL;
			}else{
				$model->Id_Empleado = $_POST['Cuenta']['Id_Empleado'];	
			}

			if($_POST['Cuenta']['Cuenta_Correo_Red'] == ""){
				$model->Cuenta_Correo_Red = NULL;
			}else{
				$model->Cuenta_Correo_Red = $_POST['Cuenta']['Cuenta_Correo_Red'];	
			}

			if($tipo_asoc == Yii::app()->params->ta_correo){
				//CORREO
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];
				
				if($_POST['Cuenta']['Password_Correo'] != $password_cuenta_act){
					$password_correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
					$model->Password_Correo = $password_correo;
				}else{
					$model->Password_Correo = $password_cuenta_act;	
				}	
				
				$model->Cuenta_Skype = NULL;
				$model->Password_Skype = NULL;
				$model->Usuario_Siesa = NULL;
				$model->Password_Siesa = NULL;
				$model->Usuario_Glpi = NULL;
				$model->Password_Glpi = NULL;
				$model->Usuario_Papercut = NULL;
				$model->Password_Papercut = NULL;
				$model->Estado = $_POST['Cuenta']['Estado'];

			}

			if($tipo_asoc == Yii::app()->params->ta_correo_glpi_papercut){
				//CORREO -  GLPI - PAPERCUT	
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];

				if($_POST['Cuenta']['Password_Correo'] != $password_cuenta_act){
					$password_correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
					$model->Password_Correo = $password_correo;
				}else{
					$model->Password_Correo = $password_cuenta_act;	
				}	

				$model->Cuenta_Skype = NULL;
				$model->Password_Skype = NULL;
				$model->Usuario_Siesa = NULL;
				$model->Password_Siesa = NULL;
				$model->Usuario_Glpi = $_POST['Cuenta']['Usuario_Glpi'];

				if($_POST['Cuenta']['Password_Glpi'] != $password_glpi_act){
					$password_glpi = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Glpi'].UtilidadesCuenta::generateRandomString();
					$model->Password_Glpi = $password_glpi;
				}else{
					$model->Password_Glpi = $password_glpi_act;	
				}

				$model->Usuario_Papercut = $_POST['Cuenta']['Usuario_Papercut'];

				if($_POST['Cuenta']['Password_Papercut'] != $password_papercut_act){
					$password_papercut = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Papercut'].UtilidadesCuenta::generateRandomString();
					$model->Password_Papercut = $password_papercut;
				}else{
					$model->Password_Papercut = $password_papercut_act;	
				}

				$model->Estado = $_POST['Cuenta']['Estado'];

			}

			if($tipo_asoc == Yii::app()->params->ta_correo_siesa_papercut){
				//CORREO - SIESA - PAPERCUT
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];

				if($_POST['Cuenta']['Password_Correo'] != $password_cuenta_act){
					$password_correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
					$model->Password_Correo = $password_correo;
				}else{
					$model->Password_Correo = $password_cuenta_act;	
				}	

				$model->Cuenta_Skype = NULL;
				$model->Password_Skype = NULL;
				$model->Usuario_Siesa = $_POST['Cuenta']['Usuario_Siesa'];

				if($_POST['Cuenta']['Password_Siesa'] != $password_siesa_act){
					$password_siesa = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Siesa'].UtilidadesCuenta::generateRandomString();
					$model->Password_Siesa = $password_siesa;
				}else{
					$model->Password_Siesa = $password_siesa_act;	
				}

				$model->Usuario_Glpi = NULL;
				$model->Password_Glpi = NULL;
				
				$model->Usuario_Papercut = $_POST['Cuenta']['Usuario_Papercut'];

				if($_POST['Cuenta']['Password_Papercut'] != $password_papercut_act){
					$password_papercut = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Papercut'].UtilidadesCuenta::generateRandomString();
					$model->Password_Papercut = $password_papercut;
				}else{
					$model->Password_Papercut = $password_papercut_act;	
				}

				$model->Estado = $_POST['Cuenta']['Estado'];
			}

			if($tipo_asoc == Yii::app()->params->ta_correo_skype_glpi_papercut){
				//CORREO - SKYPE - GLPI - PAPERCUT
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];
				
				if($_POST['Cuenta']['Password_Correo'] != $password_cuenta_act){
					$password_correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
					$model->Password_Correo = $password_correo;
				}else{
					$model->Password_Correo = $password_cuenta_act;	
				}

				$model->Cuenta_Skype = $_POST['Cuenta']['Cuenta_Skype'];
				
				if($_POST['Cuenta']['Password_Skype'] != $password_skype_act){
					$password_skype = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Skype'].UtilidadesCuenta::generateRandomString();
					$model->Password_Skype = $password_skype;
				}else{
					$model->Password_Skype = $password_skype_act;	
				}

				$model->Usuario_Siesa = NULL;
				$model->Password_Siesa = NULL;
				$model->Usuario_Glpi = $_POST['Cuenta']['Usuario_Glpi'];
				
				if($_POST['Cuenta']['Password_Glpi'] != $password_glpi_act){
					$password_glpi = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Glpi'].UtilidadesCuenta::generateRandomString();
					$model->Password_Glpi = $password_glpi;
				}else{
					$model->Password_Glpi = $password_glpi_act;	
				}

				$model->Usuario_Papercut = $_POST['Cuenta']['Usuario_Papercut'];

				if($_POST['Cuenta']['Password_Papercut'] != $password_papercut_act){
					$password_papercut = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Papercut'].UtilidadesCuenta::generateRandomString();
					$model->Password_Papercut = $password_papercut;
				}else{
					$model->Password_Papercut = $password_papercut_act;	
				}

				$model->Estado = $_POST['Cuenta']['Estado'];	
			}

			if($tipo_asoc == Yii::app()->params->ta_correo_skype_papercut){
				//CORREO - SKYPE - PAPERCUT
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];
				
				if($_POST['Cuenta']['Password_Correo'] != $password_cuenta_act){
					$password_correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
					$model->Password_Correo = $password_correo;
				}else{
					$model->Password_Correo = $password_cuenta_act;	
				}

				$model->Cuenta_Skype = $_POST['Cuenta']['Cuenta_Skype'];

				if($_POST['Cuenta']['Password_Skype'] != $password_skype_act){
					$password_skype = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Skype'].UtilidadesCuenta::generateRandomString();
					$model->Password_Skype = $password_skype;
				}else{
					$model->Password_Skype = $password_skype_act;	
				}

				$model->Usuario_Siesa = NULL;
				$model->Password_Siesa = NULL;
				$model->Usuario_Glpi = NULL;
				$model->Password_Glpi = NULL;
				
				$model->Usuario_Papercut = $_POST['Cuenta']['Usuario_Papercut'];

				if($_POST['Cuenta']['Password_Papercut'] != $password_papercut_act){
					$password_papercut = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Papercut'].UtilidadesCuenta::generateRandomString();
					$model->Password_Papercut = $password_papercut;
				}else{
					$model->Password_Papercut = $password_papercut_act;	
				}

				$model->Estado = $_POST['Cuenta']['Estado'];	
			}

			if($tipo_asoc == Yii::app()->params->ta_correo_siesa_glpi_papercut){
				//CORREO - SIESA - GLPI - PAPERCUT
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];
				
				if($_POST['Cuenta']['Password_Correo'] != $password_cuenta_act){
					$password_correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
					$model->Password_Correo = $password_correo;
				}else{
					$model->Password_Correo = $password_cuenta_act;	
				}

				$model->Cuenta_Skype = NULL;
				$model->Password_Skype = NULL;

				$model->Usuario_Siesa = $_POST['Cuenta']['Usuario_Siesa'];
				
				if($_POST['Cuenta']['Password_Siesa'] != $password_siesa_act){
					$password_siesa = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Siesa'].UtilidadesCuenta::generateRandomString();
					$model->Password_Siesa = $password_siesa;
				}else{
					$model->Password_Siesa = $password_siesa_act;	
				}

				$model->Usuario_Glpi = $_POST['Cuenta']['Usuario_Glpi'];
				
				if($_POST['Cuenta']['Password_Glpi'] != $password_glpi_act){
					$password_glpi = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Glpi'].UtilidadesCuenta::generateRandomString();
					$model->Password_Glpi = $password_glpi;
				}else{
					$model->Password_Glpi = $password_glpi_act;	
				}

				$model->Usuario_Papercut = $_POST['Cuenta']['Usuario_Papercut'];

				if($_POST['Cuenta']['Password_Papercut'] != $password_papercut_act){
					$password_papercut = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Papercut'].UtilidadesCuenta::generateRandomString();
					$model->Password_Papercut = $password_papercut;
				}else{
					$model->Password_Papercut = $password_papercut_act;	
				}

				$model->Estado = $_POST['Cuenta']['Estado'];	
			}

			if($tipo_asoc == Yii::app()->params->ta_correo_skype_siesa_papercut){
				//CORREO - SKYPE - SIESA - PAPERCUT
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];
				
				if($_POST['Cuenta']['Password_Correo'] != $password_cuenta_act){
					$password_correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
					$model->Password_Correo = $password_correo;
				}else{
					$model->Password_Correo = $password_cuenta_act;	
				}

				$model->Cuenta_Skype = $_POST['Cuenta']['Cuenta_Skype'];
				
				if($_POST['Cuenta']['Password_Skype'] != $password_skype_act){
					$password_skype = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Skype'].UtilidadesCuenta::generateRandomString();
					$model->Password_Skype = $password_skype;
				}else{
					$model->Password_Skype = $password_skype_act;	
				}

				$model->Usuario_Siesa = $_POST['Cuenta']['Usuario_Siesa'];
				
				if($_POST['Cuenta']['Password_Siesa'] != $password_siesa_act){
					$password_siesa = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Siesa'].UtilidadesCuenta::generateRandomString();
					$model->Password_Siesa = $password_siesa;
				}else{
					$model->Password_Siesa = $password_siesa_act;	
				}

				$model->Usuario_Glpi = NULL;
				$model->Password_Glpi = NULL;
				
				$model->Usuario_Papercut = $_POST['Cuenta']['Usuario_Papercut'];

				if($_POST['Cuenta']['Password_Papercut'] != $password_papercut_act){
					$password_papercut = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Papercut'].UtilidadesCuenta::generateRandomString();
					$model->Password_Papercut = $password_papercut;
				}else{
					$model->Password_Papercut = $password_papercut_act;	
				}

				$model->Estado = $_POST['Cuenta']['Estado'];
			}

			if($tipo_asoc == Yii::app()->params->ta_correo_skype_siesa_glpi_papercut){
				//CORREO - SKYPE - SIESA - GLPI - PAPERCUT
				$model->Tipo = $_POST['Cuenta']['Tipo'];
				$model->Usuario = $_POST['Cuenta']['Usuario'];
				$model->Dominio = $_POST['Cuenta']['Dominio'];
				$model->Cuenta_Correo = $_POST['Cuenta']['Cuenta_Correo'];
				
				if($_POST['Cuenta']['Password_Correo'] != $password_cuenta_act){
					$password_correo = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Correo'].UtilidadesCuenta::generateRandomString();
					$model->Password_Correo = $password_correo;
				}else{
					$model->Password_Correo = $password_cuenta_act;	
				}

				$model->Cuenta_Skype = $_POST['Cuenta']['Cuenta_Skype'];
				
				if($_POST['Cuenta']['Password_Skype'] != $password_skype_act){
					$password_skype = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Skype'].UtilidadesCuenta::generateRandomString();
					$model->Password_Skype = $password_skype;
				}else{
					$model->Password_Skype = $password_skype_act;	
				}

				$model->Usuario_Siesa = $_POST['Cuenta']['Usuario_Siesa'];
				
				if($_POST['Cuenta']['Password_Siesa'] != $password_siesa_act){
					$password_siesa = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Siesa'].UtilidadesCuenta::generateRandomString();
					$model->Password_Siesa = $password_siesa;
				}else{
					$model->Password_Siesa = $password_siesa_act;	
				}

				$model->Usuario_Glpi = $_POST['Cuenta']['Usuario_Glpi'];
				
				if($_POST['Cuenta']['Password_Glpi'] != $password_glpi_act){
					$password_glpi = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Glpi'].UtilidadesCuenta::generateRandomString();
					$model->Password_Glpi = $password_glpi;
				}else{
					$model->Password_Glpi = $password_glpi_act;	
				}

				$model->Usuario_Papercut = $_POST['Cuenta']['Usuario_Papercut'];

				if($_POST['Cuenta']['Password_Papercut'] != $password_papercut_act){
					$password_papercut = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Papercut'].UtilidadesCuenta::generateRandomString();
					$model->Password_Papercut = $password_papercut;
				}else{
					$model->Password_Papercut = $password_papercut_act;	
				}

				$model->Estado = $_POST['Cuenta']['Estado'];

			}

			if($tipo_asoc == Yii::app()->params->ta_glpi){
				//GLPI
				$model->Tipo = NULL;
				$model->Usuario = NULL;
				$model->Dominio = NULL;
				$model->Cuenta_Correo = NULL;
				$model->Password_Correo = NULL;
				$model->Cuenta_Skype = NULL;
				$model->Password_Skype = NULL;
				$model->Usuario_Siesa = NULL;
				$model->Password_Siesa = NULL;
				$model->Usuario_Glpi = $_POST['Cuenta']['Usuario_Glpi'];
				
				if($_POST['Cuenta']['Password_Glpi'] != $password_glpi_act){
					$password_glpi = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Glpi'].UtilidadesCuenta::generateRandomString();
					$model->Password_Glpi = $password_glpi;
				}else{
					$model->Password_Glpi = $password_glpi_act;	
				}

				$model->Usuario_Papercut = NULL;
				$model->Password_Papercut = NULL;
				$model->Estado = $_POST['Cuenta']['Estado2'];	
			}

			if($tipo_asoc == Yii::app()->params->ta_siesa){
				//SIESA
				$model->Tipo = NULL;
				$model->Usuario = NULL;
				$model->Dominio = NULL;
				$model->Cuenta_Correo = NULL;
				$model->Password_Correo = NULL;
				$model->Cuenta_Skype = NULL;
				$model->Password_Skype = NULL;
				$model->Usuario_Siesa = $_POST['Cuenta']['Usuario_Siesa'];
								
				if($_POST['Cuenta']['Password_Siesa'] != $password_siesa_act){
					$password_siesa = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Siesa'].UtilidadesCuenta::generateRandomString();
					$model->Password_Siesa = $password_siesa;
				}else{
					$model->Password_Siesa = $password_siesa_act;	
				}

				$model->Usuario_Glpi = NULL;
				$model->Password_Glpi = NULL;
				$model->Usuario_Papercut = NULL;
				$model->Password_Papercut = NULL;
				$model->Estado = $_POST['Cuenta']['Estado2'];	
			}

			if($tipo_asoc == Yii::app()->params->ta_siesa_glpi){
				//SIESA - GLPI
				$model->Tipo = NULL;
				$model->Usuario = NULL;
				$model->Dominio = NULL;
				$model->Cuenta_Correo = NULL;
				$model->Password_Correo = NULL;
				$model->Cuenta_Skype = NULL;
				$model->Password_Skype = NULL;
				
				$model->Usuario_Siesa = $_POST['Cuenta']['Usuario_Siesa'];
								
				if($_POST['Cuenta']['Password_Siesa'] != $password_siesa_act){
					$password_siesa = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Siesa'].UtilidadesCuenta::generateRandomString();
					$model->Password_Siesa = $password_siesa;
				}else{
					$model->Password_Siesa = $password_siesa_act;	
				}

				$model->Usuario_Glpi = $_POST['Cuenta']['Usuario_Glpi'];
				
				if($_POST['Cuenta']['Password_Glpi'] != $password_glpi_act){
					$password_glpi = UtilidadesCuenta::generateRandomString().$_POST['Cuenta']['Password_Glpi'].UtilidadesCuenta::generateRandomString();
					$model->Password_Glpi = $password_glpi;
				}else{
					$model->Password_Glpi = $password_glpi_act;	
				}

				$model->Usuario_Papercut = NULL;
				$model->Password_Papercut = NULL;
				$model->Estado = $_POST['Cuenta']['Estado2'];	
			}

			if($_POST['Cuenta']['Observaciones'] == ""){
				$model->Observaciones = NULL;
			}else{
				$model->Observaciones = $_POST['Cuenta']['Observaciones'];	
			}

			$model->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
			$model->Fecha_Actualizacion = date('Y-m-d H:i:s');

			//función para registrar cambios en las Cuentas
			UtilidadesCuenta::novedadcuenta(
				$id, 
				
				$tipo_asociacion_act,
				$model->Tipo_Asociacion,
				
				$id_empleado_act, 
				$model->Id_Empleado, 
				
				$tipo_act, 
				$model->Tipo, 
				
				$usuario_act, 
				$model->Usuario, 
				
				$dominio_act, 
				$model->Dominio, 
				
				$cuenta_correo_act, 
				$model->Cuenta_Correo, 
				
				$password_cuenta_act, 
				$model->Password_Correo,

				$cuenta_correo_red_act,  
				$model->Cuenta_Correo_Red, 
				
				$cuenta_skype_act, 
				$model->Cuenta_Skype, 
				
				$password_skype_act, 
				$model->Password_Skype,

				$usuario_siesa_act, 
				$model->Usuario_Siesa, 
				
				$password_siesa_act, 
				$model->Password_Siesa,

				$usuario_glpi_act, 
				$model->Usuario_Glpi, 
				
				$password_glpi_act, 
				$model->Password_Glpi,

				$usuario_papercut_act, 
				$model->Usuario_Papercut, 
				
				$password_papercut_act, 
				$model->Password_Papercut,
				
				$estado_act, 
				$model->Estado, 
				
				$observaciones_act, 
				$model->Observaciones
			);

			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
			'tipos_asoc'=>$tipos_asoc,
			'tipos'=>$tipos,
			'dominios'=>$dominios,
			'estados_all'=>$estados_all,
			'estados'=>$estados,
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
		$dataProvider=new CActiveDataProvider('Cuenta');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if(Yii::app()->request->getParam('export')) {
    		$this->actionExport();
    		Yii::app()->end();
		}
		
		$model=new Cuenta('search');

		$tipos_asoc= Yii::app()->db->createCommand('SELECT d.Id_Dominio, d.Dominio FROM TH_DOMINIO d WHERE Id_Padre = '.Yii::app()->params->tipo_asociacion.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$tipos= Yii::app()->db->createCommand('SELECT d.Id_Dominio, d.Dominio FROM TH_DOMINIO d WHERE Id_Padre = '.Yii::app()->params->tipo_correo.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$dominios= Yii::app()->db->createCommand('SELECT d.Id_Dominio_Web, d.Dominio FROM TH_DOMINIO_WEB d WHERE Estado = 1 ORDER BY d.Dominio')->queryAll();

		$estados= Yii::app()->db->createCommand('SELECT d.Id_Dominio, d.Dominio FROM TH_DOMINIO d WHERE Id_Padre = '.Yii::app()->params->estado_correo.' AND Estado = 1 ORDER BY d.Dominio')->queryAll();

		$usuarios=Usuario::model()->findAll(array('order'=>'Usuario'));

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cuenta']))
			$model->attributes=$_GET['Cuenta'];

		$this->render('admin',array(
			'model'=>$model,
			'tipos_asoc'=>$tipos_asoc,
			'tipos'=>$tipos,
			'dominios'=>$dominios,
			'estados'=>$estados,
			'usuarios'=>$usuarios,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cuenta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cuenta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cuenta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='Cuenta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionSearchCorreo(){
		$filtro = $_GET['q'];
		$id = $_GET['id'];
        $data = Cuenta::model()->searchByCorreo($filtro, $id);
        $result = array();
        foreach($data as $item):
           $result[] = array(
               'id'   => $item['Id_Cuenta'],
               'text' => $item['Cuenta_Correo'],
           );
        endforeach;
        header('Content-type: application/json');
        echo CJSON::encode( $result );
        Yii::app()->end(); 
 	}

 	public function actionSearchAllCorreos(){
		$filtro = $_GET['q'];
        $data = Cuenta::model()->searchByAllCorreos($filtro);
        $result = array();
        foreach($data as $item):
           $result[] = array(
               'id'   => $item['Id_Cuenta'],
               'text' => $item['Cuenta_Correo'],
           );
        endforeach;
        header('Content-type: application/json');
        echo CJSON::encode( $result );
        Yii::app()->end(); 
 	}

	public function actionSearchCorreoById(){
		$filtro = $_GET['id'];
        $data = Cuenta::model()->searchById($filtro);

        $result = array();
        foreach($data as $item):
           $result[] = array(
               'id'   => $item['Id_Cuenta'],
               'text' => $item['Cuenta_Correo'],
           );
        endforeach;

        header('Content-type: application/json');
        echo CJSON::encode( $result );
        Yii::app()->end(); 
 	}

 	public function actionExport(){
    	
    	$model=new Cuenta('search');
	    $model->unsetAttributes();  // clear any default values
	    
	    if(isset($_GET['Cuenta'])) {
	        $model->attributes=$_GET['Cuenta'];
	    }

    	$dp = $model->search();
		$dp->setPagination(false);
 
		$data = $dp->getData();

		Yii::app()->user->setState('cuenta-export',$data);
	}

	public function actionExportExcel()
	{
		$data = Yii::app()->user->getState('cuenta-export');
		$this->renderPartial('cuenta_export_excel',array('data' => $data));	
	}
}
