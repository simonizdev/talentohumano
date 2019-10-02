<?php
/* @var $this CPtjVentasController */
/* @var $model CPtjVentas */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cptj-ventas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<div class="callout callout-warning" id="div_mensaje" style="display: none;">
    <h4>Cuidado</h4>
    <p id="mensaje"></p>
</div>

<div class="row">
   	<div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'TIPO', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'TIPO'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'CPtjVentas[TIPO]',
                    'id'=>'CPtjVentas_TIPO',
                    'data'=> $lista_tipos,
                    'value' => $model->TIPO,
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
            <?php echo $form->error($model,'PORCENTAJE', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'PORCENTAJE'); ?>
            <?php echo $form->numberField($model,'PORCENTAJE', array('class' => 'form-control', 'autocomplete' => 'off', 'step' => '0.01', 'min' => '0.01', 'placeholder' => '0,01')); ?>
        </div>
    </div>
</div>

<div class="btn-group" style="padding-bottom: 2%" id="buttons">
    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=cPtjVentas/admin'; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="button" class="btn btn-success" id="valida_form"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">

$(function() {

    $("#valida_form").click(function() {
        var form = $("#cptj-ventas-form");
        var settings = form.data('settings') ;


        settings.submitting = true ;
        $.fn.yiiactiveform.validate(form, function(messages) {
            if($.isEmptyObject(messages)) {
                $.each(settings.attributes, function () {
                    $.fn.yiiactiveform.updateInput(this,messages,form); 
                });

                //var porc = $("#CAceleradorCms_PORCENTAJE").val();
                var tipo = $("#CPtjVentas_TIPO").val();

                var data = {tipo: tipo}
                $.ajax({ 
                  type: "POST", 
                  url: "<?php echo Yii::app()->createUrl('cPtjVentas/verifconfig'); ?>",
                  data: data,
                  dataType: 'json',
                  success: function(data){
                    var valid =data['valid'];
                    var id =data['id'];
                    if(valid == 0){
                        $('#mensaje').text('Ya existe un porcentaje de comisión con estos parametros (ID '+id+'), para poder crearla debe inactivar el registro indicado.');
                        $('#div_mensaje').show();
                        settings.submitting = false ;
                    }else{
                        //se envia el form
                        $('#buttons').hide();
                        form.submit();
                    }

                  }  
                });

             
            } else {
                settings = form.data('settings'),
                $.each(settings.attributes, function () {
                    $.fn.yiiactiveform.updateInput(this,messages,form); 
                });
                
                settings.submitting = false;
          }
      });
    });

    $('#CPtjVentas_TIPO').change(function() {
        hidemsg();
    });

    $('#CPtjVentas_PORCENTAJE').change(function() {
        hidemsg();
    });
});

function hidemsg(){
    $('#mensaje').text('');
    $('#div_mensaje').hide();
}

</script>

