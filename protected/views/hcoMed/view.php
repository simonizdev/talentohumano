<?php
/* @var $this HcoMedController */
/* @var $model HcoMed */

?>

<h3>Visualizando historia clínica ocupacional de empleado</h3>

<div class="table-responsive">

<?php $path =Yii::app()->baseUrl.'/index.php?r=hcoMed/ExportPdf&id='; ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
            'name'=>'Id_Empleado',
            'value'=>UtilidadesEmpleado::nombreempleado($model->Id_Empleado),
        ),
        array(
            'label' => 'Tipo de identificación',
            'value' => ($model->Id_Empleado == "") ? "No asignado" : $model->idempleado->idtipoident->Dominio,
        ),
        array(
            'label' => '# Identificación',
            'value' => ($model->Id_Empleado == "") ? "No asignado" : $model->idempleado->Identificacion,
        ),
        array(
            'label' => 'Fecha de nacimiento',
            'value' => ($model->Id_Empleado == "") ? "No asignado" : UtilidadesVarias::textofecha($model->idempleado->Fecha_Nacimiento),
        ),
        array(
            'label' => 'Edad',
            'value' => ($model->Id_Empleado == "") ? "No asignado" : UtilidadesEmpleado::edadempleado($model->Id_Empleado),
        ),
        array(
            'label' => 'Fecha de ingreso',
            'value' => ($model->Id_Contrato == "") ? "No asignado" : UtilidadesVarias::textofecha($model->idcontrato->Fecha_Ingreso),
        ),
        array(
            'label' => 'Área',
            'value' => ($model->Id_Contrato == "") ? "No asignado" : $model->idcontrato->idarea->Area,
        ),
        array(
            'label' => 'Cargo',
            'value' => ($model->Id_Contrato == "") ? "No asignado" : $model->idcontrato->idcargo->Cargo,
        ),
        array(
            'name' => 'Informacion_Adicional_Emp',
            'value' => ($model->Informacion_Adicional_Emp == "") ? "No asignado" : $model->Informacion_Adicional_Emp,
        ),
        array(
            'name' => 'Fecha',
            'value' => UtilidadesVarias::textofecha($model->Fecha),
        ),
        array(
            'label' => 'Tipo de examen',
            'value' => ($model->Tipo_Examen == "") ? "No asignado" : $model->tipoexamen->Dominio,
        ),
		array(
            'label' => 'Reubicación',
            'value' => ($model->Reubicacion == "") ? "No asignado" : $model->Reubicacion,
        ),
        array(
            'label' => 'Funciones principales',
            'value' => ($model->Funciones_Principales == "") ? "No asignado" : $model->funcionesprincipales->Dominio,
        ),
        array(
            'label' => 'Empresa 1',
            'value' => ($model->Ant_Lab_Empresa_1 == "") ? "No asignado" : $model->Ant_Lab_Empresa_1,
        ),
        array(
            'label' => 'Área 1',
            'value' => ($model->Ant_Lab_Area_1 == "") ? "No asignado" : $model->Ant_Lab_Area_1,
        ),
        array(
            'label' => 'Cargo 1',
            'value' => ($model->Ant_Lab_Cargo_1 == "") ? "No asignado" : $model->Ant_Lab_Cargo_1,
        ),
        array(
            'label' => 'Tiempo 1',
            'value' => ($model->Ant_Lab_Tiempo_1 == "") ? "No asignado" : $model->Ant_Lab_Tiempo_1,
        ),
        array(
            'label' => 'Empresa 2',
            'value' => ($model->Ant_Lab_Empresa_2 == "") ? "No asignado" : $model->Ant_Lab_Empresa_2,
        ),
        array(
            'label' => 'Área 2',
            'value' => ($model->Ant_Lab_Area_2 == "") ? "No asignado" : $model->Ant_Lab_Area_2,
        ),
        array(
            'label' => 'Cargo 2',
            'value' => ($model->Ant_Lab_Cargo_2 == "") ? "No asignado" : $model->Ant_Lab_Cargo_2,
        ),
        array(
            'label' => 'Tiempo 2',
            'value' => ($model->Ant_Lab_Tiempo_2 == "") ? "No asignado" : $model->Ant_Lab_Tiempo_2,
        ),
        array(
            'label' => 'Empresa 3',
            'value' => ($model->Ant_Lab_Empresa_3 == "") ? "No asignado" : $model->Ant_Lab_Empresa_3,
        ),
        array(
            'label' => 'Área 3',
            'value' => ($model->Ant_Lab_Area_3 == "") ? "No asignado" : $model->Ant_Lab_Area_3,
        ),
        array(
            'label' => 'Cargo 3',
            'value' => ($model->Ant_Lab_Cargo_3 == "") ? "No asignado" : $model->Ant_Lab_Cargo_3,
        ),
        array(
            'label' => 'Tiempo 3',
            'value' => ($model->Ant_Lab_Tiempo_3 == "") ? "No asignado" : $model->Ant_Lab_Tiempo_3,
        ),
        array(
            'label' => 'Tipo riesgo',
            'value' => ($model->Tipo_Riesgo == "") ? "No asignado" : $model->tiporiesgo->Dominio,
        ),
        array(
            'label' => 'Riesgo',
            'value' => ($model->Riesgo == "") ? "No asignado" : $model->riesgo->Dominio,
        ),

        array(
            'label' => 'Ant. Patologícos',
            'value' => ($model->Ant_Per_Patologico == "") ? "No asignado" : $model->Ant_Per_Patologico,
        ),
        array(
            'label' => 'Ant. Quirúrgicos',
            'value' => ($model->Ant_Per_Quirurgico == "") ? "No asignado" : $model->Ant_Per_Quirurgico,
        ),
        array(
            'label' => 'Ant. Traumatológicos',
            'value' => ($model->Ant_Per_Traumatologico == "") ? "No asignado" : $model->Ant_Per_Traumatologico,
        ),
        array(
            'label' => 'Ant. Inmunológicos',
            'value' => ($model->Ant_Per_Inmunologico == "") ? "No asignado" : $model->Ant_Per_Inmunologico,
        ),
        array(
            'label' => 'Hábitos',
            'value' => ($model->Ant_Per_Habito == "") ? "No asignado" : $model->Ant_Per_Habito,
        ),


        array(
            'label' => 'Talla (Cm)',
            'value' => ($model->Sig_Vit_Talla == "") ? "No asignado" : $model->Sig_Vit_Talla,
        ),
        array(
            'label' => 'Peso (Kg)',
            'value' => ($model->Sig_Vit_Peso == "") ? "No asignado" : $model->Sig_Vit_Peso,
        ),
        array(
            'label' => 'IMC',
            'value' => ($model->Sig_Vit_Imc == "") ? "No asignado" : $model->Sig_Vit_Imc,
        ),
        array(
            'label' => 'Perimetro abdominal',
            'value' => ($model->Sig_Vit_Perimetro_Abdominal == "") ? "No asignado" : $model->Sig_Vit_Perimetro_Abdominal,
        ),
        array(
            'label' => 'Pulso',
            'value' => ($model->Sig_Vit_Pulso == "") ? "No asignado" : $model->Sig_Vit_Pulso,
        ),
        array(
            'label' => 'Frecuencia respiratoria',
            'value' => ($model->Sig_Vit_Frecuencia_Respiratoria == "") ? "No asignado" : $model->Sig_Vit_Frecuencia_Respiratoria,
        ),
        array(
            'label' => 'Saturación de oxigeno',
            'value' => ($model->Sig_Vit_Saturacion_Oxigeno == "") ? "No asignado" : $model->Sig_Vit_Saturacion_Oxigeno,
        ),
        array(
            'label' => 'Temperatura',
            'value' => ($model->Sig_Vit_Temperatura == "") ? "No asignado" : $model->Sig_Vit_Temperatura,
        ),
        array(
            'label' => 'Presión arterial',
            'value' => ($model->Sig_Vit_Presion_Arterial == "") ? "No asignado" : $model->Sig_Vit_Presion_Arterial,
        ),
        array(
            'label' => 'Piel',
            'value' => ($model->Sis_Piel == "") ? "No asignado" : $model->Sis_Piel,
        ),
        array(
            'label' => 'Cabeza',
            'value' => ($model->Sis_Cabeza == "") ? "No asignado" : $model->Sis_Cabeza,
        ),
        array(
            'label' => 'Ojos',
            'value' => ($model->Sis_Ojos == "") ? "No asignado" : $model->Sis_Ojos,
        ),
        array(
            'label' => 'Oidos',
            'value' => ($model->Sis_Oidos == "") ? "No asignado" : $model->Sis_Oidos,
        ),
        array(
            'label' => 'Nariz',
            'value' => ($model->Sis_Nariz == "") ? "No asignado" : $model->Sis_Nariz,
        ),
        array(
            'label' => 'Boca, amigdalas, laringe y faringe',
            'value' => ($model->Sis_Boca == "") ? "No asignado" : $model->Sis_Boca,
        ),
        array(
            'label' => 'Piezas dentales',
            'value' => ($model->Sis_Piezas_Dentales == "") ? "No asignado" : $model->piezasdentales->Dominio,
        ),
        array(
            'label' => 'Estado piezas dentales',
            'value' => ($model->Sis_Estado_Piezas_Dentales == "") ? "No asignado" : $model->estadopiezasdentales->Dominio,
        ),
        array(
            'label' => 'Cuello',
            'value' => ($model->Sis_Cuello == "") ? "No asignado" : $model->Sis_Cuello,
        ),
        array(
            'label' => 'Respiratorio',
            'value' => ($model->Sis_Respiratorio == "") ? "No asignado" : $model->Sis_Respiratorio,
        ),
        array(
            'label' => 'Cardiaco',
            'value' => ($model->Sis_Cardiaco == "") ? "No asignado" : $model->Sis_Cardiaco,
        ),
        array(
            'label' => 'Abdomen',
            'value' => ($model->Sis_Abdomen == "") ? "No asignado" : $model->Sis_Abdomen,
        ),
        array(
            'label' => 'Miembros superiores',
            'value' => ($model->Sis_Miembros_Superiores == "") ? "No asignado" : $model->Sis_Miembros_Superiores,
        ),
        array(
            'label' => 'Genito-urinarios',
            'value' => ($model->Sis_Genito_Urinario == "") ? "No asignado" : $model->Sis_Genito_Urinario,
        ),
        array(
            'label' => 'Miembros inferiores',
            'value' => ($model->Sis_Miembros_Inferiores == "") ? "No asignado" : $model->Sis_Miembros_Inferiores,
        ),
        array(
            'label' => 'Columna vertebral',
            'value' => ($model->Sis_Columna_Vertebral == "") ? "No asignado" : $model->Sis_Columna_Vertebral,
        ),
        array(
            'label' => 'Deformidad Congénita y/o adquirida izquierda',
            'value' => ($model->Deformidad_Cong_Adq_Izq == 1) ? "( + )" : "( - )",
        ),
        array(
            'label' => 'Deformidad Congénita y/o adquirida derecha',
            'value' => ($model->Deformidad_Cong_Adq_Der == 1) ? "( + )" : "( - )",
        ),

        array(
            'label' => 'Protuberancia izquierda',
            'value' => ($model->Protuberancia_Izq == 1) ? "( + )" : "( - )",
        ),
        array(
            'label' => 'Protuberancia derecha',
            'value' => ($model->Protuberancia_Der == 1) ? "( + )" : "( - )",
        ),
        array(
            'label' => 'Dolor izquierda',
            'value' => ($model->Dolor_Izq == 1) ? "( + )" : "( - )",
        ),
        array(
            'label' => 'Dolor derecha',
            'value' => ($model->Dolor_Der == 1) ? "( + )" : "( - )",
        ),
        array(
            'label' => 'Compromiso articular izquierda',
            'value' => ($model->Compromiso_Articular_Izq == 1) ? "( + )" : "( - )",
        ),
        array(
            'label' => 'Compromiso articular derecha',
            'value' => ($model->Compromiso_Articular_Der == 1) ? "( + )" : "( - )",
        ),
        array(
            'label' => 'Disminución de la movilidad izquierda',
            'value' => ($model->Disminucion_Mov_Dom_Izq == 1) ? "( + )" : "( - )",
        ),
        array(
            'label' => 'Disminución de la movilidad derecha',
            'value' => ($model->Disminucion_Mov_Dom_Der == 1) ? "( + )" : "( - )",
        ),
        array(
            'label' => 'Parálisis izquierda',
            'value' => ($model->Paralisis_Izq == 1) ? "( + )" : "( - )",
        ),
        array(
            'label' => 'Parálisis derecha',
            'value' => ($model->Paralisis_Der == 1) ? "( + )" : "( - )",
        ),
        array(
            'label' => 'Rigidez izquierda',
            'value' => ($model->Rigidez_Izq == 1) ? "( + )" : "( - )",
        ),
        array(
            'label' => 'Rigidez derecha',
            'value' => ($model->Rigidez_Der == 1) ? "( + )" : "( - )",
        ),
        array(
            'label' => 'Hallazgo osteomuscular',
            'value' => ($model->Hallazgo_Osteomuscular == "") ? "No asignado" : $model->Hallazgo_Osteomuscular,
        ),
        array(
            'label' => 'Antecedentes traumáticos',
            'value' => ($model->Ant_Traumatico == "") ? "No asignado" : $model->Ant_Traumatico,
        ),


        array(
            'label' => 'Tono fuerza y reflejos de miembros superiores',
            'value' => ($model->Tono_Fuerza_Reflejos == "") ? "No asignado" : $model->Tono_Fuerza_Reflejos,
        ),
        array(
            'label' => 'Maniobra de desault',
            'value' => ($model->Maniobra_Desault == "") ? "No asignado" : $model->Maniobra_Desault,
        ),
        array(
            'label' => 'Codo de tenista',
            'value' => ($model->Codo_Tenista == "") ? "No asignado" : $model->Codo_Tenista,
        ),
        array(
            'label' => 'Codo de golfista',
            'value' => ($model->Codo_Golfista == "") ? "No asignado" : $model->Codo_Golfista,
        ),
        array(
            'label' => 'Signo de phalen',
            'value' => ($model->Signo_Phalen == "") ? "No asignado" : $model->Signo_Phalen,
        ),
        array(
            'label' => 'Signo de tinel',
            'value' => ($model->Signo_Tinel == "") ? "No asignado" : $model->Signo_Tinel,
        ),
        array(
            'label' => 'Maniobra de finkelsten',
            'value' => ($model->Maniobra_Finkelsten == "") ? "No asignado" : $model->Maniobra_Finkelsten,
        ),
        array(
            'label' => 'Prueba de jackson (cervical)',
            'value' => ($model->Prueba_Jackson == "") ? "No asignado" : $model->Prueba_Jackson,
        ),
        array(
            'label' => 'Prueba de lasegue (lumbar)',
            'value' => ($model->Prueba_Lasegue == "") ? "No asignado" : $model->Prueba_Lasegue,
        ),
        array(
            'label' => 'Prueba de cajón',
            'value' => ($model->Prueba_Cajon == "") ? "No asignado" : $model->Prueba_Cajon,
        ),
        array(
            'label' => 'Prueba de bostezo',
            'value' => ($model->Prueba_Bostezo == "") ? "No asignado" : $model->Prueba_Bostezo,
        ),
        array(
            'label' => 'Concepto',
            'value' => ($model->Concepto == "") ? "No asignado / No aplica" : $model->concepto->Dominio,
        ),
        array(
            'label' => 'Concepto de egreso',
            'value' => ($model->Concepto_Egreso == "") ? "No asignado" : $model->conceptoegreso->Dominio,
        ),
        array(
            'label' => 'Observaciones concepto de egreso',
            'value' => ($model->Observaciones_Concepto_Egreso == "") ? "No asignado" : $model->Observaciones_Concepto_Egreso,
        ),
        array(
            'label' => 'Observaciones concepto de egreso',
            'value' => ($model->Diagnostico == "") ? "No asignado" : $model->diagnostico->Dominio,
        ),
        array(
            'label' => 'Recomendaciones',
            'value' => ($model->Recomendaciones == "") ? "No asignado" : $model->Recomendaciones,
        ),
		array(
            'name'=>'Id_Usuario_Creacion',
            'value'=>$model->idusuariocre->Usuario,
        ),
        array(
            'name'=>'Fecha_Creacion',
            'value'=>UtilidadesVarias::textofechahora($model->Fecha_Creacion),
        ),
        array(
        	'label'=>'',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode('Descargar PDF'), $path .$model->Id_Hco)
        ),
	),
)); ?>

</div>

<div class="btn-group" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=empleado/viewmed&id='.$model->Id_Empleado; ?>';"><i class="fa fa-reply"></i> Volver </button>
</div>

