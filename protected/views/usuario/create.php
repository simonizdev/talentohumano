<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

//para combos de perfiles
$lista_perfiles = CHtml::listData($m_perfiles, 'Id_Perfil', 'Descripcion'); 

//para combos de empresas
$lista_empresas = CHtml::listData($m_empresas, 'Id_Empresa', 'Descripcion'); 

//para combos de áreas
$lista_areas = CHtml::listData($m_areas, 'Id_Area', 'Area'); 

//para combos de subáreas
$lista_subareas = CHtml::listData($m_subareas, 'Id_Subarea', 'Subarea'); 

//para combos de niveles de detalle vista empleado
$lista_niveles = CHtml::listData($m_niveles_detalle, 'Id_Dominio', 'Dominio'); 

?>

<h3>Creación de usuario</h3>    
<?php $this->renderPartial('_form', array('model'=>$model, 'lista_perfiles'=>$lista_perfiles, 'lista_empresas'=>$lista_empresas, 'lista_areas' => $lista_areas, 'lista_subareas' => $lista_subareas, 'lista_niveles'=>$lista_niveles)); ?>  

