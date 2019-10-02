<?php
/* @var $this CAceleradorCmsController */
/* @var $model CAceleradorCms */

//para combo de estados de tipos
$lista_tipos = CHtml::listData($tipos, 'Id_Dominio', 'Dominio'); 

//para combo de aceleradores
$lista_aceler = CHtml::listData($aceler, 'Id_Dominio', 'Dominio');  

//para combo de estados de planes
$lista_planes = CHtml::listData($planes, 'Id_Plan', 'Plan_Descripcion'); 

?>

<h3>Creación de configuración</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'lista_tipos'=>$lista_tipos, 'lista_aceler' => $lista_aceler, 'lista_planes'=>$lista_planes)); ?>