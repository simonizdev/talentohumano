<?php
/* @var $this EmpleadoController */
/* @var $model Empleado */

?>

<h3>Detalle de empleado</h3>

<div class="btn-group">
    <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=empleado/lista'; ?>';"><i class="fa fa-reply"></i> Volver </button>
    <?php if ($asociacion_elementos == 1) { ?> 
      <button type="button" class="btn btn-success"><i class="fa fa-pencil"></i> Opciones de empleado</button>
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
        <span class="sr-only">Opciones de empleado</span>
      </button>
      <ul class="dropdown-menu" role="menu">
        <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=hcoMed/create&e='.$model->Id_Empleado; ?>">Registro de historia clinica ocupacional</a></li>
        <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=anexoMed/create&e='.$model->Id_Empleado; ?>">Registro de anexo médico</a></li>
        <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=formulaMed/create&e='.$model->Id_Empleado; ?>">Registro de formula médica</a></li>
        <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=soporteMed/create&e='.$model->Id_Empleado; ?>">Registro de soporte médico</a></li>
      </ul>
    <?php } ?>
</div>

<div class="nav-tabs-custom" style="margin-top: 2%;">
<ul class="nav nav-tabs" style="font-size: 12px !important;">
  <li class="active"><a href="#info" data-toggle="tab">Información general</a></li>
  <li><a href="#hco" data-toggle="tab">Historias clínicas ocupacionales</a></li>
  <li><a href="#anex" data-toggle="tab">Anexos</a></li>
  <li><a href="#form" data-toggle="tab">Fórmulas</a></li>
  <li><a href="#sopo" data-toggle="tab">Soportes</a></li>
