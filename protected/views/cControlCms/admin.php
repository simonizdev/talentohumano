<?php
/* @var $this CControlCmsController */
/* @var $model CControlCms */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle('fast');
	return false;
});
$('.search-form form').submit(function(){
	$('#ccontrol-cms-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

//para combos de usuarios
$lista_tipos = CHtml::listData($tipos, 'Id_Dominio', 'Dominio');

//para combos de usuarios
$lista_usuarios = CHtml::listData($usuarios, 'Usuario', 'Usuario');
?>

<h3>Estado de liquidaciones</h3>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i>Realizado</h4>
      <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?> 

<button type="button" class="btn btn-success search-button"><i class="fa fa-filter"></i> Busqueda avanzada</button>
<div class="search-form" style="display:none;padding-top: 2%;">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'lista_tipos' => $lista_tipos,
	'lista_usuarios' => $lista_usuarios,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ccontrol-cms-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
    'enableSorting' => false,
	'columns'=>array(
		'ID_BASE',
        array(
            'name' => 'MES',
            'value' => '$data->Desc_Mes($data->MES)',
        ),
        array(
            'name' => 'ANIO',
            'value' => '$data->ANIO',
        ),
		array(
            'name'=>'TIPO',
            'value'=>'$data->tipo->Dominio',
        ),
        array(
            'name'=>'LIQUIDACION',
            'value'=>'$data->Desc_Liq($data->LIQUIDACION)',
        ),
        
		array(
            'name' => 'VENDEDOR',
            'value' => '($data->VENDEDOR == "") ? "N/A" : $data->Desc_Vend($data->VENDEDOR)',
        ),
        'OBSERVACION',
		/*array(
            'name'=>'ID_USUARIO_CREACION',
            'value'=>'$data->idusuariocre->Usuario',
        ),
        array(
            'name'=>'FECHA_CREACION',
            'value'=>'UtilidadesVarias::textofechahora($data->FECHA_CREACION)',
        ),
        array(
            'name'=>'ID_USUARIO_ACTUALIZACION',
            'value'=>'$data->idusuarioact->Usuario',
        ),
        array(
            'name'=>'FECHA_ACTUALIZACION',
            'value'=>'UtilidadesVarias::textofechahora($data->FECHA_ACTUALIZACION)',
        ),*/
        array(
            'name' => 'ESTADO',
            'value' => 'UtilidadesVarias::textoestado1($data->ESTADO)',
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{notif}{rev}',
            'buttons'=>array(
                'view'=>array(
                    'label'=>'<i class="fa fa-eye actions text-black"></i>',
                    'imageUrl'=>false,
                    'options'=>array('title'=>'Visualizar'),
                ),                
                'notif'=>array(
                    'label'=>'<i class="fa fa-envelope actions text-black"></i>',
                    'imageUrl'=>false,
                    'url'=>'Yii::app()->createUrl("cControlCms/notifliq", array("id"=>$data->ROWID))',
                    'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->ESTADO == 1)',
                    'options'=>array('title'=>'Enviar detalle via e-mail'),

                ),
                'rev'=>array(
                    'label'=>'<i class="fa fa-arrow-circle-left actions text-black"></i>',
                    'imageUrl'=>false,
                    'url'=>'Yii::app()->createUrl("cControlCms/revliq", array("id"=>$data->ROWID))',
                    'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->ESTADO == 1)',
                    'options'=>array('title'=>'Revertir liquidación', 'confirm'=>'Esta seguro de revertir esta liquidación ?'),

                ),
            )
        ),
	),
)); 

?>
