<?php
/* @var $this AnexoMedController */
/* @var $data AnexoMed */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Anexo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Anexo), array('view', 'id'=>$data->Id_Anexo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Empleado')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Empleado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Informacion_Adicional_Emp')); ?>:</b>
	<?php echo CHtml::encode($data->Informacion_Adicional_Emp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Contrato')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Contrato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Padecimiento_Actual')); ?>:</b>
	<?php echo CHtml::encode($data->Padecimiento_Actual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Motivo')); ?>:</b>
	<?php echo CHtml::encode($data->Motivo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Enfermedad_Actual')); ?>:</b>
	<?php echo CHtml::encode($data->Enfermedad_Actual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Alergia')); ?>:</b>
	<?php echo CHtml::encode($data->Alergia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Hallazgo')); ?>:</b>
	<?php echo CHtml::encode($data->Hallazgo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Diagnostico')); ?>:</b>
	<?php echo CHtml::encode($data->Diagnostico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Plan_Anexo')); ?>:</b>
	<?php echo CHtml::encode($data->Plan_Anexo); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Actualizacion); ?>
	<br />

	*/ ?>

</div>