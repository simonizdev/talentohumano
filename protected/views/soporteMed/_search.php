<?php
/* @var $this SoporteMedController */
/* @var $model SoporteMed */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id_Soporte'); ?>
		<?php echo $form->textField($model,'Id_Soporte'); ?>
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
		<?php echo $form->label($model,'Descripcion'); ?>
		<?php echo $form->textArea($model,'Descripcion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Soporte'); ?>
		<?php echo $form->textField($model,'Soporte',array('size'=>60,'maxlength'=>100)); ?>
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