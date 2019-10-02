<?php
/* @var $this HerramientaEmpleadoController */
/* @var $model HerramientaEmpleado */

$this->breadcrumbs=array(
	'Herramienta Empleados'=>array('index'),
	$model->Id_H_Empleado=>array('view','id'=>$model->Id_H_Empleado),
	'Update',
);

$this->menu=array(
	array('label'=>'List HerramientaEmpleado', 'url'=>array('index')),
	array('label'=>'Create HerramientaEmpleado', 'url'=>array('create')),
	array('label'=>'View HerramientaEmpleado', 'url'=>array('view', 'id'=>$model->Id_H_Empleado)),
	array('label'=>'Manage HerramientaEmpleado', 'url'=>array('admin')),
);
?>

<h1>Update HerramientaEmpleado <?php echo $model->Id_H_Empleado; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>