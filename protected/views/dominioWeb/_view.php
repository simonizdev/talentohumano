<?php
/* @var $this DominioWebController */
/* @var $data DominioWeb */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Dominio_Web')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Dominio_Web), array('view', 'id'=>$data->Id_Dominio_Web)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Link')); ?>:</b>
	<?php echo CHtml::encode($data->Link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Usuario')); ?>:</b>
	<?php echo CHtml::encode($data->Usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Password')); ?>:</b>
	<?php echo CHtml::encode($data->Password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Empresa_Administradora')); ?>:</b>
	<?php echo CHtml::encode($data->Empresa_Administradora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Contacto_Emp_Adm')); ?>:</b>
	<?php echo CHtml::encode($data->Contacto_Emp_Adm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Contratado_Por')); ?>:</b>
	<?php echo CHtml::encode($data->Contratado_Por); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Uso')); ?>:</b>
	<?php echo CHtml::encode($data->Uso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Activacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Activacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Vencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Vencimiento); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Actualizacion); ?>
	<br />

	*/ ?>

</div>