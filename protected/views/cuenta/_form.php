<?php
/* @var $this CuentaController */
/* @var $model Cuenta */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'cuenta-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>


<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <div class="pull-right badge bg-red" id="error_asoc" style="display: none;"></div>
            <?php echo $form->label($model,'Tipo_Asociacion'); ?>
            <?php
                $this->widget('ext.select2.ESelect2',array(
                    'name'=>'Cuenta[Tipo_Asociacion]',
                    'id'=>'Cuenta_Tipo_Asociacion',
                    'data'=>$lista_tipos_asoc,
                    'htmlOptions'=>array(),
                    'options'=>array(
                        'placeholder'=>'Seleccione...',
                        'width'=> '100%',
                        'allowClear'=>true,
                    ),
                ));
            ?>
        </div>
    </div>    
    <?php if($model->isNewRecord) { ?> 
    <div class="col-sm-6" id="div_empleado" style="display: none;">
        <div class="form-group">
            <div class="pull-right badge bg-red" id="error_id_empleado" style="display: none;"></div>
            <?php echo $form->label($model,'Id_Empleado'); ?>
            <?php echo $form->textField($model,'Id_Empleado'); ?>
            <?php
                $this->widget('ext.select2.ESelect2', array(
                    'selector' => '#Cuenta_Id_Empleado',
                    'options'  => array(
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'width' => '100%',
                        'language' => 'es',
                        'ajax' => array(
                            'url' => Yii::app()->createUrl('empleado/SearchEmpleado'),
                            'dataType'=>'json',
                            'data'=>'js:function(term){return{q: term};}',
                            'results'=>'js:function(data){ return {results:data};}'                   
                        ),
                        'formatNoMatches'=> 'js:function(){ clear_select2_ajax("Cuenta_Id_Empleado"); return "No se encontraron resultados"; }',
                        'formatInputTooShort' =>  'js:function(){ return "Digite más de 3 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'Cuenta_Id_Empleado\')\">Limpiar campo</button>"; }',
                    ),
                ));
            ?>
        </div>
    </div>
    <?php } else { ?>
    <div class="col-sm-6" id="div_empleado" style="display: none;">
        <div class="form-group">
            <div class="pull-right badge bg-red" id="error_id_empleado" style="display: none;"></div>
            <?php echo $form->label($model,'Id_Empleado'); ?>

            <?php echo $form->textField($model,'Id_Empleado'); ?>
            <?php
                $this->widget('ext.select2.ESelect2', array(
                    'selector' => '#Cuenta_Id_Empleado',
                    'options'  => array(
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'width' => '100%',
                        'language' => 'es',
                        'ajax' => array(
                            'url' => Yii::app()->createUrl('empleado/SearchEmpleado'),
                            'dataType'=>'json',
                            'data'=>'js:function(term){return{q: term};}',
                            'results'=>'js:function(data){ return {results:data};}'                   
                        ),
                        'formatNoMatches'=> 'js:function(){ clear_select2_ajax("Cuenta_Id_Empleado"); return "No se encontraron resultados"; }',
                        'formatInputTooShort' =>  'js:function(){ return "Digite más de 3 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'Cuenta_Id_Empleado\')\">Limpiar campo</button>"; }',
                        'initSelection'=>'js:function(element,callback) {
                            var id=$(element).val(); // read #selector value
                            if ( id !== "" ) {
                                $.ajax("'.Yii::app()->createUrl('empleado/SearchEmpleadoById').'", {
                                    data: { id: id },
                                    dataType: "json"
                                }).done(function(data,textStatus, jqXHR) { callback(data[0]); });
                           }
                        }',
                    ),
                ));
            ?>
        </div>
    </div>
    <?php } ?>
</div>

