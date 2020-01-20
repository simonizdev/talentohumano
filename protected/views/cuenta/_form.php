<?php
/* @var $this CuentaController */
/* @var $model Cuenta */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cuenta-form',
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
    <div class="col-sm-4">
        <div class="form-group">
            <div class="pull-right badge bg-red" id="error_clasificacion" style="display: none;"></div>
            <?php echo $form->label($model,'Clasificacion'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'Cuenta[Clasificacion]',
                    'id'=>'Cuenta_Clasificacion',
                    'data'=>$lista_clases,
                    'htmlOptions'=>array(),
                    'options'=>array(
                        'placeholder'=>'Seleccione...',
                        'width'=> '100%',
                        'allowClear'=>true,
                    ),
                ));
            ?>
        </div>
    </div>
    <div class="col-sm-8">
   		<div class="pull-right badge bg-red" id="error_dup" style="display: none;"></div>
   	</div>
</div>
<div class="row">
	<div class="col-sm-4" id="div_cuenta_usuario" style="display: none;">
        <div class="form-group">
            <div class="pull-right badge bg-red" id="error_cuenta_usuario" style="display: none;"></div>
            <?php echo $form->label($model,'Cuenta_Usuario'); ?>
            <?php echo $form->textField($model,'Cuenta_Usuario', array('class' => 'form-control', 'maxlength' => '30', 'autocomplete' => 'off')); ?>
        </div>
    </div>
    <div class="col-sm-4" id="div_dominio" style="display: none;">
        <div class="form-group">
            <div class="pull-right badge bg-red" id="error_dominio" style="display: none;"></div>
            <?php echo $form->label($model,'Dominio'); ?>
            <?php
        		$this->widget('ext.select2.ESelect2',array(
					'name'=>'Cuenta[Dominio]',
					'id'=>'Cuenta_Dominio',
					'data'=>$lista_dominios,
					'htmlOptions'=>array(),
				  	'options'=>array(
						'placeholder'=>'Seleccione...',
						'width'=> '100%',
						'allowClear'=>true,
					),
				));
			?>
        </div>
    </div>
    <div class="col-sm-4" id="div_password" style="display: none;">
        <div class="form-group">
            <div class="pull-right badge bg-red" id="error_password" style="display: none;"></div>
            <?php echo $form->label($model,'Password'); ?>
            <?php echo $form->textField($model,'Password', array('class' => 'form-control', 'maxlength' => '10', 'autocomplete' => 'off')); ?>
        </div>
    </div>
    <div class="col-sm-4" id="div_tipo_cuenta" style="display: none;">
        <div class="form-group">
            <div class="pull-right badge bg-red" id="error_tipo_cuenta" style="display: none;"></div>
            <?php echo $form->label($model,'Tipo_Cuenta'); ?>
            <?php
        		$this->widget('ext.select2.ESelect2',array(
					'name'=>'Cuenta[Tipo_Cuenta]',
					'id'=>'Cuenta_Tipo_Cuenta',
					'data'=>$lista_tipos,
					'htmlOptions'=>array(),
				  	'options'=>array(
						'placeholder'=>'Seleccione...',
						'width'=> '100%',
						'allowClear'=>true,
					),
				));
			?>
        </div>
    </div>
    <div class="col-sm-4" id="div_tipo_acceso" style="display: none;">
        <div class="form-group">
            <div class="pull-right badge bg-red" id="error_tipo_acceso" style="display: none;"></div>
            <?php echo $form->label($model,'Tipo_Acceso'); ?>
    		    <?php
            		$this->widget('ext.select2.ESelect2',array(
    					'name'=>'Cuenta[Tipo_Acceso]',
    					'id'=>'Cuenta_Tipo_Acceso',
    					'data'=> array(1 => 'GENÉRICO', 2 => 'PERSONAL'),
    					'htmlOptions'=>array(),
    				  	'options'=>array(
    						'placeholder'=>'Seleccione...',
    						'width'=> '100%',
    						'allowClear'=>true,
    					),
    				));
    			?>
        </div>
    </div>
    <div class="col-sm-8" id="div_observaciones" style="display: none;">
        <div class="form-group">
            <?php echo $form->label($model,'Observaciones'); ?>
            <?php echo $form->textArea($model,'Observaciones',array('class' => 'form-control', 'rows'=>3, 'cols'=>50)); ?>
        </div>
    </div>
