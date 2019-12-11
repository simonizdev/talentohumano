<?php
/* @var $this CuentaController */
/* @var $data Cuenta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Cuenta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Cuenta), array('view', 'id'=>$data->Id_Cuenta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Clasificacion')); ?>:</b>
	<?php echo CHtml::encode($data->Clasificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tipo_Cuenta')); ?>:</b>
	<?php echo CHtml::encode($data->Tipo_Cuenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tipo_Acceso')); ?>:</b>
	<?php echo CHtml::encode($data->Tipo_Acceso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cuenta_Usuario')); ?>:</b>
	<?php echo CHtml::encode($data->Cuenta_Usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Password')); ?>:</b>
	<?php echo CHtml::encode($data->Password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Dominio')); ?>:</b>
	<?php echo CHtml::encode($data->Dominio); ?>
	<br />

	<?php /*
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Actualizacion); ?>
	<br />

	*/ ?>

</div>