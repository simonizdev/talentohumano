<?php

/**
 * This is the model class for table "TH_CARP_COMP".
 *
 * The followings are the available columns in table 'TH_CARP_COMP':
 * @property integer $Id_Carpeta_Comp
 * @property integer $Tipo_Acceso
 * @property string $Servidor
 * @property string $Carpeta
 * @property string $Ruta
 * @property string $Usuario
 * @property string $Password
 * @property integer $Id_Usuario_Creacion
 * @property integer $Id_Usuario_Actualizacion
 * @property string $Fecha_Creacion
 * @property string $Fecha_Actualizacion
 * @property integer $Estado
 *
 * The followings are the available model relations:
 * @property THDOMINIO $tipoAcceso
 * @property THUSUARIO $idUsuarioCreacion
 * @property THUSUARIO $idUsuarioActualizacion
 * @property THUSUARIOCARPCOMP[] $tHUSUARIOCARPCOMPs
 */
class CarpComp extends CActiveRecord
{
	public $usuario_gen;
	public $password_gen;
	public $id_empleado_gen;
	public $usuario_per;
	public $password_per;
	public $id_empleado_per;
	public $permiso_per;
	public $cad_emps;
	public $cad_usuarios;
	public $cad_passwords;
	public $orderby;
	public $num_usua;
	public $cad_permisos;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TH_CARP_COMP';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('Servidor, Carpeta, Ruta, Usuario, Password, Estado', 'required', 'on' => 'update'),
			array('Tipo_Acceso, Id_Usuario_Creacion, Id_Usuario_Actualizacion, Estado', 'numerical', 'integerOnly'=>true),
			array('Servidor, Carpeta, Ruta, Password', 'length', 'max'=>200),
			array('Usuario', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id_Carpeta_Comp, Tipo_Acceso, Servidor, Carpeta, Ruta, Usuario, Password, Id_Usuario_Creacion, Id_Usuario_Actualizacion, Fecha_Creacion, Fecha_Actualizacion, Estado, orderby', 'safe', 'on'=>'search'),
		);
	}

	public function Num_Usuarios($id_carp_comp){

		$modelo_act = UsuarioCarpComp::model()->findAllByAttributes(array('Id_Carp_Comp'=> $id_carp_comp, 'Estado' => 1));

		if(!empty($modelo_act)){	
			$num_usuarios = count($modelo_act);
        	return $num_usuarios;
		}else{
			return 0;
		}

    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tipoacceso' => array(self::BELONGS_TO, 'Dominio', 'Tipo_Acceso'),
			'idusuariocre' => array(self::BELONGS_TO, 'Usuario', 'Id_Usuario_Creacion'),
			'idusuarioact' => array(self::BELONGS_TO, 'Usuario', 'Id_Usuario_Actualizacion'),
			'tHUSUARIOCARPCOMPs' => array(self::HAS_MANY, 'THUSUARIOCARPCOMP', 'Id_Carp_Comp'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id_Carpeta_Comp' => 'ID',
			'Tipo_Acceso' => 'Tipo de acceso',
			'Servidor' => 'Servidor',
			'Carpeta' => 'Carpeta',
			'Ruta' => 'Ruta',
			'Usuario' => 'Usuario',
			'Password' => 'Password',
			'Id_Usuario_Creacion' => 'Usuario que creo',
			'Id_Usuario_Actualizacion' => 'Usuario que actualizó',
			'Fecha_Creacion' => 'Fecha de creación',
			'Fecha_Actualizacion' => 'Fecha de actualización',
			'Estado' => 'Estado',
			'usuario_gen' => 'Usuario',
			'password_gen' => 'Password',
			'id_empleado_gen' => 'Empleado',
			'usuario_per' => 'Usuario',
			'password_per' => 'Password',
			'permiso_per' => 'Permisos',
			'id_empleado_per' => 'Empleado',
			'orderby' => 'Orden de resultados',	
			'num_usua' => 'N° de usuarios act.',
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

		$criteria->compare('t.Id_Carpeta_Comp',$this->Id_Carpeta_Comp);
		$criteria->compare('t.Tipo_Acceso',$this->Tipo_Acceso);
		$criteria->compare('t.Servidor',$this->Servidor,true);
		$criteria->compare('t.Carpeta',$this->Carpeta,true);
		$criteria->compare('t.Ruta',$this->Ruta,true);
		$criteria->compare('t.Usuario',$this->Usuario,true);
		$criteria->compare('t.Password',$this->Password,true);
		$criteria->compare('t.Id_Usuario_Creacion',$this->Id_Usuario_Creacion);
		$criteria->compare('t.Id_Usuario_Actualizacion',$this->Id_Usuario_Actualizacion);
		$criteria->compare('t.Fecha_Creacion',$this->Fecha_Creacion,true);
		$criteria->compare('t.Fecha_Actualizacion',$this->Fecha_Actualizacion,true);
		$criteria->compare('t.Estado',$this->Estado);

		if(empty($this->orderby)){
			$criteria->order = 't.Id_Carpeta_Comp DESC'; 	
		}else{
			switch ($this->orderby) {
			    case 1:
			        $criteria->order = 't.Servidor ASC'; 
			        break;
			    case 2:
			        $criteria->order = 't.Servidor DESC'; 
			        break;
			    case 3:
			        $criteria->order = 't.Carpeta ASC'; 
			        break;
			    case 4:
			        $criteria->order = 't.Carpeta DESC'; 
			        break; 
		        case 5:
			        $criteria->order = 't.Ruta ASC'; 
			        break;
			    case 6:
			        $criteria->order = 't.Ruta DESC'; 
			        break;
			    case 7:
			        $criteria->order = 't.Tipo_Acceso ASC'; 
			        break;
			    case 8:
			        $criteria->order = 't.Tipo_Acceso DESC'; 
			        break;
			    case 9:
			        $criteria->order = 't.Estado DESC'; 
			        break;
			    case 10:
			        $criteria->order = 't.Estado ASC'; 
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
	 * @return CarpComp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
