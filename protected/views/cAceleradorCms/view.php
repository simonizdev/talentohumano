<?php
/* @var $this CAceleradorCmsController */
/* @var $model CAceleradorCms */

?>

<h3>Visualizando configuración</h3>

<div class="table-responsive">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ROWID',
		array(
            'name'=>'TIPO',
            'value' => ($model->TIPO == "") ? "NO ASIGNADO" : $model->tipo->Dominio,
        ),
        array(
            'name'=>'ID_ACELERADOR',
            'value' => ($model->ID_ACELERADOR == "") ? "NO ASIGNADO" : $model->acelerador->Dominio,
        ),
		array(
            'name'=>'ITEM',
            'value' => ($model->ITEM == "") ? "NO ASIGNADO" : $model->Desc_Item($model->ITEM),
        ),
        array(
            'name'=>'ID_PLAN',
            'value' => ($model->ID_PLAN == "") ? "NO ASIGNADO" : $model->Desc_Plan($model->ID_PLAN),
        ),
        array(
            'name'=>'CRITERIO',
            'value' => ($model->CRITERIO == "") ? "NO ASIGNADO" : $model->Desc_Criterio($model->CRITERIO),
        ),
        array(
            'name' => 'PORCENTAJE',
            'value' => number_format($model->PORCENTAJE, 2),
        ),
        array(
            'name'=>'FECHA_INICIAL',
            'value'=>UtilidadesVarias::textofecha($model->FECHA_INICIAL),
        ),
        array(
            'name'=>'FECHA_FINAL',
            'value'=>UtilidadesVarias::textofecha($model->FECHA_FINAL),
        ),
		array(
            'name'=>'ID_USUARIO_CREACION',
            'value'=>$model->idusuariocre->Usuario,
        ),
        array(
            'name'=>'FECHA_CREACION',
            'value'=>UtilidadesVarias::textofechahora($model->FECHA_CREACION),
        ),
        array(
            'name'=>'ID_USUARIO_ACTUALIZACION',
            'value'=>$model->idusuarioact->Usuario,
        ),
        array(
            'name'=>'FECHA_ACTUALIZACION',
            'value'=>UtilidadesVarias::textofechahora($model->FECHA_ACTUALIZACION),
        ),
        array(
            'name' => 'ESTADO',
            'value' => UtilidadesVarias::textoestado1($model->ESTADO),
        ),
	),
)); ?>

</div>

<div class="btn-group" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=cAceleradorCms/admin'; ?>';"><i class="fa fa-reply"></i> Volver </button>
</div>