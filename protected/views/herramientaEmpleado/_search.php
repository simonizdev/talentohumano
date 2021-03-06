<?php
/* @var $this HerramientaEmpleadoController */
/* @var $model HerramientaEmpleado */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id_H_Empleado'); ?>
		<?php echo $form->textField($model,'Id_H_Empleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Contrato'); ?>
		<?php echo $form->textField($model,'Id_Contrato'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Empleado'); ?>
		<?php echo $form->textField($model,'Id_Empleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Herramienta'); ?>
		<?php echo $form->textField($model,'Id_Herramienta'); ?>
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
		<?php echo $form->label($model,'Fecha_Creacion'); ?>
		<?php echo $form->textField($model,'Fecha_Creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Actualizacion'); ?>
		<?php echo $form->textField($model,'Fecha_Actualizacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Estado'); ?>
		<?php echo $form->textField($model,'Estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->