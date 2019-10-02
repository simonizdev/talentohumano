<?php
/* @var $this FormulaMedController */
/* @var $model FormulaMed */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'formula-med-form',
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
			<?php echo $form->error($model,'Formula_Medica', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Formula_Medica'); ?>
			<?php echo $form->textArea($model,'Formula_Medica',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>
</div>

<div class="btn-group" style="padding-bottom: 2%">
    <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=empleado/viewmed&id='.$e; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>

<?php $this->endWidget(); ?>

