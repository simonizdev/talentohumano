<?php
/* @var $this HcoMedController */
/* @var $model HcoMed */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id_Hco'); ?>
		<?php echo $form->textField($model,'Id_Hco'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Empleado'); ?>
		<?php echo $form->textField($model,'Id_Empleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Informacion_Adicional_Emp'); ?>
		<?php echo $form->textArea($model,'Informacion_Adicional_Emp',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Contrato'); ?>
		<?php echo $form->textField($model,'Id_Contrato'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha'); ?>
		<?php echo $form->textField($model,'Fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tipo_Examen'); ?>
		<?php echo $form->textField($model,'Tipo_Examen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Reubicacion'); ?>
		<?php echo $form->textArea($model,'Reubicacion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Funciones_Principales'); ?>
		<?php echo $form->textField($model,'Funciones_Principales'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Lab_Empresa_1'); ?>
		<?php echo $form->textField($model,'Ant_Lab_Empresa_1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Lab_Area_1'); ?>
		<?php echo $form->textField($model,'Ant_Lab_Area_1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Lab_Cargo_1'); ?>
		<?php echo $form->textField($model,'Ant_Lab_Cargo_1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Lab_Tiempo_1'); ?>
		<?php echo $form->textField($model,'Ant_Lab_Tiempo_1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Lab_Empresa_2'); ?>
		<?php echo $form->textField($model,'Ant_Lab_Empresa_2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Lab_Area_2'); ?>
		<?php echo $form->textField($model,'Ant_Lab_Area_2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Lab_Cargo_2'); ?>
		<?php echo $form->textField($model,'Ant_Lab_Cargo_2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Lab_Tiempo_2'); ?>
		<?php echo $form->textField($model,'Ant_Lab_Tiempo_2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Lab_Empresa_3'); ?>
		<?php echo $form->textField($model,'Ant_Lab_Empresa_3',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Lab_Area_3'); ?>
		<?php echo $form->textField($model,'Ant_Lab_Area_3',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Lab_Cargo_3'); ?>
		<?php echo $form->textField($model,'Ant_Lab_Cargo_3',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tipo_Riesgo'); ?>
		<?php echo $form->textField($model,'Tipo_Riesgo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Riesgo'); ?>
		<?php echo $form->textField($model,'Riesgo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Per_Patologico'); ?>
		<?php echo $form->textArea($model,'Ant_Per_Patologico',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Per_Quirurgico'); ?>
		<?php echo $form->textArea($model,'Ant_Per_Quirurgico',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Per_Traumatologico'); ?>
		<?php echo $form->textArea($model,'Ant_Per_Traumatologico',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Per_Inmunologico'); ?>
		<?php echo $form->textArea($model,'Ant_Per_Inmunologico',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Per_Habito'); ?>
		<?php echo $form->textArea($model,'Ant_Per_Habito',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sig_Vit_Talla'); ?>
		<?php echo $form->textField($model,'Sig_Vit_Talla',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sig_Vit_Peso'); ?>
		<?php echo $form->textField($model,'Sig_Vit_Peso',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sig_Vit_Imc'); ?>
		<?php echo $form->textField($model,'Sig_Vit_Imc',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sig_Vit_Perimetro_Abdominal'); ?>
		<?php echo $form->textField($model,'Sig_Vit_Perimetro_Abdominal',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sig_Vit_Pulso'); ?>
		<?php echo $form->textField($model,'Sig_Vit_Pulso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sig_Vit_Frecuencia_Respiratoria'); ?>
		<?php echo $form->textField($model,'Sig_Vit_Frecuencia_Respiratoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sig_Vit_Saturacion_Oxigeno'); ?>
		<?php echo $form->textField($model,'Sig_Vit_Saturacion_Oxigeno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sig_Vit_Temperatura'); ?>
		<?php echo $form->textField($model,'Sig_Vit_Temperatura',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sig_Vit_Presion_Arterial'); ?>
		<?php echo $form->textField($model,'Sig_Vit_Presion_Arterial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Piel'); ?>
		<?php echo $form->textArea($model,'Sis_Piel',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Cabeza'); ?>
		<?php echo $form->textArea($model,'Sis_Cabeza',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Ojos'); ?>
		<?php echo $form->textArea($model,'Sis_Ojos',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Oidos'); ?>
		<?php echo $form->textArea($model,'Sis_Oidos',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Nariz'); ?>
		<?php echo $form->textArea($model,'Sis_Nariz',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Boca'); ?>
		<?php echo $form->textArea($model,'Sis_Boca',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Piezas_Dentales'); ?>
		<?php echo $form->textField($model,'Sis_Piezas_Dentales'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Estado_Piezas_Dentales'); ?>
		<?php echo $form->textField($model,'Sis_Estado_Piezas_Dentales'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Cuello'); ?>
		<?php echo $form->textArea($model,'Sis_Cuello',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Respiratorio'); ?>
		<?php echo $form->textArea($model,'Sis_Respiratorio',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Cardiaco'); ?>
		<?php echo $form->textArea($model,'Sis_Cardiaco',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Abdomen'); ?>
		<?php echo $form->textArea($model,'Sis_Abdomen',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Miembros_Superiores'); ?>
		<?php echo $form->textArea($model,'Sis_Miembros_Superiores',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Genito_Urinario'); ?>
		<?php echo $form->textArea($model,'Sis_Genito_Urinario',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Miembros_Inferiores'); ?>
		<?php echo $form->textArea($model,'Sis_Miembros_Inferiores',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sis_Columna_Vertebral'); ?>
		<?php echo $form->textArea($model,'Sis_Columna_Vertebral',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Dolor'); ?>
		<?php echo $form->textArea($model,'Dolor',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Deformidad_Cong_Adq_Der'); ?>
		<?php echo $form->textField($model,'Deformidad_Cong_Adq_Der'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Deformidad_Cong_Adq_Iqz'); ?>
		<?php echo $form->textField($model,'Deformidad_Cong_Adq_Iqz'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Protuberancia_Der'); ?>
		<?php echo $form->textField($model,'Protuberancia_Der'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Protuberancia_Izq'); ?>
		<?php echo $form->textField($model,'Protuberancia_Izq'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ant_Traumatico'); ?>
		<?php echo $form->textArea($model,'Ant_Traumatico',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Compromiso_Articular_Der'); ?>
		<?php echo $form->textField($model,'Compromiso_Articular_Der'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Compromiso_Articular_Izq'); ?>
		<?php echo $form->textField($model,'Compromiso_Articular_Izq'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Disminucion_Mov_Dom_Der'); ?>
		<?php echo $form->textField($model,'Disminucion_Mov_Dom_Der'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Disminucion_Mov_Dom_Izq'); ?>
		<?php echo $form->textField($model,'Disminucion_Mov_Dom_Izq'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Paralisis_Der'); ?>
		<?php echo $form->textField($model,'Paralisis_Der'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Paralisis_Izq'); ?>
		<?php echo $form->textField($model,'Paralisis_Izq'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rigidez_Der'); ?>
		<?php echo $form->textField($model,'Rigidez_Der'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Rigidez_Izq'); ?>
		<?php echo $form->textField($model,'Rigidez_Izq'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Maniobra_Desault'); ?>
		<?php echo $form->textArea($model,'Maniobra_Desault',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tono_Fuerza_Reflejos'); ?>
		<?php echo $form->textArea($model,'Tono_Fuerza_Reflejos',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Codo_Tenista'); ?>
		<?php echo $form->textArea($model,'Codo_Tenista',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Codo_Golfista'); ?>
		<?php echo $form->textArea($model,'Codo_Golfista',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Signo_Phalen'); ?>
		<?php echo $form->textArea($model,'Signo_Phalen',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Signo_Tinel'); ?>
		<?php echo $form->textArea($model,'Signo_Tinel',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Maniobra_Finkelsten'); ?>
		<?php echo $form->textArea($model,'Maniobra_Finkelsten',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Prueba_Jackson'); ?>
		<?php echo $form->textArea($model,'Prueba_Jackson',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Prueba_Lasegue'); ?>
		<?php echo $form->textArea($model,'Prueba_Lasegue',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Prueba_Cajon'); ?>
		<?php echo $form->textArea($model,'Prueba_Cajon',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Prueba_Bostezo'); ?>
		<?php echo $form->textArea($model,'Prueba_Bostezo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Diagnostico'); ?>
		<?php echo $form->textField($model,'Diagnostico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Concepto'); ?>
		<?php echo $form->textField($model,'Concepto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Concepto_Egreso'); ?>
		<?php echo $form->textField($model,'Concepto_Egreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Observaciones_Concepto_Egreso'); ?>
		<?php echo $form->textArea($model,'Observaciones_Concepto_Egreso',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Recomendaciones'); ?>
		<?php echo $form->textArea($model,'Recomendaciones',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Usuario_Creacion'); ?>
		<?php echo $form->textField($model,'Id_Usuario_Creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Creacion'); ?>
		<?php echo $form->textField($model,'Fecha_Creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_Usuario_Actualizacion'); ?>
		<?php echo $form->textField($model,'Id_Usuario_Actualizacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Actualizacion'); ?>
		<?php echo $form->textField($model,'Fecha_Actualizacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->