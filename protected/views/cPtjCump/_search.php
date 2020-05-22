<?php
/* @var $this CPtjCumpController */
/* @var $model CPtjCump */
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
						'name'=>'CPtjCump[TIPO]',
						'id'=>'CPtjCump_TIPO',
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
		<div class="col-sm-2">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'PORCENTAJE'); ?>
			    <?php echo $form->numberField($model,'PORCENTAJE', array('class' => 'form-control', 'autocomplete' => 'off', 'step' => '0.01', 'min' => '0.01', 'placeholder' => '0,01')); ?>
	        </div>
	    </div>
	    <div class="col-sm-2">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'CUM_INICIAL'); ?>
			    <?php echo $form->numberField($model,'CUM_INICIAL', array('class' => 'form-control', 'autocomplete' => 'off', 'step' => '0.01', 'min' => '0.01', 'placeholder' => '0,01')); ?>
	        </div>
	    </div>
	    <div class="col-sm-2">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'CUM_FINAL'); ?>
			    <?php echo $form->numberField($model,'CUM_FINAL', array('class' => 'form-control', 'autocomplete' => 'off', 'step' => '0.01', 'min' => '0.01', 'placeholder' => '0,01')); ?>
	        </div>
	    </div>
    </div>
	<div class="row">
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'usuario_creacion'); ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'CPtjCump[usuario_creacion]',
						'id'=>'CPtjCump_usuario_creacion',
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
						'name'=>'CPtjCump[usuario_actualizacion]',
						'id'=>'CPtjCump_usuario_actualizacion',
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
						'name'=>'CPtjCump[ESTADO]',
						'id'=>'CPtjCump_ESTADO',
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
				        'mGridId' => 'cptj-cump-grid', //Gridview id
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

	function resetfields(){
		$('#CPtjCump_ROWID').val('');
		$('#CPtjCump_TIPO').val('').trigger('change');
	    $('#CPtjCump_PORCENTAJE').val('');
    	$('#CPtjCump_CUM_INICIAL').val('');
    	$('#CPtjCump_CUM_FINAL').val('');
	    $('#CPtjCump_usuario_creacion').val('').trigger('change');
		$('#CPtjCump_FECHA_CREACION').val('');
		$('#CPtjCump_usuario_actualizacion').val('').trigger('change');
		$('#CPtjCump_FECHA_ACTUALIZACION').val('');
		$('#CPtjCump_ESTADO').val('').trigger('change');
		$('#yt0').click();
	}
	
</script>