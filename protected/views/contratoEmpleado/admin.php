<?php
/* @var $this HistorialPersonalController */
/* @var $model HistorialPersonal */

$this->breadcrumbs=array(
	'Historial Personals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HistorialPersonal', 'url'=>array('index')),
	array('label'=>'Create HistorialPersonal', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#historial-personal-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Historial Personals</h1>

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
	'id'=>'historial-personal-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id_Historial',
		'Id_Personal',
		'Id_Cargo',
		'Id_Area',
		'Id_Empresa',
		'Id_Retiro',
		/*
		'Id_Usuario_Creacion',
		'Id_Usuario_Actualizacion',
		'Salario',
		'Fecha_Ingreso',
		'Fecha_Liquidacion',
		'Fecha_Retiro',
		'Fecha_Creacion',
		'Fecha_Actualizacion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
