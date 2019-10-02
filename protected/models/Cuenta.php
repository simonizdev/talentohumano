<?php

/**
 * This is the model class for table "TH_CUENTA".
 *
 * The followings are the available columns in table 'TH_CUENTA':
 * @property integer $Id_Cuenta
 * @property integer $Id_Empleado
 * @property integer $Tipo
 * @property string $Cuenta_Correo
 * @property integer $Dominio
 * @property string $Password_Correo
 * @property string $Cuenta_Skype
 * @property string $Password_Skype
 * @property integer $Cuenta_Correo_Red
 * @property string $Observaciones
 * @property integer $Estado
 * @property integer $Id_Usuario_Creacion
 * @property integer $Id_Usuario_Actualizacion
 * @property string $Fecha_Creacion
 * @property string $Fecha_Actualizacion
 * @property string $Usuario
 * @property integer $Tipo_Asociacion
 * @property string $Cuenta_Skype
 * @property string $Password_Skype
 * @property string $Usuario_Glpi
 * @property string $Password_Glpi
 * @property string $Usuario_Papercut
 * @property string $Password_Papercut
 *
 * The followings are the available model relations:
 * @property THDOMINIO $tipo
 * @property THDOMINIO $dominio
 * @property THDOMINIO $estado
 * @property THEMPLEADO $idEmpleado
 * @property THUSUARIO $idUsuarioCreacion
 * @property THUSUARIO $idUsuarioActualizacion
 * @property THNOVEDADCORREO[] $tHNOVEDADCORREOs
 */
class Cuenta extends CActiveRecord
{

