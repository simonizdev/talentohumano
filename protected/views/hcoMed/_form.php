<?php
/* @var $this HcoMedController */
/* @var $model HcoMed */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hco-med-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'Id_Empleado'); ?>
            <?php echo '<p>'.UtilidadesEmpleado::nombreempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
          	<label>Tipo de identificación</label>
          	<?php echo '<p>'.UtilidadesEmpleado::tipoidentificacionempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
          	<label># de identificación</label>
          	<?php echo '<p>'.UtilidadesEmpleado::identificacionempleado($e).'</p>'; ?> 
        </div>
    </div>
</div>
<div class="row">
	<div class="col-sm-4">
        <div class="form-group">
            <label>Fecha de nacimiento</label>
            <?php echo '<p>'.UtilidadesEmpleado::fechanacimientoempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Edad</label>
            <?php echo '<p>'.UtilidadesEmpleado::edadempleado($e).'</p>'; ?> 
        </div>
    </div>
</div>
<div class="row">
	<div class="col-sm-4">
        <div class="form-group">
            <label>Fecha ingreso</label>
            <?php echo '<p>'.UtilidadesEmpleado::fechaingresoempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
          	<label>Área</label>
          	<?php echo '<p>'.UtilidadesEmpleado::areaactualempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
          	<label>Cargo</label>
          	<?php echo '<p>'.UtilidadesEmpleado::cargoactualempleado($e).'</p>'; ?> 
        </div>
    </div>
