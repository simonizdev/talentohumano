<?php
/* @var $this UpdThController */
/* @var $model UpdTh */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'upd-th-form',
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
    		<?php echo $form->error($model,'Descripcion', array('class' => 'pull-right badge bg-red')); ?>
          	<?php echo $form->label($model,'Descripcion'); ?>
		    <?php echo '<p>'.$model->Descripcion.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="form-group">
            <?php echo $form->error($model,'usuarios', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'usuarios'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'UpdTh[usuarios]',
                    'id'=>'UpdTh_usuarios',
                    'data'=>$lista_usuarios,
                    'htmlOptions'=>array(
                        'multiple'=>'multiple',
                    ),
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
    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=updth/admin'; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>   

<?php $this->endWidget(); ?>
