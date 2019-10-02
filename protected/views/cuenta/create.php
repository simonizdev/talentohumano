<?php
/* @var $this CuentaController */
/* @var $model Cuenta */

//para combo de tipos de asociación
$lista_tipos_asoc = CHtml::listData($tipos_asoc, 'Id_Dominio', 'Dominio'); 

//para combo de tipos
$lista_tipos = CHtml::listData($tipos, 'Id_Dominio', 'Dominio'); 

//para combo de dominios de correos
$lista_dominios = CHtml::listData($dominios, 'Id_Dominio_Web', 'Dominio'); 

?>

<h3>Creación de cuenta</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'lista_tipos_asoc'=>$lista_tipos_asoc, 'lista_tipos'=>$lista_tipos, 'lista_dominios'=>$lista_dominios)); ?>

<script type="text/javascript">
  
$(function() {

  $("#Cuenta_Tipo_Asociacion").change(function() {

    var valor = $('#Cuenta_Tipo_Asociacion').val();

    if(valor != ''){
       
      $('#error_asoc').html('');
      $('#error_asoc').hide();

      $('#error_id_empleado').html('');
      $('#error_id_empleado').hide();

      $('#div_observaciones').show();
      $('#Cuenta_Observaciones').val('');

      limpiar_errores();

      //CORREO
      if(valor == <?php echo Yii::app()->params->ta_correo ?>){
        
        $('#div_empleado').show();
        $('#div_correo').show(); 
        $('#div_skype').hide(); 
        $('#div_siesa').hide(); 
        $('#div_glpi').hide();
        $('#div_papercut').hide();

        $('#Cuenta_Cuenta_Skype').val('');
        $('#Cuenta_Password_Skype').val('');
        $('#Cuenta_Usuario_Siesa').val('');
        $('#Cuenta_Password_Siesa').val('');
        $('#Cuenta_Usuario_Glpi').val('');
        $('#Cuenta_Password_Glpi').val('');
        $('#Cuenta_Usuario_Papercut').val('');
        $('#Cuenta_Password_Papercut').val('');

      }

      //CORREO - GLPI - PAPERCUT
      if(valor == <?php echo Yii::app()->params->ta_correo_glpi_papercut ?>){
        
        $('#div_empleado').show();
        $('#div_correo').show(); 
        $('#div_skype').hide(); 
        $('#div_siesa').hide(); 
        $('#div_glpi').show();
        $('#div_papercut').show();

        $('#Cuenta_Cuenta_Skype').val('');
        $('#Cuenta_Password_Skype').val('');
        $('#Cuenta_Usuario_Siesa').val('');
        $('#Cuenta_Password_Siesa').val('');
                
      }

      //CORREO - SIESA - PAPERCUT
      if(valor == <?php echo Yii::app()->params->ta_correo_siesa_papercut ?>){
        
        $('#div_empleado').show();
        $('#div_correo').show(); 
        $('#div_skype').hide(); 
        $('#div_siesa').show(); 
        $('#div_glpi').hide();
        $('#div_papercut').show();        

        $('#Cuenta_Cuenta_Skype').val('');
        $('#Cuenta_Password_Skype').val('');
        $('#Cuenta_Usuario_Glpi').val('');
        $('#Cuenta_Password_Glpi').val('');
       
      }

      //CORREO - SIESA - GLPI - PAPERCUT
      if(valor == <?php echo Yii::app()->params->ta_correo_siesa_glpi_papercut ?>){
        
        $('#div_empleado').show();
        $('#div_correo').show(); 
        $('#div_skype').hide(); 
        $('#div_siesa').show(); 
        $('#div_glpi').show();
        $('#div_papercut').show();         

        $('#Cuenta_Usuario_Skype').val('');
        $('#Cuenta_Password_Skype').val('');
      }


      //CORREO - SKYPE - PAPERCUT
      if(valor == <?php echo Yii::app()->params->ta_correo_skype_papercut ?>){
        
        $('#div_empleado').show();
        $('#div_correo').show(); 
        $('#div_skype').show(); 
        $('#div_siesa').hide(); 
        $('#div_glpi').hide();
        $('#div_papercut').show();        

        $('#Cuenta_Usuario_Siesa').val('');
        $('#Cuenta_Password_Siesa').val('');
        $('#Cuenta_Usuario_Glpi').val('');
        $('#Cuenta_Password_Glpi').val('');

      }

      //CORREO - SKYPE - GLPI - PAPERCUT
      if(valor == <?php echo Yii::app()->params->ta_correo_skype_glpi_papercut ?>){
        
        $('#div_empleado').show();
        $('#div_correo').show(); 
        $('#div_skype').show(); 
        $('#div_siesa').hide(); 
        $('#div_glpi').show();
        $('#div_papercut').show();         

        $('#Cuenta_Usuario_Siesa').val('');
        $('#Cuenta_Password_Siesa').val('');
      }

      //CORREO - SKYPE - SIESA - PAPERCUT
      if(valor == <?php echo Yii::app()->params->ta_correo_skype_siesa_papercut ?>){
        
        $('#div_empleado').show();
        $('#div_correo').show(); 
        $('#div_skype').show(); 
        $('#div_siesa').show(); 
        $('#div_glpi').hide();
        $('#div_papercut').show();         

        $('#Cuenta_Usuario_Glpi').val('');
        $('#Cuenta_Password_Glpi').val('');

      }

      //CORREO - SKYPE - SIESA - GLPI - PAPERCUT
      if(valor == <?php echo Yii::app()->params->ta_correo_skype_siesa_glpi_papercut ?>){
        
        $('#div_empleado').show();
        $('#div_correo').show(); 
        $('#div_skype').show(); 
        $('#div_siesa').show(); 
        $('#div_glpi').show();
        $('#div_papercut').show();        

      }

      //GLPI
      if(valor == <?php echo Yii::app()->params->ta_glpi ?>){
        
        $('#div_empleado').show();
        $('#div_correo').hide(); 
        $('#div_skype').hide(); 
        $('#div_siesa').hide(); 
        $('#div_glpi').show();
        $('#div_papercut').hide();        

        $('#Cuenta_Tipo').val('').trigger('change');
        $('#Cuenta_Usuario').val('');
        $('#Cuenta_Dominio').val('').trigger('change');
        $('#Cuenta_Cuenta_Correo').val('');
        $('#Cuenta_Password_Correo').val('');
        $('#Cuenta_Cuenta_Skype').val('');
        $('#Cuenta_Password_Skype').val('');
        $('#Cuenta_Usuario_Siesa').val('');
        $('#Cuenta_Password_Siesa').val('');
        $('#Cuenta_Usuario_Papercut').val('');
        $('#Cuenta_Password_Papercut').val('');

      }

      //SIESA
      if(valor == <?php echo Yii::app()->params->ta_siesa ?>){
        
        $('#div_empleado').show();
        $('#div_correo').hide(); 
        $('#div_skype').hide(); 
        $('#div_siesa').show(); 
        $('#div_glpi').hide(); 
        $('#div_papercut').hide();        

        $('#Cuenta_Tipo').val('').trigger('change');
        $('#Cuenta_Usuario').val('');
        $('#Cuenta_Dominio').val('').trigger('change');
        $('#Cuenta_Cuenta_Correo').val('');
        $('#Cuenta_Password_Correo').val('');
        $('#Cuenta_Cuenta_Skype').val('');
        $('#Cuenta_Password_Skype').val('');
        $('#Cuenta_Usuario_Glpi').val('');
        $('#Cuenta_Password_Glpi').val('');
        $('#Cuenta_Usuario_Papercut').val('');
        $('#Cuenta_Password_Papercut').val(''); 
      }

      //SIESA - GLPI
      if(valor == <?php echo Yii::app()->params->ta_siesa_glpi ?>){
        
        $('#div_empleado').show();
        $('#div_correo').hide(); 
        $('#div_skype').hide(); 
        $('#div_siesa').show(); 
        $('#div_glpi').show();
        $('#div_papercut').hide();        

        $('#Cuenta_Tipo').val('').trigger('change');
        $('#Cuenta_Usuario').val('');
        $('#Cuenta_Dominio').val('').trigger('change');
        $('#Cuenta_Cuenta_Correo').val('');
        $('#Cuenta_Password_Correo').val('');
        $('#Cuenta_Cuenta_Skype').val('');
        $('#Cuenta_Password_Skype').val('');
        $('#Cuenta_Usuario_Glpi').val('');
        $('#Cuenta_Password_Glpi').val('');
        $('#Cuenta_Usuario_Papercut').val('');
        $('#Cuenta_Password_Papercut').val(''); 
      }

    }else{
      $('#error_asoc').html('Tipo de asociación no puede ser nulo');
      $('#error_asoc').show();
      
      $('#div_empleado').hide();
      $('#Cuenta_Id_Empleado').val('').trigger('change');
      $('#s2id_Cuenta_Id_Empleado span').html("");

      $('#error_id_empleado').html('');
      $('#error_id_empleado').hide();

      $('#Cuenta_Observaciones').val('');
      $('#div_observaciones').hide();

      $('#Cuenta_Tipo').val('').trigger('change');
      $('#Cuenta_Usuario').val('');
      $('#Cuenta_Dominio').val('').trigger('change');
      $('#Cuenta_Cuenta_Correo').val('');
      $('#Cuenta_Password_Correo').val('');
      $('#Cuenta_Cuenta_Skype').val('');
      $('#Cuenta_Password_Skype').val('');
      $('#Cuenta_Usuario_Siesa').val('');
      $('#Cuenta_Password_Siesa').val('');
      $('#Cuenta_Usuario_Glpi').val('');
      $('#Cuenta_Password_Glpi').val('');
      $('#Cuenta_Usuario_Papercut').val('');
      $('#Cuenta_Password_Papercut').val(''); 
      $('#div_correo').hide(); 
      $('#div_skype').hide(); 
      $('#div_siesa').hide(); 
      $('#div_glpi').hide(); 
      $('#div_papercut').hide();

    }
  });


  $("#valida_form").click(function() {
    
    var form = $("#cuenta-form");
    var tipo_asoc = $('#Cuenta_Tipo_Asociacion').val();

    if(tipo_asoc == ''){
      $('#error_asoc').html('Tipo de asociación no puede ser nulo');
      $('#error_asoc').show();
    }else{
      $('#error_asoc').html('');
      $('#error_asoc').hide();

      limpiar_errores();

      if(
        tipo_asoc == <?php echo Yii::app()->params->ta_correo ?> || 
        tipo_asoc == <?php echo Yii::app()->params->ta_correo_glpi_papercut ?> || 
        tipo_asoc == <?php echo Yii::app()->params->ta_correo_siesa_papercut ?> ||
        tipo_asoc == <?php echo Yii::app()->params->ta_correo_siesa_glpi_papercut ?> || 
        tipo_asoc == <?php echo Yii::app()->params->ta_correo_skype_papercut ?> || 
        tipo_asoc == <?php echo Yii::app()->params->ta_correo_skype_glpi_papercut ?> || 
        tipo_asoc == <?php echo Yii::app()->params->ta_correo_skype_siesa_papercut ?> || 
        tipo_asoc == <?php echo Yii::app()->params->ta_correo_skype_siesa_glpi_papercut ?> || 
        tipo_asoc == <?php echo Yii::app()->params->ta_glpi ?> || 
        tipo_asoc == <?php echo Yii::app()->params->ta_siesa ?> || 
        tipo_asoc == <?php echo Yii::app()->params->ta_siesa_glpi ?>
      ){

        var id_empleado = $('#Cuenta_Id_Empleado').val();
        
        var tipo_correo = $('#Cuenta_Tipo').val();
        var usuario_correo = $('#Cuenta_Usuario').val();
        var dominio_correo = $('#Cuenta_Dominio').val();
        var cuenta_correo = $('#Cuenta_Cuenta_Correo').val();
        var password_correo = $('#Cuenta_Password_Correo').val();

        var cuenta_skype = $('#Cuenta_Cuenta_Skype').val();
        var password_skype = $('#Cuenta_Password_Skype').val();

        var cuenta_siesa = $('#Cuenta_Usuario_Siesa').val();
        var password_siesa = $('#Cuenta_Password_Siesa').val();

        var cuenta_glpi = $('#Cuenta_Usuario_Glpi').val();
        var password_glpi = $('#Cuenta_Password_Glpi').val();

        var cuenta_papercut = $('#Cuenta_Usuario_Papercut').val();
        var password_papercut = $('#Cuenta_Password_Papercut').val();

        var observaciones = $('#Cuenta_Observaciones').val();
        var correo_red = "";
        var estado  = <?php echo Yii::app()->params->estado_act ?>;

        if(tipo_asoc == <?php echo Yii::app()->params->ta_correo ?>){
          //CORREO
          if(tipo_correo != "" && usuario_correo != "" && dominio_correo != "" && cuenta_correo != "" && password_correo != ""){

            //se enconden los botones y se hace submit sobre el form
            //limpiar_errores();
            $('#div_buttons').hide();
            form.submit();

          }else{
            if(tipo_correo == ""){
              $('#error_tipo').html('Tipo de cuenta no puede ser nulo');
              $('#error_tipo').show(); 
            }

            if(usuario_correo == ""){
              $('#error_usuario').html('Usuario no puede ser nulo');
              $('#error_usuario').show(); 
            }

            if(dominio_correo == ""){
              $('#error_dominio').html('Dominio no puede ser nulo');
              $('#error_dominio').show(); 
            }

            if(cuenta_correo == ""){
              $('#error_cuenta_correo').html('Cuenta de correo no puede ser nulo');
              $('#error_cuenta_correo').show(); 
            }

            if(password_correo == ""){
              $('#error_password_correo').html('Password correo no puede ser nulo');
              $('#error_password_correo').show(); 
            }

          }

        }

        if(tipo_asoc == <?php echo Yii::app()->params->ta_correo_glpi_papercut ?>){
          //CORREO - GLPI - PAPERCUT
          if(tipo_correo != "" && usuario_correo != "" && dominio_correo != "" && cuenta_correo != "" && password_correo != "" && cuenta_glpi != "" && password_glpi != "" && cuenta_papercut != "" && password_papercut != ""){
            
            //se enconden los botones y se hace submit sobre el form
            limpiar_errores();
            $('#div_buttons').hide();
            form.submit();

          }else{
            if(tipo_correo == ""){
              $('#error_tipo').html('Tipo de cuenta no puede ser nulo');
              $('#error_tipo').show(); 
            }

            if(usuario_correo == ""){
              $('#error_usuario').html('Usuario no puede ser nulo');
              $('#error_usuario').show(); 
            }

            if(dominio_correo == ""){
              $('#error_dominio').html('Dominio no puede ser nulo');
              $('#error_dominio').show(); 
            }

            if(cuenta_correo == ""){
              $('#error_cuenta_correo').html('Cuenta de correo no puede ser nulo');
              $('#error_cuenta_correo').show(); 
            }

            if(password_correo == ""){
              $('#error_password_correo').html('Password correo no puede ser nulo');
              $('#error_password_correo').show(); 
            }

            if(cuenta_glpi == ""){
              $('#error_usuario_glpi').html('Usuario glpi no puede ser nulo');
              $('#error_usuario_glpi').show(); 
            }

            if(password_glpi == ""){
              $('#error_password_glpi').html('Password glpi no puede ser nulo');
              $('#error_password_glpi').show(); 
            }

            if(cuenta_papercut == ""){
              $('#error_usuario_papercut').html('Usuario papercut no puede ser nulo');
              $('#error_usuario_papercut').show(); 
            }

            if(password_papercut == ""){
              $('#error_password_papercut').html('Password papercut no puede ser nulo');
              $('#error_password_papercut').show(); 
            }

          }
        
        }

        if(tipo_asoc == <?php echo Yii::app()->params->ta_correo_siesa_papercut ?>){
          //CORREO - SIESA - PAPERCUT
          if(tipo_correo != "" && usuario_correo != "" && dominio_correo != "" && cuenta_correo != "" && password_correo != "" && cuenta_siesa != "" && password_siesa != "" && cuenta_papercut != "" && password_papercut != ""){
            
            //se enconden los botones y se hace submit sobre el form
            limpiar_errores();
            $('#div_buttons').hide();
            form.submit();

          }else{
            if(tipo_correo == ""){
              $('#error_tipo').html('Tipo de cuenta no puede ser nulo');
              $('#error_tipo').show(); 
            }

            if(usuario_correo == ""){
              $('#error_usuario').html('Usuario no puede ser nulo');
              $('#error_usuario').show(); 
            }

            if(dominio_correo == ""){
              $('#error_dominio').html('Dominio no puede ser nulo');
              $('#error_dominio').show(); 
            }

            if(cuenta_correo == ""){
              $('#error_cuenta_correo').html('Cuenta de correo no puede ser nulo');
              $('#error_cuenta_correo').show(); 
            }

            if(password_correo == ""){
              $('#error_password_correo').html('Password correo no puede ser nulo');
              $('#error_password_correo').show(); 
            }

            if(cuenta_siesa == ""){
              $('#error_usuario_siesa').html('Usuario siesa no puede ser nulo');
              $('#error_usuario_siesa').show(); 
            }

            if(password_siesa == ""){
              $('#error_password_siesa').html('Password siesa no puede ser nulo');
              $('#error_password_siesa').show(); 
            }

            if(cuenta_papercut == ""){
              $('#error_usuario_papercut').html('Usuario papercut no puede ser nulo');
              $('#error_usuario_papercut').show(); 
            }

            if(password_papercut == ""){
              $('#error_password_papercut').html('Password papercut no puede ser nulo');
              $('#error_password_papercut').show(); 
            }

          }
        
        }

        if(tipo_asoc == <?php echo Yii::app()->params->ta_correo_siesa_glpi_papercut ?>){
          //CORREO - SIESA - GLPI - PAPERCUT
          if(tipo_correo != "" && usuario_correo != "" && dominio_correo != "" && cuenta_correo != "" && password_correo != "" && cuenta_siesa != "" && password_siesa != "" && cuenta_glpi != "" && password_glpi != "" && cuenta_papercut != "" && password_papercut != ""){
            
            //se enconden los botones y se hace submit sobre el form
            limpiar_errores();
            $('#div_buttons').hide();
            form.submit();

          }else{
            if(tipo_correo == ""){
              $('#error_tipo').html('Tipo de cuenta no puede ser nulo');
              $('#error_tipo').show(); 
            }

            if(usuario_correo == ""){
              $('#error_usuario').html('Usuario no puede ser nulo');
              $('#error_usuario').show(); 
            }

            if(dominio_correo == ""){
              $('#error_dominio').html('Dominio no puede ser nulo');
              $('#error_dominio').show(); 
            }

            if(cuenta_correo == ""){
              $('#error_cuenta_correo').html('Cuenta de correo no puede ser nulo');
              $('#error_cuenta_correo').show(); 
            }

            if(password_correo == ""){
              $('#error_password_correo').html('Password correo no puede ser nulo');
              $('#error_password_correo').show(); 
            }

            if(cuenta_siesa == ""){
              $('#error_usuario_siesa').html('Usuario siesa no puede ser nulo');
              $('#error_usuario_siesa').show(); 
            }

            if(password_siesa == ""){
              $('#error_password_siesa').html('Password siesa no puede ser nulo');
              $('#error_password_siesa').show(); 
            }

            if(cuenta_glpi == ""){
              $('#error_usuario_glpi').html('Usuario glpi no puede ser nulo');
              $('#error_usuario_glpi').show(); 
            }

            if(password_glpi == ""){
              $('#error_password_glpi').html('Password glpi no puede ser nulo');
              $('#error_password_glpi').show(); 
            }

            if(cuenta_papercut == ""){
              $('#error_usuario_papercut').html('Usuario papercut no puede ser nulo');
              $('#error_usuario_papercut').show(); 
            }

            if(password_papercut == ""){
              $('#error_password_papercut').html('Password papercut no puede ser nulo');
              $('#error_password_papercut').show(); 
            }

          }
        }

        if(tipo_asoc == <?php echo Yii::app()->params->ta_correo_skype_papercut ?>){
          //CORREO - SKYPE - PAPERCUT
          if(tipo_correo != "" && usuario_correo != "" && dominio_correo != "" && cuenta_correo != "" && password_correo != "" && cuenta_skype != "" && password_skype != "" && cuenta_papercut != "" && password_papercut != ""){
            
            //se enconden los botones y se hace submit sobre el form
            limpiar_errores();
            $('#div_buttons').hide();
            form.submit();

          }else{
            if(tipo_correo == ""){
              $('#error_tipo').html('Tipo de cuenta no puede ser nulo');
              $('#error_tipo').show(); 
            }

            if(usuario_correo == ""){
              $('#error_usuario').html('Usuario no puede ser nulo');
              $('#error_usuario').show(); 
            }

            if(dominio_correo == ""){
              $('#error_dominio').html('Dominio no puede ser nulo');
              $('#error_dominio').show(); 
            }

            if(cuenta_correo == ""){
              $('#error_cuenta_correo').html('Cuenta de correo no puede ser nulo');
              $('#error_cuenta_correo').show(); 
            }

            if(password_correo == ""){
              $('#error_password_correo').html('Password correo no puede ser nulo');
              $('#error_password_correo').show(); 
            }

            if(cuenta_skype == ""){
              $('#error_cuenta_skype').html('Cuenta de skype no puede ser nulo');
              $('#error_cuenta_skype').show(); 
            }

            if(password_skype == ""){
              $('#error_password_skype').html('Password skype no puede ser nulo');
              $('#error_password_skype').show(); 
            }

            if(cuenta_papercut == ""){
              $('#error_usuario_papercut').html('Usuario papercut no puede ser nulo');
              $('#error_usuario_papercut').show(); 
            }

            if(password_papercut == ""){
              $('#error_password_papercut').html('Password papercut no puede ser nulo');
              $('#error_password_papercut').show(); 
            }

          }
        
        }

    
        if(tipo_asoc == <?php echo Yii::app()->params->ta_correo_skype_glpi_papercut ?>){
          //CORREO - SKYPE - GLPI - PAPERCUT
          if(tipo_correo != "" && usuario_correo != "" && dominio_correo != "" && cuenta_correo != "" && password_correo != "" && cuenta_skype != "" && password_skype != "" && cuenta_glpi != "" && password_glpi != "" && cuenta_papercut != "" && password_papercut != ""){
            
            //se enconden los botones y se hace submit sobre el form
            limpiar_errores();
            $('#div_buttons').hide();
            form.submit();

          }else{
            if(tipo_correo == ""){
              $('#error_tipo').html('Tipo de cuenta no puede ser nulo');
              $('#error_tipo').show(); 
            }

            if(usuario_correo == ""){
              $('#error_usuario').html('Usuario no puede ser nulo');
              $('#error_usuario').show(); 
            }

            if(dominio_correo == ""){
              $('#error_dominio').html('Dominio no puede ser nulo');
              $('#error_dominio').show(); 
            }

            if(cuenta_correo == ""){
              $('#error_cuenta_correo').html('Cuenta de correo no puede ser nulo');
              $('#error_cuenta_correo').show(); 
            }

            if(password_correo == ""){
              $('#error_password_correo').html('Password correo no puede ser nulo');
              $('#error_password_correo').show(); 
            }

            if(cuenta_skype == ""){
              $('#error_cuenta_skype').html('Cuenta de skype no puede ser nulo');
              $('#error_cuenta_skype').show(); 
            }

            if(password_skype == ""){
              $('#error_password_skype').html('Password skype no puede ser nulo');
              $('#error_password_skype').show(); 
            }

            if(cuenta_glpi == ""){
              $('#error_usuario_glpi').html('Usuario glpi no puede ser nulo');
              $('#error_usuario_glpi').show(); 
            }

            if(password_glpi == ""){
              $('#error_password_glpi').html('Password glpi no puede ser nulo');
              $('#error_password_glpi').show(); 
            }

            if(cuenta_papercut == ""){
              $('#error_usuario_papercut').html('Usuario papercut no puede ser nulo');
              $('#error_usuario_papercut').show(); 
            }

            if(password_papercut == ""){
              $('#error_password_papercut').html('Password papercut no puede ser nulo');
              $('#error_password_papercut').show(); 
            }

          }
        
        }

        if(tipo_asoc == <?php echo Yii::app()->params->ta_correo_skype_siesa_papercut ?>){
          //CORREO - SKYPE - SIESA - PAPERCUT
          if(tipo_correo != "" && usuario_correo != "" && dominio_correo != "" && cuenta_correo != "" && password_correo != "" && cuenta_skype != "" && password_skype != "" && cuenta_siesa != "" && password_siesa != "" && cuenta_papercut != "" && password_papercut != ""){
            
            //se enconden los botones y se hace submit sobre el form
            limpiar_errores();
            $('#div_buttons').hide();
            form.submit();

          }else{
            if(tipo_correo == ""){
              $('#error_tipo').html('Tipo de cuenta no puede ser nulo');
              $('#error_tipo').show(); 
            }

            if(usuario_correo == ""){
              $('#error_usuario').html('Usuario no puede ser nulo');
              $('#error_usuario').show(); 
            }

            if(dominio_correo == ""){
              $('#error_dominio').html('Dominio no puede ser nulo');
              $('#error_dominio').show(); 
            }

            if(cuenta_correo == ""){
              $('#error_cuenta_correo').html('Cuenta de correo no puede ser nulo');
              $('#error_cuenta_correo').show(); 
            }

            if(password_correo == ""){
              $('#error_password_correo').html('Password correo no puede ser nulo');
              $('#error_password_correo').show(); 
            }

            if(cuenta_skype == ""){
              $('#error_cuenta_skype').html('Cuenta de skype no puede ser nulo');
              $('#error_cuenta_skype').show(); 
            }

            if(password_skype == ""){
              $('#error_password_skype').html('Password skype no puede ser nulo');
              $('#error_password_skype').show(); 
            }

            if(cuenta_siesa == ""){
              $('#error_usuario_siesa').html('Usuario siesa no puede ser nulo');
              $('#error_usuario_siesa').show(); 
            }

            if(password_siesa == ""){
              $('#error_password_siesa').html('Password siesa no puede ser nulo');
              $('#error_password_siesa').show(); 
            }

            if(cuenta_papercut == ""){
              $('#error_usuario_papercut').html('Usuario papercut no puede ser nulo');
              $('#error_usuario_papercut').show(); 
            }

            if(password_papercut == ""){
              $('#error_password_papercut').html('Password papercut no puede ser nulo');
              $('#error_password_papercut').show(); 
            }

          }  
        
        }

        if(tipo_asoc == <?php echo Yii::app()->params->ta_correo_skype_siesa_glpi_papercut ?>){
          //CORREO - SKYPE - SIESA - GLPI - PAPERCUT
          if(tipo_correo != "" && usuario_correo != "" && dominio_correo != "" && cuenta_correo != "" && password_correo != "" && cuenta_skype != "" && password_skype != "" && cuenta_siesa != "" && password_siesa != "" && cuenta_glpi != "" && password_glpi != "" && cuenta_papercut != "" && password_papercut != ""){
            
            //se enconden los botones y se hace submit sobre el form
            limpiar_errores();
            $('#div_buttons').hide();
            form.submit();

          }else{
            if(tipo_correo == ""){
              $('#error_tipo').html('Tipo de cuenta no puede ser nulo');
              $('#error_tipo').show(); 
            }

            if(usuario_correo == ""){
              $('#error_usuario').html('Usuario no puede ser nulo');
              $('#error_usuario').show(); 
            }

            if(dominio_correo == ""){
              $('#error_dominio').html('Dominio no puede ser nulo');
              $('#error_dominio').show(); 
            }

            if(cuenta_correo == ""){
              $('#error_cuenta_correo').html('Cuenta de correo no puede ser nulo');
              $('#error_cuenta_correo').show(); 
            }

            if(password_correo == ""){
              $('#error_password_correo').html('Password correo no puede ser nulo');
              $('#error_password_correo').show(); 
            }

            if(cuenta_skype == ""){
              $('#error_cuenta_skype').html('Cuenta de skype no puede ser nulo');
              $('#error_cuenta_skype').show(); 
            }

            if(password_skype == ""){
              $('#error_password_skype').html('Password skype no puede ser nulo');
              $('#error_password_skype').show(); 
            }

            if(cuenta_siesa == ""){
              $('#error_usuario_siesa').html('Usuario siesa no puede ser nulo');
              $('#error_usuario_siesa').show(); 
            }

            if(password_siesa == ""){
              $('#error_password_siesa').html('Password siesa no puede ser nulo');
              $('#error_password_siesa').show(); 
            }

            if(cuenta_glpi == ""){
              $('#error_usuario_glpi').html('Usuario glpi no puede ser nulo');
              $('#error_usuario_glpi').show(); 
            }

            if(password_glpi == ""){
              $('#error_password_glpi').html('Password glpi no puede ser nulo');
              $('#error_password_glpi').show(); 
            }

            if(cuenta_papercut == ""){
              $('#error_usuario_papercut').html('Usuario papercut no puede ser nulo');
              $('#error_usuario_papercut').show(); 
            }

            if(password_papercut == ""){
              $('#error_password_papercut').html('Password papercut no puede ser nulo');
              $('#error_password_papercut').show(); 
            }
          }  
        
        }

        if(tipo_asoc == <?php echo Yii::app()->params->ta_glpi ?>){
          //GLPI
          if(cuenta_glpi != "" && password_glpi != ""){
            
            //se enconden los botones y se hace submit sobre el form
            limpiar_errores();
            $('#div_buttons').hide();
            form.submit();

          }else{
            if(cuenta_glpi == ""){
              $('#error_usuario_glpi').html('Usuario glpi no puede ser nulo');
              $('#error_usuario_glpi').show(); 
            }

            if(password_glpi == ""){
              $('#error_password_glpi').html('Password glpi no puede ser nulo');
              $('#error_password_glpi').show(); 
            }

          }
        
        }

        if(tipo_asoc == <?php echo Yii::app()->params->ta_siesa ?>){
          //SIESA
          if(cuenta_siesa != "" && password_siesa != ""){
            
            //se enconden los botones y se hace submit sobre el form
            limpiar_errores();
            $('#div_buttons').hide();
            form.submit();

          }else{
            if(cuenta_siesa == ""){
              $('#error_usuario_siesa').html('Usuario siesa no puede ser nulo');
              $('#error_usuario_siesa').show(); 
            }

            if(password_siesa == ""){
              $('#error_password_siesa').html('Password siesa no puede ser nulo');
              $('#error_password_siesa').show(); 
            }
          }
        
        }

        if(tipo_asoc == <?php echo Yii::app()->params->ta_siesa_glpi ?>){
          //SIESA - GLPI
          if(cuenta_siesa != "" && password_siesa != "" && cuenta_glpi != "" && password_glpi != ""){
            
            //se enconden los botones y se hace submit sobre el form
            limpiar_errores();
            $('#div_buttons').hide();
            form.submit();

          }else{
            if(cuenta_siesa == ""){
              $('#error_usuario_siesa').html('Usuario siesa no puede ser nulo');
              $('#error_usuario_siesa').show(); 
            }

            if(password_siesa == ""){
              $('#error_password_siesa').html('Password siesa no puede ser nulo');
              $('#error_password_siesa').show(); 
            }

            if(cuenta_glpi == ""){
              $('#error_usuario_glpi').html('Usuario glpi no puede ser nulo');
              $('#error_usuario_glpi').show(); 
            }

            if(password_glpi == ""){
              $('#error_password_glpi').html('Password glpi no puede ser nulo');
              $('#error_password_glpi').show(); 
            }

          }
        
        }

      }

    }
  });

  $("#Cuenta_Usuario").change(function() {
    var valor = $('#Cuenta_Usuario').val();
    var dominio = $('#Cuenta_Dominio').val();

    if(valor != '' && dominio != '' ){
      var concat = valor+'@'+$("#Cuenta_Dominio option:selected").html();
      $('#Cuenta_Cuenta_Correo').val(concat);
      $('#error_cuenta_correo').html('');
      $('#error_cuenta_correo').hide();
    }else{
      $('#Cuenta_Cuenta_Correo').val('');
    }

    if(valor != ""){
      $('#error_usuario').html('');
      $('#error_usuario').hide();
    }
  });

  $("#Cuenta_Dominio").change(function() {
    var valor = $('#Cuenta_Dominio').val();  
    var usuario = $('#Cuenta_Usuario').val(); 

    if(valor != '' && usuario != '' ){
      var concat = usuario+'@'+$("#Cuenta_Dominio option:selected").html();
      $('#Cuenta_Cuenta_Correo').val(concat);
      $('#error_cuenta_correo').html('');
      $('#error_cuenta_correo').hide();
    }else{
        $('#Cuenta_Cuenta_Correo').val('');
    }

    if(valor != ""){
      $('#error_dominio').html('');
      $('#error_dominio').hide();
    }
  });

  $("#Cuenta_Tipo").change(function() {
      var valor = $('#Cuenta_Tipo').val(); 

      if(valor != ""){
        $('#error_tipo').html('');
        $('#error_tipo').hide();
      }
  });

  $("#Cuenta_Usuario").change(function() {
    var valor = $('#Cuenta_Usuario').val();
    var dominio = $('#Cuenta_Dominio').val();

    if(valor != '' && dominio != '' ){
        var concat = valor+'@'+$("#Cuenta_Dominio option:selected").html();
        $('#Cuenta_Cuenta_Correo').val(concat);
        $('#error_cuenta_correo').html('');
        $('#error_cuenta_correo').hide();
    }else{
        $('#Cuenta_Cuenta_Correo').val('');
    }

    if(valor != ""){
      $('#error_usuario').html('');
      $('#error_usuario').hide();
    }

  });

  $("#Cuenta_Dominio").change(function() {
    var valor = $('#Cuenta_Dominio').val();
    var usuario = $('#Cuenta_Usuario').val(); 

    if(valor != '' && usuario != '' ){
        var concat = usuario+'@'+$("#Cuenta_Dominio option:selected").html();
        $('#Cuenta_Cuenta_Correo').val(concat);
        $('#error_cuenta_correo').html('');
        $('#error_cuenta_correo').hide();
    }else{
        $('#Cuenta_Cuenta_Correo').val('');
    }

    if(valor != ""){
      $('#error_dominio').html('');
      $('#error_dominio').hide();
    }
  });

  $("#Cuenta_Password_Correo").change(function() {
    var valor = $('#Cuenta_Password_Correo').val(); 

    if(valor != ""){
      $('#error_password_correo').html('');
      $('#error_password_correo').hide();
    }
  });

  $("#Cuenta_Cuenta_Skype").change(function() {
    var valor = $('#Cuenta_Cuenta_Skype').val(); 

    if(valor != ""){
      $('#error_cuenta_skype').html('');
      $('#error_cuenta_skype').hide();
    }
  });

  $("#Cuenta_Password_Skype").change(function() {
    var valor = $('#Cuenta_Password_Skype').val(); 

    if(valor != ""){
      $('#error_password_skype').html('');
      $('#error_password_skype').hide();
    }
  });

  $("#Cuenta_Usuario_Siesa").change(function() {
    var valor = $('#Cuenta_Usuario_Siesa').val(); 

    if(valor != ""){
      $('#error_usuario_siesa').html('');
      $('#error_usuario_siesa').hide();
    }
  });

  $("#Cuenta_Password_Siesa").change(function() {
    var valor = $('#Cuenta_Password_Siesa').val(); 

    if(valor != ""){
      $('#error_password_siesa').html('');
      $('#error_password_siesa').hide();
    }
  });

  $("#Cuenta_Usuario_Glpi").change(function() {
    var valor = $('#Cuenta_Usuario_Glpi').val(); 

    if(valor != ""){
      $('#error_usuario_glpi').html('');
      $('#error_usuario_glpi').hide();
    }
  });

  $("#Cuenta_Password_Glpi").change(function() {
    var valor = $('#Cuenta_Password_Glpi').val(); 

    if(valor != ""){
      $('#error_password_glpi').html('');
      $('#error_password_glpi').hide();
    }
  });

  $("#Cuenta_Usuario_Papercut").change(function() {
    var valor = $('#Cuenta_Usuario_Papercut').val(); 

    if(valor != ""){
      $('#error_usuario_papercut').html('');
      $('#error_usuario_papercut').hide();
    }
  });

  $("#Cuenta_Password_Papercut").change(function() {
    var valor = $('#Cuenta_Password_Papercut').val(); 

    if(valor != ""){
      $('#error_password_papercut').html('');
      $('#error_password_papercut').hide();
    }
  });

});

