<?php
/* @var $this DisciplinarioEmpleadoController */
/* @var $model DisciplinarioEmpleado */

//para combos de motivos
$lista_motivos = CHtml::listData($motivos, 'Id_Dominio', 'Dominio');

?>

<?php 
if($opc == 1) {
	echo '<h3>Actualización llamado de atención a empleado</h3>';
}

if($opc == 2) {
	echo '<h3>Actualización de sanción a empleado</h3>';
}

if($opc == 3) {
	echo '<h3>Actualización de comparendo a empleado</h3>';
}

?>

<?php $this->renderPartial('_form2', array('model'=>$model, 'lista_motivos'=>$lista_motivos, 'opc'=>$opc, 'e'=>$e, 'fecha_min' => $fecha_min)); ?>