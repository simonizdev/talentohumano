<?php
/* @var $this HcoMedController */
/* @var $model HcoMed */

//para combos de tipo de examen
$lista_tipo_examen = CHtml::listData($tipo_examen, 'Id_Dominio_Medico', 'Dominio'); 

//para combos de conceptos
$lista_concepto = CHtml::listData($concepto, 'Id_Dominio_Medico', 'Dominio'); 

//para combos de funciones principales
$lista_funciones_p = CHtml::listData($funciones_p, 'Id_Dominio_Medico', 'Dominio'); 

//para combos de tipos de riegos
$lista_tipo_riesgo = CHtml::listData($tipo_riesgo, 'Id_Dominio_Medico', 'Dominio');

//para combos de tipos de riegos
$lista_concepto_egreso = CHtml::listData($concepto_egreso, 'Id_Dominio_Medico', 'Dominio'); 

//para combos de piezas dentales
$lista_piezas_dent = CHtml::listData($piezas_dent, 'Id_Dominio_Medico', 'Dominio');

//para combos de estado piezas dentales
$lista_est_piezas_dent = CHtml::listData($estado_piezas_dent, 'Id_Dominio_Medico', 'Dominio'); 

?>

<h3>Registro historia clínica ocupacional de empleado</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'e'=>$e, 'lista_tipo_examen'=>$lista_tipo_examen, 'lista_concepto'=>$lista_concepto, 'lista_funciones_p'=>$lista_funciones_p, 'lista_tipo_riesgo'=>$lista_tipo_riesgo, 'lista_concepto_egreso'=>$lista_concepto_egreso, 'lista_piezas_dent'=>$lista_piezas_dent, 'lista_est_piezas_dent'=>$lista_est_piezas_dent)); ?>


