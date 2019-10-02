<?php
/* @var $this CorreoController */
/* @var $data Correo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Correo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Correo), array('view', 'id'=>$data->Id_Correo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Empleado')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Empleado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tipo')); ?>:</b>
	<?php echo CHtml::encode($data->Tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cuenta_Correo')); ?>:</b>
	<?php echo CHtml::encode($data->Cuenta_Correo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Dominio')); ?>:</b>
	<?php echo CHtml::encode($data->Dominio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Password_Correo')); ?>:</b>
	<?php echo CHtml::encode($data->Password_Correo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cuenta_Skype')); ?>:</b>
	<?php echo CHtml::encode($data->Cuenta_Skype); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Password_Skype')); ?>:</b>
	<?php echo CHtml::encode($data->Password_Skype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cuenta_Correo_Red')); ?>:</b>
	<?php echo CHtml::encode($data->Cuenta_Correo_Red); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->Observaciones); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Actualización')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Actualización); ?>
	<br />

	*/ ?>

</div>