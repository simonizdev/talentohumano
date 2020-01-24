<?php
/* @var $this ExtController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Exts',
);

$this->menu=array(
	array('label'=>'Create Ext', 'url'=>array('create')),
	array('label'=>'Manage Ext', 'url'=>array('admin')),
);
?>

<h1>Exts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
