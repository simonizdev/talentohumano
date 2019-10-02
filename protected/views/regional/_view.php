<?php
/* @var $this RegionalController */
/* @var $data Regional */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Regional')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Regional), array('view', 'id'=>$data->Id_Regional)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Regional')); ?>:</b>
	<?php echo CHtml::encode($data->Regional); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Actualizacion); ?>
	<br />


</div>