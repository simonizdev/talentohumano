<?php
/* @var $this SoporteMedController */
/* @var $model SoporteMed */

$this->breadcrumbs=array(
	'Soporte Meds'=>array('index'),
	$model->Id_Soporte=>array('view','id'=>$model->Id_Soporte),
	'Update',
);

$this->menu=array(
	array('label'=>'List SoporteMed', 'url'=>array('index')),
	array('label'=>'Create SoporteMed', 'url'=>array('create')),
	array('label'=>'View SoporteMed', 'url'=>array('view', 'id'=>$model->Id_Soporte)),
	array('label'=>'Manage SoporteMed', 'url'=>array('admin')),
);
?>

<h1>Update SoporteMed <?php echo $model->Id_Soporte; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>