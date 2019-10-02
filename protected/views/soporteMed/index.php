<?php
/* @var $this SoporteMedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Soporte Meds',
);

$this->menu=array(
	array('label'=>'Create SoporteMed', 'url'=>array('create')),
	array('label'=>'Manage SoporteMed', 'url'=>array('admin')),
);
?>

<h1>Soporte Meds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
