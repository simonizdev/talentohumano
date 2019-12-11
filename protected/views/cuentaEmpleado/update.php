<?php
/* @var $this CuentaEmpleadoController */
/* @var $model CuentaEmpleado */

$this->breadcrumbs=array(
	'Cuenta Empleados'=>array('index'),
	$model->Id_Cuenta_Emp=>array('view','id'=>$model->Id_Cuenta_Emp),
	'Update',
);

$this->menu=array(
	array('label'=>'List CuentaEmpleado', 'url'=>array('index')),
	array('label'=>'Create CuentaEmpleado', 'url'=>array('create')),
	array('label'=>'View CuentaEmpleado', 'url'=>array('view', 'id'=>$model->Id_Cuenta_Emp)),
	array('label'=>'Manage CuentaEmpleado', 'url'=>array('admin')),
);
?>

<h1>Update CuentaEmpleado <?php echo $model->Id_Cuenta_Emp; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>