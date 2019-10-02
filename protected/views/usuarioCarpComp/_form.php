<?php
/* @var $this UsuarioCarpCompController */
/* @var $model UsuarioCarpComp */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-carp-comp-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

<div class="row">
    <div class="col-sm-8">
    	<div class="form-group">
          	<?php echo $form->error($model,'Id_Empleado', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Empleado'); ?>
            <?php echo $form->textField($model,'Id_Empleado'); ?>
            <?php
                $this->widget('ext.select2.ESelect2', array(
                    'selector' => '#UsuarioCarpComp_Id_Empleado',
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
                        'formatNoMatches'=> 'js:function(){ clear_select2_ajax("UsuarioCarpComp_Id_Empleado"); return "No se encontraron resultados"; }',
                        'formatInputTooShort' =>  'js:function(){ return "Digite más de 3 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'UsuarioCarpComp_Id_Empleado\')\">Limpiar campo</button>"; }',
                    ),
                ));
            ?>
        </div>
    </div>
    <?php if($model_carp->Tipo_Acceso == 2){ ?>
	    <div class="col-sm-4">
	    	<div class="form-group">
	    		<?php echo $form->error($model,'Usuario', array('class' => 'pull-right badge bg-red')); ?>
	          	<?php echo $form->label($model,'Usuario'); ?>
			    <?php echo $form->textField($model,'Usuario', array('class' => 'form-control', 'maxlength' => '30', 'autocomplete' => 'off')); ?>
	        </div>
	    </div>
    <?php } ?>
</div>
<div class="row">
	<?php if($model_carp->Tipo_Acceso == 2){ ?>
		<div class="col-sm-4">
	    	<div class="form-group">
	    		<?php echo $form->error($model,'Password', array('class' => 'pull-right badge bg-red')); ?>
	          	<?php echo $form->label($model,'Password'); ?>
			    <?php echo $form->textField($model,'Password', array('class' => 'form-control', 'maxlength' => '200', 'autocomplete' => 'off')); ?>
	        </div>
	    </div>
	    <div class="col-sm-4">
	        <div class="form-group">
	            <?php echo $form->error($model,'Permiso', array('class' => 'pull-right badge bg-red')); ?>
	            <?php echo $form->label($model,'Permiso'); ?>
	            <?php
	              $this->widget('ext.select2.ESelect2',array(
	                  'name'=>'UsuarioCarpComp[Permiso]',
	                  'id'=>'UsuarioCarpComp_Permiso',
	                  'data'=> array(1 => 'LECTURA', 2 => 'LECTURA / ESCRITURA'),
	                  'value'=>$model->Permiso,
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
	<?php } ?>
</div>

<div class="btn-group" style="padding-bottom: 2%">
    <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=carpComp/update&id='.$model_carp->Id_Carpeta_Comp; ?>';"><i class="fa fa-reply"></i> Volver </button>
    <button type="button" class="btn btn-success" onclick="valida_form();"><i class="fa fa-floppy-o"></i> Crear</button>
</div>

<?php $this->endWidget(); ?>

<script>

function valida_form(){

	var form = $("#usuario-carp-comp-form");

	var id_empleado = $('#UsuarioCarpComp_Id_Empleado').val();
	var usuario = $('#UsuarioCarpComp_Usuario').val();
	var password = $('#UsuarioCarpComp_Password').val();
	var permiso = $('#UsuarioCarpComp_Permiso').val();
		
		var tipo = <?php echo $model_carp->Tipo_Acceso; ?>;
		var id_carp = <?php echo $model_carp->Id_Carpeta_Comp; ?>;

	if(tipo == 1){
		//GENERICO
		if(id_empleado != ""){

			var data = {id_empleado: id_empleado, id_carp: id_carp}
			$.ajax({ 
				type: "POST", 
				url: "<?php echo Yii::app()->createUrl('UsuarioCarpComp/verificarduplicidad'); ?>",
				data: data,
				success: function(response){

				    if(response == 0){
				        $('#UsuarioCarpComp_Id_Empleado_em_').html('El empleado ya esta asociado a la carpeta.');
				        $('#UsuarioCarpComp_Id_Empleado_em_').show();
				    }

				    if(response == 1){
						$(".ajax-loader").fadeIn('fast');
				       	form.submit();
				    }
				}
			});

		}else{
	        if(id_empleado == ""){
	            $('#UsuarioCarpComp_Id_Empleado_em_').html('Empleado no puede ser nulo.');
	            $('#UsuarioCarpComp_Id_Empleado_em_').show(); 
	        }
		}
	}

	if(tipo == 2){
		//PERSONAL
		if(id_empleado != "" && usuario != "" && password != "" && permiso != ""){
			
			var data = {id_empleado: id_empleado, id_carp: id_carp}
			$.ajax({ 
				type: "POST", 
				url: "<?php echo Yii::app()->createUrl('UsuarioCarpComp/verificarduplicidad'); ?>",
				data: data,
				success: function(response){

				    if(response == 0){
				        $('#UsuarioCarpComp_Id_Empleado_em_').html('El empleado ya esta asociado a la carpeta.');
				        $('#UsuarioCarpComp_Id_Empleado_em_').show();
				    }

				    if(response == 1){
						$(".ajax-loader").fadeIn('fast');
				       	form.submit();
				    }
				}
			});

		}else{
	        if(id_empleado == ""){
	            $('#UsuarioCarpComp_Id_Empleado_em_').html('Empleado no puede ser nulo.');
	            $('#UsuarioCarpComp_Id_Empleado_em_').show(); 
	        }

	        if(usuario == ""){
	            $('#UsuarioCarpComp_Usuario_em_').html('Usuario no puede ser nulo.');
	            $('#UsuarioCarpComp_Usuario_em_').show(); 
	        }

	        if(password == ""){
	            $('#UsuarioCarpComp_Password_em_').html('Password no puede ser nulo.');
	            $('#UsuarioCarpComp_Password_em_').show(); 
	        }

	        if(permiso == ""){
	            $('#UsuarioCarpComp_Permiso_em_').html('Permisos no puede ser nulo.');
	            $('#UsuarioCarpComp_Permiso_em_').show(); 
	        }
		}
	}

}

</script>

