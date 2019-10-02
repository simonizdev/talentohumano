<?php
/* @var $this CAceleradorCmsController */
/* @var $model CAceleradorCms */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cacelerador-cms-form',
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
                    'name'=>'CAceleradorCms[TIPO]',
                    'id'=>'CAceleradorCms_TIPO',
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
            <?php echo $form->error($model,'ID_ACELERADOR', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'ID_ACELERADOR'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'CAceleradorCms[ID_ACELERADOR]',
                    'id'=>'CAceleradorCms_ID_ACELERADOR',
                    'data'=> $lista_aceler,
                    'value' => $model->ID_ACELERADOR,
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
     <div class="col-sm-8" id="div_item" style="display: none;">
        <div class="form-group">
            <?php echo $form->error($model,'ITEM', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'ITEM'); ?>
            <?php echo $form->textField($model,'ITEM'); ?>
            <?php
                $this->widget('ext.select2.ESelect2', array(
                    'selector' => '#CAceleradorCms_ITEM',
                    'options'  => array(
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'width' => '100%',
                        'language' => 'es',
                        'ajax' => array(
                            'url' => Yii::app()->createUrl('cAceleradorCms/SearchItem'),
                            'dataType'=>'json',
                            'data'=>'js:function(term){return{q: term};}',
                            'results'=>'js:function(data){ return {results:data};}'                   
                        ),
                        'formatNoMatches'=> 'js:function(){ clear_select2_ajax("CAceleradorCms_ITEM"); return "No se encontraron resultados"; }',
                        'formatInputTooShort' =>  'js:function(){ return "Digite más de 3 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'CAceleradorCms_ITEM\')\">Limpiar campo</button>"; }',
                        'initSelection'=>'js:function(element,callback) {
                            var id=$(element).val(); // read #selector value
                            if ( id !== "" ) {
                                $.ajax("'.Yii::app()->createUrl('cAceleradorCms/SearchItemById').'", {
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
    <div class="col-sm-4" id="div_plan" style="display: none;">
        <div class="form-group">
            <?php echo $form->error($model,'ID_PLAN', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'ID_PLAN'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'CAceleradorCms[ID_PLAN]',
                    'id'=>'CAceleradorCms_ID_PLAN',
                    'data'=>$lista_planes,
                    'value' => $model->ID_PLAN,
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
	<div class="col-sm-4" id="div_criterio" style="display: none;">
    	<div class="form-group">
    		<?php echo $form->error($model,'CRITERIO', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'CRITERIO'); ?>
	        <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'CAceleradorCms[CRITERIO]',
                    'id'=>'CAceleradorCms_CRITERIO',
                    'value' => $model->CRITERIO,
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
            <?php echo $form->error($model,'FECHA_INICIAL', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'FECHA_INICIAL'); ?>
		    <?php echo $form->textField($model,'FECHA_INICIAL', array('class' => 'form-control', 'readonly' => true)); ?>
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
    		<?php echo $form->error($model,'FECHA_FINAL', array('class' => 'pull-right badge bg-red')); ?>
      	     <?php echo $form->label($model,'FECHA_FINAL'); ?>
		    <?php echo $form->textField($model,'FECHA_FINAL', array('class' => 'form-control', 'readonly' => true)); ?>
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
    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=cAceleradorCms/admin'; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="button" class="btn btn-success" id="valida_form"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">

$(function() {

    $("#valida_form").click(function() {
        var form = $("#cacelerador-cms-form");
        var settings = form.data('settings') ;


        var valid = 1;
        var acelerador = $("#CAceleradorCms_ID_ACELERADOR").val();

        if(acelerador == ""){

            valid = 0;

        }else{
            if(acelerador == <?php echo Yii::app()->params->ac_item; ?>){
                
                var item = $("#CAceleradorCms_ITEM").val();

                if(item == ""){
                    $('#CAceleradorCms_ITEM_em_').html('Item no puede ser nulo.');
                    $('#CAceleradorCms_ITEM_em_').show();
                    valid = 0;
                }
            }

            if(acelerador == <?php echo Yii::app()->params->ac_criterio; ?>){

                var plan = $("#CAceleradorCms_ID_PLAN").val();
                var criterio = $("#CAceleradorCms_CRITERIO").val();

                if(plan == "" || criterio == ""){
                    
                    valid = 0;

                }
            }

            $('#CAceleradorCms_TIPO_em_').html();
            $('#CAceleradorCms_TIPO_em_').hide();
        }

        settings.submitting = true ;
        $.fn.yiiactiveform.validate(form, function(messages) {
            if($.isEmptyObject(messages) && valid == 1) {
                $.each(settings.attributes, function () {
                    $.fn.yiiactiveform.updateInput(this,messages,form); 
                });

                //var porc = $("#CAceleradorCms_PORCENTAJE").val();
                var fecha_inicial = $("#CAceleradorCms_FECHA_INICIAL").val();
                var fecha_final = $("#CAceleradorCms_FECHA_FINAL").val();
                var tipo = $("#CAceleradorCms_TIPO").val();

                if(acelerador == <?php echo Yii::app()->params->ac_item; ?>){
                    item = $("#CAceleradorCms_ITEM").val();
                    plan = 0
                    criterio = 0;
                }else{
                    item = 0;
                    plan = $("#CAceleradorCms_ID_PLAN").val();
                    criterio = $("#CAceleradorCms_CRITERIO").val();   
                }


                var data = {tipo: tipo, acelerador: acelerador, item: item, plan: plan, criterio: criterio, fecha_inicial: fecha_inicial, fecha_final: fecha_final}
                $.ajax({ 
                  type: "POST", 
                  url: "<?php echo Yii::app()->createUrl('cAceleradorCms/verifconfig'); ?>",
                  data: data,
                  dataType: 'json',
                  success: function(data){
                    var valid =data['valid'];
                    var id =data['id'];
                    if(valid == 0){
                        $('#mensaje').text('Ya existe una configuración con estos parametros (ID '+id+'), para poder crearla debe inactivar el registro indicado.');
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
                
                settings.submitting = false ;

                if(acelerador == ""){
                    $('#CAceleradorCms_TIPO_em_').html('Tipo no puede ser nulo.');
                    $('#CAceleradorCms_TIPO_em_').show();
                }else{
                    if(acelerador == <?php echo Yii::app()->params->ac_item; ?>){
                        
                        var item = $("#CAceleradorCms_ITEM").val();

                        if(item == ""){
                            $('#CAceleradorCms_ITEM_em_').html('Item no puede ser nulo.');
                            $('#CAceleradorCms_ITEM_em_').show();
                        }else{
                            $('#CAceleradorCms_ITEM_em_').html();
                            $('#CAceleradorCms_ITEM_em_').hide();
                        }
                    }

                    if(acelerador == <?php echo Yii::app()->params->ac_criterio; ?>){

                        var plan = $("#CAceleradorCms_ID_PLAN").val();
                        var criterio = $("#CAceleradorCms_CRITERIO").val();

                        if(plan == "" || criterio == ""){
                            
                            if(plan == ""){
                                $('#CAceleradorCms_ID_PLAN_em_').html('Plan no puede ser nulo.');
                                $('#CAceleradorCms_ID_PLAN_em_').show();
                            }else{
                                $('#CAceleradorCms_ID_PLAN_em_').html();
                                $('#CAceleradorCms_ID_PLAN_em_').hide();
                            }

                            if(criterio == ""){
                                $('#CAceleradorCms_CRITERIO_em_').html('Criterio no puede ser nulo.');
                                $('#CAceleradorCms_CRITERIO_em_').show();
                            }else{
                                $('#CAceleradorCms_CRITERIO_em_').html();
                                $('#CAceleradorCms_CRITERIO_em_').hide();
                            }

                        }else{
                            $('#CAceleradorCms_ID_PLAN_em_').html();
                            $('#CAceleradorCms_ID_PLAN_em_').hide();
                            $('#CAceleradorCms_CRITERIO_em_').html();
                            $('#CAceleradorCms_CRITERIO_em_').hide();
                        }
                    }

                    $('#CAceleradorCms_TIPO_em_').html();
                    $('#CAceleradorCms_TIPO_em_').hide();
                }
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

	$("#CAceleradorCms_FECHA_INICIAL").datepicker({
	  language: 'es',
	  autoclose: true,
	  orientation: "right bottom",
	}).on('changeDate', function (selected) {
       hidemsg();
	   var minDate = new Date(selected.date.valueOf());
	   $('#CAceleradorCms_FECHA_FINAL').datepicker('setStartDate', minDate);
	});

	$("#CAceleradorCms_FECHA_FINAL").datepicker({
	  language: 'es',
	  autoclose: true,
	  orientation: "right bottom",
	  startDate: '<?php echo $model->FECHA_INICIAL; ?>',
	}).on('changeDate', function (selected) {
       hidemsg();   
	   var maxDate = new Date(selected.date.valueOf());
	   $('#CAceleradorCms_FECHA_INICIAL').datepicker('setEndDate', maxDate);
	});



    $('#CAceleradorCms_ID_ACELERADOR').change(function() {
        viewfields($(this).val());
        hidemsg();
    });

    $('#CAceleradorCms_PORCENTAJE').change(function() {
        hidemsg();
    });

    $('#CAceleradorCms_ID_PLAN').change(function() {
        
        hidemsg();
        $("#CAceleradorCms_CRITERIO").html('');
        $("#CAceleradorCms_CRITERIO").append('<option value=""></option>');  

        if($(this).val() != ""){
            $('#div_criterio').show();
            loadcriterios($(this).val());
        }else{
            $('#div_criterio').hide();
        }
    });

});


function viewfields(acelerador){

    if(acelerador != ""){
        
        if(acelerador == <?php echo Yii::app()->params->ac_item; ?>){
            $('#div_item').show();  
            $('#div_plan').hide();
            $('#CAceleradorCms_ID_PLAN').val('').trigger('change');
            $('#div_criterio').hide(); 
            $("#CAceleradorCms_CRITERIO").html('');
            $("#CAceleradorCms_CRITERIO").append('<option value=""></option>');
            $('#CAceleradorCms_CRITERIO').val('').trigger('change');    
        }

        if(acelerador == <?php echo Yii::app()->params->ac_criterio; ?>){
            $('#div_item').hide();
            $('#CAceleradorCms_ITEM').val('').trigger('change');
            $('#s2id_CAceleradorCms_ITEM span').html("");
           
            $('#div_plan').show();

            $('#div_criterio').hide(); 
        }   
    }else{
        $('#div_item').hide();
        $('#CAceleradorCms_ITEM').val('').trigger('change');
        $('#s2id_CAceleradorCms_ITEM span').html("");
        $('#div_plan').hide();
        $('#CAceleradorCms_ID_PLAN').val('').trigger('change');
        $('#div_criterio').hide(); 
        $("#CAceleradorCms_CRITERIO").html('');
        $("#CAceleradorCms_CRITERIO").append('<option value=""></option>');
        $('#CAceleradorCms_CRITERIO').val('').trigger('change');  
    }

}

function loadcriterios(plan){

    
    var data = {plan: plan}
    $.ajax({ 
      type: "POST", 
      url: "<?php echo Yii::app()->createUrl('cAceleradorCms/loadcriterios'); ?>",
      data: data,
      dataType: 'json',
      success: function(data){ 
        var criterios = data;
        $("#CAceleradorCms_CRITERIO").html('');
        $("#CAceleradorCms_CRITERIO").append('<option value=""></option>');
        $('#CAceleradorCms_CRITERIO').val('').trigger('change');
        $.each(criterios, function(i,item){
            $("#CAceleradorCms_CRITERIO").append('<option value="'+criterios[i].id+'">'+criterios[i].text+'</option>');
        });

        $("#div_criterio").show();

      }  
    });

}

function clear_select2_ajax(id){
    $('#'+id+'').val('').trigger('change');
    $('#s2id_'+id+' span').html("");
    hidemsg();
}


function hidemsg(){
    $('#mensaje').text('');
    $('#div_mensaje').hide();
}



</script>