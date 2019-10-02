<?php
/* @var $this TurnoTrabajoController */
/* @var $data TurnoTrabajo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Turno_Trabajo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Turno_Trabajo), array('view', 'id'=>$data->Id_Turno_Trabajo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rango_Dias1')); ?>:</b>
	<?php echo CHtml::encode($data->Rango_Dias1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Entrada1')); ?>:</b>
	<?php echo CHtml::encode($data->Entrada1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Salida1')); ?>:</b>
	<?php echo CHtml::encode($data->Salida1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rango_Dias2')); ?>:</b>
	<?php echo CHtml::encode($data->Rango_Dias2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Entrada2')); ?>:</b>
	<?php echo CHtml::encode($data->Entrada2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Salida2')); ?>:</b>
	<?php echo CHtml::encode($data->Salida2); ?>
	<br />

	<?php /*
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

	*/ ?>

</div>