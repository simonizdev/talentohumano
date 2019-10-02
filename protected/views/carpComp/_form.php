<?php
/* @var $this CarpCompController */
/* @var $model CarpComp */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'carp-comp-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


<div id="div_mensaje" style="display: none;"></div>

<div class="row">
	<div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Tipo_Acceso', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Tipo_Acceso'); ?>
            <?php
              $this->widget('ext.select2.ESelect2',array(
                  'name'=>'CarpComp[Tipo_Acceso]',
                  'id'=>'CarpComp_Tipo_Acceso',
                  'data'=> array(1 => 'GENÉRICO', 2 => 'PERSONAL'),
                  'htmlOptions'=>array(
                  ),
                  'options'=>array(
                      'placeholder'=>'Seleccione...',
                      'width'=> '100%',
                      'allowClear'=>true,
                  ),
              ));
            ?>
            <?php echo $form->hiddenField($model,'cad_emps'); ?>
            <?php echo $form->hiddenField($model,'cad_usuarios'); ?>
            <?php echo $form->hiddenField($model,'cad_passwords'); ?>
            <?php echo $form->hiddenField($model,'cad_permisos'); ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Servidor', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Servidor'); ?>
            <?php echo $form->textField($model,'Servidor', array('class' => 'form-control', 'maxlength' => '200', 'autocomplete' => 'off')); ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Carpeta', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Carpeta'); ?>
            <?php echo $form->textField($model,'Carpeta', array('class' => 'form-control', 'maxlength' => '200', 'autocomplete' => 'off')); ?>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Ruta', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Ruta'); ?>
            <?php echo $form->textField($model,'Ruta', array('class' => 'form-control', 'maxlength' => '200', 'autocomplete' => 'off')); ?>
        </div>
    </div>
    <div class="col-sm-4" id="div_usuario_gen" style="display: none;">
        <div class="form-group">
            <?php echo $form->error($model,'usuario_gen', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'usuario_gen'); ?>
            <?php echo $form->textField($model,'usuario_gen', array('class' => 'form-control', 'maxlength' => '30', 'autocomplete' => 'off')); ?>
        </div>
    </div>
    <div class="col-sm-4" id="div_password_gen" style="display: none;">
        <div class="form-group">
            <?php echo $form->error($model,'password_gen', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'password_gen'); ?>
            <?php echo $form->textField($model,'password_gen', array('class' => 'form-control', 'maxlength' => '200', 'autocomplete' => 'off')); ?>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-sm-8" id="div_empleado_gen" style="display: none;">
        <div class="form-group">
            <?php echo $form->error($model,'id_empleado_gen', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'id_empleado_gen'); ?>
            <?php echo $form->textField($model,'id_empleado_gen'); ?>
            <?php
                $this->widget('ext.select2.ESelect2', array(
                    'selector' => '#CarpComp_id_empleado_gen',
                    'options'  => array(
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'width' => '100%',
                        'language' => 'es',
                        'ajax' => array(
                            'url' => Yii::app()->createUrl('empleado/SearchEmpleado'),
                            'dataType'=>'json',
                            'data'=>'js:function(term){return{q: term};}',
                            'results'=>'js:function(data){ return {results:data};}'                   
                        ),
                        'formatNoMatches'=> 'js:function(){ clear_select2_ajax("CarpComp_id_empleado_gen"); return "No se encontraron resultados"; }',
                        'formatInputTooShort' =>  'js:function(){ return "Digite más de 3 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'CarpComp_id_empleado_gen\')\">Limpiar campo</button>"; }',
                    ),
                ));
            ?>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-sm-8" id="div_empleado_per" style="display: none;">
        <div class="form-group">
            <?php echo $form->error($model,'id_empleado_per', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'id_empleado_per'); ?>
            <?php echo $form->textField($model,'id_empleado_per'); ?>
            <?php
                $this->widget('ext.select2.ESelect2', array(
                    'selector' => '#CarpComp_id_empleado_per',
                    'options'  => array(
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'width' => '100%',
                        'language' => 'es',
                        'ajax' => array(
                            'url' => Yii::app()->createUrl('empleado/SearchEmpleado'),
                            'dataType'=>'json',
                            'data'=>'js:function(term){return{q: term};}',
                            'results'=>'js:function(data){ return {results:data};}'                   
                        ),
                        'formatNoMatches'=> 'js:function(){ clear_select2_ajax("CarpComp_id_empleado_per"); return "No se encontraron resultados"; }',
                        'formatInputTooShort' =>  'js:function(){ return "Digite más de 3 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'CarpComp_id_empleado_per\')\">Limpiar campo</button>"; }',
                    ),
                ));
            ?>
        </div>
    </div>
    <div class="col-sm-4" id="div_usuario_per" style="display: none;">
        <div class="form-group">
            <?php echo $form->error($model,'usuario_per', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'usuario_per'); ?>
            <?php echo $form->textField($model,'usuario_per', array('class' => 'form-control', 'maxlength' => '30', 'autocomplete' => 'off')); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4" id="div_password_per" style="display: none;">
        <div class="form-group">
            <?php echo $form->error($model,'password_per', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'password_per'); ?>
            <?php echo $form->textField($model,'password_per', array('class' => 'form-control', 'maxlength' => '200', 'autocomplete' => 'off')); ?>
        </div>
    </div>
    <div class="col-sm-4" id="div_permiso_per" style="display: none;">
        <div class="form-group">
        	<?php echo $form->error($model,'permiso_per', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'permiso_per'); ?>
            <?php
              $this->widget('ext.select2.ESelect2',array(
                  'name'=>'CarpComp[permiso_per]',
                  'id'=>'CarpComp_permiso_per',
                  'data'=> array(1 => 'LECTURA', 2 => 'LECTURA / ESCRITURA'),
                  'htmlOptions'=>array(
                  ),
                  'options'=>array(
                      'placeholder'=>'Seleccione...',
                      'width'=> '100%',
                      'allowClear'=>true,
                  ),
              ));
            ?>
        </div>
    </div>
