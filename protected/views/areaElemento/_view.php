<?php
/* @var $this AreaElementoController */
/* @var $data AreaElemento */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_A_elemento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_A_elemento), array('view', 'id'=>$data->Id_A_elemento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Area')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Elemento')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Elemento); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Actualizacion); ?>
	<br />

	*/ ?>

</div>