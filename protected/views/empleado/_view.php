<?php
/* @var $this EmpleadoController */
/* @var $data Empleado */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Empleado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Empleado), array('view', 'id'=>$data->Id_Empleado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Empresa')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Empresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Banco')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Banco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_T_Cuenta')); ?>:</b>
	<?php echo CHtml::encode($data->Id_T_Cuenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Genero')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Genero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Cent_Costos')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Cent_Costos); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Usuario_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Usuario_Actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Apellido')); ?>:</b>
	<?php echo CHtml::encode($data->Apellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php echo CHtml::encode($data->Estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Num_Cuenta')); ?>:</b>
	<?php echo CHtml::encode($data->Num_Cuenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Direccion')); ?>:</b>
	<?php echo CHtml::encode($data->Direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Telefono')); ?>:</b>
	<?php echo CHtml::encode($data->Telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Correo')); ?>:</b>
	<?php echo CHtml::encode($data->Correo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Talla_Overol')); ?>:</b>
	<?php echo CHtml::encode($data->Talla_Overol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Talla_Camisa')); ?>:</b>
	<?php echo CHtml::encode($data->Talla_Camisa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Talla_Zapato')); ?>:</b>
	<?php echo CHtml::encode($data->Talla_Zapato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Talla_Pantalon')); ?>:</b>
	<?php echo CHtml::encode($data->Talla_Pantalon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Talla_Bata')); ?>:</b>
	<?php echo CHtml::encode($data->Talla_Bata); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Creacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Actualizacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Actualizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Nacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Nacimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Tipo_Ident')); ?>:</b>
	<?php echo CHtml::encode($data->Id_Tipo_Ident); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Identificacion')); ?>:</b>
	<?php echo CHtml::encode($data->Identificacion); ?>
	<br />

	*/ ?>

</div>