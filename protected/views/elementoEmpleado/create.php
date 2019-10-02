<?php
/* @var $this ElementoEmpleadoController */
/* @var $model ElementoEmpleado */

$this->breadcrumbs=array(
	'Elemento Empleados'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ElementoEmpleado', 'url'=>array('index')),
	array('label'=>'Manage ElementoEmpleado', 'url'=>array('admin')),
);
?>

<h1>Create ElementoEmpleado</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>