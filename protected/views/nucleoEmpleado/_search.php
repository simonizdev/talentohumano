<?php
/* @var $this NucleoEmpleadoController */
/* @var $model NucleoEmpleado */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id_Nucleo'); ?>
		<?php echo $form->textField($model,'Id_Nucleo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Empleado'); ?>
		<?php echo $form->textField($model,'Id_Empleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Genero'); ?>
		<?php echo $form->textField($model,'Id_Genero'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Usuario_Creacion'); ?>
		<?php echo $form->textField($model,'Id_Usuario_Creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Usuario_Actualizacion'); ?>
		<?php echo $form->textField($model,'Id_Usuario_Actualizacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Apellido'); ?>
		<?php echo $form->textField($model,'Apellido',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Creacion'); ?>
		<?php echo $form->textField($model,'Fecha_Creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Actualizacion'); ?>
		<?php echo $form->textField($model,'Fecha_Actualizacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Nacimiento'); ?>
		<?php echo $form->textField($model,'Fecha_Nacimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Parentesco'); ?>
		<?php echo $form->textField($model,'Id_Parentesco'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->