<?php
/* @var $this CarpCompController */
/* @var $model CarpComp */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'carp-comp-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i>Realizado</h4>
      <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?> 

<?php if(Yii::app()->user->hasFlash('warning')):?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-info"></i>Info</h4>
      <?php echo Yii::app()->user->getFlash('warning'); ?>
    </div>
<?php endif; ?> 

<div class="btn-group" id="btn_save" style="padding-bottom: 2%">
   <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=carpComp/admin'; ?>';"><i class="fa fa-reply"></i> Volver </button>
   <button type="button" class="btn btn-success" id="valida_form"><i class="fa fa-floppy-o"></i> Guardar</button>
</div>

<div class="row">
	<div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'Tipo_Acceso'); ?>
            <p><?php if ($model->Tipo_Acceso == 1){ echo 'GENÉRICO'; }else{ echo 'PERSONAL'; } ?></p>   
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Servidor', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Servidor'); ?>
            <?php echo $form->textField($model,'Servidor', array('class' => 'form-control', 'maxlength' => '200', 'autocomplete' => 'off')); ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Carpeta', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Carpeta'); ?>
            <?php echo $form->textField($model,'Carpeta', array('class' => 'form-control', 'maxlength' => '200', 'autocomplete' => 'off')); ?>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Ruta', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Ruta'); ?>
            <?php echo $form->textField($model,'Ruta', array('class' => 'form-control', 'maxlength' => '200', 'autocomplete' => 'off')); ?>
        </div>
    </div>
    <?php if($model->Tipo_Acceso == 1){ ?> 
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo $form->error($model,'Usuario', array('class' => 'pull-right badge bg-red')); ?>
                <?php echo $form->label($model,'Usuario'); ?>
                <?php echo $form->textField($model,'Usuario', array('class' => 'form-control', 'maxlength' => '30', 'autocomplete' => 'off')); ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo $form->error($model,'Password', array('class' => 'pull-right badge bg-red')); ?>
                <?php echo $form->label($model,'Password'); ?>
                <?php echo $form->textField($model,'Password', array('class' => 'form-control', 'maxlength' => '200', 'autocomplete' => 'off')); ?>
            </div>
        </div>
     <?php } ?> 
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->error($model,'Estado', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Estado'); ?>
            <?php $estados = Yii::app()->params->estados; ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'CarpComp[Estado]',
                    'id'=>'CarpComp_Estado',
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
    <div class="col-sm-4">
        <div class="form-group">
            <label>Usuario que creo</label> 
            <p><?php echo $model->idusuariocre->Usuario; ?></p>                
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Fecha de creación</label>
            <p><?php echo UtilidadesVarias::textofechahora($model->Fecha_Creacion); ?></p>                  
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Usuario que actualizó</label>
            <p><?php echo $model->idusuarioact->Usuario; ?></p>                     
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Fecha de actualización</label>
            <p><?php echo UtilidadesVarias::textofechahora($model->Fecha_Actualizacion); ?></p>                    
        </div>
    </div>
    <div class="col-sm-4">
        
    </div>
</div>

<div class="btn-group" id="btn_add" style="padding-bottom: 2%">
    <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=UsuarioCarpComp/create&carp='.$model->Id_Carpeta_Comp; ?>';"><i class="fa fa-plus"></i> Nuevo usuario</button>
</div>

<?php $this->endWidget(); ?>

<h3>Usuarios asociados</h3>

<?php 

//Empleados con usuario asociado a carpeta

if($model->Tipo_Acceso == 1){
    //GENÉRICO
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'idocto-movto-grid',
        'dataProvider'=>$detalle->search(),
        //'filter'=>$model,
        'enableSorting' => false,
        'columns'=>array(
            array(
                'name'=>'Id_Empleado',
                'value' => '($data->Id_Empleado == "") ? "-" :  UtilidadesEmpleado::nombreempleado($data->Id_Empleado)',
            ),
            array(
                'name'=>'Id_Usuario_Actualizacion',
                'value'=>'$data->idusuarioact->Usuario',
            ),
            array(
                'name'=>'Fecha_Actualizacion',
                'value'=>'UtilidadesVarias::textofechahora($data->Fecha_Actualizacion)',
            ),
            array(
                'name' => 'Estado',
                'value' => 'UtilidadesVarias::textoestado1($data->Estado)',
            ),
            array(
                'class'=>'CButtonColumn',
                'template'=>'{act}{inact}',
                'buttons'=>array(
                    'act'=>array(
                        'label'=>'<i class="fa fa-user-plus actions text-black"></i>',
                        'imageUrl'=>false,
                        'url'=>'Yii::app()->createUrl("UsuarioCarpComp/act", array("id"=>$data->Id_Usuario_Carp_Comp))',
                        'visible'=> '($data->Estado == 0)',
                        'options'=>array('title'=>'Activar usuario', 'confirm'=>'Esta seguro de activar este usuario ?'),
                    ),
                    'inact'=>array(
                        'label'=>'<i class="fa fa-user-times actions text-black"></i>',
                        'imageUrl'=>false,
                        'url'=>'Yii::app()->createUrl("UsuarioCarpComp/inact", array("id"=>$data->Id_Usuario_Carp_Comp))',
                        'visible'=> '($data->Estado == 1)',
                        'options'=>array('title'=>'Inactivar usuario', 'confirm'=>'Esta seguro de inactivar este usuario ?'),
                    ),
                )
            ),
        ),
    ));
}

