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
	     <div class="col-sm-6">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'Tipo_Asociacion'); ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Cuenta[Tipo_Asociacion]',
						'id'=>'Cuenta_Tipo_Asociacion',
						'data'=>$lista_tipos_asoc,
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
	    <div class="col-sm-6">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'Id_Empleado'); ?>
	            <?php echo $form->textField($model,'Id_Empleado'); ?>
	            <?php
	                $this->widget('ext.select2.ESelect2', array(
	                    'selector' => '#Cuenta_Id_Empleado',
	                    'options'  => array(
	                        'allowClear' => true,
	                        'minimumInputLength' => 5,
	                        'width' => '100%',
	                        'language' => 'es',
	                        'ajax' => array(
	                            'url' => Yii::app()->createUrl('empleado/SearchEmpleado'),
	                            'dataType'=>'json',
	                            'data'=>'js:function(term){return{q: term};}',
	                            'results'=>'js:function(data){ return {results:data};}'                   
	                        ),
	                        'formatNoMatches'=> 'js:function(){ clear_select2_ajax("Cuenta_Id_Empleado"); return "No se encontraron resultados"; }',
	                        'formatInputTooShort' =>  'js:function(){ return "Digite más de 5 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'Cuenta_Id_Empleado\')\">Limpiar campo</button>"; }',
	                    ),
	                ));
	            ?>
	        </div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'Tipo'); ?>
            	<?php
            		$this->widget('ext.select2.ESelect2',array(
						'name'=>'Cuenta[Tipo]',
						'id'=>'Cuenta_Tipo',
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
	          	<?php echo $form->label($model,'Cuenta_Correo'); ?>
			    <?php echo $form->textField($model,'Cuenta_Correo', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
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
	    

	</div>
	<div class="row">
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'Usuario_Siesa'); ?>
			    <?php echo $form->textField($model,'Usuario_Siesa', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
	        </div>
	    </div>
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'Cuenta_Skype'); ?>
			    <?php echo $form->textField($model,'Cuenta_Skype', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
	        </div>
	    </div>
	   	<div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'Usuario_Glpi'); ?>
			    <?php echo $form->textField($model,'Usuario_Glpi', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
	        </div>
	    </div> 
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'Usuario_Papercut'); ?>
			    <?php echo $form->textField($model,'Usuario_Papercut', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
	        </div>
	    </div> 
	</div>
	<div class="row">    
	    <div class="col-sm-6">
	    	<div class="form-group">
	          	 <?php echo $form->label($model,'Cuenta_Correo_Red'); ?>
	            <?php echo $form->textField($model,'Cuenta_Correo_Red'); ?>
	            <?php
	                $this->widget('ext.select2.ESelect2', array(
	                    'selector' => '#Cuenta_Cuenta_Correo_Red',
	                    'options'  => array(
	                        'allowClear' => true,
	                        'minimumInputLength' => 3,
	                        'width' => '100%',
	                        'language' => 'es',
	                        'ajax' => array(
	                            'url' => Yii::app()->createUrl('cuenta/SearchCorreo'),
	                            'dataType'=>'json',
	                            'data'=>'js:function(term){return{q: term, id: 0};}',
	                            'results'=>'js:function(data){ return {results:data};}'                   
	                        ),
	                        'formatNoMatches'=> 'js:function(){ clear_select2_ajax("Cuenta_Cuenta_Correo_Red"); return "No se encontraron resultados"; }',
	                        'formatInputTooShort' =>  'js:function(){ return "Digite más de 3 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'Cuenta_Cuenta_Correo_Red\')\">Limpiar campo</button>"; }',
	                    ),
	                ));
	            ?>
	        </div>
	    </div>
	    <div class="col-sm-6">
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
	</div>
	<div class="row">
		<div class="col-sm-4">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'orderby'); ?>
			    <?php 
                	$array_orden = array(1 => 'ID ASC', 2 => 'ID DESC', 3 => 'Tipo de asociación ASC', 4 => 'Tipo de asociación DESC', 5 => 'Empleado ASC', 6 => 'Empleado DESC', 7 => 'Tipo de cuenta ASC', 8 => 'Tipo de cuenta DESC', 9 => 'Dominio ASC', 10 => 'Dominio DESC', 11 => 'Cuenta de correo ASC', 12 => 'Cuenta de correo DESC',  13 => 'Cuenta de skype ASC', 14 => 'Cuenta de skype DESC', 15 => 'Usuario siesa ASC', 16 => 'Usuario siesa DESC', 17 => 'Usuario glpi ASC', 18 => 'Usuario glpi DESC', 19 => 'Usuario glpi ASC', 20 => 'Usuario glpi DESC', 21 => 'Cuenta de correo para redirección ASC', 22 => 'Cuenta de correo para redirección DESC', 23 => 'Estado ASC', 24 => 'Estado DESC'
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
		<button type="submit" class="btn btn-success" id="yt0"><i class="fa fa-search"></i> Buscar</button>
	</div>
	
<?php $this->endWidget(); ?>

<script type="text/javascript">

	function clear_select2_ajax(id){
	    $('#'+id+'').val('').trigger('change');
	    $('#s2id_'+id+' span').html("");
	}

	function resetfields(){
		$('#Cuenta_Id_Cuenta').val('');
		$('#Cuenta_Tipo_Asociacion').val('').trigger('change');
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

