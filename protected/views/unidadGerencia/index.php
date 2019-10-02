<?php
/* @var $this UnidadGerenciaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Unidad Gerencias',
);

$this->menu=array(
	array('label'=>'Create UnidadGerencia', 'url'=>array('create')),
	array('label'=>'Manage UnidadGerencia', 'url'=>array('admin')),
);
?>

<h1>Unidad Gerencias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