if($model->Tipo_Acceso == 2){
    //PERSONAL
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'idocto-movto-grid',
        'dataProvider'=>$detalle->search(),
        //'filter'=>$model,
        'enableSorting' => false,
        'columns'=>array(
            array(
                'name'=>'Id_Empleado',
                'value' => '($data->Id_Empleado == "") ? "-" :  UtilidadesEmpleado::nombreempleado($data->Id_Empleado)',
            ),
            array(
                'name'=>'Usuario',
                'value' => '$data->Usuario',
            ),
            array(
                'name'=>'Password',
                'value' => '$data->Password',
            ),
            array(
                'name'=>'Permiso',
                'value' => '($data->Permiso == 1) ? "LECTURA" :  "LECTURA / ESCRITURA"',
            ),
            array(
                'name'=>'Id_Usuario_Actualizacion',
                'value'=>'$data->idusuarioact->Usuario',
            ),
            array(
                'name'=>'Fecha_Actualizacion',
                'value'=>'UtilidadesVarias::textofechahora($data->Fecha_Actualizacion)',
            ),
            array(
                'name' => 'Estado',
                'value' => 'UtilidadesVarias::textoestado1($data->Estado)',
            ),
            array(
                'class'=>'CButtonColumn',
                'template'=>'{act}{update}{inact}',
                'buttons'=>array(
                    'act'=>array(
                        'label'=>'<i class="fa fa-user-plus actions text-black"></i>',
                        'imageUrl'=>false,
                        'url'=>'Yii::app()->createUrl("UsuarioCarpComp/act", array("id"=>$data->Id_Usuario_Carp_Comp))',
                        'visible'=> '($data->Estado == 0)',
                        'options'=>array('title'=>'Activar usuario', 'confirm'=>'Esta seguro de activar este usuario ?'),
    
                    ),
                    'update'=>array(
                        'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                        'imageUrl'=>false,
                        'options'=>array('title'=>'Modificar'),
                        'url'=>'Yii::app()->createUrl("UsuarioCarpComp/update", array("id"=>$data->Id_Usuario_Carp_Comp))',
                        'visible'=> '($data->Estado == 1)',
                    ),
                    'inact'=>array(
                        'imageUrl'=>false,
                        'label'=>'<i class="fa fa-user-times actions text-black"></i>',
                        'imageUrl'=>false,
                        'url'=>'Yii::app()->createUrl("UsuarioCarpComp/inact", array("id"=>$data->Id_Usuario_Carp_Comp))',
                        'visible'=> '($data->Estado == 1)',
                        'options'=>array('title'=>'Inactivar usuario', 'confirm'=>'Esta seguro de inactivar este usuario ?'),
                    ),

                )
            ),
        ),
    ));
}

?>

<script type="text/javascript">
    

$(function() {

  $("#valida_form").click(function() {

    var form = $("#carp-comp-form");
    
    var tipo = <?php echo $model->Tipo_Acceso; ?>;
    var servidor =  $('#CarpComp_Servidor').val();
    var carpeta =  $('#CarpComp_Carpeta').val();
    var ruta =  $('#CarpComp_Ruta').val();
    var usuario =  $('#CarpComp_Usuario').val();
    var password =  $('#CarpComp_Password').val();
    var estado =  $('#CarpComp_Estado').val();

      if(tipo == 1){
        if(servidor != "" && carpeta != "" && ruta != "" && usuario != "" && password != "" && estado != ""){
           form.submit();
           $(".ajax-loader").fadeIn('fast');
        }else{
          if(servidor == ""){
            $('#CarpComp_Servidor_em_').html('Servidor no puede ser nulo.');
            $('#CarpComp_Servidor_em_').show(); 
          }

          if(carpeta == ""){
            $('#CarpComp_Carpeta_em_').html('Carpeta no puede ser nulo.');
            $('#CarpComp_Carpeta_em_').show();    
          }

          if(ruta == ""){
            $('#CarpComp_Ruta_em_').html('Ruta no puede ser nulo.');
            $('#CarpComp_Ruta_em_').show();    
          }

          if(usuario == ""){
            $('#CarpComp_Usuario_em_').html('Usuario no puede ser nulo.');
            $('#CarpComp_Usuario_em_').show();    
          }

          if(password == ""){
            $('#CarpComp_Password_em_').html('Password no puede ser nulo.');
            $('#CarpComp_Password_em_').show();    
          }

          if(estado == ""){
            $('#CarpComp_Estado_em_').html('Estado no puede ser nulo.');
            $('#CarpComp_Estado_em_').show();    
          }
        }
      }else{
        if(servidor != "" && carpeta != "" && ruta != "" && estado != ""){
          form.submit();
          $(".ajax-loader").fadeIn('fast');
        }else{
          if(servidor == ""){
            $('#CarpComp_Servidor_em_').html('Servidor no puede ser nulo.');
            $('#CarpComp_Servidor_em_').show(); 
          }

          if(carpeta == ""){
            $('#CarpComp_Carpeta_em_').html('Carpeta no puede ser nulo.');
            $('#CarpComp_Carpeta_em_').show();    
          }

          if(ruta == ""){
            $('#CarpComp_Ruta_em_').html('Ruta no puede ser nulo.');
            $('#CarpComp_Ruta_em_').show();    
          }

          if(estado == ""){
            $('#CarpComp_Estado_em_').html('Estado no puede ser nulo.');
            $('#CarpComp_Estado_em_').show();    
          }
        }
      }
   
  });

});


</script>