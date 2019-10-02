<?php
/* @var $this NovedadCorreoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Novedad Correos',
);

$this->menu=array(
	array('label'=>'Create NovedadCorreo', 'url'=>array('create')),
	array('label'=>'Manage NovedadCorreo', 'url'=>array('admin')),
);
?>

<h1>Novedad Correos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
