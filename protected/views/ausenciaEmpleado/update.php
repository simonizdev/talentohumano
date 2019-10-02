<?php
/* @var $this AusenciaEmpleadoController */
/* @var $model AusenciaEmpleado */

//para combos de motivos
$lista_motivos = CHtml::listData($motivos, 'Id_Dominio', 'Dominio');

?>

<script type="text/javascript">

	function valida_ausencia(){
	    var fecha_inicial = $('#AusenciaEmpleado_Fecha_Inicial').val();
	    var id_ausencia = <?php echo $model->Id_Ausencia ?>;
	    var empleado = <?php echo $e; ?>;
		
		var data = {fecha_inicial: fecha_inicial, id_ausencia: id_ausencia, empleado: empleado}

	    $.ajax({ 
			type: "POST", 
			url: "<?php echo Yii::app()->createUrl('ausenciaEmpleado/infoausenciaact'); ?>",
			data: data,
			success: function(data){
	 			var res = data.split("|");
	 			var opc =res[0];
	 			var mensaje =res[1];
	 			if(opc == 1){
 					$('#mensaje').text(mensaje);
 					$('#div_mensaje').show();
	 			}else{
	 				$('#mensaje').text(mensaje);
 					$('#div_mensaje').hide();	
	 			}
			}
		});

	}


</script>

<h3>Actualización ausencia de empleado</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'e'=>$e, 'lista_motivos' => $lista_motivos, 'fecha_min' => $fecha_min)); ?>