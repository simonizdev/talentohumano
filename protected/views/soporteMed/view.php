<?php
/* @var $this SoporteMedController */
/* @var $model SoporteMed */

?>

<h3>Visualizando soporte médico de empleado</h3>

<div class="table-responsive">

<?php $path =Yii::app()->baseUrl.'/images/soporte_medico/'; ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
            'name'=>'Id_Empleado',
            'value'=>UtilidadesEmpleado::nombreempleado($model->Id_Empleado),
        ),
        array(
            'label' => 'Tipo de identificación',
            'value' => ($model->Id_Empleado == "") ? "No asignado" : $model->idempleado->idtipoident->Dominio,
        ),
        array(
            'label' => '# Identificación',
            'value' => ($model->Id_Empleado == "") ? "No asignado" : $model->idempleado->Identificacion,
        ),
        array(
            'label' => 'Fecha de nacimiento',
            'value' => ($model->Id_Empleado == "") ? "No asignado" : UtilidadesVarias::textofecha($model->idempleado->Fecha_Nacimiento),
        ),
        array(
            'label' => 'Edad',
            'value' => ($model->Id_Empleado == "") ? "No asignado" : UtilidadesEmpleado::edadempleado($model->Id_Empleado),
        ),
        array(
            'label' => 'Fecha de ingreso',
            'value' => ($model->Id_Contrato == "") ? "No asignado" : UtilidadesVarias::textofecha($model->idcontrato->Fecha_Ingreso),
        ),
        array(
            'label' => 'Área',
            'value' => ($model->Id_Contrato == "") ? "No asignado" : $model->idcontrato->idarea->Area,
        ),
        array(
            'label' => 'Cargo',
            'value' => ($model->Id_Contrato == "") ? "No asignado" : $model->idcontrato->idcargo->Cargo,
        ),

        array(
            'name' => 'Informacion_Adicional_Emp',
            'value' => ($model->Informacion_Adicional_Emp == "") ? "No asignado" : $model->Informacion_Adicional_Emp,
        ),
        array(
            'name' => 'Fecha',
            'value' => UtilidadesVarias::textofecha($model->Fecha),
        ),
        array(
            'name' => 'Descripcion',
            'value' => ($model->Descripcion == "") ? "No asignado" : $model->Descripcion,
        ),
        array(
        	'label'=>'Soporte',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode('Descargar PDF'), $path .$model->Soporte)
        ),
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
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=empleado/viewmed&id='.$model->Id_Empleado; ?>';"><i class="fa fa-reply"></i> Volver </button>
</div>

