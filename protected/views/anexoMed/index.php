<?php
/* @var $this AnexoMedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Anexo Meds',
);

$this->menu=array(
	array('label'=>'Create AnexoMed', 'url'=>array('create')),
	array('label'=>'Manage AnexoMed', 'url'=>array('admin')),
);
?>

<h1>Anexo Meds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
