<?php
/* @var $this NucleoEmpleadoController */
/* @var $model NucleoEmpleado */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nucleo-empleado-form',
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
            <?php echo $form->error($model,'Id_Parentesco', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Parentesco'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'NucleoEmpleado[Id_Parentesco]',
                    'id'=>'NucleoEmpleado_Id_Parentesco',
                    'data'=>$lista_parentescos,
                    'value' => $model->Id_Parentesco,
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
            <?php echo $form->error($model,'Id_Genero', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Genero'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'NucleoEmpleado[Id_Genero]',
                    'id'=>'NucleoEmpleado_Id_Genero',
                    'data'=>$lista_generos,
                    'value' => $model->Id_Genero,
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
    		<?php echo $form->error($model,'Nombre_Apellido', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Nombre_Apellido'); ?>
		    <?php echo $form->textField($model,'Nombre_Apellido', array('class' => 'form-control', 'maxlength' => '200', 'autocomplete' => 'off', 'onkeyup' => 'convert_may(this)')); ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
          	<?php echo $form->error($model,'Fecha_Nacimiento', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Fecha_Nacimiento'); ?>
		    <?php echo $form->textField($model,'Fecha_Nacimiento', array('class' => 'form-control datepicker', 'readonly' => true)); ?>
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
      var form = $("#nucleo-empleado-form");
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