</ul>
<div class="tab-content">
  <div class="active tab-pane" id="info">
  	<div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>ID</label>
                <?php echo '<p>'.$model->Id_Empleado.'</p>';?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Tipo de identificación</label>
                <?php echo '<p>'.$model->idtipoident->Dominio.'</p>';?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label># Identificación</label>
                <?php echo '<p>'.$model->Identificacion.'</p>';?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Nombres</label>
                <?php echo '<p>'.$model->Nombre.'</p>';?>
            </div>
        </div>
        </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Apellidos</label>
                <?php echo '<p>'.$model->Apellido.'</p>';?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Género</label>
                <?php if($model->Id_Genero == "") { $Genero = "NO ASIGNADO"; } else { $Genero = $model->idgenero->Dominio; } ?>
                <?php echo '<p>'.$Genero.'</p>'; ?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>RH</label>
                <?php if($model->Id_Rh == "") { $Rh = "NO ASIGNADO"; } else { $Rh = $model->idrh->Dominio; } ?>
                <?php echo '<p>'.$Rh.'</p>'; ?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Fecha de nacimiento</label>
                <?php echo '<p>'.UtilidadesEmpleado::fechanacimientoempleado($model->Id_Empleado).'</p>'; ?>
            </div>
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-3">
            <div class="form-group">
                <label>Edad</label>
                <?php echo '<p>'.UtilidadesEmpleado::edadempleado($model->Id_Empleado).'</p>'; ?> 
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Eps</label>
                <?php if($model->Id_Eps == "") { $Eps = "NO ASIGNADO"; } else { $Eps = $model->ideps->Dominio; } ?>
                <?php echo '<p>'.$Eps.'</p>'; ?>
            </div>
        </div>       
        <div class="col-sm-3">
            <div class="form-group">
                <label>Arl</label>
                <?php if($model->Id_Arl == "") { $Arl = "NO ASIGNADO"; } else { $Arl = $model->idarl->Dominio; } ?>
                <?php echo '<p>'.$Arl.'</p>'; ?>
            </div>
        </div>      
        <div class="col-sm-3">
            <div class="form-group">
                <label>Empresa</label>
                <?php echo '<p>'.$model->idempresa->Descripcion.'</p>';?>
            </div>
        </div>
	</div>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Unidad de gerencia</label>
                <?php echo '<p>'.UtilidadesEmpleado::unidadgerenciaactualempleado($model->Id_Empleado).'</p>'; ?> 
            </div>
        </div> 
        <div class="col-sm-3">
            <div class="form-group">
                <label>Área</label>
                <?php echo '<p>'.UtilidadesEmpleado::areaactualempleado($model->Id_Empleado).'</p>'; ?> 
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Subárea</label>
                <?php echo '<p>'.UtilidadesEmpleado::subareaactualempleado($model->Id_Empleado).'</p>'; ?> 
            </div>
        </div>  
        <div class="col-sm-3">
            <div class="form-group">
                <label>Cargo</label>
                <?php echo '<p>'.UtilidadesEmpleado::cargoactualempleado($model->Id_Empleado).'</p>'; ?> 
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Fecha de ingreso</label>
                <?php echo '<p>'.UtilidadesEmpleado::fechaingresoempleado($model->Id_Empleado).'</p>'; ?> 
            </div>
        </div>        
        <div class="col-sm-3">
            <div class="form-group">
                <label>Estado</label>
                <?php echo '<p>'.UtilidadesVarias::textoestado1($model->Estado).'</p>'; ?>
            </div>
        </div>  
    </div>     
  </div>
  <div class="tab-pane" id="hco">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'hco-med-grid',
        'dataProvider'=>$model_hco,
        //'filter'=>$model,
        'enableSorting' => false,
        'columns'=>array(
            array(
                'name' => 'Fecha',
                'value' => 'UtilidadesVarias::textofecha($data->Fecha)',
            ),
            array(
                'name'=>'Id_Usuario_Creacion',
                'value'=>'$data->idusuariocre->Usuario',
            ),
            array(
                'name'=>'Fecha_Creacion',
                'value'=>'UtilidadesVarias::textofechahora($data->Fecha_Creacion)',
            ),
            array(
                'class'=>'CLinkColumn',
                'label'=>'Descargar PDF',
                'urlExpression'=>'Yii::app()->createUrl("hcoMed/ExportPdf",array("id"=>$data->Id_Hco))',
                'header'=>''
            ),
            array(
                'class'=>'CButtonColumn',
                'template'=>'{view}',
                'buttons'=>array(
                    'view'=>array(
                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                        'imageUrl'=>false,
                        'options'=>array('title'=>'Visualizar'),
                        'url'=>'Yii::app()->createUrl("hcoMed/view", array("id"=>$data->Id_Hco))',
                    ),
                )
            ),
        ),
    )); ?>
  </div>
  <div class="tab-pane" id="anex">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'anexo-med-grid',
        'dataProvider'=>$model_anexos,
        //'filter'=>$model,
        'enableSorting' => false,
        'columns'=>array(
            array(
                'name' => 'Fecha',
                'value' => 'UtilidadesVarias::textofecha($data->Fecha)',
            ),
            array(
                'name'=>'Id_Usuario_Creacion',
                'value'=>'$data->idusuariocre->Usuario',
            ),
            array(
                'name'=>'Fecha_Creacion',
                'value'=>'UtilidadesVarias::textofechahora($data->Fecha_Creacion)',
            ),
            array(
                'class'=>'CLinkColumn',
                'label'=>'Descargar PDF',
                'urlExpression'=>'Yii::app()->createUrl("anexoMed/ExportPdf",array("id"=>$data->Id_Anexo))',
                'header'=>''
            ),
            array(
                'class'=>'CButtonColumn',
                'template'=>'{view}',
                'buttons'=>array(
                    'view'=>array(
                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                        'imageUrl'=>false,
                        'options'=>array('title'=>'Visualizar'),
                        'url'=>'Yii::app()->createUrl("anexoMed/view", array("id"=>$data->Id_Anexo))',
                    ),
                )
            ),
        ),
    )); ?>
  </div>
  <div class="tab-pane" id="form">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'formula-med-grid',
        'dataProvider'=>$model_formulas,
        //'filter'=>$model,
        'enableSorting' => false,
        'columns'=>array(
            array(
                'name' => 'Fecha',
                'value' => 'UtilidadesVarias::textofecha($data->Fecha)',
            ),
            array(
                'name'=>'Id_Usuario_Creacion',
                'value'=>'$data->idusuariocre->Usuario',
            ),
            array(
                'name'=>'Fecha_Creacion',
                'value'=>'UtilidadesVarias::textofechahora($data->Fecha_Creacion)',
            ),
            array(
                'class'=>'CLinkColumn',
                'label'=>'Descargar PDF',
                'urlExpression'=>'Yii::app()->createUrl("formulaMed/ExportPdf",array("id"=>$data->Id_Formula))',
                'header'=>''
            ),
            array(
                'class'=>'CButtonColumn',
                'template'=>'{view}',
                'buttons'=>array(
                    'view'=>array(
                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                        'imageUrl'=>false,
                        'options'=>array('title'=>'Visualizar'),
                        'url'=>'Yii::app()->createUrl("formulaMed/view", array("id"=>$data->Id_Formula))',
                    ),
                )
            ),
        ),
    )); ?>
  </div> 
  <div class="tab-pane" id="sopo">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'soporte-med-grid',
        'dataProvider'=>$model_soportes,
        //'filter'=>$model,
        'enableSorting' => false,
        'columns'=>array(
            array(
                'name' => 'Fecha',
                'value' => 'UtilidadesVarias::textofecha($data->Fecha)',
            ),
            array(
                'class'=>'CLinkColumn',
                'label'=>'Descargar PDF',
                'urlExpression'=>'"images/soporte_medico/".$data->Soporte',
                'header'=>'Soporte'
            ),
            array(
                'name'=>'Id_Usuario_Creacion',
                'value'=>'$data->idusuariocre->Usuario',
            ),
            array(
                'name'=>'Fecha_Creacion',
                'value'=>'UtilidadesVarias::textofechahora($data->Fecha_Creacion)',
            ),
            array(
                'class'=>'CButtonColumn',
                'template'=>'{view}',
                'buttons'=>array(
                    'view'=>array(
                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                        'imageUrl'=>false,
                        'options'=>array('title'=>'Visualizar'),
                        'url'=>'Yii::app()->createUrl("soporteMed/view", array("id"=>$data->Id_Soporte))',
                    ),
                )
            ),
        ),
    )); ?>
  </div> 
</div>
<!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->
