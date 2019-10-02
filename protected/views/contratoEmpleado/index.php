<?php
/* @var $this HistorialPersonalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Historial Personals',
);

$this->menu=array(
	array('label'=>'Create HistorialPersonal', 'url'=>array('create')),
	array('label'=>'Manage HistorialPersonal', 'url'=>array('admin')),
);
?>

<h1>Historial Personals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