</div>
<div class="row">
  	<div class="col-sm-4">
	    <div class="form-group">
	      	<?php echo $form->error($model,'Fecha', array('class' => 'pull-right badge bg-red')); ?>
	        <?php echo $form->label($model,'Fecha'); ?>
	        <?php echo $form->textField($model,'Fecha', array('class' => 'form-control', 'readonly' => true, 'value' => date('Y-m-d'))); ?>
	    </div>
  	</div>
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Informacion_Adicional_Emp', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Informacion_Adicional_Emp'); ?>
			<?php echo $form->textField($model,'Informacion_Adicional_Emp', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
	     	<?php echo $form->error($model,'Tipo_Examen', array('class' => 'pull-right badge bg-red')); ?>
	        <?php echo $form->label($model,'Tipo_Examen'); ?>
	        <?php
	            $this->widget('ext.select2.ESelect2',array(
	                'name'=>'HcoMed[Tipo_Examen]',
	                'id'=>'HcoMed_Tipo_Examen',
	                'data'=>$lista_tipo_examen,
	                'value' => $model->Tipo_Examen,
	                'htmlOptions'=>array(),
	                'options'=>array(
	                    'placeholder'=>'Seleccione...',
	                    'width'=> '100%',
	                    'allowClear'=>true,
	                ),
	            ));
	        ?> 	
	    </div>	
	</div>    
</div>
<div class="row">
  	<div class="col-sm-4">
	    <div class="form-group">
	    	<?php echo $form->error($model,'Reubicacion', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Reubicacion'); ?>
			<?php echo $form->textField($model,'Reubicacion', array('class' => 'form-control', 'autocomplete' => 'off')); ?> 	
	    </div>
  	</div>
 	<div class="col-sm-8">
		<div class="form-group">
	     	<?php echo $form->error($model,'Funciones_Principales', array('class' => 'pull-right badge bg-red')); ?>
	        <?php echo $form->label($model,'Funciones_Principales'); ?>
	        <?php
	            $this->widget('ext.select2.ESelect2',array(
	                'name'=>'HcoMed[Funciones_Principales]',
	                'id'=>'HcoMed_Funciones_Principales',
	                'data'=>$lista_funciones_p,
	                'value' => $model->Funciones_Principales,
	                'htmlOptions'=>array(),
	                'options'=>array(
	                    'placeholder'=>'Seleccione...',
	                    'width'=> '100%',
	                    'allowClear'=>true,
	                ),
	            ));
	        ?> 	
	    </div>
	</div>   
</div>

<h4>Antecendentes laborales</h4>

<div class="row">
  	<div class="col-sm-3">
    	<div class="form-group">
    		<?php echo $form->error($model,'Ant_Lab_Empresa_1', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Ant_Lab_Empresa_1'); ?>
		    <?php echo $form->textField($model,'Ant_Lab_Empresa_1', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
  	</div>
  	<div class="col-sm-3">
    	<div class="form-group">
    		<?php echo $form->error($model,'Ant_Lab_Area_1', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Ant_Lab_Area_1'); ?>
		    <?php echo $form->textField($model,'Ant_Lab_Area_1', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
  	</div>
  	<div class="col-sm-3">
    	<div class="form-group">
    		<?php echo $form->error($model,'Ant_Lab_Cargo_1', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Ant_Lab_Cargo_1'); ?>
		    <?php echo $form->textField($model,'Ant_Lab_Cargo_1', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
  	</div>
  	<div class="col-sm-3">
    	<div class="form-group">
    		<?php echo $form->error($model,'Ant_Lab_Tiempo_1', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Ant_Lab_Tiempo_1'); ?>
		    <?php echo $form->textField($model,'Ant_Lab_Tiempo_1', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
  	</div>   
</div>
<div class="row">
  	<div class="col-sm-3">
    	<div class="form-group">
    		<?php echo $form->error($model,'Ant_Lab_Empresa_2', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Ant_Lab_Empresa_2'); ?>
		    <?php echo $form->textField($model,'Ant_Lab_Empresa_2', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
  	</div>
  	<div class="col-sm-3">
    	<div class="form-group">
    		<?php echo $form->error($model,'Ant_Lab_Area_2', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Ant_Lab_Area_2'); ?>
		    <?php echo $form->textField($model,'Ant_Lab_Area_2', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
  	</div>
  	<div class="col-sm-3">
    	<div class="form-group">
    		<?php echo $form->error($model,'Ant_Lab_Cargo_2', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Ant_Lab_Cargo_2'); ?>
		    <?php echo $form->textField($model,'Ant_Lab_Cargo_2', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
  	</div>
  	<div class="col-sm-3">
    	<div class="form-group">
    		<?php echo $form->error($model,'Ant_Lab_Tiempo_2', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Ant_Lab_Tiempo_2'); ?>
		    <?php echo $form->textField($model,'Ant_Lab_Tiempo_2', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
  	</div>   
</div>
<div class="row">
  	<div class="col-sm-3">
    	<div class="form-group">
    		<?php echo $form->error($model,'Ant_Lab_Empresa_3', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Ant_Lab_Empresa_3'); ?>
		    <?php echo $form->textField($model,'Ant_Lab_Empresa_3', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
  	</div>
  	<div class="col-sm-3">
    	<div class="form-group">
    		<?php echo $form->error($model,'Ant_Lab_Area_3', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Ant_Lab_Area_3'); ?>
		    <?php echo $form->textField($model,'Ant_Lab_Area_3', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
  	</div>
  	<div class="col-sm-3">
    	<div class="form-group">
    		<?php echo $form->error($model,'Ant_Lab_Cargo_3', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Ant_Lab_Cargo_3'); ?>
		    <?php echo $form->textField($model,'Ant_Lab_Cargo_3', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
  	</div>
  	<div class="col-sm-3">
    	<div class="form-group">
    		<?php echo $form->error($model,'Ant_Lab_Tiempo_3', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Ant_Lab_Tiempo_3'); ?>
		    <?php echo $form->textField($model,'Ant_Lab_Tiempo_3', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
  	</div>   
</div>

<h4>Riesgos laborales</h4>

<div class="row">
  	<div class="col-sm-4">
	    <div class="form-group">
	     	<?php echo $form->error($model,'Tipo_Riesgo', array('class' => 'pull-right badge bg-red')); ?>
	        <?php echo $form->label($model,'Tipo_Riesgo'); ?>
	        <?php
	            $this->widget('ext.select2.ESelect2',array(
	                'name'=>'HcoMed[Tipo_Riesgo]',
	                'id'=>'HcoMed_Tipo_Riesgo',
	                'data'=>$lista_tipo_riesgo,
	                'value' => $model->Tipo_Riesgo,
	                'htmlOptions'=>array(),
	                'options'=>array(
	                    'placeholder'=>'Seleccione...',
	                    'width'=> '100%',
	                    'allowClear'=>true,
	                ),
	            ));
	        ?> 	
	    </div>
  	</div>
 	<div class="col-sm-8">
		<div class="form-group">
			<?php echo $form->error($model,'Riesgo', array('class' => 'pull-right badge bg-red')); ?>
	        <?php echo $form->label($model,'Riesgo'); ?>
	        <?php
	            $this->widget('ext.select2.ESelect2',array(
	                'name'=>'HcoMed[Riesgo]',
	                'id'=>'HcoMed_Riesgo',
	                'value' => $model->Riesgo,
	                'htmlOptions'=>array(),
	                'options'=>array(
	                    'placeholder'=>'Seleccione...',
	                    'width'=> '100%',
	                    'allowClear'=>true,
	                ),
	            ));
	        ?> 		
		</div>
	</div>   
</div>

<h4>Antecedentes personales</h4>

<div class="row">
  	<div class="col-sm-4">
	    <div class="form-group">
	     	<?php echo $form->error($model,'Ant_Per_Patologico', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Ant_Per_Patologico'); ?>
			<?php echo $form->textArea($model,'Ant_Per_Patologico',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>  	
	    </div>
  	</div>
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Ant_Per_Quirurgico', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Ant_Per_Quirurgico'); ?>
			<?php echo $form->textArea($model,'Ant_Per_Quirurgico',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?> 	
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
	     	<?php echo $form->error($model,'Ant_Per_Traumatologico', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Ant_Per_Traumatologico'); ?>
			<?php echo $form->textArea($model,'Ant_Per_Traumatologico',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?> 		
	    </div>	
	</div>    
</div>
<div class="row">
  	<div class="col-sm-4">
	    <div class="form-group">
	     	<?php echo $form->error($model,'Ant_Per_Inmunologico', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Ant_Per_Inmunologico'); ?>
			<?php echo $form->textArea($model,'Ant_Per_Inmunologico',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>  	
	    </div>
  	</div>
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Ant_Per_Habito', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Ant_Per_Habito'); ?>
			<?php echo $form->textArea($model,'Ant_Per_Habito',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?> 	
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
	 		
	    </div>	
	</div>    
</div>

<h4>Examen médico</h4>

<h5>Signos vitales</h5>

<div class="row">
  	<div class="col-sm-2">
	    <div class="form-group">
	    	<?php echo $form->label($model,'Sig_Vit_Talla'); ?>
			<?php echo $form->numberField($model,'Sig_Vit_Talla', array('class' => 'form-control', 'autocomplete' => 'off', 'type' => 'number', 'size'=>3, 'maxlength'=>3)); ?> 
	    </div>
  	</div>
  	<div class="col-sm-4">
	    <div class="form-group">
			<?php echo $form->error($model,'Sig_Vit_Talla', array('class' => 'pull-left badge bg-red')); ?>	
	    </div>
  	</div>
</div>

<div class="row">
 	<div class="col-sm-2">
		<div class="form-group">
			<?php echo $form->label($model,'Sig_Vit_Peso'); ?>
			<?php echo $form->numberField($model,'Sig_Vit_Peso', array('class' => 'form-control', 'autocomplete' => 'off', 'type' => 'number', 'size'=>5, 'maxlength'=>5)); ?>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Sig_Vit_Peso', array('class' => 'pull-left badge bg-red')); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-2">
		<div class="form-group">
	    	<?php echo $form->label($model,'Sig_Vit_Imc'); ?>
			<?php echo $form->numberField($model,'Sig_Vit_Imc', array('class' => 'form-control', 'autocomplete' => 'off', 'readonly' => true, 'size'=>6, 'maxlength'=>6)); ?>
	    </div>
	</div>
    <div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Sig_Vit_Imc', array('class' => 'pull-left badge bg-red')); ?>
		</div>
	</div>		
</div>

<div class="row">
	<div class="col-sm-2">
		<div class="form-group">
	    	<?php echo $form->label($model,'Sig_Vit_Perimetro_Abdominal'); ?>
			<?php echo $form->textField($model,'Sig_Vit_Perimetro_Abdominal', array('class' => 'form-control', 'autocomplete' => 'off', 'size'=>5, 'maxlength'=>5)); ?> 
	    </div>
	</div>
    <div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Sig_Vit_Perimetro_Abdominal', array('class' => 'pull-left badge bg-red')); ?>
		</div>
	</div>		
</div>

<div class="row">
	<div class="col-sm-2">
		<div class="form-group">
	    	<?php echo $form->label($model,'Sig_Vit_Pulso'); ?>
			<?php echo $form->textField($model,'Sig_Vit_Pulso', array('class' => 'form-control', 'autocomplete' => 'off', 'size'=>5, 'maxlength'=>5)); ?> 
	    </div>
	</div>
    <div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Sig_Vit_Pulso', array('class' => 'pull-left badge bg-red')); ?>
		</div>
	</div>		
</div>

<div class="row">
	<div class="col-sm-2">
		<div class="form-group">
	    	<?php echo $form->label($model,'Sig_Vit_Frecuencia_Respiratoria'); ?>
			<?php echo $form->textField($model,'Sig_Vit_Frecuencia_Respiratoria', array('class' => 'form-control', 'autocomplete' => 'off', 'size'=>5, 'maxlength'=>5)); ?>   
	    </div>
	</div>
    <div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Sig_Vit_Frecuencia_Respiratoria', array('class' => 'pull-left badge bg-red')); ?>
		</div>
	</div>		
</div>

<div class="row">
	<div class="col-sm-2">
		<div class="form-group">
	    	<?php echo $form->label($model,'Sig_Vit_Saturacion_Oxigeno'); ?>
			<?php echo $form->textField($model,'Sig_Vit_Saturacion_Oxigeno', array('class' => 'form-control', 'autocomplete' => 'off', 'size'=>5, 'maxlength'=>5)); ?>    
	    </div>
	</div>
    <div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Sig_Vit_Saturacion_Oxigeno', array('class' => 'pull-left badge bg-red')); ?>
		</div>
	</div>		
</div>

<div class="row">
	<div class="col-sm-2">
		<div class="form-group">
	    	<?php echo $form->label($model,'Sig_Vit_Temperatura'); ?>
			<?php echo $form->textField($model,'Sig_Vit_Temperatura', array('class' => 'form-control', 'autocomplete' => 'off', 'size'=>5, 'maxlength'=>5)); ?>  
	    </div>
	</div>
    <div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Sig_Vit_Temperatura', array('class' => 'pull-left badge bg-red')); ?>
		</div>
	</div>		
</div>

<div class="row">
	<div class="col-sm-2">
		<div class="form-group">
	    	<?php echo $form->label($model,'Sig_Vit_Presion_Arterial'); ?>
			<?php echo $form->textField($model,'Sig_Vit_Presion_Arterial', array('class' => 'form-control', 'autocomplete' => 'off')); ?> 
	    </div>
	</div>
    <div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Sig_Vit_Presion_Arterial', array('class' => 'pull-left badge bg-red')); ?>
		</div>
	</div>		
</div>

<h5>Órgano o sistema</h5>

<div class="row">
  	<div class="col-sm-4">
	    <div class="form-group">
	     	<?php echo $form->error($model,'Sis_Piel', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Sis_Piel'); ?>
			<?php echo $form->textArea($model,'Sis_Piel',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'value'=>'Normal')); ?>  	
	    </div>
  	</div>
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Sis_Cabeza', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Sis_Cabeza'); ?>
			<?php echo $form->textArea($model,'Sis_Cabeza',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'value'=>'Normal')); ?> 	
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
	    	<?php echo $form->error($model,'Sis_Ojos', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Sis_Ojos'); ?>
			<?php echo $form->textArea($model,'Sis_Ojos',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'value'=>'Normal')); ?>  		
	    </div>	
	</div>    
</div>
<div class="row">
  	<div class="col-sm-4">
	    <div class="form-group">
	     	<?php echo $form->error($model,'Sis_Oidos', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Sis_Oidos'); ?>
			<?php echo $form->textArea($model,'Sis_Oidos',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'value'=>'Normal')); ?>  	
	    </div>
  	</div>
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Sis_Nariz', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Sis_Nariz'); ?>
			<?php echo $form->textArea($model,'Sis_Nariz',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'value'=>'Normal')); ?> 	
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
	    	<?php echo $form->error($model,'Sis_Boca', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Sis_Boca'); ?>
			<?php echo $form->textArea($model,'Sis_Boca',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'value'=>'Normal')); ?>  		
	    </div>	
	</div>    
</div>
<div class="row">
  	<div class="col-sm-4">
	    <div class="form-group">
	    	<?php echo $form->error($model,'Sis_Piezas_Dentales', array('class' => 'pull-right badge bg-red')); ?>
	        <?php echo $form->label($model,'Sis_Piezas_Dentales'); ?>
	        <?php
	            $this->widget('ext.select2.ESelect2',array(
	                'name'=>'HcoMed[Sis_Piezas_Dentales]',
	                'id'=>'HcoMed_Sis_Piezas_Dentales',
	                'data'=>$lista_piezas_dent,
	                'value' => $model->Sis_Piezas_Dentales,
	                'htmlOptions'=>array(),
	                'options'=>array(
	                    'placeholder'=>'Seleccione...',
	                    'width'=> '100%',
	                    'allowClear'=>true,
	                ),
	            ));
	        ?> 	
	    </div>
  	</div>
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Sis_Estado_Piezas_Dentales', array('class' => 'pull-right badge bg-red')); ?>
	        <?php echo $form->label($model,'Sis_Estado_Piezas_Dentales'); ?>
	        <?php
	            $this->widget('ext.select2.ESelect2',array(
	                'name'=>'HcoMed[Sis_Estado_Piezas_Dentales]',
	                'id'=>'HcoMed_Sis_Estado_Piezas_Dentales',
	                'data'=>$lista_est_piezas_dent,
	                'value' => $model->Sis_Estado_Piezas_Dentales,
	                'htmlOptions'=>array(),
	                'options'=>array(
	                    'placeholder'=>'Seleccione...',
	                    'width'=> '100%',
	                    'allowClear'=>true,
	                ),
	            ));
	        ?>	
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
	     		
	    </div>	
	</div>    
</div>
<div class="row">
  	<div class="col-sm-4">
	    <div class="form-group">
	     	<?php echo $form->error($model,'Sis_Cuello', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Sis_Cuello'); ?>
			<?php echo $form->textArea($model,'Sis_Cuello',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'value'=>'Normal')); ?>	
	    </div>
  	</div>
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Sis_Respiratorio', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Sis_Respiratorio'); ?>
			<?php echo $form->textArea($model,'Sis_Respiratorio',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'value'=>'Normal')); ?>	
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
	    	<?php echo $form->error($model,'Sis_Cardiaco', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Sis_Cardiaco'); ?>
			<?php echo $form->textArea($model,'Sis_Cardiaco',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'value'=>'Normal')); ?> 		
	    </div>	
	</div>    
</div>
<div class="row">
  	<div class="col-sm-4">
	    <div class="form-group">
	     	<?php echo $form->error($model,'Sis_Abdomen', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Sis_Abdomen'); ?>
			<?php echo $form->textArea($model,'Sis_Abdomen',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'value'=>'Normal')); ?>	
	    </div>
  	</div>
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Sis_Miembros_Superiores', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Sis_Miembros_Superiores'); ?>
			<?php echo $form->textArea($model,'Sis_Miembros_Superiores',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'value'=>'Normal')); ?>	
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
	    	<?php echo $form->error($model,'Sis_Genito_Urinario', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Sis_Genito_Urinario'); ?>
			<?php echo $form->textArea($model,'Sis_Genito_Urinario',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'value'=>'Normal')); ?> 		
	    </div>	
	</div>    
</div>
<div class="row">
  	<div class="col-sm-4">
	    <div class="form-group">
	     	<?php echo $form->error($model,'Sis_Miembros_Inferiores', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Sis_Miembros_Inferiores'); ?>
			<?php echo $form->textArea($model,'Sis_Miembros_Inferiores',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'value'=>'Normal')); ?>	
	    </div>
  	</div>
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Sis_Columna_Vertebral', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Sis_Columna_Vertebral'); ?>
			<?php echo $form->textArea($model,'Sis_Columna_Vertebral',array('class' => 'form-control', 'rows'=>6, 'cols'=>50, 'value'=>'Normal')); ?>	
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">

	    </div>	
	</div>    
</div>
<div class="row">
 	<div class="col-sm-12">
		<div class="form-group">
			<h4>Valoración en miembros superiores, inferiores y columna</h4>	
		</div>	
	</div> 
	<div class="col-sm-12">
		<div class="form-group">
			<label>Deformidad Congénita y/o adquirida</label>	
		</div>	
	</div> 
	<div class="col-sm-1">
		<div class="form-group">
			<?php echo $form->label($model,'Deformidad_Cong_Adq_Izq'); ?>	
		</div>	
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<?php 
				echo $form->radioButtonList($model,'Deformidad_Cong_Adq_Izq',
			    	array('1'=>' ( + )','2'=>' ( - )'),
			    	array(
			        	'template'=>'{input}{label}',
			        	'separator'=>'',
			        	'labelOptions'=>array(
			            	'style'=> '
			                	padding-left:1%;
			                	padding-right:5%;
		            	'),
		          	)                              
		      	);
			?>	
		</div>	
	</div> 
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo $form->error($model,'Deformidad_Cong_Adq_Izq', array('class' => 'pull-right badge bg-red')); ?>	
		</div>	
	</div> 
	<div class="col-sm-1">
		<div class="form-group">
			<?php echo $form->label($model,'Deformidad_Cong_Adq_Der'); ?>	
		</div>	
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<?php 
				echo $form->radioButtonList($model,'Deformidad_Cong_Adq_Der',
			    	array('1'=>' ( + )','2'=>' ( - )'),
			    	array(
			        	'template'=>'{input}{label}',
			        	'separator'=>'',
			        	'labelOptions'=>array(
			            	'style'=> '
			                	padding-left:1%;
			                	padding-right:5%;
		            	'),
		          	)                              
		      	);
			?>	
		</div>	
	</div> 
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo $form->error($model,'Deformidad_Cong_Adq_Der', array('class' => 'pull-right badge bg-red')); ?>	
		</div>	
	</div>     
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label>Protuberancia</label>	
		</div>	
	</div> 
	<div class="col-sm-1">
		<div class="form-group">
			<?php echo $form->label($model,'Protuberancia_Izq'); ?>	
		</div>	
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<?php 
				echo $form->radioButtonList($model,'Protuberancia_Izq',
			    	array('1'=>' ( + )','2'=>' ( - )'),
			    	array(
			        	'template'=>'{input}{label}',
			        	'separator'=>'',
			        	'labelOptions'=>array(
			            	'style'=> '
			                	padding-left:1%;
			                	padding-right:5%;
		            	'),
		          	)                              
		      	);
			?>	
		</div>	
	</div> 
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo $form->error($model,'Protuberancia_Izq', array('class' => 'pull-right badge bg-red')); ?>	
		</div>	
	</div> 
	<div class="col-sm-1">
		<div class="form-group">
			<?php echo $form->label($model,'Protuberancia_Der'); ?>	
		</div>	
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<?php 
				echo $form->radioButtonList($model,'Protuberancia_Der',
			    	array('1'=>' ( + )','2'=>' ( - )'),
			    	array(
			        	'template'=>'{input}{label}',
			        	'separator'=>'',
			        	'labelOptions'=>array(
			            	'style'=> '
			                	padding-left:1%;
			                	padding-right:5%;
		            	'),
		          	)                              
		      	);
			?>	
		</div>	
	</div> 
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo $form->error($model,'Protuberancia_Der', array('class' => 'pull-right badge bg-red')); ?>	
		</div>	
	</div>     
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label>Dolor</label>	
		</div>	
	</div> 
	<div class="col-sm-1">
		<div class="form-group">
			<?php echo $form->label($model,'Dolor_Izq'); ?>	
		</div>	
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<?php 
				echo $form->radioButtonList($model,'Dolor_Izq',
			    	array('1'=>' ( + )','2'=>' ( - )'),
			    	array(
			        	'template'=>'{input}{label}',
			        	'separator'=>'',
			        	'labelOptions'=>array(
			            	'style'=> '
			                	padding-left:1%;
			                	padding-right:5%;
		            	'),
		          	)                              
		      	);
			?>	
		</div>	
	</div> 
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo $form->error($model,'Dolor_Izq', array('class' => 'pull-right badge bg-red')); ?>	
		</div>	
	</div> 
	<div class="col-sm-1">
		<div class="form-group">
			<?php echo $form->label($model,'Dolor_Der'); ?>	
		</div>	
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<?php 
				echo $form->radioButtonList($model,'Dolor_Der',
			    	array('1'=>' ( + )','2'=>' ( - )'),
			    	array(
			        	'template'=>'{input}{label}',
			        	'separator'=>'',
			        	'labelOptions'=>array(
			            	'style'=> '
			                	padding-left:1%;
			                	padding-right:5%;
		            	'),
		          	)                              
		      	);
			?>	
		</div>	
	</div> 
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo $form->error($model,'Dolor_Der', array('class' => 'pull-right badge bg-red')); ?>	
		</div>	
	</div>     
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label>Compromiso articular</label>	
		</div>	
	</div> 
	<div class="col-sm-1">
		<div class="form-group">
			<?php echo $form->label($model,'Compromiso_Articular_Izq'); ?>	
		</div>	
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<?php 
				echo $form->radioButtonList($model,'Compromiso_Articular_Izq',
			    	array('1'=>' ( + )','2'=>' ( - )'),
			    	array(
			        	'template'=>'{input}{label}',
			        	'separator'=>'',
			        	'labelOptions'=>array(
			            	'style'=> '
			                	padding-left:1%;
			                	padding-right:5%;
		            	'),
		          	)                              
		      	);
			?>	
		</div>	
	</div> 
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo $form->error($model,'Compromiso_Articular_Izq', array('class' => 'pull-right badge bg-red')); ?>	
		</div>	
	</div> 
	<div class="col-sm-1">
		<div class="form-group">
			<?php echo $form->label($model,'Compromiso_Articular_Der'); ?>	
		</div>	
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<?php 
				echo $form->radioButtonList($model,'Compromiso_Articular_Der',
			    	array('1'=>' ( + )','2'=>' ( - )'),
			    	array(
			        	'template'=>'{input}{label}',
			        	'separator'=>'',
			        	'labelOptions'=>array(
			            	'style'=> '
			                	padding-left:1%;
			                	padding-right:5%;
		            	'),
		          	)                              
		      	);
			?>	
		</div>	
	</div> 
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo $form->error($model,'Compromiso_Articular_Der', array('class' => 'pull-right badge bg-red')); ?>	
		</div>	
	</div>     
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label>Disminución de la movilidad</label>	
		</div>	
	</div> 
	<div class="col-sm-1">
		<div class="form-group">
			<?php echo $form->label($model,'Disminucion_Mov_Dom_Izq'); ?>	
		</div>	
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<?php 
				echo $form->radioButtonList($model,'Disminucion_Mov_Dom_Izq',
			    	array('1'=>' ( + )','2'=>' ( - )'),
			    	array(
			        	'template'=>'{input}{label}',
			        	'separator'=>'',
			        	'labelOptions'=>array(
			            	'style'=> '
			                	padding-left:1%;
			                	padding-right:5%;
		            	'),
		          	)                              
		      	);
			?>	
		</div>	
	</div> 
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo $form->error($model,'Disminucion_Mov_Dom_Izq', array('class' => 'pull-right badge bg-red')); ?>	
		</div>	
	</div> 
	<div class="col-sm-1">
		<div class="form-group">
			<?php echo $form->label($model,'Disminucion_Mov_Dom_Der'); ?>	
		</div>	
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<?php 
				echo $form->radioButtonList($model,'Disminucion_Mov_Dom_Der',
			    	array('1'=>' ( + )','2'=>' ( - )'),
			    	array(
			        	'template'=>'{input}{label}',
			        	'separator'=>'',
			        	'labelOptions'=>array(
			            	'style'=> '
			                	padding-left:1%;
			                	padding-right:5%;
		            	'),
		          	)                              
		      	);
			?>	
		</div>	
	</div> 
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo $form->error($model,'Disminucion_Mov_Dom_Der', array('class' => 'pull-right badge bg-red')); ?>	
		</div>	
	</div>     
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label>Parálisis</label>	
		</div>	
	</div> 
	<div class="col-sm-1">
		<div class="form-group">
			<?php echo $form->label($model,'Paralisis_Izq'); ?>	
		</div>	
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<?php 
				echo $form->radioButtonList($model,'Paralisis_Izq',
			    	array('1'=>' ( + )','2'=>' ( - )'),
			    	array(
			        	'template'=>'{input}{label}',
			        	'separator'=>'',
			        	'labelOptions'=>array(
			            	'style'=> '
			                	padding-left:1%;
			                	padding-right:5%;
		            	'),
		          	)                              
		      	);
			?>	
		</div>	
	</div> 
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo $form->error($model,'Paralisis_Izq', array('class' => 'pull-right badge bg-red')); ?>	
		</div>	
	</div> 
	<div class="col-sm-1">
		<div class="form-group">
			<?php echo $form->label($model,'Paralisis_Der'); ?>	
		</div>	
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<?php 
				echo $form->radioButtonList($model,'Paralisis_Der',
			    	array('1'=>' ( + )','2'=>' ( - )'),
			    	array(
			        	'template'=>'{input}{label}',
			        	'separator'=>'',
			        	'labelOptions'=>array(
			            	'style'=> '
			                	padding-left:1%;
			                	padding-right:5%;
		            	'),
		          	)                              
		      	);
			?>	
		</div>	
	</div> 
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo $form->error($model,'Paralisis_Der', array('class' => 'pull-right badge bg-red')); ?>	
		</div>	
	</div>     
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label>Rigidez</label>	
		</div>	
	</div> 
	<div class="col-sm-1">
		<div class="form-group">
			<?php echo $form->label($model,'Rigidez_Izq'); ?>	
		</div>	
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<?php 
				echo $form->radioButtonList($model,'Rigidez_Izq',
			    	array('1'=>' ( + )','2'=>' ( - )'),
			    	array(
			        	'template'=>'{input}{label}',
			        	'separator'=>'',
			        	'labelOptions'=>array(
			            	'style'=> '
			                	padding-left:1%;
			                	padding-right:5%;
		            	'),
		          	)                              
		      	);
			?>	
		</div>	
	</div> 
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo $form->error($model,'Rigidez_Izq', array('class' => 'pull-right badge bg-red')); ?>	
		</div>	
	</div> 
	<div class="col-sm-1">
		<div class="form-group">
			<?php echo $form->label($model,'Rigidez_Der'); ?>	
		</div>	
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<?php 
				echo $form->radioButtonList($model,'Rigidez_Der',
			    	array('1'=>' ( + )','2'=>' ( - )'),
			    	array(
			        	'template'=>'{input}{label}',
			        	'separator'=>'',
			        	'labelOptions'=>array(
			            	'style'=> '
			                	padding-left:1%;
			                	padding-right:5%;
		            	'),
		          	)                              
		      	);
			?>	
		</div>	
	</div> 
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo $form->error($model,'Rigidez_Der', array('class' => 'pull-right badge bg-red')); ?>	
		</div>	
	</div>     
</div>	
<div class="row">
	<div class="col-sm-4">
	    <div class="form-group">
			<?php echo $form->error($model,'Hallazgo_Osteomuscular', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Hallazgo_Osteomuscular'); ?>
			<?php echo $form->textArea($model,'Hallazgo_Osteomuscular',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>	
		</div>
  	</div>
  	<div class="col-sm-4">
	    <div class="form-group">
	     	<?php echo $form->error($model,'Ant_Traumatico', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Ant_Traumatico'); ?>
			<?php echo $form->textArea($model,'Ant_Traumatico',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>	 	
	    </div>
  	</div>   
</div>

<h5>Signos</h5>

<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
	    	<?php echo $form->error($model,'Tono_Fuerza_Reflejos', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Tono_Fuerza_Reflejos'); ?>
			<?php echo $form->textArea($model,'Tono_Fuerza_Reflejos',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>	 				
	    </div>	
	</div>
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Maniobra_Desault', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Maniobra_Desault'); ?>
			<?php echo $form->textArea($model,'Maniobra_Desault',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>	 			
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
	    	<?php echo $form->error($model,'Codo_Tenista', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Codo_Tenista'); ?>
			<?php echo $form->textArea($model,'Codo_Tenista',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>	 				
	    </div>	  
  	</div>   
</div>
<div class="row">
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Codo_Golfista', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Codo_Golfista'); ?>
			<?php echo $form->textArea($model,'Codo_Golfista',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>	 			
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
	    	<?php echo $form->error($model,'Signo_Phalen', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Signo_Phalen'); ?>
			<?php echo $form->textArea($model,'Signo_Phalen',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>	 				
	    </div>	
	</div>
	<div class="col-sm-4">
		<div class="form-group">
	    	<?php echo $form->error($model,'Signo_Tinel', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Signo_Tinel'); ?>
			<?php echo $form->textArea($model,'Signo_Tinel',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>	 				
	    </div>	  
  	</div>   
</div>
<div class="row">
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Maniobra_Finkelsten', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Maniobra_Finkelsten'); ?>
			<?php echo $form->textArea($model,'Maniobra_Finkelsten',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>	 			
		</div>
	</div>
	<div class="col-sm-4">
			
	</div>
	<div class="col-sm-4">
			  
  	</div>   
</div>

<h5>Maniobras para columna</h5>

<div class="row">
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Prueba_Jackson', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Prueba_Jackson'); ?>
			<?php echo $form->textArea($model,'Prueba_Jackson',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>	 			
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Prueba_Lasegue', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Prueba_Lasegue'); ?>
			<?php echo $form->textArea($model,'Prueba_Lasegue',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>	 			
		</div>		
	</div>
	<div class="col-sm-4">
			  
  	</div>   
</div>

<h5>Maniobras de miembros inferiores</h5>

<div class="row">
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Prueba_Cajon', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Prueba_Cajon'); ?>
			<?php echo $form->textArea($model,'Prueba_Cajon',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>	 			
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Prueba_Bostezo', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Prueba_Bostezo'); ?>
			<?php echo $form->textArea($model,'Prueba_Bostezo',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>	 			
		</div>		
	</div>
	<div class="col-sm-4">
			  
  	</div>   
</div>

<div class="row">
  	<div class="col-sm-4" id="concepto" style="display: none;">
		<div class="form-group">
			<?php echo $form->error($model,'Concepto', array('class' => 'pull-right badge bg-red')); ?>
	        <?php echo $form->label($model,'Concepto'); ?>
	        <?php
	            $this->widget('ext.select2.ESelect2',array(
	                'name'=>'HcoMed[Concepto]',
	                'id'=>'HcoMed_Concepto',
	                'data'=>$lista_concepto,
	                'value' => $model->Concepto,
	                'htmlOptions'=>array(),
	                'options'=>array(
	                    'placeholder'=>'Seleccione...',
	                    'width'=> '100%',
	                    'allowClear'=>true,
	                ),
	            ));
	        ?>	
		</div>
	</div>
 	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Concepto_Egreso', array('class' => 'pull-right badge bg-red')); ?>
	        <?php echo $form->label($model,'Concepto_Egreso'); ?>
	        <?php
	            $this->widget('ext.select2.ESelect2',array(
	                'name'=>'HcoMed[Concepto_Egreso]',
	                'id'=>'HcoMed_Concepto_Egreso',
	                'data'=>$lista_concepto_egreso,
	                'value' => $model->Concepto_Egreso,
	                'htmlOptions'=>array(),
	                'options'=>array(
	                    'placeholder'=>'Seleccione...',
	                    'width'=> '100%',
	                    'allowClear'=>true,
	                ),
	            ));
	        ?>	
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Observaciones_Concepto_Egreso', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Observaciones_Concepto_Egreso'); ?>
			<?php echo $form->textArea($model,'Observaciones_Concepto_Egreso',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>	 			
		</div>
	</div>    
</div>
<div class="row">
  	<div class="col-sm-4" id="concepto" style="display: none;">
		<div class="form-group">
			<?php echo $form->error($model,'Concepto', array('class' => 'pull-right badge bg-red')); ?>
	        <?php echo $form->label($model,'Concepto'); ?>
	        <?php
	            $this->widget('ext.select2.ESelect2',array(
	                'name'=>'HcoMed[Concepto]',
	                'id'=>'HcoMed_Concepto',
	                'data'=>$lista_concepto,
	                'value' => $model->Concepto,
	                'htmlOptions'=>array(),
	                'options'=>array(
	                    'placeholder'=>'Seleccione...',
	                    'width'=> '100%',
	                    'allowClear'=>true,
	                ),
	            ));
	        ?>	
		</div>
	</div>
 	<div class="col-sm-8">
		<div class="form-group">
            <?php echo $form->error($model,'Diagnostico', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Diagnostico'); ?>

            <?php echo $form->textField($model,'Diagnostico'); ?>
            <?php
                $this->widget('ext.select2.ESelect2', array(
                    'selector' => '#HcoMed_Diagnostico',
                    'options'  => array(
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'width' => '100%',
                        'language' => 'es',
                        'ajax' => array(
                            'url' => Yii::app()->createUrl('dominioMedico/SearchCie10'),
                            'dataType'=>'json',
                            'data'=>'js:function(term){return{q: term};}',
                            'results'=>'js:function(data){ return {results:data};}'                   
                        ),
                        'formatNoMatches'=> 'js:function(){ clear_select2_ajax("HcoMed_Diagnostico"); return "No se encontraron resultados"; }',
                        'formatInputTooShort' =>  'js:function(){ return "Digite más de 3 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'HcoMed_Diagnostico\')\">Limpiar campo</button>"; }',
                    ),
                ));
            ?>
        </div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<?php echo $form->error($model,'Recomendaciones', array('class' => 'pull-right badge bg-red')); ?>
			<?php echo $form->label($model,'Recomendaciones'); ?>
			<?php echo $form->textArea($model,'Recomendaciones',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>	 			
		</div>
	</div>    
</div>

<div class="btn-group" style="padding-bottom: 2%">
    <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=empleado/viewmed&id='.$e; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div> 

<?php $this->endWidget(); ?>


<script type="text/javascript">

$("#HcoMed_Sig_Vit_Talla").change(function() {
	debugger;
    var talla = this.value;
    var peso = $('#HcoMed_Sig_Vit_Peso').val();

    if(talla != '' && peso != ''){
  		var talla_mt = talla / 100;
  		var talla_cuad = talla_mt * talla_mt;
  		var imc = peso / talla_cuad;
  		var imc_dec = imc.toFixed(2);
  		$('#HcoMed_Sig_Vit_Imc').val(imc_dec);
    }else{
        $('#HcoMed_Sig_Vit_Imc').val('');
    }
});

$("#HcoMed_Sig_Vit_Peso").change(function() {
	debugger;
	var talla = $('#HcoMed_Sig_Vit_Talla').val();
    var peso = this.value;

    if(talla != '' && peso != ''){
   		var talla_mt = talla / 100;
   		var talla_cuad = talla_mt * talla_mt;
  		var imc = peso / talla_cuad;
  		var imc_dec = imc.toFixed(2);
  		$('#HcoMed_Sig_Vit_Imc').val(imc_dec);
    }else{
        $('#HcoMed_Sig_Vit_Imc').val('');
    }
});

$("#HcoMed_Tipo_Examen").change(function() {
    var valor = this.value;

    if(valor == <?php echo Yii::app()->params->tipo_examen_ingreso; ?>){
       	$('#HcoMed_Concepto').val('').trigger('change');
       	$('#concepto').show(); 
    }else{
    	$('#concepto').hide(); 
        $('#HcoMed_Concepto').val('').trigger('change');
    }
});

$("#HcoMed_Tipo_Riesgo").change(function() {
    var valor = this.value;

    var data = {tipo_riesgo: valor}
  	$.ajax({ 
	    type: "POST", 
	    url: "<?php echo Yii::app()->createUrl('dominioMedico/getRiesgos'); ?>",
	    data: data,
	    dataType: 'json',
	    success: function(data){ 
	    	var riesgos = data['riesgos'];
	    	$('#HcoMed_Riesgo').val('').trigger('change');
            $("#HcoMed_Riesgo").html('');
            $("#HcoMed_Riesgo").append('<option value=""></option>');
            $.each(riesgos, function(i,item){
                $("#HcoMed_Riesgo").append('<option value="'+riesgos[i].id+'">'+riesgos[i].text+'</option>');
            });
	    }
  	});
 
});

function clear_select2_ajax(id){
    $('#'+id+'').val('').trigger('change');
    $('#s2id_'+id+' span').html("");
}		

</script>
