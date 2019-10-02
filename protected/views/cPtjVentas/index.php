<?php
/* @var $this CPtjVentasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cptj Ventases',
);

$this->menu=array(
	array('label'=>'Create CPtjVentas', 'url'=>array('create')),
	array('label'=>'Manage CPtjVentas', 'url'=>array('admin')),
);
?>

<h1>Cptj Ventases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
