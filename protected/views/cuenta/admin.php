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

//para combos de clases de cuenta / usuario
$lista_clases = CHtml::listData($clases, 'Id_Dominio', 'Dominio'); 

//para combo de dominios (correo electronico)
$lista_dominios = array();
foreach ($dominios as $d) {
    $m_d = DominioWeb::model()->findByPk($d['Id_Dominio_Web']);
    $lista_dominios[$m_d->Id_Dominio_Web] = $m_d->Dominio.' ('.$m_d->Empresa_Administradora.')';
}

//para combo de tipos
$lista_tipos = CHtml::listData($tipos, 'Id_Dominio', 'Dominio');

//para combos de estados
$lista_estados = CHtml::listData($estados, 'Id_Dominio', 'Dominio');

//para combos de usuarios
$lista_usuarios = CHtml::listData($usuarios, 'Usuario', 'Usuario'); 

?>

<h3>Administración de cuentas / usuarios</h3>

<div id="div_mensaje" style="display: none;"></div>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i>Realizado</h4>
      <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?> 

<?php if(Yii::app()->user->hasFlash('warning')):?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-info"></i>Info</h4>
      <?php echo Yii::app()->user->getFlash('warning'); ?>
    </div>
<?php endif; ?> 

<div class="btn-group" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=cuenta/create'; ?>';"><i class="fa fa-plus"></i> Nuevo registro</button>
    <button type="button" class="btn btn-success search-button"><i class="fa fa-filter"></i> Busqueda avanzada</button>
    <button type="button" class="btn btn-success" id="export-excel"><i class="fa fa-file-excel-o"></i> Exportar a excel</button>
</div>

