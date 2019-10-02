<?php
/* @var $this HistorialPersonalController */
/* @var $data HistorialPersonal */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Historial')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Historial), array('view', 'id'=>$data->Id_Historial)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Personal')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Personal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Cargo')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Cargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Area')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Empresa')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Empresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Retiro')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Retiro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Creacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Salario')); ?>:</b>
	<?php echo CHtml::encode($data->Salario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Liquidacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Liquidacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Retiro')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Retiro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Actualizacion); ?>
	<br />

	*/ ?>

</div>