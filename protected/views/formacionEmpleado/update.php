<?php
/* @var $this FormacionEmpleadoController */
/* @var $model FormacionEmpleado */

//para combos de niveles
$lista_niveles = CHtml::listData($niveles, 'Id_Dominio', 'Dominio');

?>

<h3>Actualización registro de formación empleado</h3>

<?php $this->renderPartial('_form2', array('model'=>$model, 'e' => $e, 'lista_niveles' => $lista_niveles)); ?>