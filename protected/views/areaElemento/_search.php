<?php
/* @var $this AreaElementoController */
/* @var $model AreaElemento */
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
	          	<?php echo $form->label($model,'Id_A_elemento'); ?>
			    <?php echo $form->numberField($model,'Id_A_elemento', array('class' => 'form-control', 'autocomplete' => 'off', 'type' => 'number')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'elemento'); ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'AreaElemento[elemento]',
						'id'=>'AreaElemento_elemento',
						'data'=>$lista_elementos,
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
						'name'=>'AreaElemento[subarea]',
						'id'=>'AreaElemento_subarea',
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
						'name'=>'AreaElemento[area]',
						'id'=>'AreaElemento_area',
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
						'name'=>'AreaElemento[usuario_creacion]',
						'id'=>'AreaElemento_usuario_creacion',
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
						'name'=>'AreaElemento[usuario_actualizacion]',
						'id'=>'AreaElemento_usuario_actualizacion',
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
						'name'=>'AreaElemento[Estado]',
						'id'=>'AreaElemento_Estado',
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
                	$array_orden = array(1 => 'ID ASC', 2 => 'ID DESC', 3 => 'Elemento ASC', 4 => 'Elemento DESC', 5 => 'Subárea ASC', 6 => 'Subárea DESC', 7 => 'Área ASC', 8 => 'Área DESC', 9 => 'Usuario que creo ASC', 10 => 'Usuario que creo DESC', 11 => 'Fecha de creación ASC', 12 => 'Fecha de creación DESC', 13 => 'Usuario que actualizó ASC', 14 => 'Usuario que actualizó DESC', 15 => 'Fecha de actualización ASC', 16 => 'Fecha de actualización DESC', 17 => 'Estado ASC', 18 => 'Estado DESC',
                	);
            	?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'AreaElemento[orderby]',
						'id'=>'AreaElemento_orderby',
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
					        'mGridId' => 'area-elemento-grid', //Gridview id
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
		$('#AreaElemento_Id_A_elemento').val('');
		$('#AreaElemento_elemento').val('').trigger('change');
		$('#AreaElemento_area').val('').trigger('change');
		$('#AreaElemento_subarea').val('').trigger('change');
		$('#AreaElemento_usuario_creacion').val('').trigger('change');
		$('#AreaElemento_Fecha_Creacion').val('');
		$('#AreaElemento_usuario_actualizacion').val('').trigger('change');
		$('#AreaElemento_Fecha_Actualizacion').val('');
		$('#AreaElemento_Estado').val('').trigger('change');
		$('#AreaElemento_orderby').val('').trigger('change');
		$('#yt0').click();
	}
	
</script>
