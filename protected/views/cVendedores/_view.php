<?php
/* @var $this CVendedoresController */
/* @var $data CVendedores */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ROWID')); ?>:</b>
	<?php echo CHtml::encode($data->ROWID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIT_VENDEDOR')); ?>:</b>
	<?php echo CHtml::encode($data->NIT_VENDEDOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_VENDEDOR')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_VENDEDOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_VENDEDOR')); ?>:</b>
	<?php echo CHtml::encode($data->ID_VENDEDOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RECIBO')); ?>:</b>
	<?php echo CHtml::encode($data->RECIBO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RUTA')); ?>:</b>
	<?php echo CHtml::encode($data->RUTA); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->ESTADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_RUTA')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_RUTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PORTAFOLIO')); ?>:</b>
	<?php echo CHtml::encode($data->PORTAFOLIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIT_SUPERVISOR')); ?>:</b>
	<?php echo CHtml::encode($data->NIT_SUPERVISOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_SUPERVISOR')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_SUPERVISOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIPO')); ?>:</b>
	<?php echo CHtml::encode($data->TIPO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_USUARIO_ACTUALIZACION')); ?>:</b>
	<?php echo CHtml::encode($data->ID_USUARIO_ACTUALIZACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_ACTUALIZACION')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_ACTUALIZACION); ?>
	<br />

	*/ ?>

</div>