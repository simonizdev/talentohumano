<?php
/* @var $this CPtjCumpController */
/* @var $model CPtjCump */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle('fast');
	return false;
});
$('.search-form form').submit(function(){
	$('#cptj-cump-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

//para combo de estados de tipos
$lista_tipos = CHtml::listData($tipos, 'Id_Dominio', 'Dominio'); 

//para combo de estados de usuarios
$lista_usuarios = CHtml::listData($usuarios, 'Usuario', 'Usuario');

?>

<h3>Administración de porcentajes de cumplimiento</h3>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i>Realizado</h4>
      <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<div class="btn-group" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=CPtjCump/create'; ?>';"><i class="fa fa-plus"></i> Nuevo registro</button>
    <button type="button" class="btn btn-success search-button"><i class="fa fa-filter"></i> Busqueda avanzada</button>
</div>

<div class="search-form" style="display:none;">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
    'lista_usuarios' => $lista_usuarios,
    'lista_tipos' => $lista_tipos,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cptj-cump-grid',
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
            'name'=>'PORCENTAJE',
            'value' => 'number_format($data->PORCENTAJE, 2)',
            'htmlOptions'=>array('style' => 'text-align: right;')
        ),
        array(
            'name'=>'CUM_INICIAL',
            'value' => 'number_format($data->CUM_INICIAL, 2)',
            'htmlOptions'=>array('style' => 'text-align: right;')
        ),
        array(
            'name'=>'CUM_FINAL',
            'value' => 'number_format($data->CUM_FINAL, 2)',
            'htmlOptions'=>array('style' => 'text-align: right;')
        ),
		/*
		'ID_USUARIO_CREACION',
		'FECHA_CREACION',
		'ID_USUARIO_ACTUALIZACION',
		'FECHA_ACTUALIZACION',
		*/
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
                    'options'=>array('title'=>'Inactivar porcentaje'),
                    'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->ESTADO == 1)',
                    'url'=>'Yii::app()->createUrl("CPtjCump/offconfig", array("id"=>$data->ROWID))',
                    'options'=>array('title'=>'Inactivar configuración', 'confirm'=>'Esta seguro de inactivar esta configuración ?'),
                ),
            )
		),
	),
)); ?>
