<?php
/* @var $this CAceleradorCmsController */
/* @var $model CAceleradorCms */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle('fast');
	return false;
});
$('.search-form form').submit(function(){
	$('#cacelerador-cms-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

//para combo  de tipos
$lista_tipos = CHtml::listData($tipos, 'Id_Dominio', 'Dominio');

//para combo de aceleradores
$lista_aceler = CHtml::listData($aceler, 'Id_Dominio', 'Dominio');  

//para combo  de planes
$lista_planes = CHtml::listData($planes, 'Id_Plan', 'Plan_Descripcion'); 

//para combo  de usuarios
$lista_usuarios = CHtml::listData($usuarios, 'Usuario', 'Usuario');

?>

<h3>Admininistración de acelerador CMS</h3>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i>Realizado</h4>
      <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<div class="btn-group" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=cAceleradorCms/create'; ?>';"><i class="fa fa-plus"></i> Nuevo registro</button>
    <button type="button" class="btn btn-success search-button"><i class="fa fa-filter"></i> Busqueda avanzada</button>
</div>

<div class="search-form" style="display:none;">
<?php $this->renderPartial('_search',array(
	'model'=>$model, 
    'lista_tipos' => $lista_tipos,
    'lista_aceler' => $lista_aceler,
    'lista_planes' => $lista_planes,
    'lista_usuarios' => $lista_usuarios,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cacelerador-cms-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
    'enableSorting' => false,
	'columns'=>array(
		'ROWID',
        array(
            'name'=>'TIPO',
            'value' => '($data->TIPO == "") ? "NO ASIGNADO" : $data->tipo->Dominio',
        ),
        array(
            'name'=>'ID_ACELERADOR',
            'value' => '($data->ID_ACELERADOR == "") ? "NO ASIGNADO" : $data->acelerador->Dominio',
        ),
        array(
            'name'=>'ITEM',
            'value' => '($data->ITEM == "") ? "NO ASIGNADO" : $data->Desc_Item($data->ITEM)',
        ),
        array(
            'name'=>'ID_PLAN',
            'value' => '($data->ID_PLAN == "") ? "NO ASIGNADO" : $data->Desc_Plan($data->ID_PLAN)',
        ),
        array(
            'name'=>'CRITERIO',
            'value' => '($data->CRITERIO == "") ? "NO ASIGNADO" : $data->Desc_Criterio($data->CRITERIO)',
        ),
        array(
            'name'=>'PORCENTAJE',
            'value' => 'number_format($data->PORCENTAJE, 2)',
            'htmlOptions'=>array('style' => 'text-align: right;')
        ),
		array(
            'name'=>'FECHA_INICIAL',
            'value'=>'UtilidadesVarias::textofecha($data->FECHA_INICIAL)',
        ),
        array(
            'name'=>'FECHA_FINAL',
            'value'=>'UtilidadesVarias::textofecha($data->FECHA_FINAL)',
        ),
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
            'template'=>'{view}{update}',
            'buttons'=>array(
                'view'=>array(
                    'label'=>'<i class="fa fa-eye actions text-black"></i>',
                    'imageUrl'=>false,
                    'options'=>array('title'=>'Visualizar'),
                ),
                'update'=>array(
                    'label'=>'<i class="fa fa-ban actions text-black"></i>',
                    'imageUrl'=>false,
                    'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->ESTADO == 1)',
                    'url'=>'Yii::app()->createUrl("cAceleradorCms/offconfig", array("id"=>$data->ROWID))',
                    'options'=>array('title'=>'Inactivar configuración', 'confirm'=>'Esta seguro de inactivar esta configuración ?'),
                ),
            )
		),
	),
)); ?>
