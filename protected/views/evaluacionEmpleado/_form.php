<?php
/* @var $this EvaluacionEmpleadoController */
/* @var $model EvaluacionEmpleado */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'evaluacion-empleado-form',
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
            <?php echo $form->error($model,'Id_Tipo', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Tipo'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'EvaluacionEmpleado[Id_Tipo]',
                    'id'=>'EvaluacionEmpleado_Id_Tipo',
                    'data'=>$lista_tipos_ev,
                    'value' => $model->Id_Tipo,
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
        <?php echo $form->error($model,'Puntaje', array('class' => 'pull-right badge bg-red')); ?>
        <?php echo $form->label($model,'Puntaje'); ?>
        <?php echo $form->numberField($model,'Puntaje', array('class' => 'form-control', 'min' => '1', 'max' => '100', 'autocomplete' => 'off')); ?>
        </div>
    </div>  
   	<div class="col-sm-4">
  		<div class="form-group">
  			<?php echo $form->error($model,'Observacion', array('class' => 'pull-right badge bg-red')); ?>
  			<?php echo $form->label($model,'Observacion'); ?>
  			<?php echo $form->textArea($model,'Observacion',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'onkeyup' => 'convert_may(this)')); ?>
  		</div>
	</div>    
</div>

<div class="btn-group" style="padding-bottom: 2%" id="buttons">
    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=empleado/view&id='.$e; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="button" class="btn btn-success" id="valida_form"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>

<?php $this->endWidget(); ?>

<script>

$(function() {

    $("#valida_form").click(function() {
      var form = $("#evaluacion-empleado-form");
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

});

</script>

