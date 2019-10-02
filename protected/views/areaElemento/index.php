<?php
/* @var $this AreaElementoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Area Elementos',
);

$this->menu=array(
	array('label'=>'Create AreaElemento', 'url'=>array('create')),
	array('label'=>'Manage AreaElemento', 'url'=>array('admin')),
);
?>

<h1>Area Elementos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
