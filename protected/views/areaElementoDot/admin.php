<?php
/* @var $this AreaElementoDotController */
/* @var $model AreaElementoDot */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle('fast');
	return false;
});
$('.search-form form').submit(function(){
	$('#area-elemento-dot-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Elementos asociados a dotación</h3>

<p>Registre los elementos por área que quiere relacionar con el reporte tallaje de empleados.</p>

<div class="btn-group" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=areaElementoDot/create'; ?>';"><i class="fa fa-plus"></i> Nuevo registro</button>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'area-elemento-dot-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
    'enableSorting' => false,
	'columns'=>array(
		array(
            'name'=>'Id_A_Elemento',
            'value'=>'$data->Desc_Elemento_Subarea_Area($data->Id_A_Elemento)',
        ),
		array(
            'name'=>'Id_Usuario_Creacion',
            'value'=>'$data->idusuariocre->Usuario',
        ),
        array(
            'name'=>'Fecha_Creacion',
            'value'=>'UtilidadesVarias::textofechahora($data->Fecha_Creacion)',
        ),
		array(
            'class'=>'CButtonColumn',
            'template'=>'{delete}',
            'buttons'=>array(
                'delete'=>array(
                    'label'=>'<i class="fa fa-trash actions text-black"></i>',
                    'imageUrl'=>false,
                    'options'=>array('title'=>'Eliminar'),
                    'visible'=> '(Yii::app()->user->getState("permiso_act") == true)',
                ),
            )
        ),
	),
)); ?>
