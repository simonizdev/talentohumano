<?php
/* @var $this ElementoSugeridoController */
/* @var $data ElementoSugerido */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_E_Sugerido')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_E_Sugerido), array('view', 'id'=>$data->Id_E_Sugerido)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Sugerido')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Sugerido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_A_Elemento')); ?>:</b>
	<?php echo CHtml::encode($data->Id_A_Elemento); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php echo CHtml::encode($data->Estado); ?>
	<br />

	*/ ?>

</div>