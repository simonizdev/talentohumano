<?php
/* @var $this AreaElementoController */
/* @var $model AreaElemento */
 
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle('fast');
	return false;
});
$('.search-form form').submit(function(){
	$('#area-elemento-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

//para combos de elementos
$lista_elementos = CHtml::listData($elementos, 'Elemento', 'Elemento'); 
//para combos de areas
$lista_areas = CHtml::listData($areas, 'Area', 'Area'); 
//para combos de subareas
$lista_subareas = CHtml::listData($subareas, 'Subarea', 'Subarea'); 
//para combos de usuarios
$lista_usuarios = CHtml::listData($usuarios, 'Usuario', 'Usuario'); 

?>

<h3>Asignación de áreas / subáreas por elemento</h3>

<div class="btn-group" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=areaElemento/create'; ?>';"><i class="fa fa-plus"></i> Nuevo registro</button>
    <button type="button" class="btn btn-success search-button"><i class="fa fa-filter"></i> Busqueda avanzada</button>
</div>

<div class="search-form" style="display:none;">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
    'lista_elementos' => $lista_elementos,
    'lista_areas' => $lista_areas,
    'lista_subareas' => $lista_subareas,
    'lista_usuarios' => $lista_usuarios,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'area-elemento-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
    'enableSorting' => false,
	'columns'=>array(
		'Id_A_elemento',
		array(
            'name'=>'elemento',
            'value'=>'$data->idelemento->Elemento',
        ),
        array(
            'name'=>'subarea',
            'value' => '($data->Id_Subarea == "") ? "NO ASIGNADO" : $data->idsubarea->Subarea',
        ),
        array(
            'name'=>'area',
            'value'=>'$data->idarea->Area',
        ),
		/*array(
            'name'=>'Id_Usuario_Creacion',
            'value'=>'$data->idusuariocre->Usuario',
        ),
        array(
            'name'=>'Fecha_Creacion',
            'value'=>'UtilidadesVarias::textofechahora($data->Fecha_Creacion)',
        ),
        array(
            'name'=>'Id_Usuario_Actualizacion',
            'value'=>'$data->idusuarioact->Usuario',
        ),
        array(
            'name'=>'Fecha_Actualizacion',
            'value'=>'UtilidadesVarias::textofechahora($data->Fecha_Actualizacion)',
        ),*/
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
)); ?>
