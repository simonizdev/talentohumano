<?php
/* @var $this ComisionController */
/* @var $model Comision */

?>

<h3>Ajuste de recaudo</h3>

<div id="formulario">

  <?php $form=$this->beginWidget('CActiveForm', array(
  	'id'=>'comision-form',
  	// Please note: When you enable ajax validation, make sure the corresponding
  	// controller action is handling ajax validation correctly.
  	// There is a call to performAjaxValidation() commented in generated controller code.
  	// See class documentation of CActiveForm for details on this.
  	'enableClientValidation'=>true,
  	'clientOptions'=>array(
  		'validateOnSubmit'=>true,
  	),
  )); ?>

  <div id="div_mensaje" style="display: none;"></div>

  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
            <?php echo $form->error($model,'recibo', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'recibo'); ?>
            <?php echo $form->textField($model,'recibo'); ?>
            <?php
                $this->widget('ext.select2.ESelect2', array(
                    'selector' => '#Comision_recibo',
                    'options'  => array(
                        'allowClear' => true,
                        'minimumInputLength' => 5,
                        'width' => '100%',
                        'language' => 'es',
                        'ajax' => array(
                            'url' => Yii::app()->createUrl('comision/SearchRecibo'),
                            'dataType'=>'json',
                            'data'=>'js:function(term){return{q: term};}',
                            'results'=>'js:function(data){ return {results:data};}'                   
                        ),
                        'formatNoMatches'=> 'js:function(){ clear_select2_ajax("Comision_recibo"); return "No se encontraron resultados"; }',
                        'formatInputTooShort' =>  'js:function(){ return "Digite más de 5 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'Comision_recibo\')\">Limpiar campo</button>"; }',
                    ),
                ));
            ?>
        </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
            <?php echo $form->error($model,'id_vendedor', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'id_vendedor'); ?>
            <?php echo $form->textField($model,'id_vendedor'); ?>
            <?php
                $this->widget('ext.select2.ESelect2', array(
                    'selector' => '#Comision_id_vendedor',
                    'options'  => array(
                        'allowClear' => true,
                        'minimumInputLength' => 5,
                        'width' => '100%',
                        'language' => 'es',
                        'ajax' => array(
                            'url' => Yii::app()->createUrl('comision/SearchVend'),
                            'dataType'=>'json',
                            'data'=>'js:function(term){return{q: term};}',
                            'results'=>'js:function(data){ return {results:data};}'                   
                        ),
                        'formatNoMatches'=> 'js:function(){ clear_select2_ajax("Comision_id_vendedor"); return "No se encontraron resultados"; }',
                        'formatInputTooShort' =>  'js:function(){ return "Digite más de 5 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'Comision_id_vendedor\')\">Limpiar campo</button>"; }',
                    ),
                ));
            ?>
        </div>
    </div>
  </div>

  <div class="btn-group" style="padding-bottom: 2%" id="buttons">
    <button type="Button" class="btn btn-success" id="valida_form"><i class="fa fa-floppy-o"></i> Guardar ajuste</button>
  </div>

</div>

<?php $this->endWidget(); ?>

<script>

$(function() {

  $("#valida_form").click(function() {

      var form = $("#comision-form");
      var settings = form.data('settings') ;
      settings.submitting = true ;

      var recibo = $('#Comision_recibo').val();
      var vendedor = $('#Comision_id_vendedor').val();

      $.fn.yiiactiveform.validate(form, function(messages) {
          if($.isEmptyObject(messages)) {
              $.each(settings.attributes, function () {
                 $.fn.yiiactiveform.updateInput(this,messages,form); 
              });

              if(confirm("Esta seguro de realizar el ajuste ? ")) { 
                
                url = "<?php echo Yii::app()->createUrl('comision/ajusterec'); ?>";

                //se limpia el div de el mensaje antes de hacer la petición
                limp_div_msg();

                //AJAX
                var data = {recibo: recibo, vendedor: vendedor}
                $.ajax({ 
                  type: "POST", 
                  url: url,
                  dataType: 'json',
                  data: data,
                  beforeSend: function(){
                    $(".ajax-loader").fadeIn('fast'); 
                  },
                  success: function(data){

                    var res = data.res; 
                    var mensaje = data.msg; 

                    if(res == 0){
                      //EL PROCESO NO GENERO NINGUNA LIQUIDACIÓN
                      $("#div_mensaje").addClass("alert alert-warning alert-dismissible");
                      $("#div_mensaje").html('<button type="button" class="close" aria-hidden="true" onclick="limp_div_msg();">×</button><h4><i class="icon fa fa-info-circle"></i>Cuidado</h4><p>'+mensaje+'</p>');
                    }

                    if(res == 1){
                      //EL PROCESO GENERO NINGUNA LIQUIDACIÓN
                      $("#div_mensaje").addClass("alert alert-success alert-dismissible");
                      $("#div_mensaje").html('<button type="button" class="close" aria-hidden="true" onclick="limp_div_msg();">×</button><h4><i class="icon fa fa-check"></i>Realizado</h4><p>'+mensaje+'</p>');  
                    }

                    $("#div_mensaje").fadeIn('fast');
                    $(".ajax-loader").fadeOut('fast');

                    
                  },
                }); 


                //se resetea el formulario para un nuevo ajuste
                $('#Comision_recibo').val('').trigger('change');
                $('#s2id_Comision_recibo span').html("");
                $('#Comision_id_vendedor').val('').trigger('change');
                $('#s2id_Comision_id_vendedor span').html("");

              }else{
                settings = form.data('settings'),
                $.each(settings.attributes, function () {
                   $.fn.yiiactiveform.updateInput(this,messages,form); 
                });

                settings.submitting = false ; 
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


//función para limpiar el mensaje retornado por el ajax
function limp_div_msg(){
    $("#div_mensaje").hide();  
    classact = $('#div_mensaje').attr('class');
    $("#div_mensaje").removeClass(classact);
    $("#mensaje").html('');
}

function clear_select2_ajax(id){
    $('#'+id+'').val('').trigger('change');
    $('#s2id_'+id+' span').html("");
}

</script>