</div>
    
<div class="btn-group" style="padding-bottom: 2%">
    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=carpComp/admin'; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="button" class="btn btn-success" id="add" onclick="add_user();"><i class="fa fa-plus"></i> Agregar</button>
</div>


<div id="contenido">
    
</div>


<div class="btn-group" id="btn_save" style="display: none;padding-bottom: 2%">
    <button type="submit" class="btn btn-success" onclick="return valida_opciones(event);"><i class="fa fa-floppy-o"></i> Guardar</button>
</div>

<?php $this->endWidget(); ?>

<script>

$(function() {

  	$("#CarpComp_Tipo_Acceso").change(function() {

      var val = $(this).val();

      if(val == ""){

      	$('#div_usuario_gen').hide();
		$('#div_password_gen').hide();
		$('#div_empleado_gen').hide();
		$('#div_usuario_per').hide();
		$('#div_password_per').hide();
		$('#div_empleado_per').hide();
		$('#divpermiso_per').hide();

		$('#contenido').html('');
        $('#btn_save').hide(); 

        $('#CarpComp_id_empleado_gen').val('').trigger('change');
        $('#s2id_CarpComp_id_empleado_gen span').html("");
        $('#CarpComp_usuario_gen').val('');
        $('#CarpComp_password_gen').val('');

        $('#CarpComp_id_empleado_per').val('').trigger('change');
        $('#s2id_CarpComp_id_empleado_per span').html("");
        $('#CarpComp_usuario_per').val('');
        $('#CarpComp_password_per').val('');


      }else{
        
        if(val == 1){
          	//GENERICO
         	$('#div_usuario_gen').show();
			$('#div_password_gen').show();
			$('#div_empleado_gen').show();
			$('#div_usuario_per').hide();
			$('#div_password_per').hide();
			$('#div_empleado_per').hide();
			$('#div_permiso_per').hide();
        }

        if(val == 2){
          	//PERSONAL
         	$('#div_usuario_gen').hide();
			$('#div_password_gen').hide();
			$('#div_empleado_gen').hide();
			$('#div_usuario_per').show();
			$('#div_password_per').show();
			$('#div_empleado_per').show();
			$('#div_permiso_per').show();
        }

        $('#contenido').html('');
        $('#btn_save').hide(); 

        $('#CarpComp_id_empleado_gen').val('').trigger('change');
        $('#s2id_CarpComp_id_empleado_gen span').html("");
        $('#CarpComp_usuario_gen').val('');
        $('#CarpComp_password_gen').val('');

        $('#CarpComp_id_empleado_per').val('').trigger('change');
        $('#s2id_CarpComp_id_empleado_per span').html("");
        $('#CarpComp_usuario_per').val('');
        $('#CarpComp_password_per').val('');
        $('#CarpComp_permiso_per').val('').trigger('change');

      }    
  	});

});

