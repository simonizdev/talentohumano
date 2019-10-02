<?php
/* @var $this TurnoTrabajoController */
/* @var $model TurnoTrabajo */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle('fast');
	return false;
});
$('.search-form form').submit(function(){
	$('#turno-trabajo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

//para combos de usuarios
$lista_usuarios = CHtml::listData($usuarios, 'Usuario', 'Usuario');

?>

<h3>Administración turnos de trabajo</h3>

<div class="btn-group" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=turnoTrabajo/create'; ?>';"><i class="fa fa-plus"></i> Nuevo registro</button>
    <button type="button" class="btn btn-success search-button"><i class="fa fa-filter"></i> Busqueda avanzada</button>
</div>

<div class="search-form" style="display:none;">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'lista_usuarios' => $lista_usuarios,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'turno-trabajo-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
    'enableSorting' => false,
	'columns'=>array(
		'Id_Turno_Trabajo',
		'Rango_Dias1',
		array(
            'name'=>'Entrada1',
            'value' => '$data->HoraAmPm($data->Entrada1)',
        ),
        array(
            'name'=>'Salida1',
            'value' => '$data->HoraAmPm($data->Salida1)',
        ),
		array(
            'name'=>'Rango_Dias2',
            'value' => '($data->Rango_Dias2 == "") ? "-" : $data->Rango_Dias2',
        ),
		array(
            'name'=>'Entrada2',
            'value' => '($data->Entrada2 == "") ? "-" : $data->HoraAmPm($data->Entrada2)',
        ),
        array(
            'name'=>'Salida2',
            'value' => '($data->Salida2 == "") ? "-" : $data->HoraAmPm($data->Salida2)',
        ),
		/*
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
            'template'=>'{view}{update}',
            'buttons'=>array(
                'view'=>array(
                    'label'=>'<i class="fa fa-eye actions text-black"></i>',
                    'imageUrl'=>false,
                    'options'=>array('title'=>'Visualizar'),
                ),
                'update'=>array(
                    'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                    'imageUrl'=>false,
                    'options'=>array('title'=>'Actualizar'),
                    'visible'=> '(Yii::app()->user->getState("permiso_act") == true)',
                ),
            )
		),
	),
)); 

?>
