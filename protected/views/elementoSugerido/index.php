<?php
/* @var $this ElementoSugeridoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Elemento Sugeridos',
);

$this->menu=array(
	array('label'=>'Create ElementoSugerido', 'url'=>array('create')),
	array('label'=>'Manage ElementoSugerido', 'url'=>array('admin')),
);
?>

<h1>Elemento Sugeridos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