function clear_select2_ajax(id){
	$('#'+id+'').val('').trigger('change');
	$('#s2id_'+id+' span').html("");
}

function add_user(){

    limp_div_msg();

   	var tipo_acesso = $('#CarpComp_Tipo_Acceso').val();
    var servidor = $('#CarpComp_Servidor').val();
    var carpeta = $('#CarpComp_Carpeta').val();
    var ruta = $('#CarpComp_Ruta').val();

    var id_empleado_gen = $('#CarpComp_id_empleado_gen').val();
    var empleado_gen = $('#s2id_CarpComp_id_empleado_gen span').html();
    var usuario_gen = $('#CarpComp_usuario_gen').val();
    var password_gen = $('#CarpComp_password_gen').val();

    var id_empleado_per = $('#CarpComp_id_empleado_per').val();
    var empleado_per = $('#s2id_CarpComp_id_empleado_per span').html();
    var usuario_per = $('#CarpComp_usuario_per').val();
    var password_per = $('#CarpComp_password_per').val();
    var permiso_per = $('#CarpComp_permiso_per').val();
    var desc_permiso_per = $('#s2id_CarpComp_permiso_per span').html();

    if(tipo_acesso != ""){

    	if(tipo_acesso == 1){

    		//GENERICO

    		$('#div_usuario_gen').show();
			$('#div_password_gen').show();
			$('#div_empleado_gen').show();
			$('#div_usuario_per').hide();
			$('#div_password_per').hide();
			$('#div_empleado_per').hide();
			$('#div_permiso_per').hide();


    		if(servidor != "" && carpeta != "" && ruta != "" && id_empleado_gen != "" && usuario_gen != "" && password_gen != ""){

    			var div_contenido = $('#contenido');

		        var tr = $("#tr_"+id_empleado_gen).length;

		        if(!tr){

		            var cant = $(".tr_emps").length;

		            if(cant == 0){
		                div_contenido.append('<table class="table" id="table_empleado" style="font-size:11px !important;"><thead><tr><th>Empleado</th></tr></thead><tbody></tbody></table>');
		            }

		            if(cant >= 0 && cant < 14){
		                $('#add').show();
		                $('#reg').show();
		            }

		            if(cant == 14){
		                $('#add').hide();
		                $('#reg').hide();
		            }

		            var tabla = $('#table_empleado');

		            $('#btn_save').show();  

		            tabla.append('<tr class="tr_emps" id="tr_'+id_empleado_gen+'"><td><input type="hidden" class="emps" value="'+id_empleado_gen+'">'+empleado_gen+'</td><td><button type="button" class="btn btn-danger btn-xs delete"><i class="fa fa-trash" aria-hidden="true"></i> </button></td></tr>');

	            	$('#CarpComp_id_empleado_gen').val('');
    				$('#s2id_CarpComp_id_empleado_gen span').html('');

		        }else{
		            $("#div_mensaje").addClass("alert alert-warning alert-dismissible");
		            $("#div_mensaje").html('<button type="button" class="close" aria-hidden="true" onclick="limp_div_msg();">×</button><h4><i class="icon fa fa-info-circle"></i>Cuidado</h4><p>Este empleado ya esta registrado.</p>');
		            $("#div_mensaje").fadeIn('fast');
		        }

    		}else{

    			if(servidor == ""){
		            $('#CarpComp_Servidor_em_').html('Servidor no puede ser nulo.');
		            $('#CarpComp_Servidor_em_').show(); 
		        }

		        if(carpeta == ""){
		            $('#CarpComp_Carpeta_em_').html('Carpeta no puede ser nulo.');
		            $('#CarpComp_Carpeta_em_').show();    
		        }

		        if(ruta == ""){
		            $('#CarpComp_Ruta_em_').html('Ruta no puede ser nulo.');
		            $('#CarpComp_Ruta_em_').show();    
		        }

    			if(id_empleado_gen == ""){
		            $('#CarpComp_id_empleado_gen_em_').html('Empleado no puede ser nulo.');
		            $('#CarpComp_id_empleado_gen_em_').show(); 
		        }
		        
		        if(usuario_gen == ""){
		            $('#CarpComp_usuario_gen_em_').html('Usuario no puede ser nulo.');
		            $('#CarpComp_usuario_gen_em_').show(); 
		        }

		        if(password_gen == ""){
		            $('#CarpComp_password_gen_em_').html('Password no puede ser nulo.');
		            $('#CarpComp_password_gen_em_').show();    
		        }
    		}


	    }else{

	    	//PERSONAL

	    	$('#div_usuario_gen').hide();
			$('#div_password_gen').hide();
			$('#div_empleado_gen').hide();
			$('#div_usuario_per').show();
			$('#div_password_per').show();
			$('#div_empleado_per').show();
			$('#div_permiso_per').show();


	    	if(servidor != "" && carpeta != "" && ruta != "" && id_empleado_per != "" && usuario_per != "" && password_per != "" && permiso_per != ""){

	    		var div_contenido = $('#contenido');

		        var tr = $("#tr_"+id_empleado_per).length;

		        if(!tr){

		            var cant = $(".tr_emps").length;

		            if(cant == 0){
		                div_contenido.append('<table class="table" id="table_empleado" style="font-size:11px !important;"><thead><tr><th>Empleado</th><th>Usuario</th><th>Password</th><th>Permisos</th></tr></thead><tbody></tbody></table>');
		            }

		            if(cant >= 0 && cant < 14){
		                $('#add').show();
		                $('#reg').show();
		            }

		            if(cant == 14){
		                $('#add').hide();
		                $('#reg').hide();
		            }

		            var tabla = $('#table_empleado');

		            $('#btn_save').show();  

		            tabla.append('<tr class="tr_emps" id="tr_'+id_empleado_per+'"><td><input type="hidden" class="emps" value="'+id_empleado_per+'">'+empleado_per+'</td><td><p id="usuario_'+id_empleado_per+'">'+usuario_per+'</p></td><td><p id="password_'+id_empleado_per+'">'+password_per+'</p><td><input type="hidden" id="permiso_'+id_empleado_per+'" value="'+permiso_per+'">'+desc_permiso_per+'</td></td><td><button type="button" class="btn btn-danger btn-xs delete"><i class="fa fa-trash" aria-hidden="true"></i> </button></td></tr>');

	            	$('#CarpComp_id_empleado_per').val('');
    				$('#s2id_CarpComp_id_empleado_per span').html('');

    				$('#CarpComp_usuario_per').val('');
    				$('#CarpComp_password_per').val('');

    				$('#CarpComp_permiso_per').val('').trigger('change');

		        }else{
		            $("#div_mensaje").addClass("alert alert-warning alert-dismissible");
		            $("#div_mensaje").html('<button type="button" class="close" aria-hidden="true" onclick="limp_div_msg();">×</button><h4><i class="icon fa fa-info-circle"></i>Cuidado</h4><p>Este empleado ya esta registrado.</p>');
		            $("#div_mensaje").fadeIn('fast');
		        }

    		}else{

    			if(servidor == ""){
		            $('#CarpComp_Servidor_em_').html('Servidor no puede ser nulo.');
		            $('#CarpComp_Servidor_em_').show(); 
		        }

		        if(carpeta == ""){
		            $('#CarpComp_Carpeta_em_').html('Carpeta no puede ser nulo.');
		            $('#CarpComp_Carpeta_em_').show();    
		        }

		        if(ruta == ""){
		            $('#CarpComp_Ruta_em_').html('Ruta no puede ser nulo.');
		            $('#CarpComp_Ruta_em_').show();    
		        }

    			if(id_empleado_per == ""){
		            $('#CarpComp_id_empleado_per_em_').html('Empleado no puede ser nulo.');
		            $('#CarpComp_id_empleado_per_em_').show(); 
		        }

		        if(usuario_per == ""){
		            $('#CarpComp_usuario_per_em_').html('Usuario no puede ser nulo.');
		            $('#CarpComp_usuario_per_em_').show(); 
		        }

		        if(password_per == ""){
		            $('#CarpComp_password_per_em_').html('Password no puede ser nulo.');
		            $('#CarpComp_password_per_em_').show();    
		        }

		        if(permiso_per == ""){
		            $('#CarpComp_permiso_per_em_').html('Permisos no puede ser nulo.');
		            $('#CarpComp_permiso_per_em_').show();    
		        }
    		}

	    }

    }else{

    	if(tipo_acesso == ""){
            $('#CarpComp_Tipo_Acceso_em_').html('Tipo de acceso no puede ser nulo.');
            $('#CarpComp_Tipo_Acceso_em_').show(); 
        }
        if(servidor == ""){
            $('#CarpComp_Servidor_em_').html('Servidor no puede ser nulo.');
            $('#CarpComp_Servidor_em_').show(); 
        }

        if(carpeta == ""){
            $('#CarpComp_Carpeta_em_').html('Carpeta no puede ser nulo.');
            $('#CarpComp_Carpeta_em_').show();    
        }

        if(ruta == ""){
            $('#CarpComp_Ruta_em_').html('Ruta no puede ser nulo.');
            $('#CarpComp_Ruta_em_').show();    
        }
    }	
}

