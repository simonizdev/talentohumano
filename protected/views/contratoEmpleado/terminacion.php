<?php
/* @var $this ContratoEmpleadoController */
/* @var $model ContratoEmpleado */

//para combos de motivos
$lista_motivos = CHtml::listData($motivos, 'Id_Dominio', 'Dominio');

?>

<h3>Terminación de contrato</h3>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'contrato-empleado-form',
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
            <?php echo $form->hiddenField($model,'Id_Contrato', array('class' => 'form-control', 'maxlength' => '50', 'autocomplete' => 'off')); ?>
            <?php echo $form->hiddenField($model,'Id_Empleado', array('class' => 'form-control', 'maxlength' => '50', 'autocomplete' => 'off')); ?>
            <?php echo '<p>'.UtilidadesEmpleado::nombreempleado($model->Id_Empleado).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Id_Empresa', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Empresa'); ?>
            <?php echo '<p>'.$model->idempresa->Descripcion.'</p>'; ?> 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Id_Unidad_Gerencia', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Unidad_Gerencia'); ?>
            <?php echo '<p>'.$unidad_gerencia.'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Id_Area', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Area'); ?>
            <?php echo '<p>'.$area.'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Id_Subarea', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Subarea'); ?>
            <?php echo '<p>'.$subarea.'</p>'; ?> 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Id_Cargo', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Cargo'); ?>
            <?php echo '<p>'.$cargo.'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Id_Centro_Costo', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Centro_Costo'); ?>
            <?php echo '<p>'.$centro_costo.'</p>'; ?> 
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Fecha_Ingreso', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Fecha_Ingreso'); ?>
            <?php echo '<p>'.UtilidadesVarias::textofecha($model->Fecha_Ingreso).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Salario', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Salario'); ?>
            <?php echo '<p>'.number_format($model->Salario, 0).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Salario_Flexible', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Salario_Flexible'); ?>
            <?php echo '<p>'.$salario_flexible.'</p>'; ?>  
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Id_M_Retiro', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_M_Retiro'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'ContratoEmpleado[Id_M_Retiro]',
                    'id'=>'ContratoEmpleado_Id_M_Retiro',
                    'data'=>$lista_motivos,
                    'value' => $model->Id_M_Retiro,
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
            <?php echo $form->error($model,'Fecha_Retiro', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Fecha_Retiro'); ?>
            <?php echo $form->textField($model,'Fecha_Retiro', array('class' => 'form-control', 'readonly' => true)); ?>
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
      var form = $("#contrato-empleado-form");
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

  $("#ContratoEmpleado_Fecha_Retiro").datepicker({
      language: 'es',
      autoclose: true,
      orientation: "right bottom",
      startDate: '<?php echo $model->Fecha_Ingreso ?>',
  });


});

</script>
