<?php
/* @var $this DominioWebController */
/* @var $model DominioWeb */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dominio-web-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Id_Tipo', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Tipo'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'DominioWeb[Id_Tipo]',
                    'id'=>'DominioWeb_Id_Tipo',
                    'data'=>$lista_tipos,
                    'value' => $model->Id_Tipo,
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
            <?php echo $form->error($model,'Dominio', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Dominio'); ?>
            <?php echo $form->textField($model,'Dominio', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
    		<?php echo $form->error($model,'Link', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Link'); ?>
		    <?php echo $form->textField($model,'Link', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Usuario', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Usuario'); ?>
            <?php echo $form->textField($model,'Usuario', array('class' => 'form-control', 'maxlength' => '50', 'autocomplete' => 'off')); ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Password', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Password'); ?>
            <?php echo $form->textField($model,'Password', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
    		<?php echo $form->error($model,'Empresa_Administradora', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Empresa_Administradora'); ?>
		    <?php echo $form->textField($model,'Empresa_Administradora', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Contacto_Emp_Adm', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Contacto_Emp_Adm'); ?>
            <?php echo $form->textField($model,'Contacto_Emp_Adm', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <div class="form-group">
                <?php echo $form->error($model,'Contratado_Por', array('class' => 'pull-right badge bg-red')); ?>
                <?php echo $form->label($model,'Contratado_Por'); ?>
                <?php echo $form->textField($model,'Contratado_Por', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
            </div> 
        </div>
    </div>
	<div class="col-sm-4">
    	<div class="form-group">
    		<?php echo $form->error($model,'Uso', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Uso'); ?>
		    <?php echo $form->textField($model,'Uso', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
        </div>
    </div>   
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Fecha_Activacion', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Fecha_Activacion'); ?>
            <?php echo $form->textField($model,'Fecha_Activacion', array('class' => 'form-control', 'readonly' => true)); ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Fecha_Vencimiento', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Fecha_Vencimiento'); ?>
            <?php echo $form->textField($model,'Fecha_Vencimiento', array('class' => 'form-control', 'readonly' => true)); ?>
        </div>
    </div>
	<div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Estado', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Estado'); ?>
            <?php $estados = Yii::app()->params->estados; ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'DominioWeb[Estado]',
                    'id'=>'DominioWeb_Estado',
                    'data'=>$estados,
                    'value' => $model->Estado,
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
            <?php echo $form->error($model,'Observaciones', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Observaciones'); ?>
            <?php echo $form->textArea($model,'Observaciones',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
        </div>
    </div>
</div>
<div class="btn-group" style="padding-bottom: 2%">
    <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=dominioWeb/admin'; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div> 

<?php $this->endWidget(); ?>

<script type="text/javascript">

$(function() {	

	//variables para el lenguaje del datepicker
	$.fn.datepicker.dates['es'] = {
	  days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
	  daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
	  daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sá"],
	  months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
	  monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
	  today: "Hoy",
	  clear: "Limpiar",
	  format: "yyyy-mm-dd",
	  titleFormat: "MM yyyy",
	  weekStart: 1
	};

	$("#DominioWeb_Fecha_Activacion").datepicker({
	  language: 'es',
	  autoclose: true,
	  orientation: "right bottom",
	}).on('changeDate', function (selected) {
	   var minDate = new Date(selected.date.valueOf());
	   $('#DominioWeb_Fecha_Vencimiento').datepicker('setStartDate', minDate);
	});

	$("#DominioWeb_Fecha_Vencimiento").datepicker({
	  language: 'es',
	  autoclose: true,
	  orientation: "right bottom",
	}).on('changeDate', function (selected) {
	   var maxDate = new Date(selected.date.valueOf());
	   $('#DominioWeb_Fecha_Activacion').datepicker('setEndDate', maxDate);
	}); 

});

</script>





