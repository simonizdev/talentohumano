<?php
/* @var $this HerramientaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Herramientas',
);

$this->menu=array(
	array('label'=>'Create Herramienta', 'url'=>array('create')),
	array('label'=>'Manage Herramienta', 'url'=>array('admin')),
);
?>

<h1>Herramientas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
