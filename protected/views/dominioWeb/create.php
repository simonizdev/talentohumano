<?php
/* @var $this DominioWebController */
/* @var $model DominioWeb */ 

//para combos de tipos
$lista_tipos = CHtml::listData($tipos, 'Id_Dominio', 'Dominio');

?>

<h3>Creación de dominio web</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'lista_tipos' => $lista_tipos)); ?>