<?php
/* @var $this ReporteController */
/* @var $model Reporte */

//para combos de unidades de gerencia
$lista_ug = CHtml::listData($unidades_gerencia, 'Id_Unidad_Gerencia', 'Unidad_Gerencia');

?>

<h3>Reporte empleados x unidad de gerencia</h3>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reporte-form',
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
        <?php echo $form->error($model,'unidad_gerencia', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'unidad_gerencia'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'Reporte[unidad_gerencia]',
                    'id'=>'Reporte_unidad_gerencia',
                    'data'=>$lista_ug,
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
            <?php echo $form->error($model,'estado', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'estado'); ?>
            <?php $estados = Yii::app()->params->estados; ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'Reporte[estado]',
                    'id'=>'Reporte_estado',
                    'data'=>$estados,
                    'value' => $model->estado,
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

<div class="btn-group" style="padding-bottom: 2%">
    <button type="button" class="btn btn-success" onclick="resetfields();"><i class="fa fa-eraser"></i> Limpiar filtros</button>
    <button type="button" class="btn btn-success" id="valida_form"><i class="fa fa-file-excel-o"></i> Generar</button>
</div>
    
<div class="row">
    <div class="col-lg-12 table-responsive" id="resultados" style="font-size: 10px !important;">
    <!-- contenido via ajax -->
    </div>
</div>  


<?php $this->endWidget(); ?>

<script>

$(function() {

  $("#valida_form").click(function() {

      var form = $("#reporte-form");
      var settings = form.data('settings') ;
      settings.submitting = true ;
      $.fn.yiiactiveform.validate(form, function(messages) {
          if($.isEmptyObject(messages)) {
              $.each(settings.attributes, function () {
                 $.fn.yiiactiveform.updateInput(this,messages,form); 
              });
              $("#resultados").html(''); 
              //se envia el form
              
              form.submit();
              $(".ajax-loader").fadeIn('fast');
              setTimeout(function(){ $(".ajax-loader").fadeOut('fast'); }, 5000); 
 
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

  $("#Reporte_fecha_inicial_cont").datepicker({
      language: 'es',
      autoclose: true,
      orientation: "right bottom",
  }).on('changeDate', function (selected) {
    var minDate = new Date(selected.date.valueOf());
    $('#Reporte_fecha_final_cont').datepicker('setStartDate', minDate);
  });

  $("#Reporte_fecha_final_cont").datepicker({
      language: 'es',
      autoclose: true,
      orientation: "right bottom",
  }).on('changeDate', function (selected) {
    var maxDate = new Date(selected.date.valueOf());
    $('#Reporte_fecha_inicial_cont').datepicker('setEndDate', maxDate);
  });

});

function reporte_pantalla(){

  var fecha_inicial_cont = $("#Reporte_fecha_inicial_cont").val();
  var fecha_final_cont = $("#Reporte_fecha_final_cont").val();
  var empresa = $("#Reporte_empresa").val();
  var data = {fecha_inicial_cont: fecha_inicial_cont, fecha_final_cont: fecha_final_cont, empresa: empresa}
  $(".ajax-loader").fadeIn('fast');
  $.ajax({ 
    type: "POST", 
    url: "<?php echo Yii::app()->createUrl('reporte/empleadosactivospant'); ?>",
    data: data,
    success: function(data){ 
      $(".ajax-loader").fadeOut('fast');
      $("#resultados").html(data); 
    }
  });

}

function resetfields(){
  $('#Reporte_fecha_inicial_cont').val('');
  $('#Reporte_fecha_final_cont').val('');
  $('#Reporte_empresa').val('').trigger('change');
}
  
</script>


