<?php
/* @var $this AusenciaEmpleadoController */
/* @var $model AusenciaEmpleado */

?>

<h3>Visualizando ausencia de empleado</h3>

<div class="table-responsive">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
            'name'=>'Id_Empleado',
            'value'=>UtilidadesEmpleado::nombreempleado($model->Id_Empleado),
        ),
        'Id_Contrato',
        array(
            'name'=>'Id_M_Ausencia',
            'value'=>$model->idmausencia->Dominio,
        ),
        'Cod_Soporte',
        array(
            'name'=>'Fecha_Inicial',
            'value'=>UtilidadesVarias::textofecha($model->Fecha_Inicial),
        ),
        array(
            'name'=>'Fecha_Final',
            'value'=>UtilidadesVarias::textofecha($model->Fecha_Final),
        ),
        'Dias',
        array(
            'name' => 'Horas',
            'type' => 'raw',
            'value' => ($model->Horas == 0.0) ? 0 : $model->Horas ,
        ),    
        array(
            'name' => 'Observacion',
            'type' => 'raw',
            'value' => ($model->Observacion == "") ? "NO ASIGNADO" : $model->Observacion,
        ),
        array(
            'name' => 'Nota',
            'type' => 'raw',
            'value' => ($model->Nota == "") ? "NO ASIGNADO" : $model->Nota,
        ),
        array(
            'name' => 'Descontar',
            'value' => UtilidadesVarias::textoestado2($model->Descontar),
        ),
        array(
            'name' => 'Descontar_FDS',
            'value' => UtilidadesVarias::textoestado2($model->Descontar_FDS),
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
