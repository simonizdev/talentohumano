<?php
/* @var $this HerramientaEmpleadoController */
/* @var $model HerramientaEmpleado */

?>

<h3>Visualizando herramienta de empleado</h3>

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
			'name'=>'Id_Herramienta',
            'value'=>$model->idherramienta->Nombre,
        ),
		array(
			'name'=>'Imagen',
            'type' => 'raw',
            'value'=>CHtml::image(Yii::app()->baseUrl."/images/herramientas/".$model->idherramienta->Imagen,'',array("class"=>"img-responsive"))
        ),
        array(
            'name'=>'Descripción',
            'value'=>$model->idherramienta->Descripcion,
        ),
        array(
            'name'=>'Estado',
            'value'=>UtilidadesHerramienta::textoestado($model->Estado),
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
