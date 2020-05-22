<?php
/* @var $this CPtjCumpController */
/* @var $model CPtjCump */

?>

<h3>Visualizando porcentaje</h3>

<div class="table-responsive">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ROWID',
		array(
            'name'=>'TIPO',
            'value' => ($model->TIPO == "") ? "NO ASIGNADO" : $model->tipo->Dominio,
        ),
        array(
            'name' => 'PORCENTAJE',
            'value' => number_format($model->PORCENTAJE, 2),
        ),
        array(
            'name' => 'CUM_INICIAL',
            'value' => number_format($model->CUM_INICIAL, 2),
        ),
        array(
            'name' => 'CUM_FINAL',
            'value' => number_format($model->CUM_FINAL, 2),
        ),
		array(
            'name'=>'ID_USUARIO_CREACION',
            'value'=>$model->idusuariocre->Usuario,
        ),
        array(
            'name'=>'FECHA_CREACION',
            'value'=>UtilidadesVarias::textofechahora($model->FECHA_CREACION),
        ),
        array(
            'name'=>'ID_USUARIO_ACTUALIZACION',
            'value'=>$model->idusuarioact->Usuario,
        ),
        array(
            'name'=>'FECHA_ACTUALIZACION',
            'value'=>UtilidadesVarias::textofechahora($model->FECHA_ACTUALIZACION),
        ),
        array(
            'name' => 'ESTADO',
            'value' => UtilidadesVarias::textoestado1($model->ESTADO),
        ),
	),
)); ?>

</div>

<div class="btn-group" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=cPtjCump/admin'; ?>';"><i class="fa fa-reply"></i> Volver </button>
</div>