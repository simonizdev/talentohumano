<?php
/* @var $this SubareaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Subareas',
);

$this->menu=array(
	array('label'=>'Create Subarea', 'url'=>array('create')),
	array('label'=>'Manage Subarea', 'url'=>array('admin')),
);
?>

<h1>Subareas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
