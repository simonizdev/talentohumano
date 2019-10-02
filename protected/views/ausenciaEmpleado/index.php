<?php
/* @var $this AusenciaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ausencias',
);

$this->menu=array(
	array('label'=>'Create Ausencia', 'url'=>array('create')),
	array('label'=>'Manage Ausencia', 'url'=>array('admin')),
);
?>

<h1>Ausencias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
