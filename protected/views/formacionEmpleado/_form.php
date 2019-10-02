<?php
/* @var $this FormacionEmpleadoController */
/* @var $model FormacionEmpleado */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'formacion-empleado-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data'
	),
)); ?>

<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            <?php echo $form->label($model,'Id_Empleado'); ?>
            <?php echo '<p>'.UtilidadesEmpleado::nombreempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
          	<?php echo $form->error($model,'Fecha', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Fecha'); ?>
		    <?php echo $form->textField($model,'Fecha', array('class' => 'form-control datepicker', 'readonly' => true)); ?>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-sm-4">
      <div class="form-group">
        <?php echo $form->error($model,'Entidad', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Entidad'); ?>
        <?php echo $form->textField($model,'Entidad', array('class' => 'form-control', 'maxlength' => '50', 'autocomplete' => 'off', 'onkeyup' => 'convert_may(this)')); ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Id_Nivel', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Nivel'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'FormacionEmpleado[Id_Nivel]',
                    'id'=>'FormacionEmpleado_Id_Nivel',
                    'data'=>$lista_niveles,
                    'value' => $model->Id_Nivel,
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
	<div class="col-sm-4">
    	<div class="form-group">
    		<?php echo $form->error($model,'Titulo_Obtenido', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Titulo_Obtenido'); ?>
		    <?php echo $form->textField($model,'Titulo_Obtenido', array('class' => 'form-control', 'maxlength' => '50', 'autocomplete' => 'off', 'onkeyup' => 'convert_may(this)')); ?>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-sm-4">
    	<div class="form-group">
    		  <?php echo $form->error($model,'img', array('class' => 'pull-right badge bg-red')); ?>
        	<?php echo $form->label($model,'img'); ?>
		      <?php echo $form->fileField($model, 'img'); ?>
        </div>
    </div>
    <div class="col-sm-8" id="vista_previa">
    	<div class="form-group">
    		<label for="FormacionEmpleado_img">Vista previa</label>
    		<div class="pull-right badge bg-red" id="error_sop" style="display: none;"></div>
    		<input type="hidden" id="valid_img" value="1">
    		<img id="img" class="img-responsive"/>
        </div>
    </div>
</div>


<div class="btn-group" style="padding-bottom: 2%" id="buttons">
    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=empleado/view&id='.$e; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="button" class="btn btn-success" id="valida_form"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">


$(function() {

	var extensionesValidas = ".png, .jpeg, .jpg, .PNG, .JPEG, .JPG";
	var pesoPermitido = 512;

	$("#valida_form").click(function() {
      var form = $("#formacion-empleado-form");
      var settings = form.data('settings') ;

      var soporte = $('#FormacionEmpleado_img').val();

      settings.submitting = true ;
      $.fn.yiiactiveform.validate(form, function(messages) {
          if($.isEmptyObject(messages)) {
              $.each(settings.attributes, function () {
                 $.fn.yiiactiveform.updateInput(this,messages,form); 
              });
              	
              //se valida si el archivo cargado es valido (1)
              valid_img = $('#valid_img').val();

              if(valid_img == 1){
              	//se envia el form
              	$('#buttons').hide();
              	form.submit();
              }else{

              	settings.submitting = false ;	
              }
              

          } else {
              settings = form.data('settings'),
              $.each(settings.attributes, function () {
                 $.fn.yiiactiveform.updateInput(this,messages,form); 
              });
              settings.submitting = false ;
          }
      });
  	});

  	$("#FormacionEmpleado_img").change(function () {

		$('#error_sop').html('');
		$('#img').attr('src', '');
		$('#error_sop').html('');
      	$('#error_sop').hide();

		if(validarExtension(this)) {

	    	if(validarPeso(this)) {

	    		verImagen(this);

	    	}
		}  
	});


	// Validacion de extensiones permitidas
	function validarExtension(datos) {

		var ruta = datos.value;
		var extension = ruta.substring(ruta.lastIndexOf('.') + 1).toLowerCase();
		var extensionValida = extensionesValidas.indexOf(extension);

		if(extensionValida < 0) {

		 	$('#error_sop').html('La extensión no es válida (.'+ extension+'), Solo se admite (.png, .jpeg, .jpg)');
		 	$('#error_sop').show();
		 	$('#valid_img').val(0);
		 	return false;

		} else {

			return true;

		}
	}

	// Validacion de peso del fichero en kbs

	function validarPeso(datos) {

		if (datos.files && datos.files[0]) {

	        var pesoFichero = datos.files[0].size/1024;

	        if(pesoFichero > pesoPermitido) {

	            $('#error_sop').html('El peso maximo permitido del fichero es: ' + pesoPermitido / 1024 + ' MB, Su fichero tiene: '+ (pesoFichero /1024).toFixed(2) +' MB.');
	            $('#error_sop').show();
	            $('#valid_img').val(0);
	            return false;

	        } else {

	            return true;

	        }

	    }

	}

	 // Vista preliminar de la imagen.
	function verImagen(datos) {

	    if (datos.files && datos.files[0]) {

	        var reader = new FileReader();

	        reader.onload = function (e) {

	            $('#img').attr('src', e.target.result);
	            $('#valid_img').val(1);
	        };

	        reader.readAsDataURL(datos.files[0]);

	    }

	}

});

	
</script>
