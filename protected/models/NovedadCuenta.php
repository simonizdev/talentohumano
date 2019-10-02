<?php

/**
 * This is the model class for table "TH_NOVEDAD_CUENTA".
 *
 * The followings are the available columns in table 'TH_NOVEDAD_CUENTA':
 * @property integer $Id_N_Cuenta
 * @property integer $Id_Cuenta
 * @property string $Novedades
 * @property integer $Id_Usuario_Creacion
 * @property string $Fecha_Creacion
 *
 * The followings are the available model relations:
 * @property THCUENTA $idCuenta
 * @property THUSUARIO $idUsuarioCreacion
 */
class NovedadCuenta extends CActiveRecord
{
	
	public $usuario_creacion;
	public $orderby;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TH_NOVEDAD_CUENTA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Id_Cuenta, Novedades, Id_Usuario_Creacion, Fecha_Creacion', 'required'),
			array('Id_Cuenta, Id_Usuario_Creacion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id_N_Cuenta, Id_Cuenta, Novedades, Id_Usuario_Creacion, Fecha_Creacion, usuario_creacion, orderby', 'safe', 'on'=>'search'),
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
			'idcuenta' => array(self::BELONGS_TO, 'Cuenta', 'Id_Cuenta'),
			'idusuariocre' => array(self::BELONGS_TO, 'Usuario', 'Id_Usuario_Creacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id_N_Cuenta' => 'ID',
			'Id_Cuenta' => 'ID de cuenta',
			'Novedades' => 'Novedades',
			'Id_Usuario_Creacion' => 'Usuario que creo',
			'Fecha_Creacion' => 'Fecha de creación',
			'usuario_creacion' => 'Usuario que creo',
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
	   	$criteria->with=array('idusuariocre','idcuenta');

		$criteria->compare('t.Id_N_Cuenta',$this->Id_N_Cuenta);
		$criteria->compare('t.Id_Cuenta',$this->Id_Cuenta);
		$criteria->compare('t.Novedades',$this->Novedades,true);

		if($this->Fecha_Creacion != ""){
      		$fci = $this->Fecha_Creacion." 00:00:00";
      		$fcf = $this->Fecha_Creacion." 23:59:59";

      		$criteria->addBetweenCondition('t.Fecha_Creacion', $fci, $fcf);
    	}

		if($this->usuario_creacion != ""){
			$criteria->AddCondition("idusuariocre.Usuario = '".$this->usuario_creacion."'"); 
	    }

	    if(empty($this->orderby)){
			$criteria->order = 't.Id_N_Cuenta DESC'; 	
		}else{
			switch ($this->orderby) {
			    case 1:
			        $criteria->order = 't.Id_N_Cuenta ASC'; 
			        break;
			    case 2:
			        $criteria->order = 't.Id_N_Cuenta DESC'; 
			        break;
			    case 3:
			        $criteria->order = 'idcuenta.Id_Cuenta ASC'; 
			        break;
			    case 4:
			        $criteria->order = 'idcuenta.Id_Cuenta DESC'; 
			        break; 
		        case 5:
			        $criteria->order = 'idusuariocre.Usuario ASC'; 
			        break;
			    case 6:
			        $criteria->order = 'idusuariocre.Usuario DESC'; 
			        break;
			    case 7:
			        $criteria->order = 't.Fecha_Creacion ASC'; 
			        break;
			    case 8:
			        $criteria->order = 't.Fecha_Creacion DESC'; 
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
	 * @return NovedadCorreo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
