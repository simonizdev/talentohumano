<?php
/* @var $this SubareaController */
/* @var $data Subarea */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Subarea')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Subarea), array('view', 'id'=>$data->Id_Subarea)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Subarea')); ?>:</b>
	<?php echo CHtml::encode($data->Subarea); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php echo CHtml::encode($data->Estado); ?>
	<br />


</div>