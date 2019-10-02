<?php
/* @var $this DisciplinarioEmpleadoController */
/* @var $model DisciplinarioEmpleado */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'disciplinario-empleado-form',
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
        <input type="hidden" id="fecha_min" value="<?php echo $fecha_min; ?>">   
        <?php echo $form->label($model,'Id_Empleado'); ?>
        <?php echo '<p>'.UtilidadesEmpleado::nombreempleado($e).'</p>'; ?> 
      </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <?php echo $form->error($model,'Fecha', array('class' => 'pull-right badge bg-red')); ?>
      <?php echo $form->label($model,'Fecha'); ?>
      <?php echo $form->textField($model,'Fecha', array('class' => 'form-control', 'readonly' => true)); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <?php echo $form->error($model,'Id_M_Disciplinario', array('class' => 'pull-right badge bg-red')); ?>
      <?php echo $form->label($model,'Id_M_Disciplinario'); ?>
      <?php
          $this->widget('ext.select2.ESelect2',array(
              'name'=>'DisciplinarioEmpleado[Id_M_Disciplinario]',
              'id'=>'DisciplinarioEmpleado_Id_M_Disciplinario',
              'data'=>$lista_motivos,
              'value'=>$model->Id_M_Disciplinario,
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
    <div class="form-group">
      <?php echo $form->error($model,'Id_Empleado_Imp', array('class' => 'pull-right badge bg-red')); ?>
      <?php echo $form->label($model,'Id_Empleado_Imp'); ?>
      <?php echo $form->textField($model,'Id_Empleado_Imp'); ?>
      <?php
        $this->widget('ext.select2.ESelect2', array(
            'selector' => '#DisciplinarioEmpleado_Id_Empleado_Imp',
            'options'  => array(
              'allowClear' => true,
              'minimumInputLength' => 5,
                  'width' => '100%',
                  'language' => 'es',
                  'ajax' => array(
                        'url' => Yii::app()->createUrl('empleado/SearchEmpleado'),
                    'dataType'=>'json',
                      'data'=>'js:function(term){return{q: term};}',
                      'results'=>'js:function(data){ return {results:data};}'                   
                ),
                'formatNoMatches'=> 'js:function(){ clear_select2_ajax("DisciplinarioEmpleado_Id_Empleado_Imp"); return "No se encontraron resultados"; }',
                'formatInputTooShort' =>  'js:function(){ return "Digite más de 5 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'DisciplinarioEmpleado_Id_Empleado_Imp\')\">Limpiar campo</button>"; }',
                'initSelection'=>'js:function(element,callback) {
                      var id=$(element).val(); // read #selector value
                      if ( id !== "" ) {
                        $.ajax("'.Yii::app()->createUrl('empleado/SearchEmpleadoById').'", {
                            data: { id: id },
                            dataType: "json"
                        }).done(function(data,textStatus, jqXHR) { callback(data[0]); });
                     }
                  }',
            ),
          ));
      ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <?php echo $form->error($model,'Orden_No', array('class' => 'pull-right badge bg-red')); ?>
      <?php echo $form->label($model,'Orden_No'); ?>
      <?php echo $form->textField($model,'Orden_No', array('class' => 'form-control', 'maxlength' => '50', 'autocomplete' => 'off', 'onkeyup' => 'convert_may(this)')); ?>
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
  <button type="button" class="btn btn-success" id="valida_form"><i class="fa fa-floppy-o"></i> <?php echo 'Crear'; ?></button>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">

function clear_select2_ajax(id){
	$('#'+id+'').val('').trigger('change');
	$('#s2id_'+id+' span').html("");
}

$(function() {

  $("#valida_form").click(function() {
    var form = $("#disciplinario-empleado-form");
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

  $("#DisciplinarioEmpleado_Fecha").datepicker({
      language: 'es',
      autoclose: true,
      orientation: "right bottom",
      startDate: $("#fecha_min").val(),
  });

});

</script>
