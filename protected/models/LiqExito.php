<?php

/**
 * This is the model class for table "TH_LIQ_EXITO".
 *
 * The followings are the available columns in table 'TH_LIQ_EXITO':
 * @property integer $Rowid
 * @property integer $Nit
 * @property string $Razon_Social
 * @property string $Fecha_Corte
 * @property string $Corte_Desde
 * @property string $Corte_Hasta
 * @property string $Fecha_Vcto
 * @property integer $Cedi
 * @property integer $Orden
 * @property integer $Grupo
 * @property string $Descripcion_Grupo
 * @property integer $Sublinea
 * @property string $Descripcion_Sublinea
 * @property integer $Iva
 * @property integer $Plu
 * @property string $Descripcion_Plu
 * @property string $Ean
 * @property string $Marca
 * @property string $Descripcion_Marca
 * @property integer $Referencia
 * @property integer $Almacen
 * @property string $Descripcion_Almacen
 * @property integer $Venta_Actual
 * @property integer $Venta_Anterior
 * @property integer $Despachos
 * @property integer $Cambio_Actual
 * @property integer $Cambio_Anterior
 * @property integer $Averias
 * @property integer $Cantidad_Pagar
 * @property string $Costo_Fabricacion
 * @property string $Liquidacion
 * @property string $Descuento
 * @property string $Tipo
 * @property string $Tienda_Ean
 * @property string $SubInvetario
 * @property integer $Oracle
 * @property string $Descripcion
 * @property string $Categoria_Oracle
 * @property string $Cedi_C
 * @property string $Almacen_Trasporte
 * @property string $Almacen_Exito
 * @property string $Mes
 * @property integer $Ano
 * @property string $Unidad
 * @property string $Pvp_Cal_Liq_Exito
 * @property string $Pvp_SIva_Liq_Exito
 * @property string $Porc_Dsto_Liq_Exito
 * @property string $Vlr_Dsto_Liq_Exito
 * @property string $Vlr_Neto_Liq_Exito
 * @property string $Tot_Pag_Liq_Exito
 * @property string $Pvp_Autor_Cia
 * @property string $Pvp_SIva_Autor_Cia
 * @property string $Porc_Dsto_Autor_Cia
 * @property string $Vlr_Dsto_Autor_Cia
 * @property string $Vlr_Neto_Autor_Cia
 * @property string $Tot_Pag_Autor_Cia
 * @property string $Dif_Pvp
 * @property string $Dif_Porc_Dsto
 * @property string $Dif_Vlr_Neto
 * @property string $Dif_Tot_Pag
 * @property string $Documento_Interno
 * @property integer $Cantidad_Interno
 * @property string $Unidad_Negocio
 * @property string $Ean_Interno
 * @property string $Fecha_Creacion
 */
