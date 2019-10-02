<?php

/**
 * This is the model class for table "TH_DOMINIO".
 *
 * The followings are the available columns in table 'TH_DOMINIO':
 * @property integer $Id_Dominio
 * @property integer $Id_Padre
 * @property integer $Id_Usuario_Creacion
 * @property integer $Id_Usuario_Actualizacion
 * @property string $Dominio
 * @property integer $Estado
 * @property string $Fecha_Creacion
 * @property string $Fecha_Actualizacion
 *
 * The followings are the available model relations:
 * @property THDISCIPLINARIOEMPLEADO[] $tHDISCIPLINARIOEMPLEADOs
 * @property THNUCLEOEMPLEADO[] $tHNUCLEOEMPLEADOs
 * @property THNUCLEOEMPLEADO[] $tHNUCLEOEMPLEADOs1
 * @property THEMPLEADO[] $tHEMPLEADOs
 * @property THEMPLEADO[] $tHEMPLEADOs1
 * @property THEMPLEADO[] $tHEMPLEADOs2
 * @property THEMPLEADO[] $tHEMPLEADOs3
 * @property THEMPLEADO[] $tHEMPLEADOs4
 * @property THEMPLEADO[] $tHEMPLEADOs5
 * @property THEMPLEADO[] $tHEMPLEADOs6
 * @property THEMPLEADO[] $tHEMPLEADOs7
 * @property THEMPLEADO[] $tHEMPLEADOs8
 * @property THCONTRATOEMPLEADO[] $tHCONTRATOEMPLEADOs
 * @property THAUSENCIAEMPLEADO[] $tHAUSENCIAEMPLEADOs
 * @property Dominio $idPadre
 * @property Dominio[] $tHDOMINIOs
 * @property THUSUARIO $idUsuarioCreacion
 * @property THUSUARIO $idUsuarioActualizacion
 */
class Dominio extends CActiveRecord
{
	
