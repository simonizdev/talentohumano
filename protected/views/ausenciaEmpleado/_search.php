<?php
/* @var $this AusenciaController */
/* @var $model Ausencia */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id_Ausencia'); ?>
		<?php echo $form->textField($model,'Id_Ausencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Personal'); ?>
		<?php echo $form->textField($model,'Id_Personal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_M_Ausencia'); ?>
		<?php echo $form->textField($model,'Id_M_Ausencia'); ?>
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
		<?php echo $form->label($model,'Cod_Soporte'); ?>
		<?php echo $form->textField($model,'Cod_Soporte',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Descontar'); ?>
		<?php echo $form->checkBox($model,'Descontar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Descontar_FDS'); ?>
		<?php echo $form->checkBox($model,'Descontar_FDS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Dias'); ?>
		<?php echo $form->textField($model,'Dias'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Horas'); ?>
		<?php echo $form->textField($model,'Horas',array('size'=>3,'maxlength'=>3)); ?>
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
		<?php echo $form->label($model,'Observacion'); ?>
		<?php echo $form->textArea($model,'Observacion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Nota'); ?>
		<?php echo $form->textArea($model,'Nota',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Inicial'); ?>
		<?php echo $form->textField($model,'Fecha_Inicial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Final'); ?>
		<?php echo $form->textField($model,'Fecha_Final'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->