<div id="div_correo" style="display: none;">
    <h4 class="box-title">Correo</h4>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_tipo" style="display: none;"></div>
                <?php echo $form->label($model,'Tipo'); ?>
                <?php
                    $this->widget('ext.select2.ESelect2',array(
                        'name'=>'Cuenta[Tipo]',
                        'id'=>'Cuenta_Tipo',
                        'data'=>$lista_tipos,
                        'value' => $model->Tipo,
                        'htmlOptions'=>array(),
                        'options'=>array(
                            'placeholder'=>'Seleccione...',
                            'width'=> '100%',
                            'allowClear'=>true,
                        ),
                    ));
                ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_usuario" style="display: none;"></div>
                <?php echo $form->label($model,'Usuario'); ?>
                <?php echo $form->textField($model,'Usuario', array('class' => 'form-control', 'maxlength' => '50', 'autocomplete' => 'off')); ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_dominio" style="display: none;"></div>
                <?php echo $form->label($model,'Dominio'); ?>
                <?php
                    $this->widget('ext.select2.ESelect2',array(
                        'name'=>'Cuenta[Dominio]',
                        'id'=>'Cuenta_Dominio',
                        'data'=>$lista_dominios,
                        'value' => $model->Dominio,
                        'htmlOptions'=>array(),
                        'options'=>array(
                            'placeholder'=>'Seleccione...',
                            'width'=> '100%',
                            'allowClear'=>true,
                        ),
                    ));
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4" id="cuenta_correo">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_cuenta_correo" style="display: none;"></div>
                <?php echo $form->label($model,'Cuenta_Correo'); ?>
                <?php echo $form->textField($model,'Cuenta_Correo', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off', 'readonly' => 'true')); ?>
            </div>
        </div>
        <div class="col-sm-4" id="password_correo">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_password_correo" style="display: ;"></div>
                <?php echo $form->label($model,'Password_Correo'); ?>
                <?php echo $form->textField($model,'Password_Correo', array('class' => 'form-control', 'maxlength' => '50', 'autocomplete' => 'off')); ?>
            </div>
        </div>

    </div>
    <div class="row">
        <?php if(!$model->isNewRecord) { ?>
        <div class="col-sm-8" id="correo_red" style="display: none;">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_cuenta_red" style="display: none;"></div>
                <?php echo $form->label($model,'Cuenta_Correo_Red'); ?>
                <?php echo $form->textField($model,'Cuenta_Correo_Red'); ?>
                <?php
                    $this->widget('ext.select2.ESelect2', array(
                        'selector' => '#Cuenta_Cuenta_Correo_Red',
                        'options'  => array(
                            'allowClear' => true,
                            'minimumInputLength' => 3,
                            'width' => '100%',
                            'language' => 'es',
                            'ajax' => array(
                                'url' => Yii::app()->createUrl('cuenta/SearchCorreo'),
                                'dataType'=>'json',
                                'data'=>'js:function(term){return{q: term, id:'.$model->Id_Cuenta.'};}',
                                'results'=>'js:function(data){ return {results:data};}'                   
                            ),
                            'formatNoMatches'=> 'js:function(){ clear_select2_ajax("Cuenta_Cuenta_Correo_Red"); return "No se encontraron resultados"; }',
                            'formatInputTooShort' =>  'js:function(){ return "Digite más de 3 caracteres para iniciar busqueda <button type=\"button\" class=\"btn btn-success btn-xs pull-right\" onclick=\"clear_select2_ajax(\'Cuenta_Cuenta_Correo_Red\')\">Limpiar campo</button>"; }',
                            'initSelection'=>'js:function(element,callback) {
                                var id=$(element).val(); // read #selector value
                                if ( id !== "" ) {
                                    $.ajax("'.Yii::app()->createUrl('cuenta/SearchCorreoById').'", {
                                        data: { id: id },
                                        dataType: "json"
                                    }).done(function(data,textStatus, jqXHR) { callback(data[0]); });
                               }
                            }',
                        ),
                    ));
                ?>
            </div>
        </div>
        <?php } ?>
    </div>
 </div>

