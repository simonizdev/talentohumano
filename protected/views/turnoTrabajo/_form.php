<?php
/* @var $this TurnoTrabajoController */
/* @var $model TurnoTrabajo */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'turno-trabajo-form',
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
    		<?php echo $form->error($model,'Rango_Dias1', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Rango_Dias1'); ?>
		    <?php echo $form->textField($model,'Rango_Dias1', array('class' => 'form-control', 'maxlength' => '3', 'autocomplete' => 'off', 'onkeyup' => 'convert_may(this)')); ?>
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
    		<?php echo $form->error($model,'Entrada1', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Entrada1'); ?>
		    <?php echo $form->textField($model,'Entrada1', array('class' => 'form-control timepicker', 'autocomplete' => 'off', 'readonly' => true, 'value' => $model->HoraAmPm($model->Entrada1))); ?>
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
    		<?php echo $form->error($model,'Salida1', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Salida1'); ?>
		    <?php echo $form->textField($model,'Salida1', array('class' => 'form-control timepicker', 'autocomplete' => 'off', 'readonly' => true, 'value' => $model->HoraAmPm($model->Salida1))); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
    	<div class="form-group">
    		<?php echo $form->error($model,'Rango_Dias2', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Rango_Dias2'); ?>
		    <?php echo $form->textField($model,'Rango_Dias2', array('class' => 'form-control', 'maxlength' => '3', 'autocomplete' => 'off', 'onkeyup' => 'convert_may(this)')); ?>
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
    		<?php echo $form->error($model,'Entrada2', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Entrada2'); ?>
		    <?php echo $form->textField($model,'Entrada2', array('class' => 'form-control timepicker', 'autocomplete' => 'off', 'readonly' => true, 'value' => $model->HoraAmPm($model->Entrada2))); ?>
        </div>
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
    		<?php echo $form->error($model,'Salida2', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Salida2'); ?>
		    <?php echo $form->textField($model,'Salida2', array('class' => 'form-control timepicker', 'autocomplete' => 'off', 'readonly' => true, 'value' => $model->HoraAmPm($model->Salida2))); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Estado', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Estado'); ?>
            <?php $estados = Yii::app()->params->estados; ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'TurnoTrabajo[Estado]',
                    'id'=>'TurnoTrabajo_Estado',
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

<div class="btn-group" style="padding-bottom: 2%">
    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=turnoTrabajo/admin'; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>  

<?php $this->endWidget(); ?>