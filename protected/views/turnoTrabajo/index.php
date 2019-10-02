<?php
/* @var $this TurnoTrabajoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Turno Trabajos',
);

$this->menu=array(
	array('label'=>'Create TurnoTrabajo', 'url'=>array('create')),
	array('label'=>'Manage TurnoTrabajo', 'url'=>array('admin')),
);
?>

<h1>Turno Trabajos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
