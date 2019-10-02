<?php
/* @var $this DominioWebController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dominio Webs',
);

$this->menu=array(
	array('label'=>'Create DominioWeb', 'url'=>array('create')),
	array('label'=>'Manage DominioWeb', 'url'=>array('admin')),
);
?>

<h1>Dominio Webs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
