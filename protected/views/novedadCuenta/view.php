<?php
/* @var $this NovedadCorreoController */
/* @var $model NovedadCorreo */

?>

<h3>Visualizando novedad de cuenta</h3>

<div class="table-responsive">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id_N_Cuenta',
		array(
            'name'=>'Id_Cuenta',
            'value'=>$model->Id_Cuenta,
        ),
		'Novedades',
		array(
            'name'=>'Id_Usuario_Creacion',
            'value'=>$model->idusuariocre->Usuario,
        ),
        array(
            'name'=>'Fecha_Creacion',
            'value'=>UtilidadesVarias::textofechahora($model->Fecha_Creacion),
        ),
	),
)); ?>

</div>

<div class="btn-group" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=novedadCuenta/admin'; ?>';"><i class="fa fa-reply"></i> Volver </button>
</div>

