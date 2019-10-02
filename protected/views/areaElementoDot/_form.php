<?php
/* @var $this AreaElementoDotController */
/* @var $model AreaElementoDot */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'area-elemento-dot-form',
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
    <div class="col-sm-8">
        <div class="form-group">
            <?php echo $form->error($model,'Id_A_Elemento', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_A_Elemento'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'AreaElementoDot[Id_A_Elemento]',
                    'id'=>'AreaElementoDot_Id_A_Elemento',
                    'data'=>$lista_ea,
                    'value' => $model->Id_A_Elemento,
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
    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=areaElementoDot/admin'; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="submit" class="btn btn-success" ><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>

<?php $this->endWidget(); ?>

