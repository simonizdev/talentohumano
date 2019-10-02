<?php
/* @var $this AusenciaController */
/* @var $data Ausencia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Ausencia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Ausencia), array('view', 'id'=>$data->Id_Ausencia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Personal')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Personal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_M_Ausencia')); ?>:</b>
	<?php echo CHtml::encode($data->Id_M_Ausencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cod_Soporte')); ?>:</b>
	<?php echo CHtml::encode($data->Cod_Soporte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descontar')); ?>:</b>
	<?php echo CHtml::encode($data->Descontar); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Descontar_FDS')); ?>:</b>
	<?php echo CHtml::encode($data->Descontar_FDS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Dias')); ?>:</b>
	<?php echo CHtml::encode($data->Dias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Horas')); ?>:</b>
	<?php echo CHtml::encode($data->Horas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Observacion')); ?>:</b>
	<?php echo CHtml::encode($data->Observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nota')); ?>:</b>
	<?php echo CHtml::encode($data->Nota); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Inicial')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Inicial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Final')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Final); ?>
	<br />

	*/ ?>

</div>