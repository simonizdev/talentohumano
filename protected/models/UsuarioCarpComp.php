<?php

/**
 * This is the model class for table "TH_USUARIO_CARP_COMP".
 *
 * The followings are the available columns in table 'TH_USUARIO_CARP_COMP':
 * @property integer $Id_Usuario_Carp_Comp
 * @property integer $Id_Carp_Comp
 * @property integer $Id_Empleado
 * @property string $Usuario
 * @property string $Password
 * @property integer $Permiso
 * @property integer $Id_Usuario_Creacion
 * @property integer $Id_Usuario_Actualizacion
 * @property string $Fecha_Creacion
 * @property string $Fecha_Actualizacion
 * @property integer $Estado
 *
 * The followings are the available model relations:
 * @property THCARPCOMP $idCarpComp
 * @property THEMPLEADO $idEmpleado
 * @property THUSUARIO $idUsuarioCreacion
 * @property THUSUARIO $idUsuarioActualizacion
 */
class UsuarioCarpComp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TH_USUARIO_CARP_COMP';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Id_Empleado', 'required', 'on' => 'create_gen'),
			array('Id_Empleado, Usuario, Password, Permiso', 'required', 'on' => 'create_per'),
			array('Id_Carp_Comp, Id_Empleado, Usuario, Password, Permiso', 'required', 'on' => 'update'),
			array('Id_Carp_Comp, Id_Empleado, Permiso, Id_Usuario_Creacion, Id_Usuario_Actualizacion, Estado', 'numerical', 'integerOnly'=>true),
			array('Usuario', 'length', 'max'=>30),
			array('Password', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id_Usuario_Carp_Comp, Id_Carp_Comp, Id_Empleado, Usuario, Password, Permiso, Id_Usuario_Creacion, Id_Usuario_Actualizacion, Fecha_Creacion, Fecha_Actualizacion, Estado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idcarpcomp' => array(self::BELONGS_TO, 'CarpComp', 'Id_Carp_Comp'),
			'idempleado' => array(self::BELONGS_TO, 'Empleado', 'Id_Empleado'),
			'idusuariocre' => array(self::BELONGS_TO, 'Usuario', 'Id_Usuario_Creacion'),
			'idusuarioact' => array(self::BELONGS_TO, 'Usuario', 'Id_Usuario_Actualizacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id_Usuario_Carp_Comp' => 'ID',
			'Id_Carp_Comp' => 'ID carpeta comp.',
			'Id_Empleado' => 'Empleado',
			'Usuario' => 'Usuario',
			'Password' => 'Password',
			'Permiso' => 'Permisos',
			'Id_Usuario_Creacion' => 'Usuario que creo',
			'Id_Usuario_Actualizacion' => 'Usuario que actualizó',
			'Fecha_Creacion' => 'Fecha de creación',
			'Fecha_Actualizacion' => 'Fecha de actualización',
			'Estado' => 'Estado',
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
	   	$criteria->with=array('idempleado');

		$criteria->compare('t.Id_Usuario_Carp_Comp',$this->Id_Usuario_Carp_Comp);
		$criteria->compare('t.Id_Carp_Comp',$this->Id_Carp_Comp);
		$criteria->compare('t.Id_Empleado',$this->Id_Empleado);
		$criteria->compare('t.Usuario',$this->Usuario,true);
		$criteria->compare('t.Password',$this->Password,true);
		$criteria->compare('t.Permiso',$this->Permiso,true);
		$criteria->compare('t.Id_Usuario_Creacion',$this->Id_Usuario_Creacion);
		$criteria->compare('t.Id_Usuario_Actualizacion',$this->Id_Usuario_Actualizacion);
		$criteria->compare('t.Fecha_Creacion',$this->Fecha_Creacion,true);
		$criteria->compare('t.Fecha_Actualizacion',$this->Fecha_Actualizacion,true);
		$criteria->compare('t.Estado',$this->Estado);
		$criteria->order = 'idempleado.Apellido ASC'; 

		return new CActiveDataProvider($this, array(
			'pagination' => array('pageSize'=> 25),
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuarioCarpComp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
