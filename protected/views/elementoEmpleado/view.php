<?php
/* @var $this ElementoEmpleadoController */
/* @var $model ElementoEmpleado */

?>

<h3>Visualizando elemento de empleado</h3>

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
            'name' => 'Cantidad',
            'type' => 'raw',
            'value' => $model->Cantidad,
            'htmlOptions'=>array('style' => 'text-align: right;'),
        ),
        array(
            'name' => 'elemento',
            'type' => 'raw',
            'value' => $model->idaelemento->idelemento->Elemento,
        ),
        array(
            'name' => 'area',
            'type' => 'raw',
            'value' => $model->idaelemento->idarea->Area,
        ),
        array(
            'name'=>'Estado',
            'value'=>UtilidadesElemento::textoestado($model->Estado),
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