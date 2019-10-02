<?php
/* @var $this EmpresaUsuarioController */
/* @var $model EmpresaUsuario */

$this->breadcrumbs=array(
	'Empresa Usuarios'=>array('index'),
	$model->Id_E_Usuario=>array('view','id'=>$model->Id_E_Usuario),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmpresaUsuario', 'url'=>array('index')),
	array('label'=>'Create EmpresaUsuario', 'url'=>array('create')),
	array('label'=>'View EmpresaUsuario', 'url'=>array('view', 'id'=>$model->Id_E_Usuario)),
	array('label'=>'Manage EmpresaUsuario', 'url'=>array('admin')),
);
?>

<h1>Update EmpresaUsuario <?php echo $model->Id_E_Usuario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>