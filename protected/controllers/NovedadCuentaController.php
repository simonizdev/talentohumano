<?php

class NovedadCuentaController extends Controller
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
				'actions'=>array('create','update', 'export', 'exportexcel','searchcuenta'),
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
		$model=new NovedadCuenta;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NovedadCuenta']))
		{
			$model->attributes=$_POST['NovedadCuenta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id_N_Cuenta));
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

		if(isset($_POST['NovedadCuenta']))
		{
			$model->attributes=$_POST['NovedadCuenta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id_N_Cuenta));
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
		$dataProvider=new CActiveDataProvider('NovedadCuenta');
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

		$model=new NovedadCuenta('search');
		$usuarios=Usuario::model()->findAll(array('order'=>'Usuario'));

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NovedadCuenta']))
			$model->attributes=$_GET['NovedadCuenta'];

		$this->render('admin',array(
			'model'=>$model,
			'usuarios'=>$usuarios,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return NovedadCuenta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=NovedadCuenta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param NovedadCuenta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='novedad-cuenta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionExport(){
    	
    	$model=new NovedadCuenta('search');
	    $model->unsetAttributes();  // clear any default values
	    
	    if(isset($_GET['NovedadCuenta'])) {
	        $model->attributes=$_GET['NovedadCuenta'];
	    }

    	$dp = $model->search();
		$dp->setPagination(false);
 
		$data = $dp->getData();

		Yii::app()->user->setState('novedad-cuenta-export',$data);
	}

	public function actionExportExcel()
	{
		$data = Yii::app()->user->getState('novedad-cuenta-export');	
		$this->renderPartial('novedad_cuenta_export_excel',array('data' => $data));	
	}

	public function actionSearchCuenta(){
		$filtro = $_GET['q'];
        $data = NovedadCuenta::model()->searchByCuenta($filtro);
        $result = array();
        foreach($data as $item):
           $result[] = array(
               'id'   => $item['Id_Cuenta'],
               'text' => $item['Desc_Cuenta_Usuario'],
           );
        endforeach;
        header('Content-type: application/json');
        echo CJSON::encode( $result );
        Yii::app()->end(); 
 	}
}
