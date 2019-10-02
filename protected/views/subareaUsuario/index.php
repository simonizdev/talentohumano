<?php
/* @var $this SubareaUsuarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Subarea Usuarios',
);

$this->menu=array(
	array('label'=>'Create SubareaUsuario', 'url'=>array('create')),
	array('label'=>'Manage SubareaUsuario', 'url'=>array('admin')),
);
?>

<h1>Subarea Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