	public $orderby;
	public $area;
	public $cargo;
	public $estado_emp;
	public $Estado2;
	public $empresa_emp;	

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TH_CUENTA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('Tipo, Cuenta_Correo, Dominio, Password_Correo, Estado, Usuario', 'required'),
			array('Cuenta_Correo','email', 'message'=>'Correo no valido'),
			array('Id_Empleado, Tipo, Dominio, Estado, Id_Usuario_Creacion, Id_Usuario_Actualizacion, Cuenta_Correo_Red, Tipo_Asociacion', 'numerical', 'integerOnly'=>true),
			array('Cuenta_Correo, Cuenta_Skype, Usuario_Siesa, Usuario_Glpi, Usuario_Papercut', 'length', 'max'=>100),
			array('Password_Correo, Password_Skype, Usuario, Password_Siesa, Password_Glpi, Password_Papercut', 'length', 'max'=>50),
			array('Observaciones', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id_Cuenta, Tipo_Asociacion, Id_Empleado, Tipo, Cuenta_Correo, Dominio, Password_Correo, Cuenta_Skype, Password_Skype, Usuario_Siesa, Password_Siesa, Usuario_Glpi, Password_Glpi, Usuario_Papercut, Password_Papercut, Cuenta_Correo_Red, Estado, Id_Usuario_Creacion, Id_Usuario_Actualizacion, Fecha_Creacion, Fecha_Actualizacion, orderby', 'safe', 'on'=>'search'),
		);
	}

	public function searchByCorreo($filtro, $id) {

		if($id == 0){
			$resp = Yii::app()->db->createCommand("
			    SELECT TOP 10 Id_Cuenta , Cuenta_Correo FROM TH_CUENTA WHERE (Cuenta_Correo LIKE '%".$filtro."%') AND Estado = ".Yii::app()->params->estado_act." ORDER BY Cuenta_Correo 
			")->queryAll();
	        return $resp;
		}else{
			$resp = Yii::app()->db->createCommand("
			    SELECT TOP 10 Id_Cuenta , Cuenta_Correo FROM TH_CUENTA WHERE (Cuenta_Correo LIKE '%".$filtro."%') AND Id_Cuenta != ".$id." AND Estado = ".Yii::app()->params->estado_act." ORDER BY Cuenta_Correo 
			")->queryAll();
	        return $resp;
		}

 	}

 	public function searchByAllCorreos($filtro) {

		$resp = Yii::app()->db->createCommand("
		    SELECT TOP 10 Id_Cuenta , Cuenta_Correo FROM TH_CUENTA WHERE (Cuenta_Correo LIKE '%".$filtro."%') ORDER BY Cuenta_Correo 
		")->queryAll();
        return $resp;
 	}

 	public function searchById($filtro) {
 
        $resp = Yii::app()->db->createCommand("
		    SELECT Id_Cuenta , Cuenta_Correo FROM TH_CUENTA WHERE  Id_Cuenta = '".$filtro."'")->queryAll();
        return $resp;

 	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tipoasociacion' => array(self::BELONGS_TO, 'Dominio', 'Tipo_Asociacion'),
			'tipo' => array(self::BELONGS_TO, 'Dominio', 'Tipo'),
			'dominio' => array(self::BELONGS_TO, 'DominioWeb', 'Dominio'),
			'estado' => array(self::BELONGS_TO, 'Dominio', 'Estado'),
			'idempleado' => array(self::BELONGS_TO, 'Empleado', 'Id_Empleado'),
			'idusuariocre' => array(self::BELONGS_TO, 'Usuario', 'Id_Usuario_Creacion'),
			'idusuarioact' => array(self::BELONGS_TO, 'Usuario', 'Id_Usuario_Actualizacion'),
			'cuentacorreored' => array(self::BELONGS_TO, 'Cuenta', 'Cuenta_Correo_Red'),
			'tHNOVEDADCORREOs' => array(self::HAS_MANY, 'THNOVEDADCORREO', 'Id_Cuenta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id_Cuenta' => 'ID',
			'Id_Empleado' => 'Empleado',
			'Tipo' => 'Tipo de cuenta',
			'Cuenta_Correo' => 'Cuenta de correo',
			'Dominio' => 'Dominio',
			'Password_Correo' => 'Password correo',
			'Cuenta_Skype' => 'Cuenta de skype',
			'Password_Skype' => 'Password skype',
			'Cuenta_Correo_Red' => 'Cuenta de correo para redirección',
			'Observaciones' => 'Observaciones',
			'Estado' => 'Estado de cuenta',
			'Id_Usuario_Creacion' => 'Usuario que creo',
			'Id_Usuario_Actualizacion' => 'Usuario que actualizó',
			'Fecha_Creacion' => 'Fecha de creación',
			'Fecha_Actualizacion' => 'Fecha de actualización',
			'Usuario' => 'Usuario',
			'usuario_creacion' => 'Usuario que creo',
			'usuario_actualizacion' => 'Usuario que actualizó',
			'orderby' => 'Orden de resultados',
			'area' => 'Área',
			'cargo' => 'Cargo',
			'estado_emp' => 'Estado de empleado',
			'Tipo_Asociacion' => 'Tipo de asociación',
			'Usuario_Siesa' => 'Usuario siesa',
			'Password_Siesa' => 'Password siesa',
			'Usuario_Glpi' => 'Usuario glpi',
			'Password_Glpi' => 'Password glpi',
			'Usuario_Papercut' =>'Usuario papercut',
			'Password_Papercut' => 'Password papercut',
			'Estado2' => 'Estado',
			'empresa_emp' => 'Empresa',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->together  =  true;
	   	$criteria->with=array('idempleado', 'tipoasociacion', 'tipo', 'dominio', 'cuentacorreored', 'estado');

		$criteria->compare('t.Id_Cuenta',$this->Id_Cuenta);
		$criteria->compare('t.Tipo_Asociacion',$this->Tipo_Asociacion);
		$criteria->compare('t.Id_Empleado',$this->Id_Empleado);
		$criteria->compare('t.Tipo',$this->Tipo);
		$criteria->compare('t.Dominio',$this->Dominio);
		$criteria->compare('t.Cuenta_Correo',$this->Cuenta_Correo,true);
		$criteria->compare('t.Password_Correo',$this->Password_Correo,true);
		$criteria->compare('t.Cuenta_Skype',$this->Cuenta_Skype,true);
		$criteria->compare('t.Password_Skype',$this->Password_Skype,true);
		$criteria->compare('t.Usuario_Siesa',$this->Usuario_Siesa,true);
		$criteria->compare('t.Password_Siesa',$this->Password_Siesa,true);
		$criteria->compare('t.Usuario_Glpi',$this->Usuario_Glpi,true);
		$criteria->compare('t.Password_Glpi',$this->Password_Glpi,true);
		$criteria->compare('t.Cuenta_Correo_Red',$this->Cuenta_Correo_Red,true);
		$criteria->compare('t.Estado',$this->Estado);
		/*$criteria->compare('t.Observaciones',$this->Observaciones,true);
		$criteria->compare('t.Id_Usuario_Creacion',$this->Id_Usuario_Creacion);
		$criteria->compare('t.Id_Usuario_Actualizacion',$this->Id_Usuario_Actualizacion);
		$criteria->compare('t.Fecha_Creacion',$this->Fecha_Creacion,true);
		$criteria->compare('t.Fecha_Actualizacion',$this->Fecha_Actualizacion,true);
		$criteria->compare('t.Usuario',$this->Usuario,true);*/
		$criteria->order = 't.Id_Cuenta DESC'; 

		if(empty($this->orderby)){
			$criteria->order = 't.Id_Cuenta DESC'; 	
		}else{
			switch ($this->orderby) {
			    case 1:
			        $criteria->order = 't.Id_Cuenta ASC'; 
			        break;
			    case 2:
			        $criteria->order = 't.Id_Cuenta DESC'; 
			        break;
			    case 3:
			        $criteria->order = 'tipoasociacion.Dominio ASC'; 
			        break;
			    case 4:
			        $criteria->order = 'tipoasociacion.Dominio DESC'; 
			        break;    
			    case 5:
			        $criteria->order = 'idempleado.Nombre ASC, idempleado.Apellido ASC'; 
			        break;
			    case 6:
			        $criteria->order = 'idempleado.Nombre DESC, idempleado.Apellido DESC'; 
			        break;
		        case 7:
			        $criteria->order = 'tipo.Dominio ASC'; 
			        break;
			    case 8:
			        $criteria->order = 'tipo.Dominio DESC'; 
			        break;
			    case 9:
			        $criteria->order = 'dominio.Dominio ASC'; 
			        break;
			    case 10:
			        $criteria->order = 'dominio.Dominio DESC'; 
			        break;
			    case 11:
			        $criteria->order = 't.Cuenta_Correo ASC'; 
			        break;
			    case 12:
			        $criteria->order = 't.Cuenta_Correo DESC'; 
			        break;
			    case 13:
			        $criteria->order = 't.Cuenta_Skype ASC'; 
			        break;
			    case 14:
			        $criteria->order = 't.Cuenta_Skype DESC'; 
			        break;
		        case 15:
			        $criteria->order = 't.Usuario_Siesa ASC'; 
			        break;
			    case 16:
			        $criteria->order = 't.Usuario_Siesa DESC'; 
			        break;
			    case 17:
			        $criteria->order = 't.Usuario_Glpi ASC'; 
			        break;
			    case 18:
			        $criteria->order = 't.Usuario_Glpi DESC'; 
			        break;
			    case 19:
			        $criteria->order = 't.Usuario_Papercut ASC'; 
			        break;
			    case 20:
			        $criteria->order = 't.Usuario_Papercut DESC'; 
			        break;
			    case 21:
			        $criteria->order = 'cuentacorreored.Cuenta_Correo ASC'; 
			        break;
			    case 22:
			        $criteria->order = 'cuentacorreored.Cuenta_Correo DESC'; 
			        break;
			    case 23:
			        $criteria->order = 'estado.Dominio ASC'; 
			        break;
			    case 24:
			        $criteria->order = 'estado.Dominio DESC'; 
			        break;
			}
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize'])),		
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Correo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
