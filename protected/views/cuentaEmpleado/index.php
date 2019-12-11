<?php
/* @var $this CuentaEmpleadoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cuenta Empleados',
);

$this->menu=array(
	array('label'=>'Create CuentaEmpleado', 'url'=>array('create')),
	array('label'=>'Manage CuentaEmpleado', 'url'=>array('admin')),
);
?>

<h1>Cuenta Empleados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
