<?php
/* @var $this AnexoMedController */
/* @var $model AnexoMed */

$this->breadcrumbs=array(
	'Anexo Meds'=>array('index'),
	$model->Id_Anexo=>array('view','id'=>$model->Id_Anexo),
	'Update',
);

$this->menu=array(
	array('label'=>'List AnexoMed', 'url'=>array('index')),
	array('label'=>'Create AnexoMed', 'url'=>array('create')),
	array('label'=>'View AnexoMed', 'url'=>array('view', 'id'=>$model->Id_Anexo)),
	array('label'=>'Manage AnexoMed', 'url'=>array('admin')),
);
?>

<h1>Update AnexoMed <?php echo $model->Id_Anexo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>