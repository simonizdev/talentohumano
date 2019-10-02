<?php
/* @var $this HerramientaController */
/* @var $model Herramienta */

?>

<h3>Visualizando herramienta</h3>

<div class="table-responsive">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id_Herramienta',
		'Nombre',
		'Descripcion',
		array(
			'name'=>'Imagen',
            'type' => 'raw',
            'value'=>CHtml::image(Yii::app()->baseUrl."/images/herramientas/".$model->Imagen,'',array("class"=>"img-responsive"))
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
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=herramienta/admin'; ?>';"><i class="fa fa-reply"></i> Volver </button>
</div>


