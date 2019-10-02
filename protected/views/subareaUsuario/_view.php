<?php
/* @var $this SubareaUsuarioController */
/* @var $data SubareaUsuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_S_Usuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_S_Usuario), array('view', 'id'=>$data->Id_S_Usuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Subarea')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Subarea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php echo CHtml::encode($data->Estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Creacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Actualizacion); ?>
	<br />

	*/ ?>

</div>