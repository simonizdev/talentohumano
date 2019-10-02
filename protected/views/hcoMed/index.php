<?php
/* @var $this HcoMedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Hco Meds',
);

$this->menu=array(
	array('label'=>'Create HcoMed', 'url'=>array('create')),
	array('label'=>'Manage HcoMed', 'url'=>array('admin')),
);
?>

<h1>Hco Meds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
