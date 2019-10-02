<?php
/* @var $this EmpresaUsuarioController */
/* @var $model EmpresaUsuario */

$this->breadcrumbs=array(
	'Empresa Usuarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmpresaUsuario', 'url'=>array('index')),
	array('label'=>'Manage EmpresaUsuario', 'url'=>array('admin')),
);
?>

<h1>Create EmpresaUsuario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>