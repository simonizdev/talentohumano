<?php

/**
 * This is the model class for table "TH_MED_HCO".
 *
 * The followings are the available columns in table 'TH_MED_HCO':
 * @property integer $Id_Hco
 * @property integer $Id_Empleado
 * @property string $Informacion_Adicional_Emp
 * @property integer $Id_Contrato
 * @property string $Fecha
 * @property integer $Tipo_Examen
 * @property string $Reubicacion
 * @property integer $Funciones_Principales
 * @property string $Ant_Lab_Empresa_1
 * @property string $Ant_Lab_Area_1
 * @property string $Ant_Lab_Cargo_1
 * @property string $Ant_Lab_Tiempo_1
 * @property string $Ant_Lab_Empresa_2
 * @property string $Ant_Lab_Area_2
 * @property string $Ant_Lab_Cargo_2
 * @property string $Ant_Lab_Tiempo_2
 * @property string $Ant_Lab_Empresa_3
 * @property string $Ant_Lab_Area_3
 * @property string $Ant_Lab_Cargo_3
 * @property string $Ant_Lab_Tiempo_3
 * @property integer $Tipo_Riesgo
 * @property integer $Riesgo
 * @property string $Ant_Per_Patologico
 * @property string $Ant_Per_Quirurgico
 * @property string $Ant_Per_Traumatologico
 * @property string $Ant_Per_Inmunologico
 * @property string $Ant_Per_Habito
 * @property string $Sig_Vit_Talla
 * @property string $Sig_Vit_Peso
 * @property string $Sig_Vit_Imc
 * @property string $Sig_Vit_Perimetro_Abdominal
 * @property integer $Sig_Vit_Pulso
 * @property integer $Sig_Vit_Frecuencia_Respiratoria
 * @property integer $Sig_Vit_Saturacion_Oxigeno
 * @property string $Sig_Vit_Temperatura
 * @property string $Sig_Vit_Presion_Arterial
 * @property string $Sis_Piel
 * @property string $Sis_Cabeza
 * @property string $Sis_Ojos
 * @property string $Sis_Oidos
 * @property string $Sis_Nariz
 * @property string $Sis_Boca
 * @property integer $Sis_Piezas_Dentales
 * @property integer $Sis_Estado_Piezas_Dentales
 * @property string $Sis_Cuello
 * @property string $Sis_Respiratorio
 * @property string $Sis_Cardiaco
 * @property string $Sis_Abdomen
 * @property string $Sis_Miembros_Superiores
 * @property string $Sis_Genito_Urinario
 * @property string $Sis_Miembros_Inferiores
 * @property string $Sis_Columna_Vertebral
 * @property string $Hallazgo_Osteomuscular
 * @property integer $Deformidad_Cong_Adq_Der
 * @property integer $Deformidad_Cong_Adq_Izq
 * @property integer $Protuberancia_Der
 * @property integer $Protuberancia_Izq
 * @property string $Ant_Traumatico
 * @property integer $Compromiso_Articular_Der
 * @property integer $Compromiso_Articular_Izq
 * @property integer $Disminucion_Mov_Dom_Der
 * @property integer $Disminucion_Mov_Dom_Izq
 * @property integer $Paralisis_Der
 * @property integer $Paralisis_Izq
 * @property integer $Rigidez_Der
 * @property integer $Rigidez_Izq
 * @property string $Maniobra_Desault
 * @property string $Tono_Fuerza_Reflejos
 * @property string $Codo_Tenista
 * @property string $Codo_Golfista
 * @property string $Signo_Phalen
 * @property string $Signo_Tinel
 * @property string $Maniobra_Finkelsten
 * @property string $Prueba_Jackson
 * @property string $Prueba_Lasegue
 * @property string $Prueba_Cajon
 * @property string $Prueba_Bostezo
 * @property integer $Diagnostico
 * @property integer $Concepto
 * @property integer $Concepto_Egreso
 * @property string $Observaciones_Concepto_Egreso
 * @property string $Recomendaciones
 * @property integer $Id_Usuario_Creacion
 * @property string $Fecha_Creacion
 * @property integer $Id_Usuario_Actualizacion
 * @property string $Fecha_Actualizacion
 * @property integer $Dolor_Der
 * @property integer $Dolor_Izq
 *
 * The followings are the available model relations:
 * @property THEMPLEADO $idEmpleado
 * @property THCONTRATOEMPLEADO $idContrato
 * @property THDOMINIOMEDICO $tipoExamen
 * @property THDOMINIOMEDICO $funcionesPrincipales
 * @property THDOMINIOMEDICO $tipoRiesgo
 * @property THDOMINIOMEDICO $riesgo
 * @property THDOMINIOMEDICO $sisPiezasDentales
 * @property THDOMINIOMEDICO $sisEstadoPiezasDentales
 * @property THDOMINIOMEDICO $diagnostico
 * @property THDOMINIOMEDICO $concepto
 * @property THDOMINIOMEDICO $conceptoEgreso
 * @property THUSUARIO $idUsuarioCreacion
 * @property THUSUARIO $idUsuarioActualizacion
 */
