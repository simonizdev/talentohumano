<?php
/* @var $this CPtjRecaudosController */
/* @var $data CPtjRecaudos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ROWID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ROWID), array('view', 'id'=>$data->ROWID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIPO')); ?>:</b>
	<?php echo CHtml::encode($data->TIPO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DIA_INICIAL')); ?>:</b>
	<?php echo CHtml::encode($data->DIA_INICIAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DIA_FINAL')); ?>:</b>
	<?php echo CHtml::encode($data->DIA_FINAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PORCENTAJE')); ?>:</b>
	<?php echo CHtml::encode($data->PORCENTAJE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->ESTADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_USUARIO_CREACION')); ?>:</b>
	<?php echo CHtml::encode($data->ID_USUARIO_CREACION); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_CREACION')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_CREACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_USUARIO_ACTUALIZACION')); ?>:</b>
	<?php echo CHtml::encode($data->ID_USUARIO_ACTUALIZACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_ACTUALIZACION')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_ACTUALIZACION); ?>
	<br />

	*/ ?>

</div>