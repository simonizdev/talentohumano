<?php
/* @var $this ContratoEmpleadoController */
/* @var $model ContratoEmpleado */

?>

<h3>Asignación fecha de liquidación contrato de empleado</h3>

<?php $this->renderPartial('_form2', array('model'=>$model, 'e' => $e, 'unidad_gerencia'=>$unidad_gerencia, 'area'=>$area, 'subarea'=>$subarea, 'cargo'=>$cargo, 'centro_costo'=>$centro_costo, 'salario_flexible'=>$salario_flexible)); ?>