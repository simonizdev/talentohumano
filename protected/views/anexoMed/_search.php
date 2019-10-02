<?php
/* @var $this AnexoMedController */
/* @var $model AnexoMed */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id_Anexo'); ?>
		<?php echo $form->textField($model,'Id_Anexo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Empleado'); ?>
		<?php echo $form->textField($model,'Id_Empleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Informacion_Adicional_Emp'); ?>
		<?php echo $form->textArea($model,'Informacion_Adicional_Emp',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Contrato'); ?>
		<?php echo $form->textField($model,'Id_Contrato'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha'); ?>
		<?php echo $form->textField($model,'Fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Padecimiento_Actual'); ?>
		<?php echo $form->textArea($model,'Padecimiento_Actual',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Motivo'); ?>
		<?php echo $form->textArea($model,'Motivo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Enfermedad_Actual'); ?>
		<?php echo $form->textArea($model,'Enfermedad_Actual',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Alergia'); ?>
		<?php echo $form->textArea($model,'Alergia',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Hallazgo'); ?>
		<?php echo $form->textArea($model,'Hallazgo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Diagnostico'); ?>
		<?php echo $form->textField($model,'Diagnostico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Plan_Anexo'); ?>
		<?php echo $form->textArea($model,'Plan_Anexo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Usuario_Creacion'); ?>
		<?php echo $form->textField($model,'Id_Usuario_Creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Creacion'); ?>
		<?php echo $form->textField($model,'Fecha_Creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Usuario_Actualizacion'); ?>
		<?php echo $form->textField($model,'Id_Usuario_Actualizacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Actualizacion'); ?>
		<?php echo $form->textField($model,'Fecha_Actualizacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->