<div class="search-form" style="display:none;">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
    'lista_clases' => $lista_clases,
    'lista_dominios' => $lista_dominios,
    'lista_tipos' => $lista_tipos,
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
            'name' => 'Clasificacion',
            'value' => '$data->clasificacion->Dominio',
        ),
		array(
            'name' => 'Cuenta_Usuario',
            'value' => '$data->DescCuentaUsuario($data->Id_Cuenta)',
        ),
        array(
            'name' => 'num_cuentas_red',
            'value' => '$data->NumCuentasRed($data->Id_Cuenta)',
        ),
        array(
            'name' => 'num_usuarios_asoc',
            'value' => '$data->NumUsuariosAsoc($data->Id_Cuenta)',
        ),
		array(
            'name' => 'Tipo_Cuenta',
            'value' => '($data->Tipo_Cuenta == "") ? "-" : $data->tipocuenta->Dominio',
        ),
		array(
            'name' => 'Tipo_Acceso',
            'value' => '($data->Tipo_Acceso == "") ? "-" : $data->DescTipoAcceso($data->Tipo_Acceso)',
        ),
		array(
            'name' => 'Estado',
            'value' => '$data->estado->Dominio',
        ),
		/*
		'Password',
		'Id_Usuario_Creacion',
		'Id_Usuario_Actualizacion',
		'Fecha_Creacion',
		'Fecha_Actualizacion',
		*/
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{update}{actred}{desred}{eli}',
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
                    'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->Estado == Yii::app()->params->estado_act || $data->Estado == Yii::app()->params->estado_ina)',
                ),
                'actred'=>array(
                    'label'=>'<i class="fa fa-toggle-on actions text-black"></i>',
                    'imageUrl'=>false,
                    'url'=>'Yii::app()->createUrl("cuenta/actred", array("id"=>$data->Id_Cuenta))',
                    'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->Clasificacion == Yii::app()->params->c_correo && $data->Estado == Yii::app()->params->estado_act)',
                    'options'=>array('title'=>'Redireccionar cuenta'),
                    'click'=>"
                    function() {
                        if(!confirm('Esta seguro de redireccionar esta cuenta ?')) {
                            return false;    
                        }
                    }",

                ),
                'desred'=>array(
                    'label'=>'<i class="fa fa-toggle-off actions text-black"></i>',
                    'imageUrl'=>false,
                    'url'=>'Yii::app()->createUrl("cuenta/desred", array("id"=>$data->Id_Cuenta))',
                    'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->Clasificacion == Yii::app()->params->c_correo && $data->Estado == Yii::app()->params->estado_red)',
                    'options'=>array('title'=>'Quitar redirección'),
                    'click'=>"
                    function() {
                        if(confirm('Esta seguro quitar el redireccionamiento ?')) {

                            $.fn.yiiGridView.update('cuenta-grid', {
                                type:'POST',
                                dataType: 'json',
                                url:$(this).attr('href'),
                                success:function(data) {

                                    var res = data.res; 
                                    var mensaje = data.msg;

                                    if(res == 0){
                                        $('#div_mensaje').addClass('alert alert-warning alert-dismissible');
                                        $('#div_mensaje').html('<button type=\"button\" class=\"close\" aria-hidden=\"true\" onclick=\"limp_div_msg();\">×</button><h4><i class=\"icon fa fa-info\"></i>Info</h4><p>'+mensaje+'</p>');
                                    }

                                    if(res == 1){
                                        $('#div_mensaje').addClass('alert alert-success alert-dismissible');
                                        $('#div_mensaje').html('<button type=\"button\" class=\"close\" aria-hidden=\"true\" onclick=\"limp_div_msg();\">×</button><h4><i class=\"icon fa fa-check\"></i>Realizado</h4><p>'+mensaje+'</p>');
                                    }


                                    $('#div_mensaje').fadeIn('fast');
                                    $.fn.yiiGridView.update('cuenta-grid');
                                }
                            })
                            return false;
                        }else{
                            return false;    
                        }
                    }",
                ),
                'eli'=>array(
                    'label'=>'<i class="fa fa-times actions text-black"></i>',
                    'imageUrl'=>false,
                    'url'=>'Yii::app()->createUrl("cuenta/eli", array("id"=>$data->Id_Cuenta))',
                    'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->NumCuentasRed($data->Id_Cuenta) == 0 && $data->NumUsuariosAsoc($data->Id_Cuenta) == 0 && $data->Estado != Yii::app()->params->estado_red && $data->Estado != Yii::app()->params->estado_eli)',
                    'options'=>array('title'=>'Eliminar'),
                    'click'=>"
                    function() {
                        if(confirm('Esta seguro de eliminar esta cuenta / usuario ?')) {

                            $.fn.yiiGridView.update('cuenta-grid', {
                                type:'POST',
                                dataType: 'json',
                                url:$(this).attr('href'),
                                success:function(data) {

                                    var res = data.res; 
                                    var mensaje = data.msg;

                                    if(res == 0){
                                        $('#div_mensaje').addClass('alert alert-warning alert-dismissible');
                                        $('#div_mensaje').html('<button type=\"button\" class=\"close\" aria-hidden=\"true\" onclick=\"limp_div_msg();\">×</button><h4><i class=\"icon fa fa-info\"></i>Info</h4><p>'+mensaje+'</p>');
                                    }

                                    if(res == 1){
                                        $('#div_mensaje').addClass('alert alert-success alert-dismissible');
                                        $('#div_mensaje').html('<button type=\"button\" class=\"close\" aria-hidden=\"true\" onclick=\"limp_div_msg();\">×</button><h4><i class=\"icon fa fa-check\"></i>Realizado</h4><p>'+mensaje+'</p>');
                                    }


                                    $('#div_mensaje').fadeIn('fast');
                                    $.fn.yiiGridView.update('cuenta-grid');
                                }
                            })
                            return false;
                        }else{
                            return false;    
                        }
                    }",
                ),
            )
		),
	),
)); ?>

<script type="text/javascript">
    
    //función para limpiar el mensaje retornado por el ajax
    function limp_div_msg(){
        $("#div_mensaje").hide();  
        classact = $('#div_mensaje').attr('class');
        $("#div_mensaje").removeClass(classact);
        $("#mensaje").html('');
    }

</script>

