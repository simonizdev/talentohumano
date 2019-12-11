<?php
/* @var $this CuentaEmpleadoController */
/* @var $model CuentaEmpleado */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cuenta-empleado-form',
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
    <div class="col-sm-3">
        <div class="form-group">
            <?php echo $form->label($model,'clasificacion'); ?><br>
        	<?php echo $modelo_cuenta->clasificacion->Dominio ?>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <?php echo $form->label($model,'Id_Cuenta'); ?><br>
            <?php echo $form->hiddenField($model,'Id_Cuenta', array('class' => 'form-control', 'value' => $modelo_cuenta->Id_Cuenta)); ?>
            <?php echo $modelo_cuenta->DescCuentaUsuario($modelo_cuenta->Id_Cuenta) ?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        	<?php echo $form->error($model,'Id_Empleado', array('class' => 'pull-right badge bg-red')); ?>
    		<?php echo $form->label($model,'Id_Empleado'); ?>
            <?php echo $form->textField($model,'Id_Empleado'); ?>
            <?php
                $this->widget('ext.select2.ESelect2', array(
                    'selector' => '#CuentaEmpleado_Id_Empleado',
                    'options'  => array(
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'width' => '100%',
                        'language' => 'es',
                        'ajax' => array(
                            'url' => Yii::app()->createUrl('cuentaempleado/SearchEmpleadoAsocCuenta'),
                            'dataType'=>'json',
                            'data'=>'js:function(term){return{q: term, id_cuenta: '.$modelo_cuenta->Id_Cuenta.'};}',
                            'results'=>'js:function(data){ return {results:data};}'                   
                        ),
                        'formatNoMatches'=> 'js:function(){ clear_select2_ajax("CuentaEmpleado_Id_Empleado"); return "No se encontraron resultados"; }',
                        'formatInputTooShort' =>  'js:function(){ return "Digite más de 3 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'CuentaEmpleado_Id_Empleado\')\">Limpiar campo</button>"; }',
                    ),
                ));
            ?>
        </div>
    </div>
</div>

<div class="btn-group" style="padding-bottom: 2%" id="div_buttons">
    <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=cuenta/update&id='.$modelo_cuenta->Id_Cuenta; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="button" class="btn btn-success" id="valida_form"><i class="fa fa-floppy-o"></i> Guardar</button>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">

$(function() {

  $("#valida_form").click(function() {

      var form = $("#cuenta-empleado-form");
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

    
function clear_select2_ajax(id){
  $('#'+id+'').val('').trigger('change');
  $('#s2id_'+id+' span').html("");
}


</script>

