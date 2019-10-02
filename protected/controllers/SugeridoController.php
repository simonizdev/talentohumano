<?php

class SugeridoController extends Controller
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
				'actions'=>array('create','update','searchsug','searchsugbyid'),
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
		$model=new Sugerido;

		$cargos = Yii::app()->db->createCommand('SELECT c.Id_Cargo, c.Cargo FROM TH_CARGO c WHERE c.Estado = 1 ORDER BY c.Cargo')->queryAll();
		$subareas = Yii::app()->db->createCommand('SELECT s.Id_Subarea, s.Subarea FROM TH_SUBAREA s WHERE s.Estado = 1 ORDER BY s.Subarea')->queryAll();
		$areas = Yii::app()->db->createCommand('SELECT a.Id_Area, a.Area FROM TH_AREA a WHERE a.Estado = 1 ORDER BY a.Area')->queryAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sugerido']))
		{
			$model->attributes=$_POST['Sugerido'];
			$model->Id_Usuario_Creacion = Yii::app()->user->getState('id_user');
			$model->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
			$model->Fecha_Creacion = date('Y-m-d H:i:s');
			$model->Fecha_Actualizacion = date('Y-m-d H:i:s');
			if($model->save()){
				$this->redirect(array('admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'cargos'=>$cargos,
			'subareas'=>$subareas,
			'areas'=>$areas,		
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
		
		$area_act = $model->Id_Area;
		$subarea_act = $model->Id_Subarea;
		$cargo_act = $model->Id_Cargo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(!is_null($cargo_act)){
			$cargos= Yii::app()->db->createCommand('SELECT c.Id_Cargo, c.Cargo FROM TH_CARGO c WHERE (c.Estado = 1 OR c.Id_Cargo = '.$cargo_act.') ORDER BY c.Cargo')->queryAll();
		}else{
			$cargos= Yii::app()->db->createCommand('SELECT a.Id_Area, a.Area FROM TH_CARGO c WHERE a.Estado = 1 ORDER BY a.Area')->queryAll();
		}

		if(!is_null($subarea_act)){
			$subareas= Yii::app()->db->createCommand('SELECT s.Id_Subarea, s.Subarea FROM TH_SUBAREA s WHERE (s.Estado = 1 OR s.Id_Subarea = '.$subarea_act.') ORDER BY s.Subarea')->queryAll();
		}else{
			$subareas= Yii::app()->db->createCommand('SELECT s.Id_Subarea, s.Subarea FROM TH_SUBAREA s WHERE s.Estado = 1 ORDER BY s.Subarea')->queryAll();
		}

		if(!is_null($area_act)){
			$areas= Yii::app()->db->createCommand('SELECT a.Id_Area, a.Area FROM TH_AREA a WHERE (a.Estado = 1 OR a.Id_Area = '.$area_act.') ORDER BY a.Area')->queryAll();
		}else{
			$areas= Yii::app()->db->createCommand('SELECT a.Id_Area, a.Area FROM TH_AREA a WHERE a.Estado = 1 ORDER BY a.Area')->queryAll();
		}
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sugerido']))
		{
			$model->attributes=$_POST['Sugerido'];
			$model->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
			$model->Fecha_Actualizacion = date('Y-m-d H:i:s');
			if($model->save()){
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'cargos'=>$cargos,
			'subareas'=>$subareas,
			'areas'=>$areas,
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
		$dataProvider=new CActiveDataProvider('Sugerido');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Sugerido('search');
		$cargos=Cargo::model()->findAll(array('order'=>'Cargo'));
		$subareas=Subarea::model()->findAll(array('order'=>'Subarea'));
		$areas=Area::model()->findAll(array('order'=>'Area'));
		$usuarios=Usuario::model()->findAll(array('order'=>'Usuario'));

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sugerido']))
			$model->attributes=$_GET['Sugerido'];

		$this->render('admin',array(
			'model'=>$model,
			'cargos'=>$cargos,
			'subareas'=>$subareas,
			'areas'=>$areas,
			'usuarios'=>$usuarios,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sugerido the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Sugerido::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sugerido $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sugerido-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

 	public function actionSearchSug(){
		$filtro = $_GET['q'];
        $data = Sugerido::model()->searchBySug($filtro);
        $result = array();

        foreach($data as $item):

        	if(empty($item['Cargo'])){
        		$cargo = 'NO ASIGNADO';
        	}else{
        		$cargo = $item['Cargo'];
        	}

        	if(empty($item['Subarea'])){
        		$subarea = 'NO ASIGNADO';
        	}else{
        		$subarea = $item['Subarea'];
        	}

        	if(empty($item['Area'])){
        		$area = 'NO ASIGNADO';
        	}else{
        		$area = $item['Area'];
        	}

 			$text = $cargo." (".$subarea." / ".$area.")";


           $result[] = array(
               'id'   => $item['Id'],
               'text' => $text,
           );
        endforeach;
        header('Content-type: application/json');
        echo CJSON::encode( $result );
        Yii::app()->end(); 
 	}

	public function actionSearchSugById(){
		$filtro = $_GET['id'];
        $data = Sugerido::model()->searchById($filtro);
   
       	if(is_null($data->Id_Cargo)){
 			$cargo = 'NO ASIGNADO';
 		}else{
 			$cargo = $data->idcargo->Cargo;
 		}

 		if(is_null($data->Id_Subarea)){
 			$subarea = 'NO ASIGNADO';
 		}else{
 			$subarea = $data->idsubarea->Subarea;
 		}

 		if(is_null($data->Id_Area)){
 			$area = 'NO ASIGNADO';
 		}else{
 			$area = $data->idarea->Area;
 		}

 		$id = $data->Id_Sugerido;
 		$text = $cargo." (".$subarea." / ".$area.")";

       	$result[] = 
       	array(
           'id'   => $id,
           'text' => $text,
       	);

        header('Content-type: application/json');
        echo CJSON::encode( $result );
        Yii::app()->end(); 
 	}
}