	public $padre;
	public $usuario_creacion;
	public $usuario_actualizacion;
	public $orderby;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TH_DOMINIO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Id_Padre, Dominio, Estado', 'required'),
			array('Id_Padre, Id_Usuario_Creacion, Id_Usuario_Actualizacion, Estado', 'numerical', 'integerOnly'=>true),
			array('Dominio', 'length', 'max'=>100),
			array('Fecha_Creacion, Fecha_Actualizacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id_Dominio, Id_Padre, Id_Usuario_Creacion, Id_Usuario_Actualizacion, Dominio, Estado, Fecha_Creacion, Fecha_Actualizacion, padre, usuario_creacion, usuario_actualizacion, orderby', 'safe', 'on'=>'search'),
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
			'idpadre' => array(self::BELONGS_TO, 'Dominio', 'Id_Padre'),
			'idusuariocre' => array(self::BELONGS_TO, 'Usuario', 'Id_Usuario_Creacion'),
			'idusuarioact' => array(self::BELONGS_TO, 'Usuario', 'Id_Usuario_Actualizacion'),
			'tHDISCIPLINARIOEMPLEADOs' => array(self::HAS_MANY, 'THDISCIPLINARIOEMPLEADO', 'Id_M_Disciplinario'),
			'tHNUCLEOEMPLEADOs' => array(self::HAS_MANY, 'THNUCLEOEMPLEADO', 'Id_Genero'),
			'tHNUCLEOEMPLEADOs1' => array(self::HAS_MANY, 'THNUCLEOEMPLEADO', 'Id_Parentesco'),
			'tHEMPLEADOs' => array(self::HAS_MANY, 'THEMPLEADO', 'Id_Rh'),
			'tHEMPLEADOs1' => array(self::HAS_MANY, 'THEMPLEADO', 'Id_Estado_Civil'),
			'tHEMPLEADOs2' => array(self::HAS_MANY, 'THEMPLEADO', 'Id_Banco'),
			'tHEMPLEADOs3' => array(self::HAS_MANY, 'THEMPLEADO', 'Id_T_Cuenta'),
			'tHEMPLEADOs4' => array(self::HAS_MANY, 'THEMPLEADO', 'Id_Genero'),
			'tHEMPLEADOs5' => array(self::HAS_MANY, 'THEMPLEADO', 'Id_Tipo_Ident'),
			'tHEMPLEADOs6' => array(self::HAS_MANY, 'THEMPLEADO', 'Id_Eps'),
			'tHEMPLEADOs7' => array(self::HAS_MANY, 'THEMPLEADO', 'Id_Fondo_P'),
			'tHEMPLEADOs8' => array(self::HAS_MANY, 'THEMPLEADO', 'Id_Arl'),
			'tHCONTRATOEMPLEADOs' => array(self::HAS_MANY, 'THCONTRATOEMPLEADO', 'Id_M_Retiro'),
			'tHAUSENCIAEMPLEADOs' => array(self::HAS_MANY, 'THAUSENCIAEMPLEADO', 'Id_M_Ausencia'),
			'tHDOMINIOs' => array(self::HAS_MANY, 'Dominio', 'Id_Padre'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id_Dominio' => 'ID',
			'Id_Padre' => 'Dominio padre',
			'Id_Usuario_Creacion' => 'Usuario que creo',
			'Id_Usuario_Actualizacion' => 'Usuario que actualizó',
			'Dominio' => 'Dominio',
			'Estado' => 'Estado',
			'Fecha_Creacion' => 'Fecha de creación',
			'Fecha_Actualizacion' => 'Fecha de actualización',
			'padre' => 'Dominio padre',
			'usuario_creacion' => 'Usuario que creo',
			'usuario_actualizacion' => 'Usuario que actualizó',
			'orderby' => 'Orden de resultados',
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
	   	$criteria->with=array('idusuariocre','idusuarioact', 'idpadre');

		$criteria->compare('t.Id_Dominio',$this->Id_Dominio);
		$criteria->compare('t.Dominio',$this->Dominio,true);
		$criteria->compare('t.Estado',$this->Estado);
		$criteria->AddCondition("t.Id_Dominio != 1"); 

		if($this->Fecha_Creacion != ""){
      		$fci = $this->Fecha_Creacion." 00:00:00";
      		$fcf = $this->Fecha_Creacion." 23:59:59";

      		$criteria->addBetweenCondition('t.Fecha_Creacion', $fci, $fcf);
    	}

    	if($this->Fecha_Actualizacion != ""){
      		$fai = $this->Fecha_Actualizacion." 00:00:00";
      		$faf = $this->Fecha_Actualizacion." 23:59:59";

      		$criteria->addBetweenCondition('t.Fecha_Actualizacion', $fai, $faf);
    	}

		if($this->usuario_creacion != ""){
			$criteria->AddCondition("idusuariocre.Usuario = '".$this->usuario_creacion."'"); 
	    }

    	if($this->usuario_actualizacion != ""){
			$criteria->AddCondition("idusuarioact.Usuario = '".$this->usuario_actualizacion."'"); 
	    }

	    if($this->padre != ""){
			$criteria->AddCondition("idpadre.Dominio = '".$this->padre."'"); 
	    }

	    if(empty($this->orderby)){
			$criteria->order = 't.Id_Dominio DESC'; 	
		}else{
			switch ($this->orderby) {
			    case 1:
			        $criteria->order = 't.Id_Dominio ASC'; 
			        break;
			    case 2:
			        $criteria->order = 't.Id_Dominio DESC'; 
			        break;
			    case 3:
			        $criteria->order = 'idpadre.Dominio ASC'; 
			        break;
			    case 4:
			        $criteria->order = 'idpadre.Dominio DESC'; 
			        break;
			    case 5:
			        $criteria->order = 't.Dominio ASC'; 
			        break;
			    case 6:
			        $criteria->order = 't.Dominio DESC'; 
			        break; 
		        case 7:
			        $criteria->order = 'idusuariocre.Usuario ASC'; 
			        break;
			    case 8:
			        $criteria->order = 'idusuariocre.Usuario DESC'; 
			        break;
			    case 9:
			        $criteria->order = 't.Fecha_Creacion ASC'; 
			        break;
			    case 10:
			        $criteria->order = 't.Fecha_Creacion DESC'; 
			        break;
			    case 11:
			        $criteria->order = 'idusuarioact.Usuario ASC'; 
			        break;
			    case 12:
			        $criteria->order = 'idusuarioact.Usuario DESC'; 
			        break;
				case 13:
			        $criteria->order = 't.Fecha_Actualizacion ASC'; 
			        break;
			    case 14:
			        $criteria->order = 't.Fecha_Actualizacion DESC'; 
			        break;
			    case 15:
			        $criteria->order = 't.Estado DESC'; 
			        break;
			    case 16:
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
	 * @return Dominio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
