<?php
/* @var $this ElementoController */
/* @var $data Elemento */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Elemento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Elemento), array('view', 'id'=>$data->Id_Elemento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Tp_Elemento')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Tp_Elemento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Elemento')); ?>:</b>
	<?php echo CHtml::encode($data->Elemento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Actualizacion); ?>
	<br />


</div>