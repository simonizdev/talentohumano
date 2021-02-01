<?php
/* @var $this UsuarioUpdController */
/* @var $model UsuarioUpd */

$this->breadcrumbs=array(
	'Usuario Upds'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UsuarioUpd', 'url'=>array('index')),
	array('label'=>'Create UsuarioUpd', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-upd-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Usuario Upds</h1>

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
	'id'=>'usuario-upd-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'Id_Usuario',
		'Id_Usuario_Creacion',
		'Id_Usuario_Actualizacion',
		'Fecha_Creacion',
		'Fecha_Actualizacion',
		/*
		'Estado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
