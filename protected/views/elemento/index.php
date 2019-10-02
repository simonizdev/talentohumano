<?php
/* @var $this ElementoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Elementos',
);

$this->menu=array(
	array('label'=>'Create Elemento', 'url'=>array('create')),
	array('label'=>'Manage Elemento', 'url'=>array('admin')),
);
?>

<h1>Elementos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
