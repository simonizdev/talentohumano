<?php
/* @var $this EvaluacionEmpleadoController */
/* @var $model EvaluacionEmpleado */

?>

<h3>Visualizando evaluación de empleado</h3>

<div class="table-responsive">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
            'name'=>'Id_Empleado',
            'value'=>UtilidadesEmpleado::nombreempleado($model->Id_Empleado),
        ),
        array(
            'name'=>'Fecha',
            'value'=>UtilidadesVarias::textofecha($model->Fecha),
        ),
        array(
            'name'=>'Id_Tipo',
            'value'=>$model->idtipo->Dominio,
        ),
        'Puntaje',
        array(
            'name' => 'Observacion',
            'type' => 'raw',
            'value' => ($model->Observacion == "") ? "NO ASIGNADO" : $model->Observacion,
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
	),
)); ?>

</div>

<div class="btn-group" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=empleado/view&id='.$model->Id_Empleado; ?>';"><i class="fa fa-reply"></i> Volver </button>
</div>

