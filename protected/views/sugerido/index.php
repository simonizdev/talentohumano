<?php
/* @var $this SugeridoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sugeridos',
);

$this->menu=array(
	array('label'=>'Create Sugerido', 'url'=>array('create')),
	array('label'=>'Manage Sugerido', 'url'=>array('admin')),
);
?>

<h1>Sugeridos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
