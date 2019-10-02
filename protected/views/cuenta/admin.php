<?php
/* @var $this CuentaController */
/* @var $model Cuenta */

Yii::app()->clientScript->registerScript('search', "
$('#export-excel').on('click',function() {
    $.fn.yiiGridView.export();
});
$.fn.yiiGridView.export = function() {
    $.fn.yiiGridView.update('cuenta-grid',{ 
        success: function() {
            window.location = '". $this->createUrl('exportexcel')  . "';
            $(\".ajax-loader\").fadeIn('fast');
            setTimeout(function(){ $(\".ajax-loader\").fadeOut('fast'); }, 10000);
        },
        data: $('.search-form form').serialize() + '&export=true'
    });
}
$('.search-button').click(function(){
    $('.search-form').toggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $('#cuenta-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");

//para combo de tipos de asociación
$lista_tipos_asoc = CHtml::listData($tipos_asoc, 'Id_Dominio', 'Dominio'); 

//para combo de tipos
$lista_tipos = CHtml::listData($tipos, 'Id_Dominio', 'Dominio'); 

//para combo de dominios de correos
$lista_dominios = CHtml::listData($dominios, 'Id_Dominio_Web', 'Dominio'); 

//para combo de estados de correos
$lista_estados = CHtml::listData($estados, 'Id_Dominio', 'Dominio'); 

//para combos de usuarios
$lista_usuarios = CHtml::listData($usuarios, 'Usuario', 'Usuario'); 


?>

<h3>Administración de cuentas</h3>


<div class="btn-group" style="padding-bottom: 2%">

<?php if(Yii::app()->user->getState("permiso_act") == true){ ?>

   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=cuenta/create'; ?>';"><i class="fa fa-plus"></i> Nuevo registro</button>
    <button type="button" class="btn btn-success search-button"><i class="fa fa-filter"></i> Busqueda avanzada</button>
    <button type="button" class="btn btn-success" id="export-excel"><i class="fa fa-file-excel-o"></i> Exportar a excel</button>
   
<?php }else{ ?>

    <button type="button" class="btn btn-success search-button"><i class="fa fa-filter"></i> Busqueda avanzada</button>

<?php } ?>

</div> 

<div class="search-form" style="display:none;">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
    'lista_tipos_asoc' => $lista_tipos_asoc,
    'lista_tipos' => $lista_tipos,
    'lista_dominios' => $lista_dominios,
    'lista_estados' => $lista_estados,
    'lista_usuarios' => $lista_usuarios,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'cuenta-grid',
    'dataProvider'=>$model->search(),
    //'filter'=>$model,
    'enableSorting' => false,
    'columns'=>array(
        'Id_Cuenta',
        array(
            'name'=>'Id_Empleado',
            'value' => '($data->Id_Empleado == "") ? "-" :  UtilidadesEmpleado::nombreempleado($data->Id_Empleado)',
        ),
        array(
            'name' => 'Cuenta_Correo',
            'value' => '($data->Cuenta_Correo == "") ? "-" : $data->Cuenta_Correo',
        ),
        array(
            'name' => 'Usuario_Siesa',
            'value' => '($data->Usuario_Siesa == "") ? "-" : $data->Usuario_Siesa',
        ),
        array(
            'name' => 'Cuenta_Skype',
            'value' => '($data->Cuenta_Skype == "") ? "-" : $data->Cuenta_Skype',
        ),
        array(
            'name' => 'Usuario_Glpi',
            'value' => '($data->Usuario_Glpi == "") ? "-" : $data->Usuario_Glpi',
        ),
        array(
            'name' => 'Usuario_Papercut',
            'value' => '($data->Usuario_Papercut == "") ? "-" : $data->Usuario_Papercut',
        ),
        /*array(
            'name' => 'Observaciones',
            'type' => 'raw',
            'value' => '($data->Observaciones == "") ? "" : $data->Observaciones',
        ),
        array(
            'name' => 'Id_Empleado',
            'type' => 'raw',
            'value' => '($data->Id_Empleado == "") ? "" : UtilidadesEmpleado::nombreempleado($data->Id_Empleado)',
        ),
        array(
            'name' => 'area',
            'type' => 'raw',
            'value' => '($data->Id_Empleado == "") ? "" : UtilidadesEmpleado::areaactualempleado($data->Id_Empleado)',
        ),
        array(
            'name' => 'cargo',
            'type' => 'raw',
            'value' => '($data->Id_Empleado == "") ? "" : UtilidadesEmpleado::cargoactualempleado($data->Id_Empleado)',
        ),
        array(
            'name' => 'estado_emp',
            'type' => 'raw',
            'value' => '($data->Id_Empleado == "") ? "" : UtilidadesEmpleado::estadoactualempleado($data->Id_Empleado)',
        ),*/
        array(
            'name'=>'Estado',
            'value'=>'$data->estado->Dominio',
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}',
            'buttons'=>array(
                'view'=>array(
                    'label'=>'<i class="fa fa-eye actions text-black"></i>',
                    'imageUrl'=>false,
                    'options'=>array('title'=>'Visualizar'),
                ),
                'update'=>array(
                    'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                    'imageUrl'=>false,
                    'options'=>array('title'=>'Actualizar'),
                    'visible'=> '(Yii::app()->user->getState("permiso_act") == true)',
                ),
            )
        ),
    ),
)); ?>
