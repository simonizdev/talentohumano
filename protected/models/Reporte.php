<?php

class Reporte extends CFormModel 
{
    public $empresa;
    public $genero;
    public $edad_inicial;
    public $edad_final;
    public $motivo_ausencia;
    public $fecha_inicial;
    public $fecha_final;
    public $motivo;
    public $fecha_inicial_cont;
    public $fecha_final_cont;
    public $opcion_exp;
    public $motivo_retiro;
    public $fecha_inicial_fin;
    public $fecha_final_fin;
    public $liquidado;
    public $fecha_inicial_reg;
    public $fecha_final_reg;
    public $id_empleado;
    public $archivo;
    public $unidad_gerencia;
    public $estado;

   
    
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fecha_inicial, fecha_final', 'safe'),
            array('opcion_exp', 'required','on'=>'empleados_activos'),
            array('opcion_exp', 'required','on'=>'tallaje_empleados_activos'),
            array('opcion_exp', 'required','on'=>'hijos'),
            array('opcion_exp', 'required','on'=>'ausencias'),
            array('opcion_exp', 'required','on'=>'llam_atenc'),
            array('opcion_exp', 'required','on'=>'sanciones'),
            array('opcion_exp', 'required','on'=>'comparendos'),
            array('opcion_exp', 'required','on'=>'contratos_fin'),  
            array('id_empleado', 'required','on'=>'elem_herr_emp'),  
            array('id_empleado', 'required','on'=>'obs_cuenta'), 
            array('unidad_gerencia, estado', 'required','on'=>'empleados_x_ug'),               
        );  
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'empresa'=>'Empresa',
            'genero'=>'Género',
            'edad_inicial'=> 'Edad inicial',
            'edad_final'=> 'Edad final',
            'motivo_ausencia'=>'Motivo',
            'fecha_inicial'=>'Fecha inicial',
            'fecha_final'=>'Fecha final',
            'opcion_exp'=>'Mostrar en / Exportar a',
            'motivo'=>'Motivo',
            'fecha_inicial_cont' => 'Fecha inicial ingreso',
            'fecha_final_cont' => 'Fecha final ingreso',
            'motivo_retiro'=>'Motivo de retiro',
            'fecha_inicial_fin' => 'Fecha inicial retiro',
            'fecha_final_fin' => 'Fecha final retiro',
            'liquidado' => 'Liquidado ?',
            'fecha_inicial_reg' => 'Fecha inicial registro',
            'fecha_final_reg' => 'Fecha final registro',
            'id_empleado' => 'Empleado',
            'archivo' => 'Archivo',
            'unidad_gerencia' => 'Unidad de gerencia',
        );
    }

}