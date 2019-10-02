<?php
/* @var $this CarpCompController */
/* @var $model CarpComp */
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
	          	<?php echo $form->label($model,'Servidor'); ?>
			    <?php echo $form->textField($model,'Servidor', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'Carpeta'); ?>
			    <?php echo $form->textField($model,'Carpeta', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'Ruta'); ?>
			    <?php echo $form->textField($model,'Ruta', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'Tipo_Acceso'); ?>
            	<?php
	              	$this->widget('ext.select2.ESelect2',array(
						'name'=>'CarpComp[Tipo_Acceso]',
						'id'=>'CarpComp_Tipo_Acceso',
						'data'=> array(1 => 'GENÉRICO', 2 => 'PERSONAL'),
						'htmlOptions'=>array(
						),
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
	          	<?php echo $form->label($model,'Estado'); ?>
	          	<?php $estados = Yii::app()->params->estados; ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'CarpComp[Estado]',
						'id'=>'CarpComp_Estado',
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
                	$array_orden = array(1 => 'Servidor ASC', 2 => 'Servidor DESC', 3 => 'Carpeta ASC', 4 => 'Carpeta DESC', 5 => 'Ruta ASC', 6 => 'Ruta DESC', 7 => 'Tipo de acceso ASC', 8 => 'Tipo de acceso DESC', 9 => 'Estado ASC', 10 => 'Estado DESC');
            	?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'CarpComp[orderby]',
						'id'=>'CarpComp_orderby',
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
				        'mGridId' => 'carp-comp-grid', //Gridview id
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
		$('#CarpComp_Servidor').val('');
		$('#CarpComp_Carpeta').val('');
		$('#CarpComp_Ruta').val('');
		$('#CarpComp_Tipo_Acceso').val('').trigger('change');
		$('#CarpComp_Estado').val('').trigger('change');
		$('#CarpComp_Tipo_Acceso').val('').trigger('change');





		
		$('#Cuenta_Id_Empleado').val('').trigger('change');
    	$('#s2id_Cuenta_Id_Empleado span').html("");
    	$('#Cuenta_Tipo').val('').trigger('change');
    	$('#Cuenta_Dominio').val('').trigger('change');
    	$('#Cuenta_Cuenta_Correo').val('');
    	$('#Cuenta_Cuenta_Skype').val('');
    	$('#Cuenta_Usuario_Siesa').val('');
    	$('#Cuenta_Usuario_Glpi').val('');
    	$('#Cuenta_Usuario_Papercut').val('');
    	$('#Cuenta_Cuenta_Correo_Red').val('').trigger('change');
    	$('#s2id_Cuenta_Cuenta_Correo_Red span').html("");
    	$('#Cuenta_Estado').val('').trigger('change');
    	$('#Cuenta_orderby').val('').trigger('change');
		$('#yt0').click();
	}
	
</script>
