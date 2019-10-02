<?php
/* @var $this NovedadCorreoController */
/* @var $model NovedadCorreo */
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
	          	<?php echo $form->label($model,'Id_N_Cuenta'); ?>
			    <?php echo $form->numberField($model,'Id_N_Cuenta', array('class' => 'form-control', 'autocomplete' => 'off', 'type' => 'number')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'Id_Cuenta'); ?>
	            <?php echo $form->numberField($model,'Id_Cuenta', array('class' => 'form-control', 'autocomplete' => 'off', 'type' => 'number')); ?>
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
	          	<?php echo $form->label($model,'usuario_creacion'); ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'NovedadCuenta[usuario_creacion]',
						'id'=>'NovedadCuenta_usuario_creacion',
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
	</div>
	<div class="row">
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'orderby'); ?>
			    <?php 
                	$array_orden = array(1 => 'ID ASC', 2 => 'ID DESC', 3 => 'ID de cuenta ASC', 4 => 'ID de cuenta DESC', 5 => 'Usuario que creo ASC', 6 => 'Usuario que creo DESC', 7 => 'Fecha de creación ASC', 8 => 'Fecha de creación DESC'
					);
            	?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'NovedadCuenta[orderby]',
						'id'=>'NovedadCuenta_orderby',
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
				        'mGridId' => 'novedad-cuenta-grid', //Gridview id
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

	function clear_select2_ajax(id){
	    $('#'+id+'').val('').trigger('change');
	    $('#s2id_'+id+' span').html("");
	}

	function resetfields(){
		$('#NovedadCuenta_Id_N_Cuenta').val('');
		$('#NovedadCuenta_Id_Cuenta').val('').trigger('change');
    	$('#s2id_NovedadCuenta_Id_Cuenta span').html("");
    	$('#NovedadCuenta_Fecha_Creacion').val('');
    	$('#NovedadCuenta_usuario_creacion').val('').trigger('change');
    	$('#NovedadCuenta_orderby').val('').trigger('change');
		$('#yt0').click();
	}
	
</script>
