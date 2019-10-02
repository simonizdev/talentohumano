<?php
/* @var $this CarpCompController */
/* @var $model CarpComp */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle('fast');
	return false;
});
$('.search-form form').submit(function(){
	$('#carp-comp-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administración de carpetas compartidas</h3>

<div class="btn-group" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=carpComp/create'; ?>';"><i class="fa fa-plus"></i> Nuevo registro</button>
    <button type="button" class="btn btn-success search-button"><i class="fa fa-filter"></i> Busqueda avanzada</button>
</div>

<div class="search-form" style="display:none;">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'carp-comp-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
    'enableSorting' => false,
	'columns'=>array(
		//'Id_Carpeta_Comp',
		'Servidor',
		'Carpeta',
		'Ruta',
        array(
            'name' => 'Tipo_Acceso',
            'value' => '($data->Tipo_Acceso == 1) ? "GENÉRICO" : "PERSONAL"',
        ),
        array(
            'name'=>'num_usua',
            'value'=>'$data->Num_Usuarios($data->Id_Carpeta_Comp)',
        ),
		/*'Usuario',
		'Password',
		'Id_Usuario_Creacion',
		'Id_Usuario_Actualizacion',
		'Fecha_Creacion',
		'Fecha_Actualizacion',
		*/
		array(
            'name' => 'Estado',
            'value' => 'UtilidadesVarias::textoestado1($data->Estado)',
        ),
		array(
			'class'=>'CButtonColumn',
            'template'=>'{update}',
            'buttons'=>array(
                'update'=>array(
                    'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                    'imageUrl'=>false,
                    'options'=>array('title'=>'Actualizar'),
                ),
            )
		),
	),
)); ?>
