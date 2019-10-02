<?php
/* @var $this CorreoController */
/* @var $model Correo */

?>

<h1>Visualizando cuenta</h1>

<div class="table-responsive">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id_Cuenta',
        array(
            'name'=>'Tipo_Asociacion',
            'value'=>$model->tipoasociacion->Dominio,
        ),
        array(
            'name' => 'Id_Empleado',
            'value' => ($model->Id_Empleado == "") ? "-" : UtilidadesEmpleado::nombreempleado($model->Id_Empleado),
        ),
        array(
            'name' => 'area',
            'value' => ($model->Id_Empleado == "") ? "-" : UtilidadesEmpleado::areaactualempleado($model->Id_Empleado),
        ),
        array(
            'name' => 'cargo',
            'value' => ($model->Id_Empleado == "") ? "-" : UtilidadesEmpleado::cargoactualempleado($model->Id_Empleado),
        ),
        array(
            'name' => 'empresa_emp',
            'value' => ($model->Id_Empleado == "") ? "-" : UtilidadesEmpleado::empresaactualempleado($model->Id_Empleado),
        ),
        array(
            'name' => 'estado_emp',
            'value' => ($model->Id_Empleado == "") ? "-" : UtilidadesEmpleado::estadoactualempleado($model->Id_Empleado),
        ),
		array(
            'name'=>'Tipo',
            'value' => ($model->Tipo == "") ? "-" : $model->tipo->Dominio,
        ),
        array(
            'name'=>'Usuario',
            'value' => ($model->Usuario == "") ? "-" : $model->Usuario,
        ),
        array(
            'name'=>'Dominio',
            'value' => ($model->Dominio == "") ? "-" : $model->dominio->Dominio,
        ),
        array(
            'name'=>'Cuenta_Correo',
            'value' => ($model->Cuenta_Correo == "") ? "-" : $model->Cuenta_Correo,
        ),
        array(
            'name'=>'Password_Correo',
            'value' => ($model->Password_Correo == "") ? "-" : $model->Password_Correo,
        ),
        array(
            'name'=>'Cuenta_Skype',
            'value' => ($model->Cuenta_Skype == "") ? "-" : $model->Cuenta_Skype,
        ),
        array(
            'name'=>'Password_Skype',
            'value' => ($model->Password_Skype == "") ? "-" : $model->Password_Skype,
        ),
        array(
            'name'=>'Usuario_Siesa',
            'value' => ($model->Usuario_Siesa == "") ? "-" : $model->Usuario_Siesa,
        ),
        array(
            'name'=>'Password_Siesa',
            'value' => ($model->Password_Siesa == "") ? "-" : $model->Password_Siesa,
        ),
        array(
            'name'=>'Usuario_Glpi',
            'value' => ($model->Usuario_Glpi == "") ? "-" : $model->Usuario_Glpi,
        ),
        array(
            'name'=>'Password_Glpi',
            'value' => ($model->Password_Glpi == "") ? "-" : $model->Password_Glpi,
        ),
        array(
            'name'=>'Usuario_Papercut',
            'value' => ($model->Usuario_Papercut == "") ? "-" : $model->Usuario_Papercut,
        ),
        array(
            'name'=>'Password_Papercut',
            'value' => ($model->Password_Papercut == "") ? "-" : $model->Password_Papercut,
        ),
        array(
            'name' => 'Cuenta_Correo_Red',
            'value' => ($model->Cuenta_Correo_Red == "") ? "-" : $model->cuentacorreored->Cuenta_Correo,
        ),
        array(
            'name'=>'Estado',
            'value'=>$model->estado->Dominio,
        ),
        array(
            'name' => 'Observaciones',
            'value' => ($model->Observaciones == "") ? "-" : $model->Observaciones,
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
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=cuenta/admin'; ?>';"><i class="fa fa-reply"></i> Volver </button>
</div>


