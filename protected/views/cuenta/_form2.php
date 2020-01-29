 <?php
/* @var $this CuentaController */
/* @var $model Cuenta */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cuenta-form',
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

<div class="btn-group" style="padding-bottom: 2%" id="div_buttons">
    <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=cuenta/admin'; ?>';"><i class="fa fa-reply"></i> Volver</button>    
    <button type="button" class="btn btn-success" id="btn_asoc" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=CuentaEmpleado/create&id='.$model->Id_Cuenta; ?>';"><i class="fa fa-plus"></i> Asociar empleado</button>
    <button type="button" class="btn btn-success" id="valida_form"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'Clasificacion'); ?><br>
        	<p><?php echo $model->clasificacion->Dominio; ?></p>
        </div>
    </div>
    <div class="col-sm-8">
   		<div class="pull-right badge bg-red" id="error_dup" style="display: none;"></div>
   	</div>
</div>
<div class="row">
	<div class="col-sm-4" id="div_cuenta_usuario" style="display: none;">
        <div class="form-group">
            <div class="pull-right badge bg-red" id="error_cuenta_usuario" style="display: none;"></div>
            <?php echo $form->label($model,'Cuenta_Usuario'); ?><br>
            <p><?php echo $model->Cuenta_Usuario; ?></p>
        </div>
    </div>
    <div class="col-sm-4" id="div_dominio" style="display: none;">
        <div class="form-group">
            <?php echo $form->label($model,'Dominio'); ?><br>
            <p><?php if($model->Dominio != "" ){ echo $model->dominioweb->Dominio; } ?></p>
        </div>
    </div>
    <div class="col-sm-4" id="div_password" style="display: none;">
        <div class="form-group">
            <div class="pull-right badge bg-red" id="error_password" style="display: none;"></div>
            <?php echo $form->label($model,'Password'); ?>
            <?php echo $form->textField($model,'Password', array('class' => 'form-control', 'maxlength' => '10', 'autocomplete' => 'off')); ?>
        </div>
    </div>
    <div class="col-sm-4" id="div_tipo_cuenta" style="display: none;">
        <div class="form-group">
            <div class="pull-right badge bg-red" id="error_tipo_cuenta" style="display: none;"></div>
            <?php echo $form->label($model,'Tipo_Cuenta'); ?>
            <?php
        		$this->widget('ext.select2.ESelect2',array(
					'name'=>'Cuenta[Tipo_Cuenta]',
					'id'=>'Cuenta_Tipo_Cuenta',
					'data'=>$lista_tipos,
					'value' => $model->Tipo_Cuenta,
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
    <div class="col-sm-4" id="div_tipo_acceso" style="display: none;">
        <div class="form-group">
        	<div class="pull-right badge bg-red" id="error_tipo_acceso" style="display: none;"></div>
            <?php echo $form->label($model,'Tipo_Acceso'); ?>
		    <?php
        		$this->widget('ext.select2.ESelect2',array(
					'name'=>'Cuenta[Tipo_Acceso]',
					'id'=>'Cuenta_Tipo_Acceso',
					'data'=> array(1 => 'GENÉRICO', 2 => 'PERSONAL'),
					'value' => $model->Tipo_Acceso,
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
    <div class="col-sm-8" id="div_observaciones" style="display: none;">
        <div class="form-group">
            <?php echo $form->label($model,'Observaciones'); ?>
            <?php echo $form->textArea($model,'Observaciones',array('class' => 'form-control', 'rows'=>3, 'cols'=>50)); ?>
        </div>
    </div>
    <div class="col-sm-4" id="div_ext" style="display: none;">
    	<div class="form-group">
      		<?php echo $form->label($model,'Ext'); ?>
      		<?php echo $form->textField($model,'Ext', array('class' => 'form-control', 'maxlength' => '10', 'autocomplete' => 'off')); ?>
    	</div>
 	</div>
    <div class="col-sm-4" id="div_estado" style="display: none;">
        <div class="form-group">
            <div class="pull-right badge bg-red" id="error_estado" style="display: none;"></div>
            <?php echo $form->label($model,'Estado'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'Cuenta[Estado]',
                    'id'=>'Cuenta_Estado',
                    'data'=>$lista_estados,
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
            <?php echo $form->label($model,'Id_Usuario_Creacion'); ?><br>
            <p><?php echo $model->idusuariocre->Usuario; ?></p>                
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'Fecha_Creacion'); ?><br>
            <p><?php echo UtilidadesVarias::textofechahora($model->Fecha_Creacion); ?></p>                  
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'Id_Usuario_Actualizacion'); ?><br>
            <p><?php echo $model->idusuarioact->Usuario; ?></p>                     
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo $form->label($model,'Fecha_Actualizacion'); ?><br>
            <p><?php echo UtilidadesVarias::textofechahora($model->Fecha_Actualizacion); ?></p>                    
        </div>
    </div>
</div>


<h3>Detalle</h3>

<div class="nav-tabs-custom" style="margin-top: 2%;">
    <ul class="nav nav-tabs" style="font-size: 12px !important;">
        <li class="active"><a href="#emp" data-toggle="tab">Empleados asoc.</a></li>
        <li><a href="#log" data-toggle="tab">Log</a></li>
    </ul>
</div>
<div class="tab-content">
    <div class="active tab-pane" id="emp">
    	<?php
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'cuenta-empleado-grid',
			'dataProvider'=>$emp_asoc->search(),
			//'filter'=>$model,
			'enableSorting' => false,
			'columns'=>array(
				array(
		            'name'=>'Id_Empleado',
		            'value' => '($data->Id_Empleado == "") ? "-" :  UtilidadesEmpleado::nombreempleado($data->Id_Empleado)',
		        ),
		        array(
                    'header'=>'Empresa',
                    'value' => '($data->Id_Empleado == "") ? "-" :  UtilidadesEmpleado::empresaactualempleado($data->Id_Empleado)',
                ),
		        array(
		            'name'=>'Id_Usuario_Creacion',
		            'value'=>'$data->idusuariocre->Usuario',
		        ),
		        array(
		            'name'=>'Fecha_Creacion',
		            'value'=>'UtilidadesVarias::textofechahora($data->Fecha_Creacion)',
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
					'class'=>'CButtonColumn',
		            'template'=>'{update}',
		            'buttons'=>array(
		                'update'=>array(
		                    'label'=>'<i class="fa fa-user-times actions text-black"></i>',
		                    'imageUrl'=>false,
		                    'url'=>'Yii::app()->createUrl("CuentaEmpleado/inact", array("id"=>$data->Id_Cuenta_Emp, "opc"=>2))',
		                    'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->Estado == 1)',
		                    'options'=>array('title'=>' Desvincular empleado', 'confirm'=>'Esta seguro de desvincular el empleado de esta cuenta ?'),
		                ),
		            )
				),
			),
		));

		?>
   	</div>
   	<div class="tab-pane" id="log">
   		<?php
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'cuenta-empleado-grid',
			'dataProvider'=>$nov_cue->search(),
			//'filter'=>$model,
			'enableSorting' => false,
			'columns'=>array(
				'Novedades',
				array(
		            'name'=>'Id_Usuario_Creacion',
		            'value'=>'$data->idusuariocre->Usuario',
		        ),
		        array(
		            'name'=>'Fecha_Creacion',
		            'value'=>'UtilidadesVarias::textofechahora($data->Fecha_Creacion)',
		        ),
			),
		));

		?>

   	</div>
