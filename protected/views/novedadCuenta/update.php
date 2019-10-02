<?php
/* @var $this NovedadCorreoController */
/* @var $model NovedadCorreo */

$this->breadcrumbs=array(
	'Novedad Correos'=>array('index'),
	$model->Id_N_Correo=>array('view','id'=>$model->Id_N_Correo),
	'Update',
);

$this->menu=array(
	array('label'=>'List NovedadCorreo', 'url'=>array('index')),
	array('label'=>'Create NovedadCorreo', 'url'=>array('create')),
	array('label'=>'View NovedadCorreo', 'url'=>array('view', 'id'=>$model->Id_N_Correo)),
	array('label'=>'Manage NovedadCorreo', 'url'=>array('admin')),
);
?>

<h1>Update NovedadCorreo <?php echo $model->Id_N_Correo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>