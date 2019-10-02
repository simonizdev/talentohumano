<?php
/* @var $this CVendedoresController */
/* @var $model CVendedores */

//para combo de estados de tipos
$lista_tipos = CHtml::listData($tipos, 'Id_Dominio', 'Dominio'); 

?>

<h3>Actualización de vendedor</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'lista_tipos'=>$lista_tipos)); ?>