<?php
/* @var $this CVendedoresController */
/* @var $model CVendedores */

$this->breadcrumbs=array(
	'Cvendedores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CVendedores', 'url'=>array('index')),
	array('label'=>'Manage CVendedores', 'url'=>array('admin')),
);
?>

<h1>Create CVendedores</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>