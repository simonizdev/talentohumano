<?php
/* @var $this AusenciaController */
/* @var $model Ausencia */

$this->breadcrumbs=array(
	'Ausencias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Ausencia', 'url'=>array('index')),
	array('label'=>'Create Ausencia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ausencia-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ausencias</h1>

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
	'id'=>'ausencia-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id_Ausencia',
		'Id_Personal',
		'Id_M_Ausencia',
		'Id_Usuario_Creacion',
		'Id_Usuario_Actualizacion',
		'Cod_Soporte',
		/*
		'Descontar',
		'Descontar_FDS',
		'Dias',
		'Horas',
		'Fecha_Creacion',
		'Fecha_Actualizacion',
		'Observacion',
		'Nota',
		'Fecha_Inicial',
		'Fecha_Final',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
