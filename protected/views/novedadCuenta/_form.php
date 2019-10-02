<?php
/* @var $this NovedadCorreoController */
/* @var $model NovedadCorreo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'novedad-correo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Id_Correo'); ?>
		<?php echo $form->textField($model,'Id_Correo'); ?>
		<?php echo $form->error($model,'Id_Correo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Novedades'); ?>
		<?php echo $form->textArea($model,'Novedades',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Novedades'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Id_Usuario_Creacion'); ?>
		<?php echo $form->textField($model,'Id_Usuario_Creacion'); ?>
		<?php echo $form->error($model,'Id_Usuario_Creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fecha_Creacion'); ?>
		<?php echo $form->textField($model,'Fecha_Creacion'); ?>
		<?php echo $form->error($model,'Fecha_Creacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->