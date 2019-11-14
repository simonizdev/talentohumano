<?php
/* @var $this AusenciaEmpleadoController */
/* @var $model AusenciaEmpleado */
/* @var $form CActiveForm */

if($model->Horas == 0.0){
	$model->Horas = 0;
}

if($model->Dias == ""){
    $model->Dias = 0;
}

?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ausencia-empleado-form',
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
            <input type="hidden" id="fecha_max" value="<?php echo date('Y-m-d') ?>">
            <?php echo $form->label($model,'Id_Empleado'); ?>
            <?php echo '<p>'.UtilidadesEmpleado::nombreempleado($e).'</p>'; ?> 
        </div>
    </div>
   	<div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Id_M_Ausencia', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_M_Ausencia'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'AusenciaEmpleado[Id_M_Ausencia]',
                    'id'=>'AusenciaEmpleado_Id_M_Ausencia',
                    'data'=>$lista_motivos,
                    'value' => $model->Id_M_Ausencia,
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
            <?php echo $form->error($model,'Cod_Soporte', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Cod_Soporte'); ?>
            <?php echo $form->textField($model,'Cod_Soporte', array('class' => 'form-control', 'maxlength' => '50', 'autocomplete' => 'off', 'onkeyup' => 'convert_may(this)')); ?>
        </div>
    </div>
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
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Dias', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Dias'); ?>
            <?php echo $form->numberField($model,'Dias', array('class' => 'form-control', 'autocomplete' => 'off',  'step' => '1', 'min' => '0')); ?>
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
    		<?php echo $form->error($model,'Horas', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Horas'); ?>
		    <?php echo $form->numberField($model,'Horas', array('class' => 'form-control', 'autocomplete' => 'off', 'step' => '0.5', 'min' => '0')); ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Descontar', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Descontar'); ?>
            <?php $estados2 = Yii::app()->params->estados2; ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'AusenciaEmpleado[Descontar]',
                    'id'=>'AusenciaEmpleado_Descontar',
                    'data'=>$estados2,
                    'value' => $model->Descontar,
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
            <?php echo $form->error($model,'Descontar_FDS', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Descontar_FDS'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'AusenciaEmpleado[Descontar_FDS]',
                    'id'=>'AusenciaEmpleado_Descontar_FDS',
                    'data'=>$estados2,
                    'value' => $model->Descontar_FDS,
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
			<?php echo $form->error($model,'Observacion', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Observacion'); ?>
			<?php echo $form->textArea($model,'Observacion',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'onkeyup' => 'convert_may(this)')); ?>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Nota', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Nota'); ?>
			<?php echo $form->textArea($model,'Nota',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'onkeyup' => 'convert_may(this)')); ?>
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
      var form = $("#ausencia-empleado-form");
      var settings = form.data('settings') ;

      settings.submitting = true ;
      $.fn.yiiactiveform.validate(form, function(messages) {
          if($.isEmptyObject(messages)) {
            $.each(settings.attributes, function () {
                $.fn.yiiactiveform.updateInput(this,messages,form); 
            });
                
            //se envia el form
            $('#buttons').hide();
            form.submit();
             
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

	$("#AusenciaEmpleado_Fecha_Inicial").datepicker({
	  language: 'es',
	  autoclose: true,
	  orientation: "right bottom",
      startDate: $("#fecha_min").val(),
      endDate: $("#fecha_max").val(),
	}).on('changeDate', function (selected) {

       if($("#AusenciaEmpleado_Fecha_Inicial").val() > $("#AusenciaEmpleado_Fecha_Final").val()){
        $("#AusenciaEmpleado_Fecha_Final").val('');
       }

	   var minDate = new Date(selected.date.valueOf());
	   $('#AusenciaEmpleado_Fecha_Final').datepicker('setStartDate', minDate);
        valida_ausencia();
	});

	$("#AusenciaEmpleado_Fecha_Final").datepicker({
	  language: 'es',
	  autoclose: true,
	  orientation: "right bottom",
      startDate: $("#fecha_min").val(),
	}).on('changeDate', function (selected) {

       if($("#AusenciaEmpleado_Fecha_Final").val() < $("#AusenciaEmpleado_Fecha_Inicial").val()){
        $("#AusenciaEmpleado_Fecha_Inicial").val('');
       }

	}); 

});

</script>
