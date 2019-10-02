<?php
/* @var $this ContratoEmpleadoController */
/* @var $model ContratoEmpleado */

?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'contrato-empleado-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

<h3>Asignación de elementos a empleado</h3>

<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            <?php echo $form->error($model,'Id_Empleado', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Empleado'); ?>
            <?php echo $form->hiddenField($model,'Id_Empleado'); ?>
            <?php echo '<p>'.UtilidadesEmpleado::nombreempleado($e).'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Id_Empresa', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Empresa'); ?>
            <?php echo '<p>'.$model->idempresa->Descripcion.'</p>'; ?> 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Id_Unidad_Gerencia', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Unidad_Gerencia'); ?>
            <?php echo '<p>'.$unidad_gerencia.'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Id_Area', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Area'); ?>
            <?php echo '<p>'.$area.'</p>'; ?> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Id_Subarea', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Subarea'); ?>
            <?php echo '<p>'.$subarea.'</p>'; ?> 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Id_Cargo', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Id_Cargo'); ?>
            <?php echo '<p>'.$cargo.'</p>'; ?> 
        </div>
    </div>
</div>

<?php

    if($as == 1){

        echo '<br />';
        echo '
        <label>Sugeridos: Cant. - Elem. (Subárea / Área)</label>';

        $criteria1=new CDbCriteria;
        $criteria1->join = '
        LEFT JOIN TH_AREA_ELEMENTO ae ON t.Id_A_Elemento = ae.Id_A_Elemento
        LEFT JOIN TH_ELEMENTO e ON e.Id_Elemento = ae.Id_Elemento
        LEFT JOIN TH_AREA a ON a.Id_Area = ae.Id_Area
        LEFT JOIN TH_SUBAREA s ON s.Id_Subarea = ae.Id_Subarea
        ';
        $criteria1->condition='t.Id_Sugerido=:Id_Sugerido AND t.Estado=:Estado';
        $criteria1->params=array(':Id_Sugerido'=> $s,':Estado'=> 1);
        $criteria1->order= 'e.Elemento ASC, s.Subarea ASC, a.Area ASC';
        $elementos_sugerido=ElementoSugerido::model()->findAll($criteria1);

        $c_s = "<ul>";

        foreach ($elementos_sugerido as $sug) {
            $c_s .= "<li>".$sug->Cantidad." - ".$sug->idaelemento->idelemento->Elemento." (".$sug->idaelemento->idsubarea->Subarea." / ".$sug->idaelemento->idarea->Area.")</li>";    
        }
        $c_s .= "</ul><br />";

        echo $c_s;
    }

    if($as == 1 || $am == 1){

        echo '<p>Por favor seleccione una opción de asignación:</p>';

    }else{
        echo '<p>No se puede realizar asignación de elementos.</p>';
    }

?>

<div class="btn-group" style="padding-bottom: 2%;padding-top: 2%" id="buttons">
    <button type="button" class="btn btn-success"  onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=empleado/view&id='.$model->Id_Empleado; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <?php

        if($as == 1){

        ?>

            <button type="submit" class="btn btn-success" id="valida_form" onclick="hidebuttons();"><i class="fa fa-sitemap"></i> Asignación de sugerido(s)</button>

        <?php

        }

        if($am == 1){

        ?>

            <button type="button" class="btn btn-success"  onclick="hidebuttons();location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=elementoEmpleado/asignacion&e='.$model->Id_Empleado; ?>';"><i class="fa fa-check"></i> Asignación manual</button>

        <?php

        } 

    ?>

</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
    
    function hidebuttons(){
        $('#buttons').hide();
    }

</script>
