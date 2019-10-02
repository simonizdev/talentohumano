<?php

class DominioMedicoController extends Controller
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
				'actions'=>array('create','update','searchcie10','getriesgos','searchpadre', 'searchpadrebyid'),
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
		$model=new DominioMedico;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DominioMedico']))
		{
			$model->attributes=$_POST['DominioMedico'];
			$model->Id_Usuario_Creacion = Yii::app()->user->getState('id_user');
			$model->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
			$model->Fecha_Creacion = date('Y-m-d H:i:s');
			$model->Fecha_Actualizacion = date('Y-m-d H:i:s');
			if($model->save())
				$this->redirect(array('admin'));
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

		if(isset($_POST['DominioMedico']))
		{
			$model->attributes=$_POST['DominioMedico'];
			$model->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
			$model->Fecha_Actualizacion = date('Y-m-d H:i:s');
			if($model->save())
				$this->redirect(array('admin'));
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
		$dataProvider=new CActiveDataProvider('DominioMedico');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DominioMedico('search');
		$usuarios=Usuario::model()->findAll(array('order'=>'Usuario'));

		$opciones_p= Yii::app()->db->createCommand('
		    SELECT d.Id_Dominio_Medico, d.Dominio 
		    FROM TH_DOMINIO_MEDICO d
		    WHERE EXISTS (SELECT COUNT(*) FROM TH_DOMINIO_MEDICO sd WHERE sd.Id_Padre = d.Id_Dominio_Medico HAVING COUNT(*) > 0)
		    GROUP BY d.Id_Dominio_Medico, d.Dominio ORDER BY d.Dominio
		')->queryAll();

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DominioMedico']))
			$model->attributes=$_GET['DominioMedico'];

		$this->render('admin',array(
			'model'=>$model,
			'usuarios'=>$usuarios,
			'opciones_p'=>$opciones_p,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DominioMedico the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DominioMedico::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DominioMedico $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='dominio-medico-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionSearchCie10(){
		$filtro = $_GET['q'];
        $data = DominioMedico::model()->searchByCie10($filtro);
        $result = array();
        foreach($data as $item):
           $result[] = array(
               'id'   => $item['Id_Dominio_Medico'],
               'text' => $item['Dominio'],
           );
        endforeach;
        header('Content-type: application/json');
        echo CJSON::encode( $result );
        Yii::app()->end(); 
 	}

 	public function actionSearchPadre(){
		$filtro = $_GET['q'];
        $data = DominioMedico::model()->searchPadre($filtro);
        $result = array();
        foreach($data as $item):
           $result[] = array(
               'id'   => $item['Id_Dominio_Medico'],
               'text' => $item['Dominio'],
           );
        endforeach;
        header('Content-type: application/json');
        echo CJSON::encode( $result );
        Yii::app()->end(); 
 	}

 	public function actionSearchPadreById(){
		$filtro = $_GET['id'];
        $data = DominioMedico::model()->searchPadreById($filtro);

        $result = array();
        foreach($data as $item):
           $result[] = array(
               'id'   => $item['Id_Dominio_Medico'],
               'text' => $item['Dominio'],
           );
        endforeach;

        header('Content-type: application/json');
        echo CJSON::encode( $result );
        Yii::app()->end(); 
 	}

 	public function actionGetRiesgos()
	{	
		$tipo_riesgo = $_POST['tipo_riesgo'];

		$array = array();
		
	   	$criteria = new CDbCriteria;
        $criteria->condition = 't.Id_Padre = :Id_Padre AND t.Estado = :Estado';
        $criteria->order = 't.Dominio';
        $criteria->params = array(":Id_Padre" => $tipo_riesgo, ":Estado" => 1);
        $riegos = DominioMedico::model()->findAll($criteria);

	   	$i = 0;
		$array_riesgos = array();
		foreach ($riegos as $r) {
        	$array_riesgos[$i] = array('id' => $r->Id_Dominio_Medico,  'text' => $r->Dominio);
        	$i++; 		
        }

		$array['riesgos'] = $array_riesgos;

		//se retorna un json con las opciones
		echo json_encode($array);

	}
}
