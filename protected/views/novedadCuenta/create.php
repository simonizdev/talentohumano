<?php
/* @var $this NovedadCorreoController */
/* @var $model NovedadCorreo */

$this->breadcrumbs=array(
	'Novedad Correos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NovedadCorreo', 'url'=>array('index')),
	array('label'=>'Manage NovedadCorreo', 'url'=>array('admin')),
);
?>

<h1>Create NovedadCorreo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>