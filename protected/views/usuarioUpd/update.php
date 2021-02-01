<?php
/* @var $this UsuarioUpdController */
/* @var $model UsuarioUpd */

$this->breadcrumbs=array(
	'Usuario Upds'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsuarioUpd', 'url'=>array('index')),
	array('label'=>'Create UsuarioUpd', 'url'=>array('create')),
	array('label'=>'View UsuarioUpd', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage UsuarioUpd', 'url'=>array('admin')),
);
?>

<h1>Update UsuarioUpd <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>