<?php
/* @var $this CVendedoresController */
/* @var $model CVendedores */

?>

<h3>Visualizando vendedor</h3>

<div class="table-responsive">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'ROWID',
		'NIT_VENDEDOR',
		'NOMBRE_VENDEDOR',
		array(
            'name'=>'EMAIL',
            'value' => ($model->EMAIL == "") ? "NO ASIGNADO" : $model->EMAIL,
        ),
		'ID_VENDEDOR',
		'RECIBO',
		'RUTA',
		'NOMBRE_RUTA',
		'PORTAFOLIO',
		'NIT_SUPERVISOR',
		'NOMBRE_SUPERVISOR',
		array(
            'name'=>'TIPO',
            'value' => ($model->TIPO == "") ? "NO ASIGNADO" : $model->tipo->Dominio,
        ),
		array(
            'name'=>'ID_USUARIO_ACTUALIZACION',
            'value'=>$model->idusuarioact->Usuario,
        ),
        array(
            'name'=>'FECHA_ACTUALIZACION',
            'value'=>UtilidadesVarias::textofechahora($model->FECHA_ACTUALIZACION),
        ),
		'ESTADO',
	),
)); ?>

</div>

<div class="btn-group" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=cVendedores/admin'; ?>';"><i class="fa fa-reply"></i> Volver </button>
</div>


