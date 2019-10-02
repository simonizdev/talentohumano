<?php
/* @var $this HcoMedController */
/* @var $data HcoMed */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_Hco')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id_Hco), array('view', 'id'=>$data->Id_Hco)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tipo_Examen')); ?>:</b>
	<?php echo CHtml::encode($data->Tipo_Examen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Reubicacion')); ?>:</b>
	<?php echo CHtml::encode($data->Reubicacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Funciones_Principales')); ?>:</b>
	<?php echo CHtml::encode($data->Funciones_Principales); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Lab_Empresa_1')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Lab_Empresa_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Lab_Area_1')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Lab_Area_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Lab_Cargo_1')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Lab_Cargo_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Lab_Tiempo_1')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Lab_Tiempo_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Lab_Empresa_2')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Lab_Empresa_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Lab_Area_2')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Lab_Area_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Lab_Cargo_2')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Lab_Cargo_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Lab_Tiempo_2')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Lab_Tiempo_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Lab_Empresa_3')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Lab_Empresa_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Lab_Area_3')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Lab_Area_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Lab_Cargo_3')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Lab_Cargo_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tipo_Riesgo')); ?>:</b>
	<?php echo CHtml::encode($data->Tipo_Riesgo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Riesgo')); ?>:</b>
	<?php echo CHtml::encode($data->Riesgo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Per_Patologico')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Per_Patologico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Per_Quirurgico')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Per_Quirurgico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Per_Traumatologico')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Per_Traumatologico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Per_Inmunologico')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Per_Inmunologico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Per_Habito')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Per_Habito); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sig_Vit_Talla')); ?>:</b>
	<?php echo CHtml::encode($data->Sig_Vit_Talla); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sig_Vit_Peso')); ?>:</b>
	<?php echo CHtml::encode($data->Sig_Vit_Peso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sig_Vit_Imc')); ?>:</b>
	<?php echo CHtml::encode($data->Sig_Vit_Imc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sig_Vit_Perimetro_Abdominal')); ?>:</b>
	<?php echo CHtml::encode($data->Sig_Vit_Perimetro_Abdominal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sig_Vit_Pulso')); ?>:</b>
	<?php echo CHtml::encode($data->Sig_Vit_Pulso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sig_Vit_Frecuencia_Respiratoria')); ?>:</b>
	<?php echo CHtml::encode($data->Sig_Vit_Frecuencia_Respiratoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sig_Vit_Saturacion_Oxigeno')); ?>:</b>
	<?php echo CHtml::encode($data->Sig_Vit_Saturacion_Oxigeno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sig_Vit_Temperatura')); ?>:</b>
	<?php echo CHtml::encode($data->Sig_Vit_Temperatura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sig_Vit_Presion_Arterial')); ?>:</b>
	<?php echo CHtml::encode($data->Sig_Vit_Presion_Arterial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Piel')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Piel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Cabeza')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Cabeza); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Ojos')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Ojos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Oidos')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Oidos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Nariz')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Nariz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Boca')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Boca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Piezas_Dentales')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Piezas_Dentales); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Estado_Piezas_Dentales')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Estado_Piezas_Dentales); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Cuello')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Cuello); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Respiratorio')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Respiratorio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Cardiaco')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Cardiaco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Abdomen')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Abdomen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Miembros_Superiores')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Miembros_Superiores); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Genito_Urinario')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Genito_Urinario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Miembros_Inferiores')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Miembros_Inferiores); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sis_Columna_Vertebral')); ?>:</b>
	<?php echo CHtml::encode($data->Sis_Columna_Vertebral); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Dolor')); ?>:</b>
	<?php echo CHtml::encode($data->Dolor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Deformidad_Cong_Adq_Der')); ?>:</b>
	<?php echo CHtml::encode($data->Deformidad_Cong_Adq_Der); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Deformidad_Cong_Adq_Iqz')); ?>:</b>
	<?php echo CHtml::encode($data->Deformidad_Cong_Adq_Iqz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Protuberancia_Der')); ?>:</b>
	<?php echo CHtml::encode($data->Protuberancia_Der); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Protuberancia_Izq')); ?>:</b>
	<?php echo CHtml::encode($data->Protuberancia_Izq); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ant_Traumatico')); ?>:</b>
	<?php echo CHtml::encode($data->Ant_Traumatico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Compromiso_Articular_Der')); ?>:</b>
	<?php echo CHtml::encode($data->Compromiso_Articular_Der); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Compromiso_Articular_Izq')); ?>:</b>
	<?php echo CHtml::encode($data->Compromiso_Articular_Izq); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Disminucion_Mov_Dom_Der')); ?>:</b>
	<?php echo CHtml::encode($data->Disminucion_Mov_Dom_Der); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Disminucion_Mov_Dom_Izq')); ?>:</b>
	<?php echo CHtml::encode($data->Disminucion_Mov_Dom_Izq); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Paralisis_Der')); ?>:</b>
	<?php echo CHtml::encode($data->Paralisis_Der); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Paralisis_Izq')); ?>:</b>
	<?php echo CHtml::encode($data->Paralisis_Izq); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rigidez_Der')); ?>:</b>
	<?php echo CHtml::encode($data->Rigidez_Der); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rigidez_Izq')); ?>:</b>
	<?php echo CHtml::encode($data->Rigidez_Izq); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Maniobra_Desault')); ?>:</b>
	<?php echo CHtml::encode($data->Maniobra_Desault); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tono_Fuerza_Reflejos')); ?>:</b>
	<?php echo CHtml::encode($data->Tono_Fuerza_Reflejos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Codo_Tenista')); ?>:</b>
	<?php echo CHtml::encode($data->Codo_Tenista); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Codo_Golfista')); ?>:</b>
	<?php echo CHtml::encode($data->Codo_Golfista); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Signo_Phalen')); ?>:</b>
	<?php echo CHtml::encode($data->Signo_Phalen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Signo_Tinel')); ?>:</b>
	<?php echo CHtml::encode($data->Signo_Tinel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Maniobra_Finkelsten')); ?>:</b>
	<?php echo CHtml::encode($data->Maniobra_Finkelsten); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Prueba_Jackson')); ?>:</b>
	<?php echo CHtml::encode($data->Prueba_Jackson); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Prueba_Lasegue')); ?>:</b>
	<?php echo CHtml::encode($data->Prueba_Lasegue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Prueba_Cajon')); ?>:</b>
	<?php echo CHtml::encode($data->Prueba_Cajon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Prueba_Bostezo')); ?>:</b>
	<?php echo CHtml::encode($data->Prueba_Bostezo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Diagnostico')); ?>:</b>
	<?php echo CHtml::encode($data->Diagnostico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Concepto')); ?>:</b>
	<?php echo CHtml::encode($data->Concepto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Concepto_Egreso')); ?>:</b>
	<?php echo CHtml::encode($data->Concepto_Egreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Observaciones_Concepto_Egreso')); ?>:</b>
	<?php echo CHtml::encode($data->Observaciones_Concepto_Egreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Recomendaciones')); ?>:</b>
	<?php echo CHtml::encode($data->Recomendaciones); ?>
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