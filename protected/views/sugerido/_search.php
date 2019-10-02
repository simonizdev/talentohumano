<?php
/* @var $this SugeridoController */
/* @var $model Sugerido */
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
	          	<?php echo $form->label($model,'Id_Sugerido'); ?>
			    <?php echo $form->numberField($model,'Id_Sugerido', array('class' => 'form-control', 'autocomplete' => 'off', 'type' => 'number')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'cargo'); ?>
			    <?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Sugerido[cargo]',
						'id'=>'Sugerido_cargo',
						'data'=>$lista_cargos,
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
	          	<?php echo $form->label($model,'subarea'); ?>
			    <?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Sugerido[subarea]',
						'id'=>'Sugerido_subarea',
						'data'=>$lista_subareas,
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
	          	<?php echo $form->label($model,'area'); ?>
			    <?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Sugerido[area]',
						'id'=>'Sugerido_area',
						'data'=>$lista_areas,
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
	          	<?php echo $form->label($model,'usuario_creacion'); ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Sugerido[usuario_creacion]',
						'id'=>'Sugerido_usuario_creacion',
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
						'name'=>'Sugerido[usuario_actualizacion]',
						'id'=>'Sugerido_usuario_actualizacion',
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
						'name'=>'Sugerido[Estado]',
						'id'=>'Sugerido_Estado',
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
                	$array_orden = array(1 => 'ID ASC', 2 => 'ID DESC', 3 => 'Cargo ASC', 4 => 'Cargo DESC', 5 => 'Subárea ASC', 6 => 'Subárea DESC', 7 => 'Área ASC', 8 => 'Área DESC', 9 => 'Usuario que creo ASC', 10 => 'Usuario que creo DESC', 11 => 'Fecha de creación ASC', 12 => 'Fecha de creación DESC', 13 => 'Usuario que actualizó ASC', 14 => 'Usuario que actualizó DESC', 15 => 'Fecha de actualización ASC', 16 => 'Fecha de actualización DESC', 17 => 'Estado ASC', 18 => 'Estado DESC'
					);
            	?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Sugerido[orderby]',
						'id'=>'Sugerido_orderby',
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
				        'mGridId' => 'sugerido-grid', //Gridview id
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
		$('#Sugerido_Id_Sugerido').val('');
		$('#Sugerido_cargo').val('').trigger('change');
		$('#Sugerido_area').val('').trigger('change');
		$('#Sugerido_subarea').val('').trigger('change');
		$('#Sugerido_usuario_creacion').val('').trigger('change');
		$('#Sugerido_Fecha_Creacion').val('');
		$('#Sugerido_usuario_actualizacion').val('').trigger('change');
		$('#Sugerido_Fecha_Actualizacion').val('');
		$('#Sugerido_Estado').val('').trigger('change');
		$('#Sugerido_orderby').val('').trigger('change');
		$('#yt0').click();
	}
	
</script>
