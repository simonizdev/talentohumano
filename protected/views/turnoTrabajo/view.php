<?php
/* @var $this TurnoTrabajoController */
/* @var $model TurnoTrabajo */

?>

<h3>Visualizando centro de costo</h3>

<div class="table-responsive">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'Id_Turno_Trabajo',
        'Rango_Dias1',
        array(
            'name'=>'Entrada1',
            'value' => $model->HoraAmPm($model->Entrada1),
        ),
        array(
            'name'=>'Salida1',
            'value' => $model->HoraAmPm($model->Salida1),
        ),
        array(
            'name'=>'Rango_Dias2',
            'value' => ($model->Rango_Dias2 == "") ? "-" : $model->Rango_Dias2,
        ),
        array(
            'name'=>'Entrada2',
            'value' => ($model->Entrada2 == "") ? "-" : $model->HoraAmPm($model->Entrada2),
        ),
        array(
            'name'=>'Salida2',
            'value' => ($model->Salida2 == "") ? "-" : $model->HoraAmPm($model->Salida2),
        ),
		array(
            'name'=>'Id_Usuario_Creacion',
            'value'=>$model->idusuariocre->Usuario,
        ),
        array(
            'name'=>'Fecha_Creacion',
            'value'=>UtilidadesVarias::textofechahora($model->Fecha_Creacion),
        ),
        array(
            'name'=>'Id_Usuario_Actualizacion',
            'value'=>$model->idusuarioact->Usuario,
        ),
        array(
            'name'=>'Fecha_Actualizacion',
            'value'=>UtilidadesVarias::textofechahora($model->Fecha_Actualizacion),
        ),
        array(
            'name' => 'Estado',
            'value' => UtilidadesVarias::textoestado1($model->Estado),
        ),
	),
)); ?>

</div>

<div class="btn-group" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=turnoTrabajo/admin'; ?>';"><i class="fa fa-reply"></i> Volver </button>
</div>

