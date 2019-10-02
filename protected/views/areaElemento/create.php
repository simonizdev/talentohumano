<?php
/* @var $this AreaElementoController */
/* @var $model AreaElemento */

//para combos de elementos
$lista_elementos = CHtml::listData($elementos, 'Id_Elemento', 'Elemento'); 

//para combos de áreas
$lista_areas = CHtml::listData($areas, 'Id_Area', 'Area'); 

//para combos de subáreas
$lista_subareas = CHtml::listData($subareas, 'Id_Subarea', 'Subarea'); 

?>

<h3>Asociando área / subárea a elemento</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'lista_elementos'=>$lista_elementos, 'lista_areas'=>$lista_areas, 'lista_subareas'=>$lista_subareas)); ?>