</div>



<div class="btn-group" style="padding-bottom: 2%" id="div_buttons">
    <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=cuenta/admin'; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="button" class="btn btn-success" id="valida_form"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
  
$(function() {

  $("#Cuenta_Clasificacion").change(function() {

    var clase = $('#Cuenta_Clasificacion').val();

    if(clase != ''){
       
      $('#error_clasificacion').html('');
      $('#error_clasificacion').hide();

      limpiar_errores();

      if(clase == <?php echo Yii::app()->params->c_correo ?>){
		//CORREO ELECTRONICO

        $('#div_cuenta_usuario').show();
        $('#div_dominio').show(); 
        $('#div_password').show();
        $('#div_tipo_cuenta').show(); 
        $('#div_tipo_acceso').hide();
        $('#div_observaciones').show();

        $('#Cuenta_Tipo_Acceso').val('').trigger('change');

      }else{
      	//DEMAS CUENTAS / USUARIOS

      	$('#div_cuenta_usuario').show();
        $('#div_dominio').hide(); 
        $('#div_password').show();
        $('#div_tipo_cuenta').hide(); 
        $('#div_tipo_acceso').show();
        $('#div_observaciones').show();

      	$('#Cuenta_Dominio').val('').trigger('change');
      	$('#Cuenta_Tipo_Cuenta').val('').trigger('change');


      }

    }else{
      
      $('#div_cuenta_usuario').hide();
      $('#div_dominio').hide(); 
      $('#div_tipo_cuenta').hide(); 
      $('#div_tipo_acceso').hide(); 
      $('#div_password').hide();
      $('#div_observaciones').hide();

	  $('#error_clasificacion').html('Clasif. no puede ser nulo');
      $('#error_clasificacion').show();
      
      $('#Cuenta_Cuenta_Usuario').val('');
      $('#Cuenta_Dominio').val('').trigger('change');
      $('#Cuenta_Password').val('');
      $('#Cuenta_Tipo_Cuenta').val('').trigger('change');
      $('#Cuenta_Tipo_Acceso').val('').trigger('change');
      $('#Cuenta_Observaciones').val('');

    }
  });


  $("#valida_form").click(function() {
    
    var form = $("#cuenta-form");
    var clase = $('#Cuenta_Clasificacion').val();

    if(clase == ''){
      $('#error_clasificacion').html('Clasif. no puede ser nulo');
      $('#error_clasificacion').show();
    }else{
      $('#error_clasificacion').html('');
      $('#error_clasificacion').hide();
    }

    limpiar_errores();

    if(clase == <?php echo Yii::app()->params->c_correo ?>){
    	//CORREO ELECTRONICO

      var cuenta_usuario = $('#Cuenta_Cuenta_Usuario').val();
      var dominio = $('#Cuenta_Dominio').val();
      var password = $('#Cuenta_Password').val();
      var tipo_cuenta = $('#Cuenta_Tipo_Cuenta').val();

  		if(cuenta_usuario != "" && dominio != "" && password != "" && tipo_cuenta != ""){

  			var data = {clase: clase, cuenta_usuario: cuenta_usuario, dominio: dominio}
  	        $.ajax({ 
  	            type: "POST", 
  	            url: "<?php echo Yii::app()->createUrl('cuenta/verificarduplicidad'); ?>",
  	            data: data,
  	            success: function(response){

  	                if(response == 0){
  	                    //se encontro una cuenta igual
  	                    $('#error_dup').html('Esta cuenta / usuario ya esta registrada.');
  	                    $('#error_dup').show();
  	                }

  	                if(response == 1){
  	                    //si la cuenta no existe

  	                    limpiar_errores();
            						$('#div_buttons').hide();
                        $(".ajax-loader").fadeIn('fast');
            						form.submit();
  	                }

  	            }
  	        });


  		}else{
  			if(cuenta_usuario == ""){
  			  $('#error_cuenta_usuario').html('Cuenta / Usuario no puede ser nulo.');
  			  $('#error_cuenta_usuario').show(); 
  			}

  			if(dominio == ""){
  			  $('#error_dominio').html('Dominio no puede ser nulo.');
  			  $('#error_dominio').show(); 
  			}

  			if(password == ""){
  			  $('#error_password').html('Password no puede ser nulo.');
  			  $('#error_password').show(); 
  			}

  			if(tipo_cuenta == ""){
  			  $('#error_tipo_cuenta').html('Tipo de cuenta no puede ser nulo.');
  			  $('#error_tipo_cuenta').show(); 
  			}

		  }

	  }else{
	  	//DEMAS CUENTAS / USUARIOS

	  	var cuenta_usuario = $('#Cuenta_Cuenta_Usuario').val();
      var password = $('#Cuenta_Password').val();
      var tipo_acceso = $('#Cuenta_Tipo_Acceso').val();

  		if(cuenta_usuario != "" && password != "" && tipo_acceso != ""){

  			var data = {clase: clase, cuenta_usuario: cuenta_usuario, dominio: null}
        $.ajax({ 
            type: "POST", 
            url: "<?php echo Yii::app()->createUrl('cuenta/verificarduplicidad'); ?>",
            data: data,
            success: function(response){

                if(response == 0){
                    //se encontro una cuenta igual
                    $('#error_dup').html('Este cuenta / usuario ya esta registrada.');
                    $('#error_dup').show();
                }

                if(response == 1){
                    //si la cuenta no existe

                    limpiar_errores();
          					$('#div_buttons').hide();
                    $(".ajax-loader").fadeIn('fast');
          					form.submit();
                }

            }
        });

  		}else{
  			if(cuenta_usuario == ""){
  			  $('#error_cuenta_usuario').html('Cuenta / Usuario no puede ser nulo.');
  			  $('#error_cuenta_usuario').show(); 
  			}

  			if(password == ""){
  			  $('#error_password').html('Password no puede ser nulo.');
  			  $('#error_password').show(); 
  			}

  			if(tipo_acceso == ""){
  			  $('#error_tipo_acceso').html('Tipo de acceso no puede ser nulo.');
  			  $('#error_tipo_acceso').show(); 
  			}

  		}

	  }

  });

  $("#Cuenta_Cuenta_Usuario").change(function() {
      var valor = $('#Cuenta_Cuenta_Usuario').val(); 

      if(valor != ""){
        $('#error_cuenta_usuario').html('');
        $('#error_cuenta_usuario').hide();
      }
  });

  $("#Cuenta_Dominio").change(function() {
    var valor = $('#Cuenta_Dominio').val(); 

    if(valor != ""){
      $('#error_dominio').html('');
      $('#error_dominio').hide();
    }
  });

  $("#Cuenta_Password").change(function() {
    var valor = $('#Cuenta_Password').val(); 

    if(valor != ""){
      $('#error_password').html('');
      $('#error_password').hide();
    }
  });

  $("#Cuenta_Tipo_Cuenta").change(function() {
    var valor = $('#Cuenta_Tipo_Cuenta').val(); 

    if(valor != ""){
      $('#error_tipo_cuenta').html('');
      $('#error_tipo_cuenta').hide();
    }
  });

  $("#Cuenta_Tipo_Acceso").change(function() {
    var valor = $('#Cuenta_Tipo_Acceso').val(); 

    if(valor != ""){
      $('#error_tipo_acceso').html('');
      $('#error_tipo_acceso').hide();
    }
  });

});


function limpiar_errores(){

  $('#error_cuenta_usuario').html('');
  $('#error_cuenta_usuario').hide(); 
  $('#error_dominio').html('');
  $('#error_dominio').hide(); 
  $('#error_password').html('');
  $('#error_password').hide(); 
  $('#error_tipo_cuenta').html('');
  $('#error_tipo_cuenta').hide(); 
  $('#error_tipo_acceso').html('');
  $('#error_tipo_acceso').hide();
  $('#error_dup').html('');
  $('#error_dup').hide(); 

}
    
</script>
