<?php
/* @var $this NovedadCorreoController */
/* @var $data NovedadCorreo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_N_Correo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_N_Correo), array('view', 'id'=>$data->Id_N_Correo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Correo')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Correo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Novedades')); ?>:</b>
	<?php echo CHtml::encode($data->Novedades); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Creacion); ?>
	<br />


</div>