<?php
/* @var $this CPresupuestoController */
/* @var $model CPresupuesto */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cpresupuesto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administración de presupuesto x vendedor</h3>

<div class="btn-group">
    <button type="button" class="btn btn-success search-button"><i class="fa fa-filter"></i> Busqueda avanzada</button>
</div>
<div class="btn-group">
    <button type="button" class="btn btn-success"><i class="fa fa-cloud-download"></i> Archivos para importaciones</button>
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
        <span class="sr-only">Archivos para importaciones</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/images/plantillas/plantilla_pres_x_vend.xlsx'; ?>">Plantilla asignación masiva</a></li>    
    </ul>
</div>
<div class="btn-group">
    <button type="button" class="btn btn-success"><i class="fa fa-cloud-upload"></i> Carga de archivos</button>
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
        <span class="sr-only">Opciones de descarga / exp.</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><a role="menuitem" tabi
            ndex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=cPresupuesto/imp'; ?>">Asignación masiva</a></li>    
    </ul>
</div>

<div class="search-form" style="display:none;padding-top: 2%;">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cpresupuesto-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'enableSorting' => false,
	'columns'=>array(
		'ID_PRESUPUESTO_VEND',
		'NIT_VENDEDOR',
		array(
            'name'=>'PRESUPUESTO',
            'value' => 'number_format($data->PRESUPUESTO, 2)',
            'htmlOptions'=>array('style' => 'text-align: right;')
        ),
		array(
            'name' => 'ESTADO',
            'value' => 'UtilidadesVarias::textoestado1($data->ESTADO)',
        ),
	),
)); 

?>
