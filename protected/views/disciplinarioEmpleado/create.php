<?php
/* @var $this DisciplinarioEmpleadoController */
/* @var $model DisciplinarioEmpleado */

//para combos de motivos
$lista_motivos = CHtml::listData($motivos, 'Id_Dominio', 'Dominio');

?>

<?php 
if($opc == 1) {
	echo '<h3>Registro llamado de atención a empleado</h3>';
}

if($opc == 2) {
	echo '<h3>Registro de sanción a empleado</h3>';
}

if($opc == 3) {
	echo '<h3>Registro de comparendo a empleado</h3>';
}

?>

<?php $this->renderPartial('_form', array('model'=>$model, 'lista_motivos'=>$lista_motivos, 'opc'=>$opc, 'e'=>$e, 'fecha_min' => $fecha_min, 'hist_act'=>$hist_act)); ?>