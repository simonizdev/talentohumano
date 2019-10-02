<?php
/* @var $this FormulaMedController */
/* @var $model FormulaMed */

$this->breadcrumbs=array(
	'Formula Meds'=>array('index'),
	$model->Id_Formula=>array('view','id'=>$model->Id_Formula),
	'Update',
);

$this->menu=array(
	array('label'=>'List FormulaMed', 'url'=>array('index')),
	array('label'=>'Create FormulaMed', 'url'=>array('create')),
	array('label'=>'View FormulaMed', 'url'=>array('view', 'id'=>$model->Id_Formula)),
	array('label'=>'Manage FormulaMed', 'url'=>array('admin')),
);
?>

<h1>Update FormulaMed <?php echo $model->Id_Formula; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>