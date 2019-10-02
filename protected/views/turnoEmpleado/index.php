<?php
/* @var $this TurnoEmpleadoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Turno Empleados',
);

$this->menu=array(
	array('label'=>'Create TurnoEmpleado', 'url'=>array('create')),
	array('label'=>'Manage TurnoEmpleado', 'url'=>array('admin')),
);
?>

<h1>Turno Empleados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
