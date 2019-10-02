<?php
/* @var $this CPtjVentasController */
/* @var $model CPtjVentas */

$this->breadcrumbs=array(
	'Cptj Ventases'=>array('index'),
	$model->ROWID=>array('view','id'=>$model->ROWID),
	'Update',
);

$this->menu=array(
	array('label'=>'List CPtjVentas', 'url'=>array('index')),
	array('label'=>'Create CPtjVentas', 'url'=>array('create')),
	array('label'=>'View CPtjVentas', 'url'=>array('view', 'id'=>$model->ROWID)),
	array('label'=>'Manage CPtjVentas', 'url'=>array('admin')),
);
?>

<h1>Update CPtjVentas <?php echo $model->ROWID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>