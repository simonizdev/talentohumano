<?php
/* @var $this CorreoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Correos',
);

$this->menu=array(
	array('label'=>'Create Correo', 'url'=>array('create')),
	array('label'=>'Manage Correo', 'url'=>array('admin')),
);
?>

<h1>Correos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
