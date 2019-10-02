<?php
/* @var $this ElementoEmpleadoController */
/* @var $model ElementoEmpleado */

$this->breadcrumbs=array(
	'Elemento Empleados'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ElementoEmpleado', 'url'=>array('index')),
	array('label'=>'Create ElementoEmpleado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#elemento-empleado-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Elemento Empleados</h1>

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
	'id'=>'elemento-empleado-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id_Elemento_Emp',
		'Id_A_Elemento',
		'Cantidad',
		'Id_Contrato',
		'Estado',
		'Id_Usuario_Creacion',
		/*
		'Fecha_Creacion',
		'Id_Usuario_Actualizacion',
		'Fecha_Actualizacion',
		'Id_Empleado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
