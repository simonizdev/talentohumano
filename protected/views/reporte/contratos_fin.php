<?php
/* @var $this ReporteController */
/* @var $model Reporte */

//para combos de empresas
$lista_empresas = CHtml::listData($empresas, 'Id_Empresa', 'Descripcion');

//para combos de motivos
$lista_motivos = CHtml::listData($motivos_retiro, 'Id_Dominio', 'Dominio');

?>

<h3>Reporte contratos finalizados</h3>

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
        <?php echo $form->error($model,'fecha_inicial_fin', array('class' => 'pull-right badge bg-red')); ?>
        <?php echo $form->label($model,'fecha_inicial_fin'); ?>
        <?php echo $form->textField($model,'fecha_inicial_fin', array('class' => 'form-control', 'readonly' => true)); ?>
        </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <?php echo $form->error($model,'fecha_final_fin', array('class' => 'pull-right badge bg-red')); ?>
        <?php echo $form->label($model,'fecha_final_fin'); ?>
        <?php echo $form->textField($model,'fecha_final_fin', array('class' => 'form-control', 'readonly' => true)); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
      <div class="form-group">
        <?php echo $form->error($model,'motivo_retiro', array('class' => 'pull-right badge bg-red')); ?>
        <?php echo $form->label($model,'motivo_retiro'); ?>
        <?php
            $this->widget('ext.select2.ESelect2',array(
                'name'=>'Reporte[motivo_retiro]',
                'id'=>'Reporte_motivo_retiro',
                'data'=>$lista_motivos,
                'htmlOptions'=>array(
                  'multiple'=>'multiple',
                ),
                'options'=>array(
                    'placeholder'=>'TODOS',
                    'width'=> '100%',
                    'allowClear'=>true,
                ),
            ));
        ?>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <?php echo $form->error($model,'liquidado', array('class' => 'pull-right badge bg-red')); ?>
        <?php echo $form->label($model,'liquidado'); ?>
        <?php
            $opcs = array(1 => 'SI', 2 => 'NO');
            $this->widget('ext.select2.ESelect2',array(
                'name'=>'Reporte[liquidado]',
                'id'=>'Reporte_liquidado',
                'data'=>$opcs,
                'value' => $model->liquidado,
                'htmlOptions'=>array(),
                'options'=>array(
                    'placeholder'=>'SI / NO',
                    'width'=> '100%',
                    'allowClear'=>true,
                ),
            ));
        ?>
        </div>
    </div>           
    <div class="col-sm-4">
      <div class="form-group">
        <?php echo $form->error($model,'empresa', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'empresa'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'Reporte[empresa]',
                    'id'=>'Reporte_empresa',
                    'data'=>$lista_empresas,
                    'htmlOptions'=>array(
                      'multiple'=>'multiple',
                    ),
                    'options'=>array(
                        'placeholder'=>'TODAS',
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
			<?php echo $form->error($model,'opcion_exp', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'opcion_exp'); ?><br>
			<?php 
				echo $form->radioButtonList($model,'opcion_exp',
			    	array('3'=>'<i class="fa fa-desktop" aria-hidden="true"></i> Pantalla','1'=>'<i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF','2'=>'<i class="fa fa-file-excel-o" aria-hidden="true"></i> EXCEL'),
			    	array(
			        	'template'=>'{input}{label}',
			        	'separator'=>'',
			        	'labelOptions'=>array(
			            	'style'=> '
			                	padding-left:1%;
			                	padding-right:5%;
		            	'),
		          	)                              
		      	);
			?>			
    	</div>
    </div>
</div>

<div class="btn-group" style="padding-bottom: 2%">
    <button type="button" class="btn btn-success" onclick="resetfields();"><i class="fa fa-eraser"></i> Limpiar filtros</button>
    <button type="button" class="btn btn-success" id="valida_form"><i class="fa fa-bar-chart"></i> Generar</button>
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
              if($("input:radio:checked").val() == 3){
                reporte_pantalla();
              }else{
                form.submit();
                $(".ajax-loader").fadeIn('fast');
                setTimeout(function(){ $(".ajax-loader").fadeOut('fast'); }, 5000); 
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

  $("#Reporte_fecha_inicial_fin").datepicker({
      language: 'es',
      autoclose: true,
      orientation: "right bottom",
  }).on('changeDate', function (selected) {
    var minDate = new Date(selected.date.valueOf());
    $('#Reporte_fecha_final_fin').datepicker('setStartDate', minDate);
  });

  $("#Reporte_fecha_final_fin").datepicker({
      language: 'es',
      autoclose: true,
      orientation: "right bottom",
  }).on('changeDate', function (selected) {
    var maxDate = new Date(selected.date.valueOf());
    $('#Reporte_fecha_inicial_fin').datepicker('setEndDate', maxDate);
  });

});

function reporte_pantalla(){

  var motivo_retiro = $("#Reporte_motivo_retiro").val();
  var liquidado = $("#Reporte_liquidado").val();
  var fecha_inicial_fin = $("#Reporte_fecha_inicial_fin").val();
  var fecha_final_fin = $("#Reporte_fecha_final_fin").val();
  var empresa = $("#Reporte_empresa").val();
  var data = {motivo_retiro: motivo_retiro, liquidado: liquidado, fecha_inicial_fin: fecha_inicial_fin, fecha_final_fin: fecha_final_fin, empresa: empresa}
  $(".ajax-loader").fadeIn('fast');
  $.ajax({ 
    type: "POST", 
    url: "<?php echo Yii::app()->createUrl('reporte/contratosfinalizadospant'); ?>",
    data: data,
    success: function(data){ 
      $(".ajax-loader").fadeOut('fast');
      $("#resultados").html(data); 
    }
  });

}

function resetfields(){
  $('#Reporte_fecha_inicial_fin').val('');
  $('#Reporte_fecha_final_fin').val('');
  $('#Reporte_motivo_retiro').val('').trigger('change');
  $('#Reporte_liquidado').val('').trigger('change');
  $('#Reporte_empresa').val('').trigger('change');
}

</script> 

