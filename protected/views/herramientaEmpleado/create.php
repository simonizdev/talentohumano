<?php
/* @var $this HerramientaEmpleadoController */
/* @var $model HerramientaEmpleado */

$this->breadcrumbs=array(
	'Herramienta Empleados'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HerramientaEmpleado', 'url'=>array('index')),
	array('label'=>'Manage HerramientaEmpleado', 'url'=>array('admin')),
);
?>

<h1>Create HerramientaEmpleado</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>