<?php
/* @var $this CuentaEmpleadoController */
/* @var $model CuentaEmpleado */

Yii::app()->clientScript->registerScript('search', "
$('#export-excel').on('click',function() {
    $.fn.yiiGridView.export();
});
$.fn.yiiGridView.export = function() {
    $.fn.yiiGridView.update('cuenta-empleado-grid',{ 
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
    $('#cuenta-empleado-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");

//para combos de clases de cuenta / usuario
$lista_clases = CHtml::listData($clases, 'Id_Dominio', 'Dominio'); 

//para combos de usuarios
$lista_usuarios = CHtml::listData($usuarios, 'Usuario', 'Usuario'); 

?>

<h3>Consulta usuario(s) / cuenta(s) x empleado</h3>

<div id="div_mensaje" style="display: none;"></div>

<div class="btn-group" style="padding-bottom: 2%">
    <button type="button" class="btn btn-success search-button"><i class="fa fa-filter"></i> Busqueda avanzada</button>
    <button type="button" class="btn btn-success" id="export-excel"><i class="fa fa-file-excel-o"></i> Exportar a excel</button>
</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'lista_clases' => $lista_clases,
	'lista_usuarios' => $lista_usuarios,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cuenta-empleado-grid',
	'dataProvider'=>$model->searchhist(),
	//'filter'=>$model,
    'enableSorting' => false,
	'columns'=>array(
        array(
            'name'=>'Id_Cuenta',
            'value'=>'$data->DescCuentaUsuario($data->Id_Cuenta)',
        ),
        array(
            'name'=>'Id_Empleado',
            'value'=>'UtilidadesEmpleado::nombreempleado($data->Id_Empleado)',
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
            'name'=>'Id_Usuario_Actualizacion',
            'value'=>'$data->idusuarioact->Usuario',
        ),
        array(
            'name'=>'Fecha_Actualizacion',
            'value'=>'UtilidadesVarias::textofechahora($data->Fecha_Actualizacion)',
        ),
        array(
            'name' => 'Estado',
            'value' => 'UtilidadesVarias::textoestado1($data->Estado)',
        ),
		array(
			'class'=>'CButtonColumn',
	        'template'=>'{viewcuenta}{upd}',
	        'buttons'=>array(
                'viewcuenta' => array(
                    'label'=>'<i class="fa fa-eye actions text-black"></i>',
                    'imageUrl'=>false,                    
                    'url'=>'Yii::app()->createUrl("Cuenta/view", array("id"=>$data->Id_Cuenta))',
                    'options'=>array('title'=>' Ver detalle de cuenta en nueva pestaña', 'target' => '_new'),
                ),
                'upd' => array(
                    'label'=>'<i class="fa fa-user-times actions text-black"></i>',
                    'imageUrl'=>false,                    
                    'url'=>'Yii::app()->createUrl("CuentaEmpleado/inact", array("id"=>$data->Id_Cuenta_Emp, "opc"=>1))',
                    'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->Estado == 1)',
                    'options'=>array('title'=>' Desvincular empleado'),
                    'click'=>"
                    function() {
                        if(confirm('Esta seguro de desvincular el empleado de esta cuenta ?')) {

                            $.fn.yiiGridView.update('cuenta-empleado-grid', {
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
                                    $.fn.yiiGridView.update('cuenta-empleado-grid');
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
