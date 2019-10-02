<?php
/* @var $this CVendedoresController */
/* @var $model CVendedores */
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
	          	<?php echo $form->label($model,'ID'); ?>
			    <?php echo $form->numberField($model,'ID', array('class' => 'form-control', 'autocomplete' => 'off', 'type' => 'number')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'ROWID'); ?>
			    <?php echo $form->numberField($model,'ROWID', array('class' => 'form-control', 'autocomplete' => 'off', 'type' => 'number')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'NIT_VENDEDOR'); ?>
			    <?php echo $form->textField($model,'NIT_VENDEDOR', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'NOMBRE_VENDEDOR'); ?>
			    <?php echo $form->textField($model,'NOMBRE_VENDEDOR', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'EMAIL'); ?>
			    <?php echo $form->textField($model,'EMAIL', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'ID_VENDEDOR'); ?>
			    <?php echo $form->numberField($model,'ID_VENDEDOR', array('class' => 'form-control', 'autocomplete' => 'off', 'type' => 'number')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'RUTA'); ?>
			    <?php echo $form->textField($model,'RUTA', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'NOMBRE_RUTA'); ?>
			    <?php echo $form->textField($model,'NOMBRE_RUTA', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
	        </div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'TIPO'); ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'CVendedores[TIPO]',
						'id'=>'CVendedores_TIPO',
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
	          	<?php echo $form->label($model,'usuario_actualizacion'); ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'CVendedores[usuario_actualizacion]',
						'id'=>'CVendedores_usuario_actualizacion',
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
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'ESTADO'); ?>
			    <?php $estados = array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO') ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'CVendedores[ESTADO]',
						'id'=>'CVendedores_ESTADO',
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
	</div>
	<div class="row">
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php 
					$this->widget('application.extensions.PageSize.PageSize', array(
				        'mGridId' => 'cvendedores-grid', //Gridview id
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
		<button type="submit" class="btn btn-success" id="yt0"><i class="fa fa-search"></i> Buscar</button>
	</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">

	function resetfields(){
		$('#CVendedores_ID').val('');
		$('#CVendedores_ROWID').val('');
		$('#CVendedores_NIT_VENDEDOR').val('');
    	$('#CVendedores_NOMBRE_VENDEDOR').val('');
    	$('#CVendedores_ID_VENDEDOR').val('');
    	$('#CVendedores_RECIBO').val('');
    	$('#CVendedores_RUTA').val('');
    	$('#CVendedores_NOMBRE_RUTA').val('');
    	$('#CVendedores_NIT_SUPERVISOR').val('');
    	$('#CVendedores_NOMBRE_SUPERVISOR').val('');
		$('#CVendedores_TIPO').val('').trigger('change');
    	$('#CVendedores_usuario_actualizacion').val('').trigger('change');
		$('#CVendedores_FECHA_ACTUALIZACION').val('');
		$('#CVendedores_ESTADO').val('').trigger('change');
		$('#yt0').click();
	}
	
</script>