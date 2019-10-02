<?php
/* @var $this EmpresaUsuarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Empresa Usuarios',
);

$this->menu=array(
	array('label'=>'Create EmpresaUsuario', 'url'=>array('create')),
	array('label'=>'Manage EmpresaUsuario', 'url'=>array('admin')),
);
?>

<h1>Empresa Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