<div id="div_skype" style="display: none;">
    <h4 class="box-title">Skype</h4>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_cuenta_skype" style="display: none;"></div>
                <?php echo $form->label($model,'Cuenta_Skype'); ?>
                <?php echo $form->textField($model,'Cuenta_Skype', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_password_skype" style="display: none;"></div>
                <?php echo $form->label($model,'Password_Skype'); ?>
                <?php echo $form->textField($model,'Password_Skype', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
            </div>
        </div>
    </div>
</div>

<div id="div_siesa" style="display: none;">
    <h4 class="box-title">Siesa</h4>
    <div class="row">
        <div class="col-sm-4" id="usuario_siesa">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_usuario_siesa" style="display: none;"></div>
                <?php echo $form->label($model,'Usuario_Siesa'); ?>
                <?php echo $form->textField($model,'Usuario_Siesa', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
            </div>
        </div>
        <div class="col-sm-4" id="password_siesa">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_password_siesa" style="display: none;"></div>
                <?php echo $form->label($model,'Password_Siesa'); ?>
                <?php echo $form->textField($model,'Password_Siesa', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
            </div>
        </div>
    </div>
</div>

<div id="div_glpi" style="display: none;">
    <h4 class="box-title">GLPI</h4>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_usuario_glpi" style="display: none;"></div>
                <?php echo $form->label($model,'Usuario_Glpi'); ?>
                <?php echo $form->textField($model,'Usuario_Glpi', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_password_glpi" style="display: none;"></div>
                <?php echo $form->label($model,'Password_Glpi'); ?>
                <?php echo $form->textField($model,'Password_Glpi', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
            </div>
        </div>
    </div>
</div>

<div id="div_papercut" style="display: none;">
    <h4 class="box-title">Papercut</h4>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_usuario_papercut" style="display: none;"></div>
                <?php echo $form->label($model,'Usuario_Papercut'); ?>
                <?php echo $form->textField($model,'Usuario_Papercut', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_password_papercut" style="display: none;"></div>
                <?php echo $form->label($model,'Password_Papercut'); ?>
                <?php echo $form->textField($model,'Password_Papercut', array('class' => 'form-control', 'maxlength' => '100', 'autocomplete' => 'off')); ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4" id="div_observaciones" style="display: none;">
        <div class="form-group">
            <?php echo $form->error($model,'Observaciones', array('class' => 'pull-right badge bg-red')); ?>
            <?php echo $form->label($model,'Observaciones'); ?>
            <?php echo $form->textArea($model,'Observaciones',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
        </div>
    </div>

    <?php if(!$model->isNewRecord) { ?>

        <div class="col-sm-4" id="div_estado_1" style="display: ;">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_estado_1" style="display: none;"></div>
                <?php echo $form->label($model,'Estado'); ?>
                <?php
                    $this->widget('ext.select2.ESelect2',array(
                        'name'=>'Cuenta[Estado]',
                        'id'=>'Cuenta_Estado',
                        'data'=>$lista_estados_all,
                        'htmlOptions'=>array(),
                        'options'=>array(
                            'placeholder'=>'Seleccione...',
                            'width'=> '100%',
                            'allowClear'=>true,
                        ),
                    ));
                ?>
            </div>
        </div>
        <div class="col-sm-4" id="div_estado_2" style="display: ;">
            <div class="form-group">
                <div class="pull-right badge bg-red" id="error_estado_2" style="display: none;"></div>
                <?php echo $form->label($model,'Estado'); ?>
                <?php
                    $this->widget('ext.select2.ESelect2',array(
                        'name'=>'Cuenta[Estado2]',
                        'id'=>'Cuenta_Estado2',
                        'data'=>$lista_estados,
                        'htmlOptions'=>array(),
                        'options'=>array(
                            'placeholder'=>'Seleccione...',
                            'width'=> '100%',
                            'allowClear'=>true,
                        ),
                    ));
                ?>
            </div>
        </div>

    <?php } ?>

</div>

<div class="btn-group" style="padding-bottom: 2%" id="div_buttons">
    <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=cuenta/admin'; ?>';"><i class="fa fa-reply"></i> Volver</button>
    <button type="button" class="btn btn-success" id="valida_form"><i class="fa fa-floppy-o"></i> <?php if($model->isNewRecord){echo 'Crear';}else{ echo 'Guardar';} ?></button>
</div>   

<?php $this->endWidget(); ?>
