<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle('fast');
	return false;
});
$('.search-form form').submit(function(){
	$('#elemento-sugerido-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

//para combos de usuarios
$lista_usuarios = CHtml::listData($usuarios, 'Usuario', 'Usuario'); 

//para combo de sugeridos
$lista_sugeridos = array();
foreach ($sugeridos as $sug) {
	$lista_sugeridos[$sug->Id_Sugerido] = $sug->idcargo->Cargo.' - '.$sug->idsubarea->Subarea.' / '.$sug->idarea->Area;
}

//para combo de elementos por area
$lista_elementos = array();
foreach ($elementos_area as $elem) {

    $id_elemento = $elem->Id_Elemento;
    $id_subarea = $elem->Id_Subarea;
    $id_area = $elem->Id_Area;

    if(is_null($id_elemento)){
        $elemento = 'NO ASIGNADO';
    }else{
        $elemento = $elem->idelemento->Elemento;
    }

    if(is_null($id_subarea)){
        $subarea = 'NO ASIGNADO';
    }else{
        $subarea = $elem->idsubarea->Subarea;
    }

    if(is_null($id_area)){
        $area = 'NO ASIGNADO';
    }else{
        $area = $elem->idarea->Area;
    }

	$lista_elementos[$elem->Id_A_elemento] = $elemento.' ('.$subarea.' / '.$area.')';
}

?>

<h3>Administración de elementos por sugerido</h3>

<div class="btn-group" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=elementoSugerido/create'; ?>';"><i class="fa fa-plus"></i> Nuevo registro</button>
    <button type="button" class="btn btn-success search-button"><i class="fa fa-filter"></i> Busqueda avanzada</button>
</div>

<div class="search-form" style="display:none;">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'lista_usuarios'=>$lista_usuarios,
	'lista_sugeridos'=>$lista_sugeridos,
	'lista_elementos'=>$lista_elementos,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'elemento-sugerido-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
    'enableSorting' => false,
	'columns'=>array(
		'Id_E_Sugerido',
		array(
            'name'=>'Id_Sugerido',
            'value'=>'UtilidadesSugerido::sugerido($data->Id_Sugerido)',
        ),
        'Cantidad',
        array(
            'name'=>'Id_A_Elemento',
            'value'=>'UtilidadesSugerido::areasubareaelemento($data->Id_A_Elemento)',
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
