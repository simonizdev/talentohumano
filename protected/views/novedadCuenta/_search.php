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
		<div class="col-sm-6">
	        <div class="form-group">
	        	<?php echo $form->error($model,'Id_Cuenta', array('class' => 'pull-right badge bg-red')); ?>
	    		<?php echo $form->label($model,'Id_Cuenta'); ?>
	            <?php echo $form->textField($model,'Id_Cuenta'); ?>
	            <?php
	                $this->widget('ext.select2.ESelect2', array(
	                    'selector' => '#NovedadCuenta_Id_Cuenta',
	                    'options'  => array(
	                        'allowClear' => true,
	                        'minimumInputLength' => 3,
	                        'width' => '100%',
	                        'language' => 'es',
	                        'ajax' => array(
	                            'url' => Yii::app()->createUrl('novedadcuenta/SearchCuenta'),
	                            'dataType'=>'json',
	                            'data'=>'js:function(term){return{q: term};}',
	                            'results'=>'js:function(data){ return {results:data};}'                   
	                        ),
	                        'formatNoMatches'=> 'js:function(){ clear_select2_ajax("NovedadCuenta_Id_Cuenta"); return "No se encontraron resultados"; }',
	                        'formatInputTooShort' =>  'js:function(){ return "Digite más de 3 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'NovedadCuenta_Id_Cuenta\')\">Limpiar campo</button>"; }',
	                    ),
	                ));
	            ?>
	        </div>
	    </div>
	</div>
	<div class="row">
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
	    <div class="col-sm-3">
	    	<div class="form-group">
	          	<?php echo $form->label($model,'orderby'); ?>
			    <?php 
                	$array_orden = array(1 => 'Usuario que creo ASC', 2 => 'Usuario que creo DESC', 3 => 'Fecha de creación ASC', 4 => 'Fecha de creación DESC'
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
		$('#NovedadCuenta_Id_Cuenta').val('').trigger('change');
    	$('#s2id_NovedadCuenta_Id_Cuenta span').html("");
    	$('#NovedadCuenta_Fecha_Creacion').val('');
    	$('#NovedadCuenta_usuario_creacion').val('').trigger('change');
    	$('#NovedadCuenta_orderby').val('').trigger('change');
		$('#yt0').click();
	}
	
</script>
