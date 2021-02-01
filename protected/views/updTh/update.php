<?php
/* @var $this UpdThController */
/* @var $model UpdTh */


//para combos de usuarios
$lista_usuarios = CHtml::listData($usuarios, 'Id_Usuario', 'Nombres'); 

?>

<script type="text/javascript">
$(function() {
	//se llenan las opciones seleccionadas del modelo
	$('#UpdTh_usuarios').val(<?php echo $json_usuarios_activos ?>).trigger('change');
});
</script>

<h3>Actualización de usuario(s) consulta / modificación TH</h3>    
<?php $this->renderPartial('_form', array('model'=>$model, 'lista_usuarios'=>$lista_usuarios)); ?> 