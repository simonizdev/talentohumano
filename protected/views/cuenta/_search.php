<?php
/* @var $this CuentaController */
/* @var $model Cuenta */
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
	          	<?php echo $form->label($model,'Id_Cuenta'); ?>
			    <?php echo $form->numberField($model,'Id_Cuenta', array('class' => 'form-control', 'autocomplete' => 'off', 'type' => 'number')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'Clasificacion'); ?>
			    <?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Cuenta[Clasificacion]',
						'id'=>'Cuenta_Clasificacion',
						'data'=>$lista_clases,
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
	          	<?php echo $form->label($model,'Cuenta_Usuario'); ?>
			    <?php echo $form->textField($model,'Cuenta_Usuario', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'Dominio'); ?>
			    <?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Cuenta[Dominio]',
						'id'=>'Cuenta_Dominio',
						'data'=>$lista_dominios,
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
	          	<?php echo $form->label($model,'Tipo_Cuenta'); ?>
			    <?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Cuenta[Tipo_Cuenta]',
						'id'=>'Cuenta_Tipo_Cuenta',
						'data'=>$lista_tipos,
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
	          	<?php echo $form->label($model,'Tipo_Acceso'); ?>
			    <?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Cuenta[Tipo_Acceso]',
						'id'=>'Cuenta_Tipo_Acceso',
						'data'=> array(1 => 'GENÉRICO', 2 => 'PERSONAL'),
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
						'name'=>'Cuenta[usuario_creacion]',
						'id'=>'Cuenta_usuario_creacion',
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
						'name'=>'Cuenta[usuario_actualizacion]',
						'id'=>'Cuenta_usuario_actualizacion',
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
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Cuenta[Estado]',
						'id'=>'Cuenta_Estado',
						'data'=>$lista_estados,
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
                	$array_orden = array(1 => 'ID ASC', 2 => 'ID DESC', 3 => 'Clasif. ASC', 4 => 'Clasif. DESC', 5 => 'Cuenta / Usuario ASC', 6 => 'Cuenta / Usuario DESC', 7 => 'Dominio ASC', 8 => 'Dominio DESC', 9 => 'Tipo de cuenta ASC', 10 => 'Tipo de cuenta DESC', 11 => 'Tipo de acceso ASC', 12 => 'Tipo de acceso DESC', 13 => 'Usuario que creo ASC', 14 => 'Usuario que creo DESC', 15 => 'Fecha de creación ASC', 16 => 'Fecha de creación DESC', 17 => 'Usuario que actualizó ASC', 18 => 'Usuario que actualizó DESC', 19 => 'Fecha de actualización ASC', 20 => 'Fecha de actualización DESC', 21 => 'Estado ASC', 22 => 'Estado DESC',
					);
            	?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Cuenta[orderby]',
						'id'=>'Cuenta_orderby',
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
				        'mGridId' => 'cuenta-grid', //Gridview id
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
		$('#Cuenta_Id_Cuenta').val('');
		$('#Cuenta_Clasificacion').val('').trigger('change');
		$('#Cuenta_Tipo_Acceso').val('').trigger('change');
		$('#Cuenta_Cuenta_Usuario').val('');
		$('#Cuenta_Dominio').val('').trigger('change');
		$('#Cuenta_Tipo_Cuenta').val('').trigger('change');
		$('#Cuenta_usuario_creacion').val('').trigger('change');
		$('#Cuenta_Fecha_Creacion').val('');
		$('#Cuenta_usuario_actualizacion').val('').trigger('change');
		$('#Cuenta_Fecha_Actualizacion').val('');
		$('#Cuenta_Estado').val('').trigger('change');
		$('#Cuenta_orderby').val('').trigger('change');
		$('#yt0').click();
	}
	
</script>
