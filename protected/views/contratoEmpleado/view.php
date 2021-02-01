<?php
/* @var $this ContratoEmpleadoController */
/* @var $model ContratoEmpleado */

?>

<h3>Visualizando contrato de empleado</h3>

<div class="table-responsive">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
            'name'=>'Id_Empleado',
            'value'=>UtilidadesEmpleado::nombreempleado($model->Id_Empleado),
        ),
        array(
            'name'=>'Id_Empresa',
            'value'=>$model->idempresa->Descripcion,
        ),
        array(
            'name'=>'Id_Unidad_Gerencia',
            'value'=>($model->Id_Unidad_Gerencia == "" ) ? "NO ASIGNADO" :$model->idunidadgerencia->Unidad_Gerencia,
        ),
        array(
            'name'=>'Id_Area',
            'value'=>($model->Id_Area == "" ) ? "NO ASIGNADO" :$model->idarea->Area,
        ),
        array(
            'name'=>'Id_Subarea',
            'value'=>($model->Id_Subarea == "" ) ? "NO ASIGNADO" :$model->idsubarea->Subarea,
        ),
        array(
            'name'=>'Id_Cargo',
            'value'=>($model->Id_Cargo == "" ) ? "NO ASIGNADO" :$model->idcargo->Cargo,
        ),
        array(
            'name'=>'Id_Centro_Costo',
            'value'=>($model->Id_Centro_Costo == "" ) ? "NO ASIGNADO" :$model->idcentrocosto->Codigo.' - '.$model->idcentrocosto->Centro_Costo,
        ),
        array(
            'name'=>'Fecha_Ingreso',
            'value'=>($model->Fecha_Ingreso == "" ) ? "NO ASIGNADO" : UtilidadesVarias::textofecha($model->Fecha_Ingreso),
        ),
        array(
            'name'=>'Salario',
            'value'=>number_format($model->Salario, 0),
            'visible'=>$upd_th,
        ),
        array(
            'name'=>'Salario_Flexible',
            'value'=>($model->Salario_Flexible == "" ) ? "NO ASIGNADO" :UtilidadesVarias::textoestado2($model->Salario_Flexible),
            'visible'=>$upd_th,
        ),
        array(
            'name'=>'Id_M_Retiro',
            'value'=> ($model->Id_M_Retiro == "") ? "NO ASIGNADO" : $model->idmretiro->Dominio,
        ),
        array(
            'name'=>'Fecha_Retiro',
            'value'=>($model->Fecha_Retiro == "" ) ? "NO ASIGNADO" : UtilidadesVarias::textofecha($model->Fecha_Retiro),
        ),
        array(
            'name' => 'Observacion',
            'type' => 'raw',
            'value' => ($model->Observacion == "") ? "NO ASIGNADO" : $model->Observacion,
        ),
        array(
            'name'=>'Fecha_Liquidacion',
            'value'=>($model->Fecha_Liquidacion == "" ) ? "NO ASIGNADO" : UtilidadesVarias::textofecha($model->Fecha_Liquidacion),
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
