<?php
/* @var $this ElementoEmpleadoController */
/* @var $model ElementoEmpleado */

$this->breadcrumbs=array(
	'Elemento Empleados'=>array('index'),
	$model->Id_Elemento_Emp=>array('view','id'=>$model->Id_Elemento_Emp),
	'Update',
);

$this->menu=array(
	array('label'=>'List ElementoEmpleado', 'url'=>array('index')),
	array('label'=>'Create ElementoEmpleado', 'url'=>array('create')),
	array('label'=>'View ElementoEmpleado', 'url'=>array('view', 'id'=>$model->Id_Elemento_Emp)),
	array('label'=>'Manage ElementoEmpleado', 'url'=>array('admin')),
);
?>

<h1>Update ElementoEmpleado <?php echo $model->Id_Elemento_Emp; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>