<?php
/* @var $this UnidadGerenciaController */
/* @var $data UnidadGerencia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Unidad_Gerencia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Unidad_Gerencia), array('view', 'id'=>$data->Id_Unidad_Gerencia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Unidad_Gerencia')); ?>:</b>
	<?php echo CHtml::encode($data->Unidad_Gerencia); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php echo CHtml::encode($data->Estado); ?>
	<br />


</div>