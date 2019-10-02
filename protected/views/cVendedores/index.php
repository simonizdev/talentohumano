<?php
/* @var $this CVendedoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cvendedores',
);

$this->menu=array(
	array('label'=>'Create CVendedores', 'url'=>array('create')),
	array('label'=>'Manage CVendedores', 'url'=>array('admin')),
);
?>

<h1>Cvendedores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
