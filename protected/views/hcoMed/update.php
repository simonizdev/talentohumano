<?php
/* @var $this HcoMedController */
/* @var $model HcoMed */

$this->breadcrumbs=array(
	'Hco Meds'=>array('index'),
	$model->Id_Hco=>array('view','id'=>$model->Id_Hco),
	'Update',
);

$this->menu=array(
	array('label'=>'List HcoMed', 'url'=>array('index')),
	array('label'=>'Create HcoMed', 'url'=>array('create')),
	array('label'=>'View HcoMed', 'url'=>array('view', 'id'=>$model->Id_Hco)),
	array('label'=>'Manage HcoMed', 'url'=>array('admin')),
);
?>

<h1>Update HcoMed <?php echo $model->Id_Hco; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>