<?php
/* @var $this ReporteController */
/* @var $model Reporte */

//para combos de empresas
$lista_empresas = CHtml::listData($empresas, 'Id_Empresa', 'Descripcion');

//para combos de géneros
$lista_generos = CHtml::listData($generos, 'Id_Dominio', 'Dominio');

?>

<h3>Reporte hijos de empleados activos</h3>

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
        <?php echo $form->error($model,'genero', array('class' => 'pull-right badge bg-red')); ?>
        <?php echo $form->label($model,'genero'); ?>
        <?php
            $this->widget('ext.select2.ESelect2',array(
                'name'=>'Reporte[genero]',
                'id'=>'Reporte_genero',
                'data'=>$lista_generos,
                'value' => $model->genero,
                'htmlOptions'=>array(),
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
        <?php echo $form->error($model,'edad_inicial', array('class' => 'pull-right badge bg-red')); ?>
        <?php echo $form->label($model,'edad_inicial'); ?>
        <?php echo $form->numberField($model,'edad_inicial', array('class' => 'form-control', 'autocomplete' => 'off',  'step' => '1', 'min' => '0')); ?>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <?php echo $form->error($model,'edad_final', array('class' => 'pull-right badge bg-red')); ?>
        <?php echo $form->label($model,'edad_final'); ?>
        <?php echo $form->numberField($model,'edad_final', array('class' => 'form-control', 'autocomplete' => 'off',  'step' => '1', 'min' => '1')); ?>
      </div>
    </div>
  </div>
  <div class="row">
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

});

function reporte_pantalla(){

  var genero = $("#Reporte_genero").val();
  var edad_inicial = $("#Reporte_edad_inicial").val();
  var edad_final = $("#Reporte_edad_final").val();
  var empresa = $("#Reporte_empresa").val();

  var data = {genero: genero, edad_inicial: edad_inicial, edad_final: edad_final, empresa: empresa}
  $(".ajax-loader").fadeIn('fast');
  $.ajax({ 
    type: "POST", 
    url: "<?php echo Yii::app()->createUrl('reporte/hijospant'); ?>",
    data: data,
    success: function(data){ 
      $(".ajax-loader").fadeOut('fast');
      $("#resultados").html(data); 
    }
  });

}

function resetfields(){
  $('#Reporte_genero').val('');
  $('#Reporte_edad_inicial').val('');
  $('#Reporte_edad_final').val('');
  $('#Reporte_empresa').val('').trigger('change');
}

</script> 

