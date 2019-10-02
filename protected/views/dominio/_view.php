<?php
/* @var $this DominioController */
/* @var $data Dominio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Dominio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Dominio), array('view', 'id'=>$data->Id_Dominio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Padre')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Padre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Dominio')); ?>:</b>
	<?php echo CHtml::encode($data->Dominio); ?>
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