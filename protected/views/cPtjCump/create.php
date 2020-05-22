<?php
/* @var $this CPtjCumpController */
/* @var $model CPtjCump */

//para combo de estados de tipos
$lista_tipos = CHtml::listData($tipos, 'Id_Dominio', 'Dominio'); 

?>

<h3>Creación de porcentaje de cumplimiento</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'lista_tipos'=>$lista_tipos)); ?>