<?php
/* @var $this HistorialPersonalController */
/* @var $model HistorialPersonal */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id_Historial'); ?>
		<?php echo $form->textField($model,'Id_Historial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Personal'); ?>
		<?php echo $form->textField($model,'Id_Personal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Cargo'); ?>
		<?php echo $form->textField($model,'Id_Cargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Area'); ?>
		<?php echo $form->textField($model,'Id_Area'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Empresa'); ?>
		<?php echo $form->textField($model,'Id_Empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Retiro'); ?>
		<?php echo $form->textField($model,'Id_Retiro'); ?>
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
		<?php echo $form->label($model,'Salario'); ?>
		<?php echo $form->textField($model,'Salario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Ingreso'); ?>
		<?php echo $form->textField($model,'Fecha_Ingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Liquidacion'); ?>
		<?php echo $form->textField($model,'Fecha_Liquidacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Retiro'); ?>
		<?php echo $form->textField($model,'Fecha_Retiro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Creacion'); ?>
		<?php echo $form->textField($model,'Fecha_Creacion'); ?>
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