<?php
/* @var $this CAceleradorCmsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cacelerador Cms',
);

$this->menu=array(
	array('label'=>'Create CAceleradorCms', 'url'=>array('create')),
	array('label'=>'Manage CAceleradorCms', 'url'=>array('admin')),
);
?>

<h1>Cacelerador Cms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
