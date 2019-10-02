<?php
/* @var $this CPtjRecaudosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cptj Recaudoses',
);

$this->menu=array(
	array('label'=>'Create CPtjRecaudos', 'url'=>array('create')),
	array('label'=>'Manage CPtjRecaudos', 'url'=>array('admin')),
);
?>

<h1>Cptj Recaudoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
