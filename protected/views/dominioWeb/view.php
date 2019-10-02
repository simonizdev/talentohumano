<?php
/* @var $this DominioWebController */
/* @var $model DominioWeb */

?>

<h3>Visualizando dominio web</h3>

<div class="table-responsive">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id_Dominio_Web',
        array(
            'name'=>'Id_Tipo',
            'value' => ($model->Id_Tipo == "") ? "NO ASIGNADO" : $model->idtipo->Dominio,
        ),
	    'Dominio',
        'Link',
		'Usuario',
		'Password',
		'Empresa_Administradora',
		'Contacto_Emp_Adm',
		'Contratado_Por',
		'Uso',
		array(
            'name'=>'Fecha_Activacion',
            'value'=>UtilidadesVarias::textofecha($model->Fecha_Activacion),
        ),
		array(
            'name'=>'Fecha_Vencimiento',
            'value'=>UtilidadesVarias::textofecha($model->Fecha_Vencimiento),
        ),
		array(
            'name' => 'Observaciones',
            'value' => ($model->Observaciones == "") ? "NO ASIGNADO" : $model->Observaciones,
        ),
		array(
            'name' => 'Estado',
            'value' => UtilidadesVarias::textoestado1($model->Estado),
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
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=dominioWeb/admin'; ?>';"><i class="fa fa-reply"></i> Volver </button>
</div>
