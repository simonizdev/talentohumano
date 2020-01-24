<?php
/* @var $this ExtController */
/* @var $data Ext */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Ext')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Ext), array('view', 'id'=>$data->Id_Ext)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ubicacion')); ?>:</b>
	<?php echo CHtml::encode($data->Ubicacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Contacto')); ?>:</b>
	<?php echo CHtml::encode($data->Contacto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ext')); ?>:</b>
	<?php echo CHtml::encode($data->Ext); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php echo CHtml::encode($data->Estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Actualizacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Actualizacion); ?>
	<br />

	*/ ?>

</div>