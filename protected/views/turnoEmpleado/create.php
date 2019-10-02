<?php
/* @var $this TurnoEmpleadoController */
/* @var $model TurnoEmpleado */

?>

<script type="text/javascript">

	function valida_turno(){
	    var fecha_inicial = $('#TurnoEmpleado_Fecha_Inicial').val();
	    var fecha_final = $('#TurnoEmpleado_Fecha_Final').val();
	    var empleado = <?php echo $e; ?>;

	    if(fecha_inicial != "" && fecha_final != ""){

		   	var data = {fecha_inicial: fecha_inicial, fecha_final: fecha_final, empleado: empleado}

		    $.ajax({ 
				type: "POST", 
				url: "<?php echo Yii::app()->createUrl('turnoEmpleado/infoturnocre'); ?>",
				data: data,
				success: function(data){
		 			var res = data.split("|");
		 			var opc =res[0];
		 			var mensaje =res[1];
		 			if(opc == 1){
	 					$('#mensaje').text(mensaje);
	 					$('#div_mensaje').show();
	 					$('#valid').val(0);
		 			}else{
		 				$('#mensaje').text(mensaje);
	 					$('#div_mensaje').hide();
	 					$('#valid').val(1);	
		 			}
				}
			});
		}else{
			$('#valid').val(0);
		}

	}	

</script>

<h3>Registro turno de empleado</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'e'=>$e, 'lista_t' => $lista_t, 'fecha_min' => $fecha_min)); ?>