<?php
/* @var $this UsuarioUpdController */
/* @var $model UsuarioUpd */

$this->breadcrumbs=array(
	'Usuario Upds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsuarioUpd', 'url'=>array('index')),
	array('label'=>'Manage UsuarioUpd', 'url'=>array('admin')),
);
?>

<h1>Create UsuarioUpd</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>