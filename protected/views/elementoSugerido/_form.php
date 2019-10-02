<?php
/* @var $this PromocionController */
/* @var $model Promocion */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'elemento-sugerido-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
));

?>


<div class="row">
	<div class="col-sm-8">
    	<div class="form-group">
    		<?php echo $form->error($model,'Id_Sugerido', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Id_Sugerido'); ?>

		    <?php echo $form->textField($model,'Id_Sugerido'); ?>
			<?php
			    $this->widget('ext.select2.ESelect2', array(
			        'selector' => '#ElementoSugerido_Id_Sugerido',
			        'options'  => array(
			        	'allowClear' => true,
			        	'minimumInputLength' => 5,
		               	'width' => '100%',
		               	'language' => 'es',
		                'ajax' => array(
	                        'url' => Yii::app()->createUrl('sugerido/SearchSug'),
			               	'dataType'=>'json',
	                    	'data'=>'js:function(term){return{q: term};}',
	                    	'results'=>'js:function(data){ return {results:data};}'                   
			            ),
		            	'formatNoMatches'=> 'js:function(){ clear_select2_ajax("ElementoSugerido_Id_Sugerido"); return "No se encontraron resultados"; }',
		            	'formatInputTooShort' =>  'js:function(){ return "Digite más de 5 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'ElementoSugerido_Id_Sugerido\')\">Limpiar campo</button>"; }',
		            	'initSelection'=>'js:function(element,callback) {
		                   	var id=$(element).val(); // read #selector value
		                   	if ( id !== "" ) {
		                     	$.ajax("'.Yii::app()->createUrl('sugerido/SearchSugById').'", {
		                       		data: { id: id },
		                       		dataType: "json"
		                     	}).done(function(data,textStatus, jqXHR) { callback(data[0]); });
		                   }
		                }',
		        	),
		      	));
		    ?>
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
    		<?php echo $form->error($model,'Cantidad', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Cantidad'); ?>
		    <?php echo $form->numberField($model,'Cantidad', array('class' => 'form-control', 'autocomplete' => 'off',  'step' => '1', 'min' => '1', 'max' => '10')); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            <?php echo $form->error($model,'Id_A_Elemento', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_A_Elemento'); ?>
			<?php echo $form->textField($model,'Id_A_Elemento'); ?>
			<?php
			    $this->widget('ext.select2.ESelect2', array(
			        'selector' => '#ElementoSugerido_Id_A_Elemento',
			        'options'  => array(
			        	'minimumInputLength' => 5,
		               	'width' => '100%',
		               	'language' => 'es',
		                'ajax' => array(
	                        'url' => Yii::app()->createUrl('areaElemento/SearchElem'),
			               	'dataType'=>'json',
	                    	'data'=>'js:function(term){return{q: term};}',
	                    	'results'=>'js:function(data){ return {results:data};}'                
			            ),
			            'formatNoMatches'=> 'js:function(){ clear_select2_ajax("ElementoSugerido_Id_A_Elemento"); return "No se encontraron resultados"; }',
			            'formatInputTooShort' =>  'js:function(){ return "Digite más de 5 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'ElementoSugerido_Id_A_Elemento\')\">Limpiar campo</button>"; }',
			            'initSelection'=>'js:function(element,callback) {
		                   	var id=$(element).val(); // read #selector value
		                   	if ( id !== "" ) {
		                     	$.ajax("'.Yii::app()->createUrl('areaElemento/SearchElemById').'", {
		                       		data: { id: id },
		                       		dataType: "json"
		                     	}).done(function(data,textStatus, jqXHR) { callback(data[0]); });
		                   }
		                }',
		        	),
		      	));
			    ?>
        </div>
    </div>
	<div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Estado', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Estado'); ?>
            <?php $estados = Yii::app()->params->estados; ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'ElementoSugerido[Estado]',
                    'id'=>'ElementoSugerido_Estado',
                    'data'=>$estados,
                    'value' => $model->Estado,
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

<div class="btn-group" style="padding-bottom: 2%">
    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=elementoSugerido/admin'; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="submit" class="btn btn-success" ><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">

function clear_select2_ajax(id){
	$('#'+id+'').val('').trigger('change');
	$('#s2id_'+id+' span').html("");
}

</script>