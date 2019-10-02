<?php
/* @var $this TurnoEmpleadoController */
/* @var $data TurnoEmpleado */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_T_Empleado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_T_Empleado), array('view', 'id'=>$data->Id_T_Empleado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Turno')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Turno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Inicial')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Inicial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Final')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Empleado')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Empleado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Actualizacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Contrato')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Contrato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php echo CHtml::encode($data->Estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Actualizacion); ?>
	<br />

	*/ ?>

</div>