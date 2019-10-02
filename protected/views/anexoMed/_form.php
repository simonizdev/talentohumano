<?php
/* @var $this AnexoMedController */
/* @var $model AnexoMed */
/* @var $form CActiveForm */
?>

<?php
/* @var $this AnexoMedController */
/* @var $model AnexoMed */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'anexo-med-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'Id_Empleado'); ?>
            <?php echo '<p>'.UtilidadesEmpleado::nombreempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
          	<label>Tipo de identificación</label>
          	<?php echo '<p>'.UtilidadesEmpleado::tipoidentificacionempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
          	<label># de identificación</label>
          	<?php echo '<p>'.UtilidadesEmpleado::identificacionempleado($e).'</p>'; ?> 
        </div>
    </div>
</div>
<div class="row">
	<div class="col-sm-4">
        <div class="form-group">
            <label>Fecha de nacimiento</label>
            <?php echo '<p>'.UtilidadesEmpleado::fechanacimientoempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Edad</label>
            <?php echo '<p>'.UtilidadesEmpleado::edadempleado($e).'</p>'; ?> 
        </div>
    </div>
</div>
<div class="row">
	<div class="col-sm-4">
        <div class="form-group">
            <label>Fecha ingreso</label>
            <?php echo '<p>'.UtilidadesEmpleado::fechaingresoempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
          	<label>Área</label>
          	<?php echo '<p>'.UtilidadesEmpleado::areaactualempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
          	<label>Cargo</label>
          	<?php echo '<p>'.UtilidadesEmpleado::cargoactualempleado($e).'</p>'; ?> 
        </div>
    </div>
</div>
<div class="row">
  	<div class="col-sm-4">
	    <div class="form-group">
	      	<?php echo $form->error($model,'Fecha', array('class' => 'pull-right badge bg-red')); ?>
	        <?php echo $form->label($model,'Fecha'); ?>
	        <?php echo $form->textField($model,'Fecha', array('class' => 'form-control', 'readonly' => true, 'value' => date('Y-m-d'))); ?>
	    </div>
  	</div>
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Informacion_Adicional_Emp', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Informacion_Adicional_Emp'); ?>
			<?php echo $form->textField($model,'Informacion_Adicional_Emp', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Padecimiento_Actual', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Padecimiento_Actual'); ?>
			<?php echo $form->textArea($model,'Padecimiento_Actual',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>    
</div>
<div class="row">
  	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Motivo', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Motivo'); ?>
			<?php echo $form->textArea($model,'Motivo',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Enfermedad_Actual', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Enfermedad_Actual'); ?>
			<?php echo $form->textArea($model,'Enfermedad_Actual',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Alergia', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Alergia'); ?>
			<?php echo $form->textArea($model,'Alergia',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>    
</div>
<div class="row">
  	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Hallazgo', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Hallazgo'); ?>
			<?php echo $form->textArea($model,'Hallazgo',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>
 	<div class="col-sm-8">
        <div class="form-group">
            <?php echo $form->error($model,'Diagnostico', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Diagnostico'); ?>

            <?php echo $form->textField($model,'Diagnostico'); ?>
            <?php
                $this->widget('ext.select2.ESelect2', array(
                    'selector' => '#AnexoMed_Diagnostico',
                    'options'  => array(
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'width' => '100%',
                        'language' => 'es',
                        'ajax' => array(
                            'url' => Yii::app()->createUrl('dominioMedico/SearchCie10'),
                            'dataType'=>'json',
                            'data'=>'js:function(term){return{q: term};}',
                            'results'=>'js:function(data){ return {results:data};}'                   
                        ),
                        'formatNoMatches'=> 'js:function(){ clear_select2_ajax("AnexoMed_Diagnostico"); return "No se encontraron resultados"; }',
                        'formatInputTooShort' =>  'js:function(){ return "Digite más de 3 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'AnexoMed_Diagnostico\')\">Limpiar campo</button>"; }',
                    ),
                ));
            ?>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Plan_Anexo', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Plan_Anexo'); ?>
			<?php echo $form->textArea($model,'Plan_Anexo',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>    
</div>

<div class="btn-group" style="padding-bottom: 2%">
    <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=empleado/viewmed&id='.$e; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>

<?php $this->endWidget(); ?>


<script type="text/javascript">

function clear_select2_ajax(id){
    $('#'+id+'').val('').trigger('change');
    $('#s2id_'+id+' span').html("");
}

</script>