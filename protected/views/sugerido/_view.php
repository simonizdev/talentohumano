<?php
/* @var $this SugeridoController */
/* @var $data Sugerido */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Sugerido')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Sugerido), array('view', 'id'=>$data->Id_Sugerido)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Cargo')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Cargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Area')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sugerido')); ?>:</b>
	<?php echo CHtml::encode($data->Sugerido); ?>
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