<?php
/* @var $this AreaElementoController */
/* @var $model AreaElemento */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'area-elemento-form',
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
            <?php echo $form->error($model,'Id_Elemento', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Elemento'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'AreaElemento[Id_Elemento]',
                    'id'=>'AreaElemento_Id_Elemento',
                    'data'=>$lista_elementos,
                    'value' => $model->Id_Elemento,
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
            <?php echo $form->error($model,'Id_Area', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Area'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'AreaElemento[Id_Area]',
                    'id'=>'AreaElemento_Id_Area',
                    'data'=>$lista_areas,
                    'value' => $model->Id_Area,
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
            <?php echo $form->error($model,'Id_Subarea', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Subarea'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'AreaElemento[Id_Subarea]',
                    'id'=>'AreaElemento_Id_Subarea',
                    'data'=>$lista_subareas,
                    'value' => $model->Id_Subarea,
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
            <?php echo $form->error($model,'Estado', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Estado'); ?>
            <?php $estados = Yii::app()->params->estados; ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'AreaElemento[Estado]',
                    'id'=>'AreaElemento_Estado',
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
    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=areaElemento/admin'; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div> 

<?php $this->endWidget(); ?>
