<?php
/* @var $this CPtjRecaudosController */
/* @var $model CPtjRecaudos */

//para combo de estados de tipos
$lista_tipos = CHtml::listData($tipos, 'Id_Dominio', 'Dominio'); 

?>

<h3>Creación de porcentaje de comisión</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'lista_tipos'=>$lista_tipos)); ?>
