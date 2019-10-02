<?php

/**
 * This is the model class for table "TH_MED_ANEXO".
 *
 * The followings are the available columns in table 'TH_MED_ANEXO':
 * @property integer $Id_Anexo
 * @property integer $Id_Empleado
 * @property string $Informacion_Adicional_Emp
 * @property integer $Id_Contrato
 * @property string $Fecha
 * @property string $Padecimiento_Actual
 * @property string $Motivo
 * @property string $Enfermedad_Actual
 * @property string $Alergia
 * @property string $Hallazgo
 * @property integer $Diagnostico
 * @property string $Plan_Anexo
 * @property integer $Id_Usuario_Creacion
 * @property string $Fecha_Creacion
 * @property integer $Id_Usuario_Actualizacion
 * @property string $Fecha_Actualizacion
 *
 * The followings are the available model relations:
 * @property THEMPLEADO $idEmpleado
 * @property THCONTRATOEMPLEADO $idContrato
 * @property THDOMINIOMEDICO $diagnostico
 * @property THUSUARIO $idUsuarioCreacion
 * @property THUSUARIO $idUsuarioActualizacion
 */
class AnexoMed extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TH_MED_ANEXO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Id_Empleado, Id_Contrato, Fecha, Padecimiento_Actual, Motivo, Enfermedad_Actual, Alergia, Hallazgo, Diagnostico, Plan_Anexo, Id_Usuario_Creacion, Id_Usuario_Actualizacion', 'required'),
			array('Id_Empleado, Id_Contrato, Diagnostico, Id_Usuario_Creacion, Id_Usuario_Actualizacion', 'numerical', 'integerOnly'=>true),
			array('Informacion_Adicional_Emp, Fecha_Creacion, Fecha_Actualizacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id_Anexo, Id_Empleado, Informacion_Adicional_Emp, Id_Contrato, Fecha, Padecimiento_Actual, Motivo, Enfermedad_Actual, Alergia, Hallazgo, Diagnostico, Plan_Anexo, Id_Usuario_Creacion, Fecha_Creacion, Id_Usuario_Actualizacion, Fecha_Actualizacion', 'safe', 'on'=>'search'),
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
			'idempleado' => array(self::BELONGS_TO, 'Empleado', 'Id_Empleado'),
			'idcontrato' => array(self::BELONGS_TO, 'ContratoEmpleado', 'Id_Contrato'),
			'diagnostico' => array(self::BELONGS_TO, 'DominioMedico', 'Diagnostico'),
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
			'Id_Anexo' => 'ID',
			'Id_Empleado' => 'Empleado',
			'Informacion_Adicional_Emp' => 'Información adicional de empleado',
			'Id_Contrato' => 'ID Contrato',
			'Fecha' => 'Fecha',
			'Padecimiento_Actual' => 'Padecimiento Actual',
			'Motivo' => 'Motivo',
			'Enfermedad_Actual' => 'Enfermedad Actual',
			'Alergia' => 'Alergias',
			'Hallazgo' => 'Hallazgos',
			'Diagnostico' => 'Diagnóstico',
			'Plan_Anexo' => 'Plan',
			'Id_Usuario_Creacion' => 'Usuario que creo',
			'Id_Usuario_Actualizacion' => 'Usuario que actualizó',
			'Fecha_Creacion' => 'Fecha de creación',
			'Fecha_Actualizacion' => 'Fecha de actualización',
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

		$criteria->compare('t.Id_Anexo',$this->Id_Anexo);
		$criteria->compare('t.Id_Empleado',$this->Id_Empleado);
		$criteria->compare('t.Informacion_Adicional_Emp',$this->Informacion_Adicional_Emp,true);
		$criteria->compare('t.Id_Contrato',$this->Id_Contrato);
		$criteria->compare('t.Fecha',$this->Fecha,true);
		$criteria->compare('t.Padecimiento_Actual',$this->Padecimiento_Actual,true);
		$criteria->compare('t.Motivo',$this->Motivo,true);
		$criteria->compare('t.Enfermedad_Actual',$this->Enfermedad_Actual,true);
		$criteria->compare('t.Alergia',$this->Alergia,true);
		$criteria->compare('t.Hallazgo',$this->Hallazgo,true);
		$criteria->compare('t.Diagnostico',$this->Diagnostico);
		$criteria->compare('t.Plan_Anexo',$this->Plan_Anexo,true);
		$criteria->compare('t.Id_Usuario_Creacion',$this->Id_Usuario_Creacion);
		$criteria->compare('t.Fecha_Creacion',$this->Fecha_Creacion,true);
		$criteria->compare('t.Id_Usuario_Actualizacion',$this->Id_Usuario_Actualizacion);
		$criteria->compare('t.Fecha_Actualizacion',$this->Fecha_Actualizacion,true);
		$criteria->order = 't.Id_Anexo DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AnexoMed the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
