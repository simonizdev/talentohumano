<?php
/* @var $this ElementoEmpleadoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Elemento Empleados',
);

$this->menu=array(
	array('label'=>'Create ElementoEmpleado', 'url'=>array('create')),
	array('label'=>'Manage ElementoEmpleado', 'url'=>array('admin')),
);
?>

<h1>Elemento Empleados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
