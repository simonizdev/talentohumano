<?php
/* @var $this HerramientaController */
/* @var $model Herramienta */
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
	          	<?php echo $form->label($model,'Id_Herramienta'); ?>
			    <?php echo $form->numberField($model,'Id_Herramienta', array('class' => 'form-control', 'autocomplete' => 'off', 'type' => 'number')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'Nombre'); ?>
			    <?php echo $form->textField($model,'Nombre', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
	        </div>
	    </div>  
	</div>
	<div class="row">
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'usuario_creacion'); ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Herramienta[usuario_creacion]',
						'id'=>'Herramienta_usuario_creacion',
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
	          	<?php echo $form->label($model,'Fecha_Creacion'); ?>
			    <?php echo $form->textField($model,'Fecha_Creacion', array('class' => 'form-control datepicker', 'autocomplete' => 'off', 'readonly' => true)); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'usuario_actualizacion'); ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Herramienta[usuario_actualizacion]',
						'id'=>'Herramienta_usuario_actualizacion',
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
	          	<?php echo $form->label($model,'Fecha_Actualizacion'); ?>
			    <?php echo $form->textField($model,'Fecha_Actualizacion', array('class' => 'form-control datepicker', 'autocomplete' => 'off', 'readonly' => true)); ?>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'Estado'); ?>
			    <?php $estados = Yii::app()->params->estados; ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Herramienta[Estado]',
						'id'=>'Herramienta_Estado',
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
	          	<?php echo $form->label($model,'orderby'); ?>
			    <?php 
                	$array_orden = array(1 => 'ID ASC', 2 => 'ID DESC', 3 => 'Nombre ASC', 4 => 'Nombre DESC', 5 => 'Usuario que creo ASC', 6 => 'Usuario que creo DESC', 7 => 'Fecha de creación ASC', 8 => 'Fecha de creación DESC', 9 => 'Usuario que actualizó ASC', 10 => 'Usuario que actualizó DESC', 11 => 'Fecha de actualización ASC', 12 => 'Fecha de actualización DESC', 13 => 'Estado ASC', 14 => 'Estado DESC'
					);
            	?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Herramienta[orderby]',
						'id'=>'Herramienta_orderby',
						'data'=>$array_orden,
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
				        'mGridId' => 'herramienta-grid', //Gridview id
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
		$('#Herramienta_Id_Herramienta').val('');
		$('#Herramienta_Nombre').val('');
		$('#Herramienta_usuario_creacion').val('').trigger('change');
		$('#Herramienta_Fecha_Creacion').val('');
		$('#Herramienta_usuario_actualizacion').val('').trigger('change');
		$('#Herramienta_Fecha_Actualizacion').val('');
		$('#Herramienta_Estado').val('').trigger('change');
		$('#Herramienta_orderby').val('').trigger('change');
		$('#yt0').click();
	}
	
</script>
