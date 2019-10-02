<?php
/* @var $this CorreriaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Correrias',
);

$this->menu=array(
	array('label'=>'Create Correria', 'url'=>array('create')),
	array('label'=>'Manage Correria', 'url'=>array('admin')),
);
?>

<h1>Correrias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
