<?php
/* @var $this TurnoEmpleadoController */
/* @var $model TurnoEmpleado */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'turno-empleado-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<div class="callout callout-warning" id="div_mensaje" style="display: none;">
    <h4>Cuidado</h4>
    <p id="mensaje"></p>
</div>

<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            <input type="hidden" id="fecha_min" value="<?php echo $fecha_min; ?>">
            <input type="hidden" id="valid" value="0">
            <?php echo $form->label($model,'Id_Empleado'); ?>
            <?php echo '<p>'.UtilidadesEmpleado::nombreempleado($e).'</p>'; ?> 
        </div>
    </div>
</div>
<div class="row">
   	<div class="col-sm-8">
        <div class="form-group">
            <?php echo $form->error($model,'Id_Turno', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Turno'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'TurnoEmpleado[Id_Turno]',
                    'id'=>'TurnoEmpleado_Id_Turno',
                    'data'=>$lista_t,
                    'value' => $model->Id_Turno,
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
</div>
<div class="row">
    <div class="col-sm-4">
    	<div class="form-group">
            <?php echo $form->error($model,'Fecha_Inicial', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Fecha_Inicial'); ?>
		    <?php echo $form->textField($model,'Fecha_Inicial', array('class' => 'form-control', 'readonly' => true)); ?>
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
    		<?php echo $form->error($model,'Fecha_Final', array('class' => 'pull-right badge bg-red')); ?>
      	     <?php echo $form->label($model,'Fecha_Final'); ?>
		    <?php echo $form->textField($model,'Fecha_Final', array('class' => 'form-control', 'readonly' => true)); ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Estado', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Estado'); ?>
            <?php $estados = Yii::app()->params->estados; ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'TurnoEmpleado[Estado]',
                    'id'=>'TurnoEmpleado_Estado',
                    'data'=>$estados,
                    'value' => $model->Estado,
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
</div>

<div class="btn-group" style="padding-bottom: 2%" id="buttons">
    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=empleado/view&id='.$e; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="button" class="btn btn-success" id="valida_form"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">

$(function() {

    $("#valida_form").click(function() {

      valida_turno();
      var form = $("#turno-empleado-form");
      var settings = form.data('settings');
      var valid = $("#valid").val();

      settings.submitting = true ;
      $.fn.yiiactiveform.validate(form, function(messages) {
          if($.isEmptyObject(messages)) {
            $.each(settings.attributes, function () {
                $.fn.yiiactiveform.updateInput(this,messages,form); 
            });

            if(valid == 1){   
            	//se envia el form
            	$('#buttons').hide();
            	form.submit();
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

	//variables para el lenguaje del datepicker
	$.fn.datepicker.dates['es'] = {
	  days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
	  daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
	  daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sá"],
	  months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
	  monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
	  today: "Hoy",
	  clear: "Limpiar",
	  format: "yyyy-mm-dd",
	  titleFormat: "MM yyyy",
	  weekStart: 1
	};

	$("#TurnoEmpleado_Fecha_Inicial").datepicker({
	  language: 'es',
	  autoclose: true,
	  orientation: "right bottom",
      startDate: $("#fecha_min").val(),
	}).on('changeDate', function (selected) {

	   if($("#TurnoEmpleado_Fecha_Inicial").val() > $("#TurnoEmpleado_Fecha_Final").val()){
	   	$("#TurnoEmpleado_Fecha_Final").val('');
	   }

	   var minDate = new Date(selected.date.valueOf());
	   $('#TurnoEmpleado_Fecha_Final').datepicker('setStartDate', minDate);
       valida_turno();
	});

	$("#TurnoEmpleado_Fecha_Final").datepicker({
	  language: 'es',
	  autoclose: true,
	  orientation: "right bottom",
      startDate: $("#fecha_min").val(),
	}).on('changeDate', function (selected) {

	   if($("#TurnoEmpleado_Fecha_Final").val() < $("#TurnoEmpleado_Fecha_Inicial").val()){
	   	$("#TurnoEmpleado_Fecha_Inicial").val('');
	   }

	   var maxDate = new Date(selected.date.valueOf());
	   $('#TurnoEmpleado_Fecha_Inicial').datepicker('setEndDate', maxDate);
	   valida_turno();
	}); 

});

</script>
