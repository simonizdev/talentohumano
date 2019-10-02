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
    <div class="col-sm-4">
    	<div class="form-group">
          	<?php echo $form->label($model,'Id_Empleado'); ?>
          	<p><?php echo UtilidadesEmpleado::nombreempleado($model->Id_Empleado); ?></p>
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
    		<?php echo $form->error($model,'Usuario', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Usuario'); ?>
		    <?php echo $form->textField($model,'Usuario', array('class' => 'form-control', 'maxlength' => '30', 'autocomplete' => 'off')); ?>
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
    		<?php echo $form->error($model,'Password', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Password'); ?>
		    <?php echo $form->textField($model,'Password', array('class' => 'form-control', 'maxlength' => '200', 'autocomplete' => 'off')); ?>
        </div>
    </div>
</div>
<div class="row">
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
   	<div class="col-sm-4">
    	<div class="form-group">
          	<?php echo $form->label($model,'Id_Usuario_Creacion'); ?>
          	<p><?php echo $model->idusuariocre->Usuario; ?></p>
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
          	<?php echo $form->label($model,'Fecha_Creacion'); ?>
          	<p><?php echo UtilidadesEmpleado::nombreempleado($model->Id_Empleado); ?></p>
        </div>
    </div> 
</div>
<div class="row">
	<div class="col-sm-4">
    	<div class="form-group">
          	<?php echo $form->label($model,'Id_Usuario_Actualizacion'); ?>
          	<p><?php echo $model->idusuarioact->Usuario; ?></p>
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
          	<?php echo $form->label($model,'Fecha_Actualizacion'); ?>
          	<p><?php echo UtilidadesEmpleado::nombreempleado($model->Id_Empleado); ?></p>
        </div>
    </div>
</div>

<div class="btn-group" style="padding-bottom: 2%">
    <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=carpComp/update&id='.$model->Id_Carp_Comp; ?>';"><i class="fa fa-reply"></i> Volver </button>
    <button type="button" class="btn btn-success" id="valida_form"><i class="fa fa-floppy-o"></i> Guardar</button>
</div>

<?php $this->endWidget(); ?>

<script>

$(function() {

 	$("#valida_form").click(function() {

      	var form = $("#usuario-carp-comp-form");
      	var settings = form.data('settings') ;
      	settings.submitting = true ;

      	$.fn.yiiactiveform.validate(form, function(messages) {
          	if($.isEmptyObject(messages)) {
              $.each(settings.attributes, function () {
                 $.fn.yiiactiveform.updateInput(this,messages,form); 
              });
              //se envia el form
              $(".ajax-loader").fadeIn('fast');
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






