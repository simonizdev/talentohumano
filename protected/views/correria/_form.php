<?php
/* @var $this CorreriaController */
/* @var $model Correria */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'correria-form',
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
            <?php echo $form->error($model,'Id_Siesa', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Siesa'); ?>
            <?php echo '<p>'.$model->Id_Siesa.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Ciudad', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Ciudad'); ?>
            <?php echo '<p>'.$model->Ciudad.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Porcentaje', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Porcentaje'); ?>
            <?php echo $form->numberField($model,'Porcentaje', array('class' => 'form-control', 'autocomplete' => 'off', 'step' => '0.01', 'min' => '0.00', 'placeholder' => '0,00', 'value' => number_format($model->Porcentaje, 2))); ?>
        </div>
    </div>
</div>
<div class="row">
   	<div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Estado', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Estado'); ?>
            <?php echo '<p>'.UtilidadesVarias::textoestado1($model->Estado).'</p>'; ?>
        </div>
    </div>
</div>

<div class="btn-group" style="padding-bottom: 2%" id="buttons">
    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=correria/admin'; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>

<?php $this->endWidget(); ?>