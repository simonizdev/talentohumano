<?php
/* @var $this FormulaMedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Formula Meds',
);

$this->menu=array(
	array('label'=>'Create FormulaMed', 'url'=>array('create')),
	array('label'=>'Manage FormulaMed', 'url'=>array('admin')),
);
?>

<h1>Formula Meds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
