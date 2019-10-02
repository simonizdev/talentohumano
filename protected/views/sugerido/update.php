<?php
/* @var $this SugeridoController */
/* @var $model Sugerido */

//para combos de areas
$lista_areas = CHtml::listData($areas, 'Id_Area', 'Area'); 

//para combos de subareas
$lista_subareas = CHtml::listData($subareas, 'Id_Subarea', 'Subarea'); 

//para combos de cargos
$lista_cargos = CHtml::listData($cargos, 'Id_Cargo', 'Cargo'); 

?>

<h3>Actualización de sugerido</h3>  
<?php $this->renderPartial('_form', array('model'=>$model, 'lista_areas'=>$lista_areas, 'lista_subareas'=>$lista_subareas, 'lista_cargos'=>$lista_cargos)); ?>