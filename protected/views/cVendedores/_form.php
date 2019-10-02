<?php
/* @var $this CVendedoresController */
/* @var $model CVendedores */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cvendedores-form',
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
            <?php echo $form->label($model,'ROWID'); ?>
            <p><?php echo $model->ROWID; ?></p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'NIT_VENDEDOR'); ?>
            <p><?php echo $model->NIT_VENDEDOR; ?></p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'NOMBRE_VENDEDOR'); ?>
            <p><?php echo $model->NOMBRE_VENDEDOR; ?></p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'EMAIL', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'EMAIL'); ?>
            <?php echo $form->textField($model,'EMAIL', array('class' => 'form-control', 'maxlength' => '50', 'autocomplete' => 'off', 'onkeyup' => 'convert_min(this)')); ?>
        </div>
    </div>
   	<div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'ID_VENDEDOR'); ?>
            <p><?php echo $model->ID_VENDEDOR; ?></p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'RECIBO'); ?>
            <p><?php echo $model->RECIBO; ?></p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'RUTA'); ?>
            <p><?php echo $model->RUTA; ?></p>
        </div>
    </div>	
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'NOMBRE_RUTA'); ?>
            <p><?php echo $model->NOMBRE_RUTA; ?></p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'PORTAFOLIO'); ?>
            <p><?php echo $model->PORTAFOLIO; ?></p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'NIT_SUPERVISOR'); ?>
            <p><?php echo $model->NIT_SUPERVISOR; ?></p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'NOMBRE_SUPERVISOR'); ?>
            <p><?php echo $model->NOMBRE_SUPERVISOR; ?></p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'TIPO', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'TIPO'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'CVendedores[TIPO]',
                    'id'=>'cVendedores_TIPO',
                    'data'=> $lista_tipos,
                    'value' => $model->TIPO,
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
            <?php echo $form->label($model,'ESTADO'); ?>
            <p><?php echo $model->ESTADO; ?></p>
        </div>
    </div>   
</div>

<div class="btn-group" style="padding-bottom: 2%" id="buttons">
    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=cVendedores/admin'; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="submit" class="btn btn-success" ><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>

<?php $this->endWidget(); ?>