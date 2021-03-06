<?php
/* @var $this AnexoMedController */
/* @var $model AnexoMed */

$this->breadcrumbs=array(
	'Anexo Meds'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AnexoMed', 'url'=>array('index')),
	array('label'=>'Create AnexoMed', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#anexo-med-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Anexo Meds</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'anexo-med-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id_Anexo',
		'Id_Empleado',
		'Informacion_Adicional_Emp',
		'Id_Contrato',
		'Fecha',
		'Padecimiento_Actual',
		/*
		'Motivo',
		'Enfermedad_Actual',
		'Alergia',
		'Hallazgo',
		'Diagnostico',
		'Plan_Anexo',
		'Id_Usuario_Creacion',
		'Fecha_Creacion',
		'Id_Usuario_Actualizacion',
		'Fecha_Actualizacion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
