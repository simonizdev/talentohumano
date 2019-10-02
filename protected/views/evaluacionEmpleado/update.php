<?php
/* @var $this EvaluacionEmpleadoController */
/* @var $model EvaluacionEmpleado */

//para combos de tipos de evaluación
$lista_tipos_ev = CHtml::listData($tipos, 'Id_Dominio', 'Dominio'); 

?>

<h3>Actualización evaluación de empleado</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'e' => $e, 'lista_tipos_ev'=>$lista_tipos_ev)); ?>