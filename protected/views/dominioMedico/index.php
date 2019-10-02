<?php
/* @var $this DominioMedicoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'DominiosMedicos',
);

$this->menu=array(
	array('label'=>'Create DominioMedico', 'url'=>array('create')),
	array('label'=>'Manage DominioMedico', 'url'=>array('admin')),
);
?>

<h1>Dominios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
