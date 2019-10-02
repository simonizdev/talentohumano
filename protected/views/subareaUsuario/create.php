<?php
/* @var $this SubareaUsuarioController */
/* @var $model SubareaUsuario */

$this->breadcrumbs=array(
	'Subarea Usuarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubareaUsuario', 'url'=>array('index')),
	array('label'=>'Manage SubareaUsuario', 'url'=>array('admin')),
);
?>

<h1>Create SubareaUsuario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>