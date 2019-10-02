<?php
/* @var $this HcoMedController */
/* @var $model HcoMed */

$this->breadcrumbs=array(
	'Hco Meds'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HcoMed', 'url'=>array('index')),
	array('label'=>'Create HcoMed', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#hco-med-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Hco Meds</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'hco-med-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id_Hco',
		'Id_Empleado',
		'Informacion_Adicional_Emp',
		'Id_Contrato',
		'Fecha',
		'Tipo_Examen',
		/*
		'Reubicacion',
		'Funciones_Principales',
		'Ant_Lab_Empresa_1',
		'Ant_Lab_Area_1',
		'Ant_Lab_Cargo_1',
		'Ant_Lab_Tiempo_1',
		'Ant_Lab_Empresa_2',
		'Ant_Lab_Area_2',
		'Ant_Lab_Cargo_2',
		'Ant_Lab_Tiempo_2',
		'Ant_Lab_Empresa_3',
		'Ant_Lab_Area_3',
		'Ant_Lab_Cargo_3',
		'Tipo_Riesgo',
		'Riesgo',
		'Ant_Per_Patologico',
		'Ant_Per_Quirurgico',
		'Ant_Per_Traumatologico',
		'Ant_Per_Inmunologico',
		'Ant_Per_Habito',
		'Sig_Vit_Talla',
		'Sig_Vit_Peso',
		'Sig_Vit_Imc',
		'Sig_Vit_Perimetro_Abdominal',
		'Sig_Vit_Pulso',
		'Sig_Vit_Frecuencia_Respiratoria',
		'Sig_Vit_Saturacion_Oxigeno',
		'Sig_Vit_Temperatura',
		'Sig_Vit_Presion_Arterial',
		'Sis_Piel',
		'Sis_Cabeza',
		'Sis_Ojos',
		'Sis_Oidos',
		'Sis_Nariz',
		'Sis_Boca',
		'Sis_Piezas_Dentales',
		'Sis_Estado_Piezas_Dentales',
		'Sis_Cuello',
		'Sis_Respiratorio',
		'Sis_Cardiaco',
		'Sis_Abdomen',
		'Sis_Miembros_Superiores',
		'Sis_Genito_Urinario',
		'Sis_Miembros_Inferiores',
		'Sis_Columna_Vertebral',
		'Dolor',
		'Deformidad_Cong_Adq_Der',
		'Deformidad_Cong_Adq_Iqz',
		'Protuberancia_Der',
		'Protuberancia_Izq',
		'Ant_Traumatico',
		'Compromiso_Articular_Der',
		'Compromiso_Articular_Izq',
		'Disminucion_Mov_Dom_Der',
		'Disminucion_Mov_Dom_Izq',
		'Paralisis_Der',
		'Paralisis_Izq',
		'Rigidez_Der',
		'Rigidez_Izq',
		'Maniobra_Desault',
		'Tono_Fuerza_Reflejos',
		'Codo_Tenista',
		'Codo_Golfista',
		'Signo_Phalen',
		'Signo_Tinel',
		'Maniobra_Finkelsten',
		'Prueba_Jackson',
		'Prueba_Lasegue',
		'Prueba_Cajon',
		'Prueba_Bostezo',
		'Diagnostico',
		'Concepto',
		'Concepto_Egreso',
		'Observaciones_Concepto_Egreso',
		'Recomendaciones',
		'Id_Usuario_Creacion',
		'Fecha_Creacion',
		'Id_Usuario_Actualizacion',
		'Fecha_Actualizacion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
