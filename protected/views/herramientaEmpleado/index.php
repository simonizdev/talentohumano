<?php
/* @var $this HerramientaEmpleadoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Herramienta Empleados',
);

$this->menu=array(
	array('label'=>'Create HerramientaEmpleado', 'url'=>array('create')),
	array('label'=>'Manage HerramientaEmpleado', 'url'=>array('admin')),
);
?>

<h1>Herramienta Empleados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
