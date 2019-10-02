<?php
/* @var $this TurnoEmpleadoController */
/* @var $model TurnoEmpleado */

$this->breadcrumbs=array(
	'Turno Empleados'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TurnoEmpleado', 'url'=>array('index')),
	array('label'=>'Create TurnoEmpleado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#turno-empleado-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Turno Empleados</h1>

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
	'id'=>'turno-empleado-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id_T_Empleado',
		'Id_Turno',
		'Fecha_Inicial',
		'Fecha_Final',
		'Id_Empleado',
		'Id_Usuario_Creacion',
		/*
		'Id_Usuario_Actualizacion',
		'Id_Contrato',
		'Estado',
		'Fecha_Creacion',
		'Fecha_Actualizacion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
