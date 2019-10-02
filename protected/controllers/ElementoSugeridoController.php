<?php

class ElementoSugeridoController extends Controller
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
		$model=new ElementoSugerido;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ElementoSugerido']))
		{
			$model->attributes=$_POST['ElementoSugerido'];
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

		if(isset($_POST['ElementoSugerido']))
		{
			$model->attributes=$_POST['ElementoSugerido'];
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
		$dataProvider=new CActiveDataProvider('ElementoSugerido');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ElementoSugerido('search');
		$model->unsetAttributes();  // clear any default values

		$usuarios=Usuario::model()->findAll(array('order'=>'Usuario'));

		$criteria = new CDbCriteria;
        $criteria->join ='LEFT JOIN TH_CARGO c ON t.Id_Cargo = c.Id_Cargo LEFT JOIN TH_AREA a ON t.Id_Area = a.Id_Area LEFT JOIN TH_SUBAREA s ON t.Id_Subarea = s.Id_Subarea';
        $criteria->order = 'c.Cargo ASC, s.Subarea ASC, a.Area ASC';
        $sugeridos=Sugerido::model()->findAll($criteria);

		$criteria = new CDbCriteria;
        $criteria->join ='LEFT JOIN TH_ELEMENTO e ON t.Id_Elemento = e.Id_Elemento LEFT JOIN TH_SUBAREA s ON t.Id_Subarea = s.Id_Subarea LEFT JOIN TH_AREA a ON t.Id_Area = a.Id_Area ';
        $criteria->order = 'e.Elemento ASC, s.Subarea ASC, a.Area ASC';
        $elementos_area=AreaElemento::model()->findAll($criteria);

		if(isset($_GET['ElementoSugerido']))
			$model->attributes=$_GET['ElementoSugerido'];

		$this->render('admin',array(
			'model'=>$model,
			'usuarios'=>$usuarios,
			'sugeridos' => $sugeridos,
			'elementos_area' => $elementos_area,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ElementoSugerido the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ElementoSugerido::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ElementoSugerido $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='elemento-sugerido-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
