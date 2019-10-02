<?php
/* @var $this ElementoEmpleadoController */
/* @var $model ElementoEmpleado */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id_Elemento_Emp'); ?>
		<?php echo $form->textField($model,'Id_Elemento_Emp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_A_Elemento'); ?>
		<?php echo $form->textField($model,'Id_A_Elemento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cantidad'); ?>
		<?php echo $form->textField($model,'Cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Contrato'); ?>
		<?php echo $form->textField($model,'Id_Contrato'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Estado'); ?>
		<?php echo $form->checkBox($model,'Estado'); ?>
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

	<div class="row">
		<?php echo $form->label($model,'Id_Empleado'); ?>
		<?php echo $form->textField($model,'Id_Empleado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->