<?php
/* @var $this HerramientaEmpleadoController */
/* @var $data HerramientaEmpleado */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_H_Empleado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_H_Empleado), array('view', 'id'=>$data->Id_H_Empleado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Contrato')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Contrato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Empleado')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Empleado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Herramienta')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Herramienta); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php echo CHtml::encode($data->Estado); ?>
	<br />

	*/ ?>

</div>