<?php
/* @var $this SubareaUsuarioController */
/* @var $model SubareaUsuario */

$this->breadcrumbs=array(
	'Subarea Usuarios'=>array('index'),
	$model->Id_S_Usuario=>array('view','id'=>$model->Id_S_Usuario),
	'Update',
);

$this->menu=array(
	array('label'=>'List SubareaUsuario', 'url'=>array('index')),
	array('label'=>'Create SubareaUsuario', 'url'=>array('create')),
	array('label'=>'View SubareaUsuario', 'url'=>array('view', 'id'=>$model->Id_S_Usuario)),
	array('label'=>'Manage SubareaUsuario', 'url'=>array('admin')),
);
?>

<h1>Update SubareaUsuario <?php echo $model->Id_S_Usuario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>