function clear_select2_ajax(id){
  $('#'+id+'').val('').trigger('change');
  $('#s2id_'+id+' span').html("");
}

function limpiar_errores(){
  $('#error_tipo').html('');
  $('#error_tipo').hide(); 
  $('#error_usuario').html('');
  $('#error_usuario').hide(); 
  $('#error_dominio').html('');
  $('#error_dominio').hide(); 
  $('#error_cuenta_correo').html('');
  $('#error_cuenta_correo').hide(); 
  $('#error_password_correo').html('');
  $('#error_password_correo').hide(); 
  $('#error_cuenta_skype').html('');
  $('#error_cuenta_skype').hide(); 
  $('#error_password_skype').html('');
  $('#error_password_skype').hide(); 
  $('#error_usuario_siesa').html('');
  $('#error_usuario_siesa').hide(); 
  $('#error_password_siesa').html('');
  $('#error_password_siesa').hide(); 
  $('#error_usuario_glpi').html('');
  $('#error_usuario_glpi').hide(); 
  $('#error_password_glpi').html('');
  $('#error_password_glpi').hide();
  $('#error_usuario_papercut').html('');
  $('#error_usuario_papercut').hide(); 
  $('#error_password_papercut').html('');
  $('#error_password_papercut').hide(); 
}
    
</script>