$("body").on("click", ".delete", function (e) {
    
    $(this).parent().parent("tr").remove();
    var cant = $(".tr_emps").length;
    
    if(cant == 0){
        $('#contenido').html('');
        $('#btn_save').hide();  
    }else{
        $('#btn_save').show();  
    }

    if(cant >= 0 && cant <= 2){
        $('#add').show();
        $('#reg').show();
    }

});

function valida_opciones(){

	var tipo_acesso = $('#CarpComp_Tipo_Acceso').val();
    var servidor = $('#CarpComp_Servidor').val();
    var carpeta = $('#CarpComp_Carpeta').val();
    var ruta = $('#CarpComp_Ruta').val();

    if(servidor != "" && carpeta != "" && ruta != ""){

        $('#btn_save').hide();
        $(".ajax-loader").fadeIn('fast');

        if(tipo_acesso == 1){
    		//GENERICO

    		var emp_selected = '';

    		$("input.emps[type=hidden]").each(function() {

	            id_emp = $(this).val();

	            emp_selected += id_emp+',';    

	        });

	        var cadena_emp = emp_selected.slice(0,-1);
		        
	        $('#CarpComp_cad_emps').val(cadena_emp);

	        return true;

        }else{
        	//PERSONAL

        	var emp_selected = '';
        	var usuario_selected = ''; 
        	var password_selected = '';
        	var permiso_selected = '';

        	$("input.emps[type=hidden]").each(function() {

	            id_emp = $(this).val();
	            usuario = $('#usuario_'+id_emp).text();
	            password = $('#password_'+id_emp).text();
	            permiso = $('#permiso_'+id_emp).val();

	            emp_selected += id_emp+',';
	            usuario_selected += usuario+',';  
	            password_selected += password+',';
	            permiso_selected += permiso+','; 

	        });

	        var cadena_emp = emp_selected.slice(0,-1);
            var cadena_usuario = usuario_selected.slice(0,-1);
            var cadena_password = password_selected.slice(0,-1);
            var cadena_permiso = permiso_selected.slice(0,-1);
	        
	        $('#CarpComp_cad_emps').val(cadena_emp);
	        $('#CarpComp_cad_usuarios').val(cadena_usuario);
	        $('#CarpComp_cad_passwords').val(cadena_password);
	        $('#CarpComp_cad_permisos').val(cadena_permiso);

	        return true;

        }
        
    } else {

        if(servidor == ""){
            $('#CarpComp_Servidor_em_').html('Servidor no puede ser nulo.');
            $('#CarpComp_Servidor_em_').show(); 
        }

        if(carpeta == ""){
            $('#CarpComp_Carpeta_em_').html('Carpeta no puede ser nulo.');
            $('#CarpComp_Carpeta_em_').show();    
        }

        if(ruta == ""){
            $('#CarpComp_Ruta_em_').html('Ruta no puede ser nulo.');
            $('#CarpComp_Ruta_em_').show();    
        }
        
        return false;   
    }  
}

function limp_div_msg(){
    $("#div_mensaje").hide();  
    classact = $('#div_mensaje').attr('class');
    $("#div_mensaje").removeClass(classact);
    $("#mensaje").html('');
}

</script>