class LiqExito extends CActiveRecord
{
	public $archivo;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TH_LIQ_EXITO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('archivo','required','on'=>'imp'),
			array('Nit, Cedi, Orden, Iva, Plu, Referencia, Almacen, Venta_Actual, Venta_Anterior, Despachos, Cambio_Actual, Cambio_Anterior, Averias, Cantidad_Pagar, Ano, Cantidad_Interno, Sublinea, Grupo, Marca, Oracle', 'numerical', 'integerOnly'=>true),
			array('Razon_Social, Descripcion_Grupo, Descripcion_Sublinea, Descripcion_Plu, Ean, Descripcion_Marca, Descripcion_Almacen, Tipo, Tienda_Ean, SubInvetario, Descripcion, Cedi_C, Almacen_Trasporte, Almacen_Exito, Mes, Unidad, Documento_Interno, Unidad_Negocio, Ean_Interno', 'length', 'max'=>50),
			array('Costo_Fabricacion, Liquidacion, Descuento, Pvp_Cal_Liq_Exito, Pvp_SIva_Liq_Exito, Vlr_Dsto_Liq_Exito, Vlr_Neto_Liq_Exito, Tot_Pag_Liq_Exito, Pvp_Autor_Cia, Pvp_SIva_Autor_Cia, Vlr_Dsto_Autor_Cia, Vlr_Neto_Autor_Cia, Tot_Pag_Autor_Cia, Dif_Pvp, Dif_Vlr_Neto, Dif_Tot_Pag', 'length', 'max'=>19),
			array('Categoria_Oracle', 'length', 'max'=>5),
			array('Porc_Dsto_Liq_Exito, Porc_Dsto_Autor_Cia, Dif_Porc_Dsto', 'length', 'max'=>10),
			array('Fecha_Vcto, Fecha_Creacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Rowid, Nit, Razon_Social, Fecha_Corte, Corte_Desde, Corte_Hasta, Fecha_Vcto, Cedi, Orden, Grupo, Descripcion_Grupo, Sublinea, Descripcion_Sublinea, Iva, Plu, Descripcion_Plu, Ean, Marca, Descripcion_Marca, Referencia, Almacen, Descripcion_Almacen, Venta_Actual, Venta_Anterior, Despachos, Cambio_Actual, Cambio_Anterior, Averias, Cantidad_Pagar, Costo_Fabricacion, Liquidacion, Descuento, Tipo, Tienda_Ean, SubInvetario, Oracle, Descripcion, Categoria_Oracle, Cedi_C, Almacen_Trasporte, Almacen_Exito, Mes, Ano, Unidad, Pvp_Cal_Liq_Exito, Pvp_SIva_Liq_Exito, Porc_Dsto_Liq_Exito, Vlr_Dsto_Liq_Exito, Vlr_Neto_Liq_Exito, Tot_Pag_Liq_Exito, Pvp_Autor_Cia, Pvp_SIva_Autor_Cia, Porc_Dsto_Autor_Cia, Vlr_Dsto_Autor_Cia, Vlr_Neto_Autor_Cia, Tot_Pag_Autor_Cia, Dif_Pvp, Dif_Porc_Dsto, Dif_Vlr_Neto, Dif_Tot_Pag, Documento_Interno, Cantidad_Interno, Unidad_Negocio, Ean_Interno, Fecha_Creacion', 'safe', 'on'=>'search'),
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
			'Rowid' => 'Rowid',
			'Nit' => 'Nit',
			'Razon_Social' => 'Razon Social',
			'Fecha_Corte' => 'Fecha Corte',
			'Corte_Desde' => 'Corte Desde',
			'Corte_Hasta' => 'Corte Hasta',
			'Fecha_Vcto' => 'Fecha Vcto',
			'Cedi' => 'Cedi',
			'Orden' => 'Orden',
			'Grupo' => 'Grupo',
			'Descripcion_Grupo' => 'Descripcion Grupo',
			'Sublinea' => 'Sublinea',
			'Descripcion_Sublinea' => 'Descripcion Sublinea',
			'Iva' => 'Iva',
			'Plu' => 'Plu',
			'Descripcion_Plu' => 'Descripcion Plu',
			'Ean' => 'Ean',
			'Marca' => 'Marca',
			'Descripcion_Marca' => 'Descripcion Marca',
			'Referencia' => 'Referencia',
			'Almacen' => 'Almacen',
			'Descripcion_Almacen' => 'Descripcion Almacen',
			'Venta_Actual' => 'Venta Actual',
			'Venta_Anterior' => 'Venta Anterior',
			'Despachos' => 'Despachos',
			'Cambio_Actual' => 'Cambio Actual',
			'Cambio_Anterior' => 'Cambio Anterior',
			'Averias' => 'Averias',
			'Cantidad_Pagar' => 'Cantidad Pagar',
			'Costo_Fabricacion' => 'Costo Fabricacion',
			'Liquidacion' => 'Liquidacion',
			'Descuento' => 'Descuento',
			'Tipo' => 'Tipo',
			'Tienda_Ean' => 'Tienda Ean',
			'SubInvetario' => 'Sub Invetario',
			'Oracle' => 'Oracle',
			'Descripcion' => 'Descripcion',
			'Categoria_Oracle' => 'Categoria Oracle',
			'Cedi_C' => 'Cedi C',
			'Almacen_Trasporte' => 'Almacen Trasporte',
			'Almacen_Exito' => 'Almacen Exito',
			'Mes' => 'Mes',
			'Ano' => 'Ano',
			'Unidad' => 'Unidad',
			'Pvp_Cal_Liq_Exito' => 'Pvp Cal Liq Exito',
			'Pvp_SIva_Liq_Exito' => 'Pvp Siva Liq Exito',
			'Porc_Dsto_Liq_Exito' => 'Porc Dsto Liq Exito',
			'Vlr_Dsto_Liq_Exito' => 'Vlr Dsto Liq Exito',
			'Vlr_Neto_Liq_Exito' => 'Vlr Neto Liq Exito',
			'Tot_Pag_Liq_Exito' => 'Tot Pag Liq Exito',
			'Pvp_Autor_Cia' => 'Pvp Autor Cia',
			'Pvp_SIva_Autor_Cia' => 'Pvp Siva Autor Cia',
			'Porc_Dsto_Autor_Cia' => 'Porc Dsto Autor Cia',
			'Vlr_Dsto_Autor_Cia' => 'Vlr Dsto Autor Cia',
			'Vlr_Neto_Autor_Cia' => 'Vlr Neto Autor Cia',
			'Tot_Pag_Autor_Cia' => 'Tot Pag Autor Cia',
			'Dif_Pvp' => 'Dif Pvp',
			'Dif_Porc_Dsto' => 'Dif Porc Dsto',
			'Dif_Vlr_Neto' => 'Dif Vlr Neto',
			'Dif_Tot_Pag' => 'Dif Tot Pag',
			'Documento_Interno' => 'Documento Interno',
			'Cantidad_Interno' => 'Cantidad Interno',
			'Unidad_Negocio' => 'Unidad Negocio',
			'Ean_Interno' => 'Ean Interno',
			'Fecha_Creacion' => 'Fecha Creacion',
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

