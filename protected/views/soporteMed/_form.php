<?php
/* @var $this SoporteMedController */
/* @var $model SoporteMed */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'soporte-med-form',
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
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'Id_Empleado'); ?>
            <?php echo '<p>'.UtilidadesEmpleado::nombreempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
          	<label>Tipo de identificación</label>
          	<?php echo '<p>'.UtilidadesEmpleado::tipoidentificacionempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
          	<label># de identificación</label>
          	<?php echo '<p>'.UtilidadesEmpleado::identificacionempleado($e).'</p>'; ?> 
        </div>
    </div>
</div>
<div class="row">
	<div class="col-sm-4">
        <div class="form-group">
            <label>Fecha de nacimiento</label>
            <?php echo '<p>'.UtilidadesEmpleado::fechanacimientoempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Edad</label>
            <?php echo '<p>'.UtilidadesEmpleado::edadempleado($e).'</p>'; ?> 
        </div>
    </div>
</div>
<div class="row">
	<div class="col-sm-4">
        <div class="form-group">
            <label>Fecha ingreso</label>
            <?php echo '<p>'.UtilidadesEmpleado::fechaingresoempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
          	<label>Área</label>
          	<?php echo '<p>'.UtilidadesEmpleado::areaactualempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
          	<label>Cargo</label>
          	<?php echo '<p>'.UtilidadesEmpleado::cargoactualempleado($e).'</p>'; ?> 
        </div>
    </div>
</div>
<div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <?php echo $form->error($model,'Fecha', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Fecha'); ?>
        <?php echo $form->textField($model,'Fecha', array('class' => 'form-control', 'readonly' => true, 'value' => date('Y-m-d'))); ?>
    </div>
  </div>
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Informacion_Adicional_Emp', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Informacion_Adicional_Emp'); ?>
			<?php echo $form->textField($model,'Informacion_Adicional_Emp', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
		</div>
	</div>    
	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Descripcion', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Descripcion'); ?>
			<?php echo $form->textArea($model,'Descripcion',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>
</div>
<div class="row"> 
	<div class="col-sm-4">
		<div class="form-group">
			<div class="pull-right badge bg-red" id="error_sop" style="display: none;"></div>
            <input type="hidden" id="valid_file" value="0">
        	<?php echo $form->label($model,'Soporte'); ?>
	      	<?php echo $form->fileField($model, 'Soporte'); ?>
		</div>
	</div>    
</div>

<div class="btn-group" style="padding-bottom: 2%" id="buttons">
    <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=empleado/viewmed&id='.$e; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="button" class="btn btn-success" id="valida_form"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">


$(function() {

    var extensionesValidas = ".pdf";
    var pesoPermitido = 1024;

    $("#valida_form").click(function() {
      var form = $("#soporte-med-form");
      var settings = form.data('settings') ;

      var soporte = $('#SoporteMed_Soporte').val();

      if(soporte == ''){
        $('#error_sop').html('Soporte no puede ser nulo');
        $('#error_sop').show();
      }

      settings.submitting = true ;
      $.fn.yiiactiveform.validate(form, function(messages) {
          if($.isEmptyObject(messages)) {
              $.each(settings.attributes, function () {
                 $.fn.yiiactiveform.updateInput(this,messages,form); 
              });
                
              //se valida si el archivo cargado es valido (1)
              valid_file = $('#valid_file').val();

              if(valid_file == 1){
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

    $("#SoporteMed_Soporte").change(function () {

        $('#error_sop').html('');
        $('#error_sop').hide();

        if(validarExtension(this)) {

            if(validarPeso(this)) {

                $('#valid_file').val(1);

            }
        }  
    });


    // Validacion de extensiones permitidas
    function validarExtension(datos) {

        var ruta = datos.value;
        var extension = ruta.substring(ruta.lastIndexOf('.') + 1).toLowerCase();
        var extensionValida = extensionesValidas.indexOf(extension);

        if(extensionValida < 0) {

            $('#error_sop').html('La extensión no es válida (.'+ extension+'), Solo se admite (.pdf)');
            $('#error_sop').show();
            $('#valid_file').val(0);
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

                $('#error_sop').html('El peso maximo permitido del fichero es: ' + pesoPermitido / 1024 + ' MB Su fichero tiene: '+ pesoFichero /1024 +' MB');
                $('#error_sop').show();
                $('#valid_file').val(0);
                return false;

            } else {

                return true;

            }

        }

    }


});
  
</script>