class HcoMed extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TH_MED_HCO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Tipo_Examen, Funciones_Principales, Tipo_Riesgo, Riesgo, Ant_Per_Patologico, Ant_Per_Quirurgico, Ant_Per_Traumatologico, Ant_Per_Inmunologico, Ant_Per_Habito, Sig_Vit_Talla, Sig_Vit_Peso, Sig_Vit_Imc, Sig_Vit_Perimetro_Abdominal, Sig_Vit_Pulso, Sig_Vit_Frecuencia_Respiratoria, Sig_Vit_Saturacion_Oxigeno, Sig_Vit_Temperatura, Sig_Vit_Presion_Arterial, Sis_Piel, Sis_Cabeza, Sis_Ojos, Sis_Oidos, Sis_Nariz, Sis_Boca, Sis_Piezas_Dentales, Sis_Estado_Piezas_Dentales, Sis_Cuello, Sis_Respiratorio, Sis_Cardiaco, Sis_Abdomen, Sis_Miembros_Superiores, Sis_Genito_Urinario, Sis_Miembros_Inferiores, Sis_Columna_Vertebral, Hallazgo_Osteomuscular, Deformidad_Cong_Adq_Izq, Deformidad_Cong_Adq_Der, Protuberancia_Izq, Protuberancia_Der, Dolor_Izq, Dolor_Der, Compromiso_Articular_Izq, Compromiso_Articular_Der, Disminucion_Mov_Dom_Izq, Disminucion_Mov_Dom_Der, Paralisis_Izq, Paralisis_Der, Rigidez_Izq, Rigidez_Der, Ant_Traumatico, Tono_Fuerza_Reflejos, Maniobra_Desault, Codo_Tenista, Codo_Golfista, Signo_Phalen, Signo_Tinel, Maniobra_Finkelsten, Prueba_Jackson, Prueba_Lasegue, Prueba_Cajon, Prueba_Bostezo, Concepto_Egreso, Observaciones_Concepto_Egreso, Diagnostico, Recomendaciones', 'required'),
			array('Id_Empleado, Id_Contrato, Tipo_Examen, Funciones_Principales, Tipo_Riesgo, Riesgo, Sig_Vit_Pulso, Sig_Vit_Frecuencia_Respiratoria, Sig_Vit_Saturacion_Oxigeno, Sis_Piezas_Dentales, Sis_Estado_Piezas_Dentales, Deformidad_Cong_Adq_Der, Deformidad_Cong_Adq_Izq, Protuberancia_Der, Protuberancia_Izq, Compromiso_Articular_Der, Compromiso_Articular_Izq, Disminucion_Mov_Dom_Der, Disminucion_Mov_Dom_Izq, Paralisis_Der, Paralisis_Izq, Rigidez_Der, Rigidez_Izq, Diagnostico, Concepto, Concepto_Egreso, Id_Usuario_Creacion, Id_Usuario_Actualizacion, Dolor_Der, Dolor_Izq', 'numerical', 'integerOnly'=>true),
			array('Ant_Lab_Empresa_1, Ant_Lab_Area_1, Ant_Lab_Cargo_1, Ant_Lab_Tiempo_1, Ant_Lab_Empresa_2, Ant_Lab_Area_2, Ant_Lab_Cargo_2, Ant_Lab_Tiempo_2, Ant_Lab_Empresa_3, Ant_Lab_Area_3, Ant_Lab_Cargo_3, Ant_Lab_Tiempo_3, Sig_Vit_Presion_Arterial', 'length', 'max'=>100),
			array('Informacion_Adicional_Emp, Reubicacion, Ant_Per_Patologico, Ant_Per_Quirurgico, Ant_Per_Traumatologico, Ant_Per_Inmunologico, Ant_Per_Habito, Sis_Piel, Sis_Cabeza, Sis_Ojos, Sis_Oidos, Sis_Nariz, Sis_Boca, Sis_Cuello, Sis_Respiratorio, Sis_Cardiaco, Sis_Abdomen, Sis_Miembros_Superiores, Sis_Genito_Urinario, Sis_Miembros_Inferiores, Sis_Columna_Vertebral, Hallazgo_Osteomuscular, Ant_Traumatico, Maniobra_Desault, Tono_Fuerza_Reflejos, Codo_Tenista, Codo_Golfista, Signo_Phalen, Signo_Tinel, Maniobra_Finkelsten, Prueba_Jackson, Prueba_Lasegue, Prueba_Cajon, Prueba_Bostezo, Observaciones_Concepto_Egreso, Recomendaciones, Fecha, Fecha_Creacion, Fecha_Actualizacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id_Hco, Id_Empleado, Informacion_Adicional_Emp, Id_Contrato, Fecha, Tipo_Examen, Reubicacion, Funciones_Principales, Ant_Lab_Empresa_1, Ant_Lab_Area_1, Ant_Lab_Cargo_1, Ant_Lab_Tiempo_1, Ant_Lab_Empresa_2, Ant_Lab_Area_2, Ant_Lab_Cargo_2, Ant_Lab_Tiempo_2, Ant_Lab_Empresa_3, Ant_Lab_Area_3, Ant_Lab_Cargo_3, Ant_Lab_Tiempo_3, Tipo_Riesgo, Riesgo, Ant_Per_Patologico, Ant_Per_Quirurgico, Ant_Per_Traumatologico, Ant_Per_Inmunologico, Ant_Per_Habito, Sig_Vit_Talla, Sig_Vit_Peso, Sig_Vit_Imc, Sig_Vit_Perimetro_Abdominal, Sig_Vit_Pulso, Sig_Vit_Frecuencia_Respiratoria, Sig_Vit_Saturacion_Oxigeno, Sig_Vit_Temperatura, Sig_Vit_Presion_Arterial, Sis_Piel, Sis_Cabeza, Sis_Ojos, Sis_Oidos, Sis_Nariz, Sis_Boca, Sis_Piezas_Dentales, Sis_Estado_Piezas_Dentales, Sis_Cuello, Sis_Respiratorio, Sis_Cardiaco, Sis_Abdomen, Sis_Miembros_Superiores, Sis_Genito_Urinario, Sis_Miembros_Inferiores, Sis_Columna_Vertebral, Hallazgo_Osteomuscular, Deformidad_Cong_Adq_Der, Deformidad_Cong_Adq_Izq, Protuberancia_Der, Protuberancia_Izq, Ant_Traumatico, Compromiso_Articular_Der, Compromiso_Articular_Izq, Disminucion_Mov_Dom_Der, Disminucion_Mov_Dom_Izq, Paralisis_Der, Paralisis_Izq, Rigidez_Der, Rigidez_Izq, Maniobra_Desault, Tono_Fuerza_Reflejos, Codo_Tenista, Codo_Golfista, Signo_Phalen, Signo_Tinel, Maniobra_Finkelsten, Prueba_Jackson, Prueba_Lasegue, Prueba_Cajon, Prueba_Bostezo, Diagnostico, Concepto, Concepto_Egreso, Observaciones_Concepto_Egreso, Recomendaciones, Id_Usuario_Creacion, Fecha_Creacion, Id_Usuario_Actualizacion, Fecha_Actualizacion', 'safe', 'on'=>'search'),
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
			'tipoexamen' => array(self::BELONGS_TO, 'DominioMedico', 'Tipo_Examen'),
			'funcionesprincipales' => array(self::BELONGS_TO, 'DominioMedico', 'Funciones_Principales'),
			'tiporiesgo' => array(self::BELONGS_TO, 'DominioMedico', 'Tipo_Riesgo'),
			'riesgo' => array(self::BELONGS_TO, 'DominioMedico', 'Riesgo'),
			'piezasdentales' => array(self::BELONGS_TO, 'DominioMedico', 'Sis_Piezas_Dentales'),
			'estadopiezasdentales' => array(self::BELONGS_TO, 'DominioMedico', 'Sis_Estado_Piezas_Dentales'),
			'diagnostico' => array(self::BELONGS_TO, 'DominioMedico', 'Diagnostico'),
			'concepto' => array(self::BELONGS_TO, 'DominioMedico', 'Concepto'),
			'conceptoegreso' => array(self::BELONGS_TO, 'DominioMedico', 'Concepto_Egreso'),
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
			'Id_Hco' => 'ID',
			'Id_Empleado' => 'Empleado',
			'Informacion_Adicional_Emp' => 'Información adicional de empleado',
			'Id_Contrato' => 'ID Contrato',
			'Fecha' => 'Fecha',
			'Tipo_Examen' => 'Tipo de examen',
			'Reubicacion' => 'Reubicación',
			'Funciones_Principales' => 'Funciones principales',
			'Ant_Lab_Empresa_1' => 'Empresa',
			'Ant_Lab_Area_1' => 'Área',
			'Ant_Lab_Cargo_1' => 'Cargo',
			'Ant_Lab_Tiempo_1' => 'Tiempo',
			'Ant_Lab_Empresa_2' => 'Empresa',
			'Ant_Lab_Area_2' => 'Área',
			'Ant_Lab_Cargo_2' => 'Cargo',
			'Ant_Lab_Tiempo_2' => 'Tiempo',
			'Ant_Lab_Empresa_3' => 'Empresa',
			'Ant_Lab_Area_3' => 'Área',
			'Ant_Lab_Cargo_3' => 'Cargo',
			'Ant_Lab_Tiempo_3' => 'Tiempo',
			'Tipo_Riesgo' => 'Tipo riesgo',
			'Riesgo' => 'Riesgo',
			'Ant_Per_Patologico' => 'Patologícos',
			'Ant_Per_Quirurgico' => 'Quirúrgicos',
			'Ant_Per_Traumatologico' => 'Traumatológicos',
			'Ant_Per_Inmunologico' => 'Inmunológicos',
			'Ant_Per_Habito' => 'Hábitos',
			'Sig_Vit_Talla' => 'Talla (Cm)',
			'Sig_Vit_Peso' => 'Peso (Kg)',
			'Sig_Vit_Imc' => 'IMC',
			'Sig_Vit_Perimetro_Abdominal' => 'Perimetro abdominal',
			'Sig_Vit_Pulso' => 'Pulso',
			'Sig_Vit_Frecuencia_Respiratoria' => 'Frecuencia respiratoria',
			'Sig_Vit_Saturacion_Oxigeno' => 'Saturación de oxigeno',
			'Sig_Vit_Temperatura' => 'Temperatura',
			'Sig_Vit_Presion_Arterial' => 'Presión arterial',
			'Sis_Piel' => 'Piel',
			'Sis_Cabeza' => 'Cabeza',
			'Sis_Ojos' => 'Ojos',
			'Sis_Oidos' => 'Oidos',
			'Sis_Nariz' => 'Nariz',
			'Sis_Boca' => 'Boca, amigdalas, laringe y faringe',
			'Sis_Piezas_Dentales' => 'Piezas dentales',
			'Sis_Estado_Piezas_Dentales' => 'Estado piezas dentales',
			'Sis_Cuello' => 'Cuello',
			'Sis_Respiratorio' => 'Respiratorio',
			'Sis_Cardiaco' => 'Cardiaco',
			'Sis_Abdomen' => 'Abdomen',
			'Sis_Miembros_Superiores' => 'Miembros superiores',
			'Sis_Genito_Urinario' => 'Genito-urinarios',
			'Sis_Miembros_Inferiores' => 'Miembros inferiores',
			'Sis_Columna_Vertebral' => 'Columna vertebral',
			'Hallazgo_Osteomuscular' => 'Hallazgo osteomuscular',
			'Deformidad_Cong_Adq_Der' => 'Derecha',
			'Deformidad_Cong_Adq_Izq' => 'Izquierda',
			'Protuberancia_Der' => 'Derecha',
			'Protuberancia_Izq' => 'Izquierda',
			'Ant_Traumatico' => 'Antecedentes traumáticos',
			'Compromiso_Articular_Der' => 'Derecha',
			'Compromiso_Articular_Izq' => 'Izquierda',
			'Disminucion_Mov_Dom_Der' => 'Derecha',
			'Disminucion_Mov_Dom_Izq' => 'Izquierda',
			'Paralisis_Der' => 'Derecha',
			'Paralisis_Izq' => 'Izquierda',
			'Rigidez_Der' => 'Derecha',
			'Rigidez_Izq' => 'Izquierda',
			'Maniobra_Desault' => 'Maniobra de desault',
			'Tono_Fuerza_Reflejos' => 'Tono fuerza y reflejos de miembros superiores',
			'Codo_Tenista' => 'Codo de tenista',
			'Codo_Golfista' => 'Codo de golfista',
			'Signo_Phalen' => 'Signo de phalen',
			'Signo_Tinel' => 'Signo de tinel',
			'Maniobra_Finkelsten' => 'Maniobra de finkelsten',
			'Prueba_Jackson' => 'Prueba de jackson (cervical) ',
			'Prueba_Lasegue' => 'Prueba de lasegue (lumbar)',
			'Prueba_Cajon' => 'Prueba de cajón',
			'Prueba_Bostezo' => 'Prueba de bostezo',
			'Diagnostico' => 'Diagnóstico',
			'Concepto' => 'Concepto',
			'Concepto_Egreso' => 'Concepto de egreso',
			'Observaciones_Concepto_Egreso' => 'Observaciones concepto de egreso',
			'Recomendaciones' => 'Recomendaciones',
			'Id_Usuario_Creacion' => 'Usuario que creo',
			'Id_Usuario_Actualizacion' => 'Usuario que actualizó',
			'Fecha_Creacion' => 'Fecha de creación',
			'Fecha_Actualizacion' => 'Fecha de actualización',
			'Dolor_Der' => 'Derecha',
			'Dolor_Izq' => 'Izquierda',
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

		$criteria->compare('Id_Hco',$this->Id_Hco);
		$criteria->compare('Id_Empleado',$this->Id_Empleado);
		$criteria->compare('Informacion_Adicional_Emp',$this->Informacion_Adicional_Emp,true);
		$criteria->compare('Id_Contrato',$this->Id_Contrato);
		$criteria->compare('Fecha',$this->Fecha,true);
		$criteria->compare('Tipo_Examen',$this->Tipo_Examen);
		$criteria->compare('Reubicacion',$this->Reubicacion,true);
		$criteria->compare('Funciones_Principales',$this->Funciones_Principales);
		$criteria->compare('Ant_Lab_Empresa_1',$this->Ant_Lab_Empresa_1,true);
		$criteria->compare('Ant_Lab_Area_1',$this->Ant_Lab_Area_1,true);
		$criteria->compare('Ant_Lab_Cargo_1',$this->Ant_Lab_Cargo_1,true);
		$criteria->compare('Ant_Lab_Tiempo_1',$this->Ant_Lab_Tiempo_1,true);
		$criteria->compare('Ant_Lab_Empresa_2',$this->Ant_Lab_Empresa_2,true);
		$criteria->compare('Ant_Lab_Area_2',$this->Ant_Lab_Area_2,true);
		$criteria->compare('Ant_Lab_Cargo_2',$this->Ant_Lab_Cargo_2,true);
		$criteria->compare('Ant_Lab_Tiempo_2',$this->Ant_Lab_Tiempo_2,true);
		$criteria->compare('Ant_Lab_Empresa_3',$this->Ant_Lab_Empresa_3,true);
		$criteria->compare('Ant_Lab_Area_3',$this->Ant_Lab_Area_3,true);
		$criteria->compare('Ant_Lab_Cargo_3',$this->Ant_Lab_Cargo_3,true);
		$criteria->compare('Ant_Lab_Tiempo_3',$this->Ant_Lab_Tiempo_3,true);
		$criteria->compare('Tipo_Riesgo',$this->Tipo_Riesgo);
		$criteria->compare('Riesgo',$this->Riesgo);
		$criteria->compare('Ant_Per_Patologico',$this->Ant_Per_Patologico,true);
		$criteria->compare('Ant_Per_Quirurgico',$this->Ant_Per_Quirurgico,true);
		$criteria->compare('Ant_Per_Traumatologico',$this->Ant_Per_Traumatologico,true);
		$criteria->compare('Ant_Per_Inmunologico',$this->Ant_Per_Inmunologico,true);
		$criteria->compare('Ant_Per_Habito',$this->Ant_Per_Habito,true);
		$criteria->compare('Sig_Vit_Talla',$this->Sig_Vit_Talla,true);
		$criteria->compare('Sig_Vit_Peso',$this->Sig_Vit_Peso,true);
		$criteria->compare('Sig_Vit_Imc',$this->Sig_Vit_Imc,true);
		$criteria->compare('Sig_Vit_Perimetro_Abdominal',$this->Sig_Vit_Perimetro_Abdominal,true);
		$criteria->compare('Sig_Vit_Pulso',$this->Sig_Vit_Pulso);
		$criteria->compare('Sig_Vit_Frecuencia_Respiratoria',$this->Sig_Vit_Frecuencia_Respiratoria);
		$criteria->compare('Sig_Vit_Saturacion_Oxigeno',$this->Sig_Vit_Saturacion_Oxigeno);
		$criteria->compare('Sig_Vit_Temperatura',$this->Sig_Vit_Temperatura,true);
		$criteria->compare('Sig_Vit_Presion_Arterial',$this->Sig_Vit_Presion_Arterial);
		$criteria->compare('Sis_Piel',$this->Sis_Piel,true);
		$criteria->compare('Sis_Cabeza',$this->Sis_Cabeza,true);
		$criteria->compare('Sis_Ojos',$this->Sis_Ojos,true);
		$criteria->compare('Sis_Oidos',$this->Sis_Oidos,true);
		$criteria->compare('Sis_Nariz',$this->Sis_Nariz,true);
		$criteria->compare('Sis_Boca',$this->Sis_Boca,true);
		$criteria->compare('Sis_Piezas_Dentales',$this->Sis_Piezas_Dentales);
		$criteria->compare('Sis_Estado_Piezas_Dentales',$this->Sis_Estado_Piezas_Dentales);
		$criteria->compare('Sis_Cuello',$this->Sis_Cuello,true);
		$criteria->compare('Sis_Respiratorio',$this->Sis_Respiratorio,true);
		$criteria->compare('Sis_Cardiaco',$this->Sis_Cardiaco,true);
		$criteria->compare('Sis_Abdomen',$this->Sis_Abdomen,true);
		$criteria->compare('Sis_Miembros_Superiores',$this->Sis_Miembros_Superiores,true);
		$criteria->compare('Sis_Genito_Urinario',$this->Sis_Genito_Urinario,true);
		$criteria->compare('Sis_Miembros_Inferiores',$this->Sis_Miembros_Inferiores,true);
		$criteria->compare('Sis_Columna_Vertebral',$this->Sis_Columna_Vertebral,true);
		$criteria->compare('Hallazgo_Osteomuscular',$this->Hallazgo_Osteomuscular,true);
		$criteria->compare('Deformidad_Cong_Adq_Der',$this->Deformidad_Cong_Adq_Der);
		$criteria->compare('Deformidad_Cong_Adq_Izq',$this->Deformidad_Cong_Adq_Izq);
		$criteria->compare('Protuberancia_Der',$this->Protuberancia_Der);
		$criteria->compare('Protuberancia_Izq',$this->Protuberancia_Izq);
		$criteria->compare('Ant_Traumatico',$this->Ant_Traumatico,true);
		$criteria->compare('Compromiso_Articular_Der',$this->Compromiso_Articular_Der);
		$criteria->compare('Compromiso_Articular_Izq',$this->Compromiso_Articular_Izq);
		$criteria->compare('Disminucion_Mov_Dom_Der',$this->Disminucion_Mov_Dom_Der);
		$criteria->compare('Disminucion_Mov_Dom_Izq',$this->Disminucion_Mov_Dom_Izq);
		$criteria->compare('Paralisis_Der',$this->Paralisis_Der);
		$criteria->compare('Paralisis_Izq',$this->Paralisis_Izq);
		$criteria->compare('Rigidez_Der',$this->Rigidez_Der);
		$criteria->compare('Rigidez_Izq',$this->Rigidez_Izq);
		$criteria->compare('Maniobra_Desault',$this->Maniobra_Desault,true);
		$criteria->compare('Tono_Fuerza_Reflejos',$this->Tono_Fuerza_Reflejos,true);
		$criteria->compare('Codo_Tenista',$this->Codo_Tenista,true);
		$criteria->compare('Codo_Golfista',$this->Codo_Golfista,true);
		$criteria->compare('Signo_Phalen',$this->Signo_Phalen,true);
		$criteria->compare('Signo_Tinel',$this->Signo_Tinel,true);
		$criteria->compare('Maniobra_Finkelsten',$this->Maniobra_Finkelsten,true);
		$criteria->compare('Prueba_Jackson',$this->Prueba_Jackson,true);
		$criteria->compare('Prueba_Lasegue',$this->Prueba_Lasegue,true);
		$criteria->compare('Prueba_Cajon',$this->Prueba_Cajon,true);
		$criteria->compare('Prueba_Bostezo',$this->Prueba_Bostezo,true);
		$criteria->compare('Diagnostico',$this->Diagnostico);
		$criteria->compare('Concepto',$this->Concepto);
		$criteria->compare('Concepto_Egreso',$this->Concepto_Egreso);
		$criteria->compare('Observaciones_Concepto_Egreso',$this->Observaciones_Concepto_Egreso,true);
		$criteria->compare('Recomendaciones',$this->Recomendaciones,true);
		$criteria->compare('Id_Usuario_Creacion',$this->Id_Usuario_Creacion);
		$criteria->compare('Fecha_Creacion',$this->Fecha_Creacion,true);
		$criteria->compare('Id_Usuario_Actualizacion',$this->Id_Usuario_Actualizacion);
		$criteria->compare('Fecha_Actualizacion',$this->Fecha_Actualizacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HcoMed the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
