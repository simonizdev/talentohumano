<?php
/* @var $this CPtjRecaudosController */
/* @var $model CPtjRecaudos */

$this->breadcrumbs=array(
	'Cptj Recaudoses'=>array('index'),
	$model->ROWID=>array('view','id'=>$model->ROWID),
	'Update',
);

$this->menu=array(
	array('label'=>'List CPtjRecaudos', 'url'=>array('index')),
	array('label'=>'Create CPtjRecaudos', 'url'=>array('create')),
	array('label'=>'View CPtjRecaudos', 'url'=>array('view', 'id'=>$model->ROWID)),
	array('label'=>'Manage CPtjRecaudos', 'url'=>array('admin')),
);
?>

<h1>Update CPtjRecaudos <?php echo $model->ROWID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>