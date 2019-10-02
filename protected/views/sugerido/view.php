<?php
/* @var $this SugeridoController */
/* @var $model Sugerido */

?>

<h3>Visualizando sugerido</h3>

<div class="table-responsive">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id_Sugerido',
        array(
            'name'=>'Id_Cargo',
            'value'=>$model->idcargo->Cargo,
        ),
        array(
            'name'=>'Id_Subarea',
            'value'=>$model->idsubarea->Subarea,
        ),
        array(
            'name'=>'Id_Area',
            'value'=>$model->idarea->Area,
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
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=sugerido/admin'; ?>';"><i class="fa fa-reply"></i> Volver </button>
</div>