		$criteria->compare('Rowid',$this->Rowid);
		$criteria->compare('Nit',$this->Nit);
		$criteria->compare('Razon_Social',$this->Razon_Social,true);
		$criteria->compare('Fecha_Corte',$this->Fecha_Corte,true);
		$criteria->compare('Corte_Desde',$this->Corte_Desde,true);
		$criteria->compare('Corte_Hasta',$this->Corte_Hasta,true);
		$criteria->compare('Fecha_Vcto',$this->Fecha_Vcto,true);
		$criteria->compare('Cedi',$this->Cedi);
		$criteria->compare('Orden',$this->Orden);
		$criteria->compare('Grupo',$this->Grupo,true);
		$criteria->compare('Descripcion_Grupo',$this->Descripcion_Grupo,true);
		$criteria->compare('Sublinea',$this->Sublinea,true);
		$criteria->compare('Descripcion_Sublinea',$this->Descripcion_Sublinea,true);
		$criteria->compare('Iva',$this->Iva);
		$criteria->compare('Plu',$this->Plu);
		$criteria->compare('Descripcion_Plu',$this->Descripcion_Plu,true);
		$criteria->compare('Ean',$this->Ean,true);
		$criteria->compare('Marca',$this->Marca,true);
		$criteria->compare('Descripcion_Marca',$this->Descripcion_Marca,true);
		$criteria->compare('Referencia',$this->Referencia);
		$criteria->compare('Almacen',$this->Almacen);
		$criteria->compare('Descripcion_Almacen',$this->Descripcion_Almacen,true);
		$criteria->compare('Venta_Actual',$this->Venta_Actual);
		$criteria->compare('Venta_Anterior',$this->Venta_Anterior);
		$criteria->compare('Despachos',$this->Despachos);
		$criteria->compare('Cambio_Actual',$this->Cambio_Actual);
		$criteria->compare('Cambio_Anterior',$this->Cambio_Anterior);
		$criteria->compare('Averias',$this->Averias);
		$criteria->compare('Cantidad_Pagar',$this->Cantidad_Pagar);
		$criteria->compare('Costo_Fabricacion',$this->Costo_Fabricacion,true);
		$criteria->compare('Liquidacion',$this->Liquidacion,true);
		$criteria->compare('Descuento',$this->Descuento,true);
		$criteria->compare('Tipo',$this->Tipo,true);
		$criteria->compare('Tienda_Ean',$this->Tienda_Ean,true);
		$criteria->compare('SubInvetario',$this->SubInvetario,true);
		$criteria->compare('Oracle',$this->Oracle,true);
		$criteria->compare('Descripcion',$this->Descripcion,true);
		$criteria->compare('Categoria_Oracle',$this->Categoria_Oracle,true);
		$criteria->compare('Cedi_C',$this->Cedi_C,true);
		$criteria->compare('Almacen_Trasporte',$this->Almacen_Trasporte,true);
		$criteria->compare('Almacen_Exito',$this->Almacen_Exito,true);
		$criteria->compare('Mes',$this->Mes,true);
		$criteria->compare('Ano',$this->Ano);
		$criteria->compare('Unidad',$this->Unidad,true);
		$criteria->compare('Pvp_Cal_Liq_Exito',$this->Pvp_Cal_Liq_Exito,true);
		$criteria->compare('Pvp_SIva_Liq_Exito',$this->Pvp_SIva_Liq_Exito,true);
		$criteria->compare('Porc_Dsto_Liq_Exito',$this->Porc_Dsto_Liq_Exito,true);
		$criteria->compare('Vlr_Dsto_Liq_Exito',$this->Vlr_Dsto_Liq_Exito,true);
		$criteria->compare('Vlr_Neto_Liq_Exito',$this->Vlr_Neto_Liq_Exito,true);
		$criteria->compare('Tot_Pag_Liq_Exito',$this->Tot_Pag_Liq_Exito,true);
		$criteria->compare('Pvp_Autor_Cia',$this->Pvp_Autor_Cia,true);
		$criteria->compare('Pvp_SIva_Autor_Cia',$this->Pvp_SIva_Autor_Cia,true);
		$criteria->compare('Porc_Dsto_Autor_Cia',$this->Porc_Dsto_Autor_Cia,true);
		$criteria->compare('Vlr_Dsto_Autor_Cia',$this->Vlr_Dsto_Autor_Cia,true);
		$criteria->compare('Vlr_Neto_Autor_Cia',$this->Vlr_Neto_Autor_Cia,true);
		$criteria->compare('Tot_Pag_Autor_Cia',$this->Tot_Pag_Autor_Cia,true);
		$criteria->compare('Dif_Pvp',$this->Dif_Pvp,true);
		$criteria->compare('Dif_Porc_Dsto',$this->Dif_Porc_Dsto,true);
		$criteria->compare('Dif_Vlr_Neto',$this->Dif_Vlr_Neto,true);
		$criteria->compare('Dif_Tot_Pag',$this->Dif_Tot_Pag,true);
		$criteria->compare('Documento_Interno',$this->Documento_Interno,true);
		$criteria->compare('Cantidad_Interno',$this->Cantidad_Interno);
		$criteria->compare('Unidad_Negocio',$this->Unidad_Negocio,true);
		$criteria->compare('Ean_Interno',$this->Ean_Interno,true);
		$criteria->compare('Fecha_Creacion',$this->Fecha_Creacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LiqExito the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
