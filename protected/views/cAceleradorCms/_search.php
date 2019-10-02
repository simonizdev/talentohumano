<?php
/* @var $this CAceleradorCmsController */
/* @var $model CAceleradorCms */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	
	<p>Utilice los filtros para optimizar la busqueda:</p>

	<div class="row">
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'ROWID'); ?>
			    <?php echo $form->numberField($model,'ROWID', array('class' => 'form-control', 'autocomplete' => 'off', 'type' => 'number')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'TIPO'); ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'CAceleradorCms[TIPO]',
						'id'=>'CAceleradorCms_TIPO',
						'data'=> $lista_tipos,
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
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'ID_ACELERADOR'); ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'CAceleradorCms[ID_ACELERADOR]',
						'id'=>'CAceleradorCms_ID_ACELERADOR',
						'data'=> $lista_aceler,
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
		 <div class="col-sm-6">
	    	<div class="form-group">
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
	                        'formatInputTooShort' =>  'js:function(){ return "Digite más de 3 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'CAceleradorCms_ITEM\')\">Limpiar campo</button>"; }'
	                    ),
	                ));
	            ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'ID_PLAN'); ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'CAceleradorCms[ID_PLAN]',
						'id'=>'CAceleradorCms_ID_PLAN',
						'data'=>$lista_planes,
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
	    <div class="col-sm-3" id="div_criterio" style="display: none;">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'CRITERIO'); ?>
		        <?php
	                $this->widget('ext.select2.ESelect2',array(
	                    'name'=>'CAceleradorCms[CRITERIO]',
	                    'id'=>'CAceleradorCms_CRITERIO',
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
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'FECHA_INICIAL'); ?>
			    <?php echo $form->textField($model,'FECHA_INICIAL', array('class' => 'form-control datepicker', 'autocomplete' => 'off', 'readonly' => true)); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'FECHA_FINAL'); ?>
			    <?php echo $form->textField($model,'FECHA_FINAL', array('class' => 'form-control datepicker', 'autocomplete' => 'off', 'readonly' => true)); ?>
	        </div>
	    </div>
		<div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'PORCENTAJE'); ?>
			    <?php echo $form->numberField($model,'PORCENTAJE', array('class' => 'form-control', 'autocomplete' => 'off', 'step' => '0.01', 'min' => '0.01', 'placeholder' => '0,01')); ?>
	        </div>
	    </div>
    </div>
	<div class="row">
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'usuario_creacion'); ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'CAceleradorCms[usuario_creacion]',
						'id'=>'CAceleradorCms_usuario_creacion',
						'data'=>$lista_usuarios,
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
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'FECHA_CREACION'); ?>
			    <?php echo $form->textField($model,'FECHA_CREACION', array('class' => 'form-control datepicker', 'autocomplete' => 'off', 'readonly' => true)); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'usuario_actualizacion'); ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'CAceleradorCms[usuario_actualizacion]',
						'id'=>'CAceleradorCms_usuario_actualizacion',
						'data'=>$lista_usuarios,
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
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'FECHA_ACTUALIZACION'); ?>
			    <?php echo $form->textField($model,'FECHA_ACTUALIZACION', array('class' => 'form-control datepicker', 'autocomplete' => 'off', 'readonly' => true)); ?>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'ESTADO'); ?>
			    <?php $estados = Yii::app()->params->estados; ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'CAceleradorCms[ESTADO]',
						'id'=>'CAceleradorCms_ESTADO',
						'data'=>$estados,
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
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php 
					$this->widget('application.extensions.PageSize.PageSize', array(
				        'mGridId' => 'cacelerador-cms-grid', //Gridview id
				        'mPageSize' => @$_GET['pageSize'],
				        'mDefPageSize' => Yii::app()->params['defaultPageSize'],
				        'mPageSizeOptions'=>Yii::app()->params['pageSizeOptions'],// Optional, you can use with the widget default
					)); 
				?>	
	        </div>
	    </div>
	</div>
	<div class="btn-group" style="padding-bottom: 2%">
		<button type="button" class="btn btn-success" onclick="resetfields();"><i class="fa fa-eraser"></i> Limpiar filtros</button>
		<?php echo CHtml::submitButton('', array('style' => 'display:none;', 'id' => 'yt0')); ?>
		<button type="submit" class="btn btn-success" id="yt0"><i class="fa fa-search"></i> Buscar</button>
	</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">

	$(function() {
	
		$('#CAceleradorCms_ID_PLAN').change(function() {

			//hidemsg();
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
	}

	function resetfields(){
		$('#CAceleradorCms_ROWID').val('');
		$('#CAceleradorCms_TIPO').val('').trigger('change');
		$('#CAceleradorCms_ITEM').val('').trigger('change');
	    $('#s2id_CAceleradorCms_ITEM span').html("");
	    $('#CAceleradorCms_ID_PLAN').val('').trigger('change');
	    $('#CAceleradorCms_CRITERIO').val('').trigger('change');
	    $('#CAceleradorCms_FECHA_INICIAL').val('');
	    $('#CAceleradorCms_FECHA_FINAL').val('');
	    $('#CAceleradorCms_PORCENTAJE').val('');
	    $('#CAceleradorCms_usuario_creacion').val('').trigger('change');
		$('#CAceleradorCms_FECHA_CREACION').val('');
		$('#CAceleradorCms_usuario_actualizacion').val('').trigger('change');
		$('#CAceleradorCms_FECHA_ACTUALIZACION').val('');
		$('#CAceleradorCms_ESTADO').val('').trigger('change');
		$('#yt0').click();
	}
	
</script>

	