</div>



<?php $this->endWidget(); ?>

<script type="text/javascript">
  
$(function() {

	var clase = <?php echo $model->Clasificacion; ?>;

	if(clase == <?php echo Yii::app()->params->c_correo ?>){
		$('#div_cuenta_usuario').show();
        $('#div_dominio').show(); 
        $('#div_password').show();
        $('#div_tipo_cuenta').show(); 
        $('#div_tipo_acceso').hide();
        $('#div_observaciones').show();
        $('#div_estado').show();
        
        var tipo_cuenta = $('#Cuenta_Tipo_Cuenta').val();

        if(tipo_cuenta == <?php echo Yii::app()->params->t_c_generico ?>){
        	$('#div_ext').show();
        }else{
        	$('#div_ext').hide();
        }

	}else{
		$('#div_cuenta_usuario').show();
        $('#div_dominio').hide(); 
        $('#div_password').show();
        $('#div_tipo_cuenta').hide(); 
        $('#div_tipo_acceso').show();
        $('#div_observaciones').show();
        $('#div_estado').show();
        $('#div_ext').hide();

        var tipo_acceso = $('#Cuenta_Tipo_Acceso').val();
        var num_emp = <?php echo $model->NumUsuariosAsoc($model->Id_Cuenta) ?>;

        if(tipo_acceso == 2 && num_emp == 1){
			$('#btn_asoc').hide();
        }else{
        	$('#btn_asoc').show();
        }

	}


	$("#valida_form").click(function() {
    
	    var form = $("#cuenta-form");
	    var clase = <?php echo $model->Clasificacion ?>;
	    var id_reg = <?php echo $model->Id_Cuenta ?>;

	    if(clase == <?php echo Yii::app()->params->c_correo ?>){
	      	//CORREO ELECTRONICO

	        var password = $('#Cuenta_Password').val();
	        var tipo_cuenta = $('#Cuenta_Tipo_Cuenta').val();
	        var estado = $('#Cuenta_Estado').val();

			if(password != "" && tipo_cuenta != "" && estado != ""){

	            limpiar_errores();
				$('#div_buttons').hide();
				$(".ajax-loader").fadeIn('fast');
				form.submit();
		                
			}else{

				if(password == ""){
				  $('#error_password').html('Password no puede ser nulo.');
				  $('#error_password').show(); 
				}

				if(tipo_cuenta == ""){
				  $('#error_tipo_cuenta').html('Tipo de cuenta no puede ser nulo.');
				  $('#error_tipo_cuenta').show(); 
				}

				if(estado == ""){
				  $('#error_estado').html('Estado no puede ser nulo.');
				  $('#error_estado').show(); 
				}
			}

		}else{
		  	//DEMAS CUENTAS / USUARIOS

	        var password = $('#Cuenta_Password').val();
	        var tipo_acceso = $('#Cuenta_Tipo_Acceso').val();
			var estado = $('#Cuenta_Estado').val();

			if(password != "" && tipo_acceso != "" && estado != ""){

                limpiar_errores();
				$('#div_buttons').hide();
				$(".ajax-loader").fadeIn('fast');
				form.submit();

			}else{

				if(password == ""){
				  $('#error_password').html('Password no puede ser nulo.');
				  $('#error_password').show(); 
				}

				if(tipo_acceso == ""){
				  $('#error_tipo_acceso').html('Tipo de acceso no puede ser nulo.');
				  $('#error_tipo_acceso').show(); 
				}

				if(estado == ""){
				  $('#error_estado').html('Estado no puede ser nulo.');
				  $('#error_estado').show(); 
				}
			}

		}
   
  	});
  
	$("#Cuenta_Cuenta_Usuario").change(function() {
		var valor = $('#Cuenta_Cuenta_Usuario').val(); 

		if(valor != ""){
			$('#error_cuenta_usuario').html('');
			$('#error_cuenta_usuario').hide();
		}
	});

	$("#Cuenta_Dominio").change(function() {
		var valor = $('#Cuenta_Dominio').val(); 

		if(valor != ""){
		 	$('#error_dominio').html('');
		 	$('#error_dominio').hide();
		}
	});

	$("#Cuenta_Password").change(function() {
		var valor = $('#Cuenta_Password').val(); 

		if(valor != ""){
	  		$('#error_password').html('');
	  		$('#error_password').hide();
		}
	});

	$("#Cuenta_Tipo_Cuenta").change(function() {
	    var valor = $('#Cuenta_Tipo_Cuenta').val(); 

	    if(valor == ""){
	      $('#div_ext').hide();
	      $('#Cuenta_Ext').val('');
	    }else{
	      if(valor == <?php echo Yii::app()->params->t_c_generico ?>){
	        $('#div_ext').show();
	      }else{
	        $('#div_ext').hide();
	        $('#Cuenta_Ext').val('');
	      }
	    }

	});

	$("#Cuenta_Tipo_Acceso").change(function() {
		var valor = $('#Cuenta_Tipo_Acceso').val(); 

		if(valor != ""){
	  		$('#error_tipo_acceso').html('');
	  		$('#error_tipo_acceso').hide();
		}
	});

	$("#Cuenta_Estado").change(function() {
		var valor = $('#Cuenta_Estado').val(); 

		if(valor != ""){
	  		$('#error_estado').html('');
	  		$('#error_estado').hide();
		}
	});

});

function limpiar_errores(){

  $('#error_cuenta_usuario').html('');
  $('#error_cuenta_usuario').hide(); 
  $('#error_dominio').html('');
  $('#error_dominio').hide(); 
  $('#error_password').html('');
  $('#error_password').hide(); 
  $('#error_tipo_cuenta').html('');
  $('#error_tipo_cuenta').hide(); 
  $('#error_tipo_acceso').html('');
  $('#error_tipo_acceso').hide();
  $('#error_estado').html('');
  $('#error_estado').hide();
  $('#error_dup').html('');
  $('#error_dup').hide(); 

}

</script>
