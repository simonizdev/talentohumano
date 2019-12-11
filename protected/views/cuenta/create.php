<?php
/* @var $this CuentaController */
/* @var $model Cuenta */

//para combos de clases de cuenta / usuario
$lista_clases = CHtml::listData($clases, 'Id_Dominio', 'Dominio'); 

//para combo de dominios (correo electronico)
$lista_dominios = CHtml::listData($dominios, 'Id_Dominio_Web', 'Dominio'); 

//para combo de tipos
$lista_tipos = CHtml::listData($tipos, 'Id_Dominio', 'Dominio');

?>

<h3>Creación de cuenta / usuario</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'lista_clases'=>$lista_clases, 'lista_dominios'=>$lista_dominios, 'lista_tipos'=>$lista_tipos)); ?>