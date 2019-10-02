<?php
/* @var $this NucleoEmpleadoController */
/* @var $model NucleoEmpleado */

//para combos de géneros
$lista_generos = CHtml::listData($generos, 'Id_Dominio', 'Dominio');

//para combos de parentescos
$lista_parentescos = CHtml::listData($parentescos, 'Id_Dominio', 'Dominio');

?>

<h3>Registro pariente de empleado</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'e'=>$e, 'lista_generos'=>$lista_generos, 'lista_parentescos'=>$lista_parentescos)); ?>