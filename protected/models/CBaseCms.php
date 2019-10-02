<?php

/**
 * This is the model class for table "TH_C_BASE_CMS".
 *
 * The followings are the available columns in table 'TH_C_BASE_CMS':
 * @property integer $ROWID
 * @property integer $ROWID_VENDEDOR
 * @property string $FECHA
 * @property string $RECAUDO
 * @property string $VENTA
 * @property string $ACELERADOR
 * @property string $PRESUPUESTO
 * @property string $REGISTRO
 */
class CBaseCms extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TH_C_BASE_CMS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ROWID, ROWID_VENDEDOR', 'required'),
			array('ROWID, ROWID_VENDEDOR', 'numerical', 'integerOnly'=>true),
			array('RECAUDO, VENTA, ACELERADOR, PRESUPUESTO', 'length', 'max'=>19),
			array('FECHA, REGISTRO', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ROWID, ROWID_VENDEDOR, FECHA, RECAUDO, VENTA, ACELERADOR, PRESUPUESTO, REGISTRO', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ROWID' => 'Rowid',
			'ROWID_VENDEDOR' => 'Rowid Vendedor',
			'FECHA' => 'Fecha',
			'RECAUDO' => 'Recaudo',
			'VENTA' => 'Venta',
			'ACELERADOR' => 'Acelerador',
			'PRESUPUESTO' => 'Presupuesto',
			'REGISTRO' => 'Registro',
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

		$criteria->compare('ROWID',$this->ROWID);
		$criteria->compare('ROWID_VENDEDOR',$this->ROWID_VENDEDOR);
		$criteria->compare('FECHA',$this->FECHA,true);
		$criteria->compare('RECAUDO',$this->RECAUDO,true);
		$criteria->compare('VENTA',$this->VENTA,true);
		$criteria->compare('ACELERADOR',$this->ACELERADOR,true);
		$criteria->compare('PRESUPUESTO',$this->PRESUPUESTO,true);
		$criteria->compare('REGISTRO',$this->REGISTRO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CBaseCms the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
