<?php
/* @var $this FormacionEmpleadoController */
/* @var $model FormacionEmpleado */

//para combos de niveles
$lista_niveles = CHtml::listData($niveles, 'Id_Dominio', 'Dominio');

?>

<h3>Creación registro de formación empleado</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'e' => $e, 'lista_niveles' => $lista_niveles)); ?>