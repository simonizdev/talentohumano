<?php
/* @var $this ContratoEmpleadoController */
/* @var $model ContratoEmpleado */

//para combos de turnos
$lista_turnos = CHtml::listData($turnos, 'Id_Dominio', 'Dominio');

//para combos de conceptos de examen
$lista_concep_exa_ocup = CHtml::listData($concep_exa_ocup, 'Id_Dominio', 'Dominio');

//para combos de grupos
$lista_grupos = CHtml::listData($grupos, 'Id_Dominio', 'Dominio');

//para combos de trabajos esp.
$lista_trabajos_esp = CHtml::listData($trabajos_esp, 'Id_Dominio', 'Dominio');

?>

<h3>Actualización contrato de empleado</h3>

<?php $this->renderPartial('_form3', array('model'=>$model, 'e' => $e, 'unidad_gerencia'=>$unidad_gerencia, 'area'=>$area, 'subarea'=>$subarea, 'cargo'=>$cargo,'lista_turnos' => $lista_turnos, 'lista_concep_exa_ocup'=>$lista_concep_exa_ocup, 'lista_grupos' => $lista_grupos, 'lista_trabajos_esp'=>$lista_trabajos_esp, 'centro_costo'=>$centro_costo, 'salario_flexible'=>$salario_flexible)); ?>

<script type="text/javascript">
	$(function() {

		//se llenan las opciones seleccionadas del modelo
		
		$('#ContratoEmpleado_Id_Trab_Esp').val(<?php echo $json_te_act ?>).trigger('change');

	});

</script>