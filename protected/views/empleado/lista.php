<?php
/* @var $this EmpleadoController */
/* @var $model Empleado */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#empleado-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

//para combos de usuarios
$lista_usuarios = CHtml::listData($usuarios, 'Usuario', 'Usuario');

//para combos de tipos de identificación
$lista_tipos_ident = CHtml::listData($tipos_ident, 'Id_Dominio', 'Dominio'); 

//para combos de empresas
$lista_empresas = CHtml::listData($empresas, 'Id_Empresa', 'Descripcion'); 

?>

<h3>Lista de empleados</h3>

<button type="button" class="btn btn-success search-button"><i class="fa fa-filter"></i> Busqueda avanzada</button>
<div class="search-form" style="display:none;padding-top: 2%;">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'lista_usuarios' => $lista_usuarios,
	'lista_tipos_ident' => $lista_tipos_ident,
	'lista_empresas' => $lista_empresas,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'empleado-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
    'enableSorting' => false,
	'columns'=>array(
		'Id_Empleado',
        array(
            'name'=>'Id_Tipo_Ident',
            'value'=>'$data->idtipoident->Dominio',
        ),
        'Identificacion',
        'Apellido',
        'Nombre',
        array(
            'name'=>'Id_Empresa',
            'value'=>'$data->idempresa->Descripcion',
        ),
        array(
            'name' => 'Telefono',
            'value' => '($data->Telefono == "") ? "No asignado" : $data->Telefono',
        ),
        array(
            'name' => 'Correo',
            'value' => '($data->Correo == "") ? "No asignado" : $data->Correo',
        ),
        array(
            'name' => 'Estado',
            'value' => 'UtilidadesVarias::textoestado1($data->Estado)',
        ),  	
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}',
            'buttons'=>array(
                'view'=>array(
                    'label'=>'<i class="fa fa-address-card actions text-black"></i>',
                    'imageUrl'=>false,
                    'options'=>array('title'=>'Ver detalle médico'),
                    'url'=>'Yii::app()->createUrl("empleado/viewmed", array("id"=>$data->Id_Empleado))',
                ),
            )
		),
	),
)); ?>
