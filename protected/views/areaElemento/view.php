<?php
/* @var $this AreaElementoController */
/* @var $model AreaElemento */

?>

<h3>Visualizando área / subárea por elemento</h3>

<div class="table-responsive">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'cssFile' => false,
	'attributes'=>array(
		'Id_A_elemento',
		array(
            'name'=>'elemento',
            'value'=>$model->idelemento->Elemento,
        ),
        array(
            'name'=>'area',
            'value'=>$model->idarea->Area,
        ),
        array(
            'name'=>'subarea',
            'value' => ($model->Id_Subarea == "") ? "NO ASIGNADO" : $model->idsubarea->Subarea,
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
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=areaElemento/admin'; ?>';"><i class="fa fa-reply"></i> Volver </button>
</div>
