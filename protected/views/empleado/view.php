<?php
/* @var $this EmpleadoController */
/* @var $model Empleado */

?>

<script type="text/javascript">
    
$(function() {

    //se calcula la edad al cargar dom
    var fn = '<?php echo $model->Fecha_Nacimiento; ?>';

    if(fn != ""){
        $("#edad_emp").html(calcularEdad(fn));
    }

    var ciudad_res = parseInt(<?php echo $model->Id_Ciudad_Residencia; ?>);
    var ciu_bog = parseInt(<?php echo Yii::app()->params->lugar_res_bogota; ?>);

    if(ciudad_res != ""){
        if(parseInt(ciudad_res) == ciu_bog){
            $("#loc_res").show();
        }else{
            $("#loc_res").hide();
        }
    }

    var genero = parseInt(<?php echo $model->Id_Genero; ?>);
    var gen_fem = parseInt(<?php echo Yii::app()->params->genero_fem; ?>);

    if(genero != ""){
        if(parseInt(genero) == gen_fem){
            $("#ges").show();
        }else{
            $("#ges").hide();
        }
    }

    var alergia =  parseInt(<?php echo $model->Alergia; ?>);

    if(alergia != ""){
        if(parseInt(alergia) == 1){
            $("#obs_alerg").show();
        }else{
            $("#obs_alerg").hide();
        }
    }

    var estado =  parseInt(<?php echo $model->Estado; ?>);

    if(estado != ""){
        if(parseInt(estado) == 1){
            $("#info_act").show();
        }else{
            $("#info_act").hide();
        }
    }

    

});

function calcularEdad(fecha) {
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }

    return edad+' Años';
} 

</script>

<h3>Detalle de empleado</h3>

<div class="btn-group">
    <button type="button" class="btn btn-success" onclick="location.href = '<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=empleado/admin'; ?>';"><i class="fa fa-reply"></i> Volver </button>
    <?php if(Yii::app()->user->getState('niv_det_vis_emp') == Yii::app()->params->niv_det_vis_emp_ava) { ?>
    
        <button type="button" class="btn btn-success"><i class="fa fa-pencil"></i> Opciones de empleado</button>
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Opciones de empleado</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=nucleoEmpleado/create&e='.$model->Id_Empleado; ?>">Registro de pariente</a></li>
            <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=formacionEmpleado/create&e='.$model->Id_Empleado; ?>">Registro de estudio</a></li>
            <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=evaluacionEmpleado/create&e='.$model->Id_Empleado; ?>">Registro de evaluación</a></li>
            <?php if ($asociacion_elementos == 0) { ?>  
                <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=contratoEmpleado/create&e='.$model->Id_Empleado; ?>">Registro de contrato</a></li>
            <?php } else { ?>
                <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=turnoEmpleado/create&e='.$model->Id_Empleado; ?>">Registro de turno</a></li>
                <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=ausenciaEmpleado/create&e='.$model->Id_Empleado; ?>">Registro de ausencia</a></li>
                <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=disciplinarioEmpleado/create&e='.$model->Id_Empleado.'&opc=1'; ?>">Registro llamado de atención</a></li>
                <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=disciplinarioEmpleado/create&e='.$model->Id_Empleado.'&opc=2'; ?>">Registro de sanción</a></li>
                <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=disciplinarioEmpleado/create&e='.$model->Id_Empleado.'&opc=3'; ?>">Registro de comparendo</a></li>
                <?php if ($ter_cont == 1) { ?>  
                    <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=contratoEmpleado/terminacion&e='.$model->Id_Empleado; ?>">Terminación de contrato</a></li>
        
                <?php } ?>
            <?php } ?>  
        </ul>
    <?php } ?>
    <?php if(Yii::app()->user->getState('niv_det_vis_emp') == Yii::app()->params->niv_det_vis_emp_nor) { ?>
        <?php if ($asociacion_elementos != 0) { ?>  
            <button type="button" class="btn btn-success"><i class="fa fa-pencil"></i> Opciones de empleado</button>
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Opciones de empleado</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                
                    <li><a role="menuitem" tabindex="-1" href="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=disciplinarioEmpleado/create&e='.$model->Id_Empleado.'&opc=3'; ?>">Registro de comparendo</a></li>
                  
            </ul>
        <?php } ?>
    <?php } ?>
</div>

<?php if(Yii::app()->user->getState('niv_det_vis_emp') == Yii::app()->params->niv_det_vis_emp_ava){ ?>

<div class="nav-tabs-custom" style="margin-top: 2%;">
    <ul class="nav nav-tabs" style="font-size: 12px !important;">
        <li class="active"><a href="#info" data-toggle="tab">Información</a></li>
        <li><a href="#nucleo" data-toggle="tab">Núcleo familiar</a></li>
        <li><a href="#formacion" data-toggle="tab">Formación</a></li>
        <li><a href="#evaluacion" data-toggle="tab">Evaluaciones</a></li>
        <li><a href="#contrato_activo" data-toggle="tab">Contrato activo</a></li>
        <li><a href="#contratos_anteriores" data-toggle="tab">Contratos anteriores</a></li>
    </ul>
    <div class="tab-content">
        <div class="active tab-pane" id="info">
            <h4>Datos generales</h4><br/>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>ID</label>
                        <?php echo '<p>'.$model->Id_Empleado.'</p>';?>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tipo de identificación</label>
                        <?php echo '<p>'.$model->idtipoident->Dominio.'</p>';?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label># Identificación</label>
                        <?php echo '<p>'.$model->Identificacion.'</p>';?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Dpto - municipio de expedición </label>
                        <?php if($model->Id_Ciudad_Exp_Ident == "") { $Ciudad_E_I = "NO ASIGNADO"; } else { $Ciudad_E_I = $model->idciudadexpident->Ciudad; } ?>
                        <?php echo '<p>'.$Ciudad_E_I.'</p>'; ?>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Apellidos</label>
                        <?php echo '<p>'.$model->Apellido.'</p>';?>
                    </div>
                </div>
                 <div class="col-sm-4">
                    <div class="form-group">
                        <label>Nombres</label>
                        <?php echo '<p>'.$model->Nombre.'</p>';?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <?php if($model->Fecha_Nacimiento == "") { $Fecha_Nacimiento = "NO ASIGNADO"; } else { $Fecha_Nacimiento = UtilidadesVarias::textofecha($model->Fecha_Nacimiento); } ?>
                        <?php echo '<p>'.$Fecha_Nacimiento.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Edad</label>
                        <?php echo '<p id="edad_emp"></p>';?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Dpto - municipio nacimiento</label>
                        <?php if($model->Id_Ciudad_Nacimiento == "") { $Ciudad_N = "NO ASIGNADO"; } else { $Ciudad_N = $model->idciudadn->Ciudad; } ?>
                        <?php echo '<p>'.$Ciudad_N.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Dirección</label>
                        <?php if($model->Direccion == "") { $Direccion = "NO ASIGNADO"; } else { $Direccion = $model->Direccion; } ?>
                        <?php echo '<p>'.$Direccion.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Teléfono(s)</label>
                        <?php if($model->Telefono == "") { $Telefono = "NO ASIGNADO"; } else { $Telefono = $model->Telefono; } ?>
                        <?php echo '<p>'.$Telefono.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>E-mail</label>
                        <?php if($model->Correo == "") { $Correo = "NO ASIGNADO"; } else { $Correo = $model->Correo; } ?>
                        <?php echo '<p>'.$Correo.'</p>'; ?>
                    </div>
                </div>
            </div>
            <br/><h4>Datos sociodemográficos</h4><br/>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Grado de escolaridad</label>
                        <?php if($model->Id_Grado_Esc == "") { $Id_Grado_Esc = "NO ASIGNADO"; } else { $Id_Grado_Esc = $model->idgradoesc->Dominio; } ?>
                        <?php echo '<p>'.$Id_Grado_Esc.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Estado civil</label>
                        <?php if($model->Id_Estado_Civil == "") { $Estado_civil = "NO ASIGNADO"; } else { $Estado_civil = $model->idestadocivil->Dominio; } ?>
                        <?php echo '<p>'.$Estado_civil.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Raza</label>
                        <?php if($model->Id_Raza == "") { $Raza = "NO ASIGNADO"; } else { $Raza = $model->idraza->Dominio; } ?>
                        <?php echo '<p>'.$Raza.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Composición familiar</label>
                        <?php if($model->Id_Com_Fam == "") { $Com_Fam = "NO ASIGNADO"; } else { $Com_Fam = UtilidadesEmpleado::compfamempleado($model->Id_Com_Fam); } ?>
                        <?php echo '<p>'.$Com_Fam.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Ocupación</label>
                        <?php if($model->Id_Ocupacion == "") { $Ocupacion = "NO ASIGNADO"; } else { $Ocupacion = UtilidadesEmpleado::ocupmempleado($model->Id_Ocupacion); } ?>
                        <?php echo '<p>'.$Ocupacion.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Dpto - municipio residencia</label>
                        <?php if($model->Id_Ciudad_Residencia == "") { $Ciudad_R = "NO ASIGNADO"; } else { $Ciudad_R = $model->idciudadr->Ciudad; } ?>
                        <?php echo '<p>'.$Ciudad_R.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4" id="loc_res" style="display: none; ">
                    <div class="form-group">
                        <label>Localidad de residencia</label>
                        <?php if($model->Id_Localidad_Residencia == "") { $Loc_Res = "NO ASIGNADO"; } else { $Loc_Res = $model->idlocres->Dominio; } ?>
                        <?php echo '<p>'.$Loc_Res.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>RH</label>
                        <?php if($model->Id_Rh == "") { $Rh = "NO ASIGNADO"; } else { $Rh = $model->idrh->Dominio; } ?>
                        <?php echo '<p>'.$Rh.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Género</label>
                        <?php if($model->Id_Genero == "") { $Genero = "NO ASIGNADO"; } else { $Genero = $model->idgenero->Dominio; } ?>
                        <?php echo '<p>'.$Genero.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4" id="ges" style="display: none;">
                    <div class="form-group">
                        <label>Gestante ?</label>
                        <?php if($model->Es_Gestante == "") { $Es_Gestante = "NO ASIGNADO"; } else { $Es_Gestante = UtilidadesVarias::textoestado2($model->Es_Gestante); } ?>
                        <?php echo '<p>'.$Es_Gestante.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Estrato socioeconómico</label>
                        <?php if($model->Id_Estrato == "") { $Estrato = "NO ASIGNADO"; } else { $Estrato = $model->idestrato->Dominio; } ?>
                        <?php echo '<p>'.$Estrato.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Persona de contacto</label>
                        <?php if($model->Persona_Contacto == "") { $Persona_Contacto = "NO ASIGNADO"; } else { $Persona_Contacto = $model->Persona_Contacto; } ?>
                        <?php echo '<p>'.$Persona_Contacto.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Teléfono persona de contacto</label>
                        <?php if($model->Tel_Persona_Contacto == "") { $Tel_Persona_Contacto = "NO ASIGNADO"; } else { $Tel_Persona_Contacto = $model->Tel_Persona_Contacto; } ?>
                        <?php echo '<p>'.$Tel_Persona_Contacto.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Parentesco contacto</label>
                        <?php if($model->Id_Parentesco_Persona_Contacto == "") { $Parentesco_Persona_Contacto = "NO ASIGNADO"; } else { $Parentesco_Persona_Contacto = $model->idparentpercont->Dominio; } ?>
                        <?php echo '<p>'.$Parentesco_Persona_Contacto.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Fuma ?</label>
                        <?php if($model->Fuma == "") { $Fuma = "NO ASIGNADO"; } else { $Fuma = UtilidadesVarias::textoestado2($model->Fuma); } ?>
                        <?php echo '<p>'.$Fuma.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Alergia ?</label>
                        <?php if($model->Alergia == "") { $Alergia = "NO ASIGNADO"; } else { $Alergia = UtilidadesVarias::textoestado2($model->Alergia); } ?>
                        <?php echo '<p>'.$Alergia.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row" id="obs_alerg" style="display: none;"> 
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Observaciones (alergia)</label>
                        <?php if($model->Observaciones == "") { $Observaciones = "NO ASIGNADO"; } else { $Observaciones = $model->Observaciones; } ?>
                        <?php echo '<p>'.$Observaciones.'</p>'; ?>
                    </div>
                </div>       
            </div>
            <br/><h4>Otros datos</h4><br/>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Dpto - municipio labor</label>
                        <?php if($model->Id_Ciudad_Labor == "") { $Ciudad_L = "NO ASIGNADO"; } else { $Ciudad_L = $model->idciudadl->Ciudad; } ?>
                        <?php echo '<p>'.$Ciudad_L.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Regional de labor</label>
                        <?php if($model->Id_Regional_Labor == "") { $Regional_L = "NO ASIGNADO"; } else { $Regional_L = $model->idregional->Regional; } ?>
                        <?php echo '<p>'.$Regional_L.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Eps</label>
                        <?php if($model->Id_Eps == "") { $Eps = "NO ASIGNADO"; } else { $Eps = $model->ideps->Dominio; } ?>
                        <?php echo '<p>'.$Eps.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Caja de compensación</label>
                        <?php if($model->Id_Caja_C == "") { $Cc = "NO ASIGNADO"; } else { $Cc = $model->idcajac->Dominio; } ?>
                        <?php echo '<p>'.$Cc.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Fondo de pensiones</label>
                        <?php if($model->Id_Fondo_P == "") { $Fondo_p = "NO ASIGNADO"; } else { $Fondo_p = $model->idfondop->Dominio; } ?>
                        <?php echo '<p>'.$Fondo_p.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Fondo de cesantías</label>
                        <?php if($model->Id_Fondo_C == "") { $Fondo_c = "NO ASIGNADO"; } else { $Fondo_c = $model->idfondoc->Dominio; } ?>
                        <?php echo '<p>'.$Fondo_c.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Arl</label>
                        <?php if($model->Id_Arl == "") { $Arl = "NO ASIGNADO"; } else { $Arl = $model->idarl->Dominio; } ?>
                        <?php echo '<p>'.$Arl.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Banco</label>
                        <?php if($model->Id_Banco == "") { $Banco = "NO ASIGNADO"; } else { $Banco = $model->idbanco->Dominio; } ?>
                        <?php echo '<p>'.$Banco.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tipo de cuenta</label>
                        <?php if($model->Id_T_Cuenta == "") { $Tipo_Cuenta = "NO ASIGNADO"; } else { $Tipo_Cuenta = $model->idtcuenta->Dominio; } ?>
                        <?php echo '<p>'.$Tipo_Cuenta.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Número de cuenta</label>
                        <?php if($model->Num_Cuenta == "") { $Num_Cuenta = "NO ASIGNADO"; } else { $Num_Cuenta = $model->Num_Cuenta; } ?>
                        <?php echo '<p>'.$Num_Cuenta.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Talla camisa</label>
                        <?php if($model->Talla_Camisa == "") { $Talla_Camisa = "NO ASIGNADO"; } else { $Talla_Camisa = $model->Talla_Camisa; } ?>
                        <?php echo '<p>'.$Talla_Camisa.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Talla pantalón</label>
                        <?php if($model->Talla_Pantalon == "") { $Talla_Pantalon = "NO ASIGNADO"; } else { $Talla_Pantalon = $model->Talla_Pantalon; } ?>
                        <?php echo '<p>'.$Talla_Pantalon.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Talla zapatos</label>
                        <?php if($model->Talla_Zapato == "") { $Talla_Zapato = "NO ASIGNADO"; } else { $Talla_Zapato = $model->Talla_Zapato; } ?>
                        <?php echo '<p>'.$Talla_Zapato.'</p>'; ?>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Talla overol</label>
                        <?php if($model->Talla_Overol == "") { $Talla_Overol = "NO ASIGNADO"; } else { $Talla_Overol = $model->Talla_Overol; } ?>
                        <?php echo '<p>'.$Talla_Overol.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Talla bata</label>
                        <?php if($model->Talla_Bata == "") { $Talla_Bata = "NO ASIGNADO"; } else { $Talla_Bata = $model->Talla_Bata; } ?>
                        <?php echo '<p>'.$Talla_Bata.'</p>'; ?>
                    </div>
                </div>    
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Estado</label>
                        <?php echo '<p>'.UtilidadesEmpleado::estadoactualempleado($model->Id_Empleado).'</p>'; ?>
                    </div>
                </div>
            </div>
            <div id="info_act" style="display: none;">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Empresa</label>
                            <?php echo '<p>'.UtilidadesEmpleado::empresaactualempleado($model->Id_Empleado).'</p>'; ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Área</label>
                            <?php echo '<p>'.UtilidadesEmpleado::unidadgerenciaactualempleado($model->Id_Empleado).'</p>';?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Área</label>
                            <?php echo '<p>'.UtilidadesEmpleado::areaactualempleado($model->Id_Empleado).'</p>';?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Subárea</label>
                            <?php echo '<p>'.UtilidadesEmpleado::subareaactualempleado($model->Id_Empleado).'</p>';?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Cargo</label>
                            <?php echo '<p>'.UtilidadesEmpleado::cargoactualempleado($model->Id_Empleado).'</p>';?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Centro de costo</label>
                            <?php echo '<p>'.UtilidadesEmpleado::centrocostoactualempleado($model->Id_Empleado).'</p>';?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Usuario que creo</label>
                        <?php echo '<p>'.$model->idusuariocre->Usuario.'</p>';?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Fecha de creación</label>
                        <?php echo '<p>'.UtilidadesVarias::textofechahora($model->Fecha_Creacion).'</p>';?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Usuario que actualizó</label>
                        <?php echo '<p>'.$model->idusuarioact->Usuario.'</p>';?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Fecha de actualización</label>
                        <?php echo '<p>'.UtilidadesVarias::textofechahora($model->Fecha_Actualizacion).'</p>';?>
                    </div>
                </div>
            </div>  
        </div>
        <div class="tab-pane" id="nucleo">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'nucleo-empleado-grid',
                'dataProvider'=>$model_parientes->search(),
                //'filter'=>$model,
                'enableSorting' => false,
                'columns'=>array(
                    array(
                        'name'=>'Id_Parentesco',
                        'value'=>'$data->idparentesco->Dominio',
                    ),
                    array(
                        'name'=>'Id_Genero',
                        'value'=>'$data->idgenero->Dominio',
                    ),
                    'Nombre_Apellido',
                    array(
                        'name'=>'Fecha_Nacimiento',
                        'value'=>'UtilidadesVarias::textofecha($data->Fecha_Nacimiento)',
                    ),
                    array(
                        'class'=>'CButtonColumn',
                        'template'=>'{view}{update}',
                        'buttons'=>array(
                            'view'=>array(
                                'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                'imageUrl'=>false,
                                'options'=>array('title'=>'Visualizar'),
                                'url'=>'Yii::app()->createUrl("nucleoEmpleado/view", array("id"=>$data->Id_Nucleo))',
                            ),
                            'update'=>array(
                                'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                                'imageUrl'=>false,
                                'options'=>array('title'=>'Actualizar'),
                                'url'=>'Yii::app()->createUrl("nucleoEmpleado/update", array("id"=>$data->Id_Nucleo))',
                                'visible'=> '(Yii::app()->user->getState("permiso_act") == true)',
                            ),
                        )
                    ),
                ),
            )); ?> 
        </div>
        <div class="tab-pane" id="formacion">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'formacion-empleado-grid',
                'dataProvider'=>$model_formacion->search(),
                //'filter'=>$model,
                'enableSorting' => false,
                'columns'=>array(
                    array(
                        'name'=>'Fecha',
                        'value'=>'UtilidadesVarias::textofecha($data->Fecha)',
                    ),
                    'Entidad',
                    'Titulo_Obtenido',
                    array(
                        'class'=>'CButtonColumn',
                        'template'=>'{view}{update}',
                        'buttons'=>array(
                            'view'=>array(
                                'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                'imageUrl'=>false,
                                'options'=>array('title'=>'Visualizar'),
                                'url'=>'Yii::app()->createUrl("formacionEmpleado/view", array("id"=>$data->Id_Formacion))',
                            ),
                            'update'=>array(
                                'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                                'imageUrl'=>false,
                                'options'=>array('title'=>'Actualizar'),
                                'url'=>'Yii::app()->createUrl("formacionEmpleado/update", array("id"=>$data->Id_Formacion))',
                                'visible'=> '(Yii::app()->user->getState("permiso_act") == true)',
                            ),
                        )
                    ),
                ),
            )); ?>        
        </div>
        <div class="tab-pane" id="evaluacion">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'evaluacion-empleado-grid',
                'dataProvider'=>$model_evaluaciones->search(),
                //'filter'=>$model,
                'enableSorting' => false,
                'columns'=>array(
                    array(
                        'name'=>'Fecha',
                        'value'=>'UtilidadesVarias::textofecha($data->Fecha)',
                    ),
                    array(
                    'name'=>'Id_Tipo',
                        'value'=>'$data->idtipo->Dominio',
                    ),
                    'Puntaje',
                    'Observacion',
                    array(
                        'class'=>'CButtonColumn',
                        'template'=>'{view}{update}',
                        'buttons'=>array(
                            'view'=>array(
                                'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                'imageUrl'=>false,
                                'options'=>array('title'=>'Visualizar'),
                                'url'=>'Yii::app()->createUrl("evaluacionEmpleado/view", array("id"=>$data->Id_Evaluacion))',
                            ),
                            'update'=>array(
                                'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                                'imageUrl'=>false,
                                'options'=>array('title'=>'Actualizar'),
                                'url'=>'Yii::app()->createUrl("evaluacionEmpleado/update", array("id"=>$data->Id_Evaluacion))',
                                'visible'=> '(Yii::app()->user->getState("permiso_act") == true)',
                            ),
                        )
                    ),
                ),
            )); ?>
        </div>

        <div class="tab-pane" id="contrato_activo">
            <div class="nav-tabs-custom" style="margin-top: 2%;">
                <ul class="nav nav-tabs" style="font-size: 12px !important;">
                    <li class="active"><a href="#con_act" data-toggle="tab">Contrato</a></li>
                    <li><a href="#nov_act" data-toggle="tab">Novedades de contrato</a></li>
                    <li><a href="#tur_act" data-toggle="tab">Turnos</a></li>
                    <li><a href="#aus_act" data-toggle="tab">Ausencias</a></li>
                    <li><a href="#dis_act" data-toggle="tab">Llam. de atención / Sanciones</a></li>
                    <li><a href="#com_act" data-toggle="tab">Comparendos</a></li>
                    <li><a href="#ele_act" data-toggle="tab">Elementos</a></li>
                    <li><a href="#her_act" data-toggle="tab">Herramientas</a></li>
                    <li><a href="#cue_act" data-toggle="tab">Cuentas</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="active tab-pane" id="con_act">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'contrato-empleado-grid-act',
                        'dataProvider'=> $model_contrato_act,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_Empresa',
                                'value'=>'$data->idempresa->Descripcion',
                            ),
                            array(
                                'name' => 'Id_Unidad_Gerencia',
                                'value' => '($data->Id_Unidad_Gerencia == "") ? "NO ASIGNADO" : $data->idunidadgerencia->Unidad_Gerencia',
                            ),
                            array(
                                'name' => 'Id_Area',
                                'value' => '($data->Id_Area == "") ? "NO ASIGNADO" : $data->idarea->Area',
                            ),
                            array(
                                'name' => 'Id_Subarea',
                                'value' => '($data->Id_Subarea == "") ? "NO ASIGNADO" : $data->idsubarea->Subarea',
                            ),
                            array(
                                'name' => 'Id_Cargo',
                                'value' => '($data->Id_Cargo == "") ? "NO ASIGNADO" : $data->idcargo->Cargo',
                            ),
                            array(
                                'name' => 'Id_Centro_Costo',
                                'value' => '($data->Id_Centro_Costo == "") ? "NO ASIGNADO" : $data->idcentrocosto->Codigo',
                            ),
                            array(
                                'name'=>'Fecha_Ingreso',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha_Ingreso)',
                            ),
                            array(
                                'name'=>'Salario',
                                'value'=>function($data){
                                    return number_format($data->Salario, 0);
                                },
                                'htmlOptions'=>array('style' => 'text-align: right;'),
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}{update}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("contratoEmpleado/view", array("id"=>$data->Id_Contrato))',
                                    ),
                                    'update'=>array(
                                        'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Actualizar'),
                                        'url'=>'Yii::app()->createUrl("contratoEmpleado/update", array("id"=>$data->Id_Contrato))',
                                        'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->Id_M_Retiro == "")',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="nov_act">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'novedad-contrato-grid-act',
                        'dataProvider'=>$model_novedades_act,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            'Novedad',
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("novedadContrato/view", array("id"=>$data->Id_N_Contrato))',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="tur_act">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'turno-empleado-grid-act',
                        'dataProvider'=>$model_turnos_act,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            array(
                                'name'=>'Id_Turno',
                                'value'=>'$data->DescTurno($data->Id_Turno)',
                            ),
                            array(
                                'name'=>'Fecha_Inicial',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha_Inicial)',
                            ),
                            array(
                                'name'=>'Fecha_Final',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha_Final)',
                            ),
                            array(
                                'name'=>'Estado',
                                'value'=>'UtilidadesVarias::textoestado1($data->Estado)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}{update}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("turnoEmpleado/view", array("id"=>$data->Id_T_Empleado))',
                                    ),
                                    'update'=>array(
                                        'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Actualizar'),
                                        'url'=>'Yii::app()->createUrl("turnoEmpleado/update", array("id"=>$data->Id_T_Empleado))',
                                        'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->idcontrato->Id_M_Retiro == "")',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="aus_act">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'ausencia-grid-act',
                        'dataProvider'=>$model_ausencias_act,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_M_Ausencia',
                                'value'=>'$data->idmausencia->Dominio',
                            ),
                            'Cod_Soporte',
                            array(
                                'name'=>'Fecha_Inicial',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha_Inicial)',
                            ),
                            array(
                                'name'=>'Fecha_Final',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha_Final)',
                            ),
                            array(
                                'name' => 'Dias',
                                'type' => 'raw',
                                'value' => '$data->Dias',
                                'htmlOptions'=>array('style' => 'text-align: right;'),
                            ),  
                            array(
                                'name' => 'Horas',
                                'type' => 'raw',
                                'value' => '($data->Horas == 0.0) ? 0 : $data->Horas',
                                'htmlOptions'=>array('style' => 'text-align: right;'),
                            ),
                            array(
                                'name' => 'Descontar',
                                'value' => 'UtilidadesVarias::textoestado2($data->Descontar)',
                            ),
                            array(
                                'name' => 'Descontar_FDS',
                                'value' => 'UtilidadesVarias::textoestado2($data->Descontar_FDS)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}{update}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("ausenciaEmpleado/view", array("id"=>$data->Id_Ausencia))',
                                    ),
                                    'update'=>array(
                                        'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Actualizar'),
                                        'url'=>'Yii::app()->createUrl("ausenciaEmpleado/update", array("id"=>$data->Id_Ausencia))',
                                        'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->idcontrato->Id_M_Retiro == "")',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="dis_act">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'disciplinario-empleado-grid-act',
                        'dataProvider'=>$model_disciplinarios_act,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'tipo',
                                'value'=>'$data->DescTipo($data->Id_Disciplinario)',
                            ),
                            array(
                                'name'=>'Id_M_Disciplinario',
                                'value'=>'$data->idmdisciplinario->Dominio',
                            ),
                            array(
                                'name'=>'Fecha',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha)',
                            ),
                            array(
                                'name'=>'Id_Empleado_Imp',
                                'value'=>'UtilidadesEmpleado::nombreempleado($data->Id_Empleado_Imp)',
                            ),
                            'Orden_No',
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}{update}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("disciplinarioEmpleado/view", array("id"=>$data->Id_Disciplinario, "opc"=>$data->GetOpc($data->Id_Disciplinario)))',
                                    ),
                                    'update'=>array(
                                        'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Actualizar'),
                                        'url'=>'Yii::app()->createUrl("disciplinarioEmpleado/update", array("id"=>$data->Id_Disciplinario, "opc"=>$data->GetOpc($data->Id_Disciplinario)))',
                                        'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->idcontrato->Id_M_Retiro == "")',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="com_act">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'comparendo-empleado-grid-act',
                        'dataProvider'=>$model_comparendos_act,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_M_Disciplinario',
                                'value'=>'$data->idmdisciplinario->Dominio',
                            ),
                            array(
                                'name'=>'Fecha',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha)',
                            ),
                            array(
                                'name'=>'Id_Empleado_Imp',
                                'value'=>'UtilidadesEmpleado::nombreempleado($data->Id_Empleado_Imp)',
                            ),
                            'Orden_No',
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}{update}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("disciplinarioEmpleado/view", array("id"=>$data->Id_Disciplinario, "opc"=>$data->GetOpc($data->Id_Disciplinario)))',
                                    ),
                                    'update'=>array(
                                        'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Actualizar'),
                                        'url'=>'Yii::app()->createUrl("disciplinarioEmpleado/update", array("id"=>$data->Id_Disciplinario, "opc"=>$data->GetOpc($data->Id_Disciplinario)))',
                                        'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->idcontrato->Id_M_Retiro == "")',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="ele_act">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'elemento-empleado-grid-act',
                        'dataProvider'=>$model_elementos_act,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name' => 'Cantidad',
                                'type' => 'raw',
                                'value' => '$data->Cantidad',
                                'htmlOptions'=>array('style' => 'text-align: right;'),
                            ),
                            array(
                                'name' => 'elemento',
                                'type' => 'raw',
                                'value' => '$data->idaelemento->idelemento->Elemento',
                            ),
                            array(
                                'name' => 'subarea',
                                'type' => 'raw',
                                'value' => '($data->idaelemento->Id_Subarea == "") ? "NO ASIGNADO" : $data->idaelemento->idsubarea->Subarea',
                            ),
                            array(
                                'name' => 'area',
                                'type' => 'raw',
                                'value' => '$data->idaelemento->idarea->Area',
                            ),
                            array(
                                'name'=>'Estado',
                                'value'=>'UtilidadesElemento::textoestado($data->Estado)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("elementoEmpleado/view", array("id"=>$data->Id_E_Empleado))',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="her_act">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'herramienta-empleado-grid-act',
                        'dataProvider'=>$model_herramientas_act,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_Herramienta',
                                'value'=>'$data->idherramienta->Nombre',
                            ),
                            array(
                                'name'=>'Estado',
                                'value'=>'UtilidadesHerramienta::textoestado($data->Estado)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("herramientaEmpleado/view", array("id"=>$data->Id_H_Empleado))',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="cue_act">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'cuenta-empleado-grid',
                        'dataProvider'=>$model_cuentas_act,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            array(
                                'name'=>'clasificacion',
                                'value' => '$data->idcuenta->clasificacion->Dominio',
                            ),
                            array(
                                'name'=>'Id_Cuenta',
                                'value' => '$data->idcuenta->DescCuentaUsuario($data->Id_Cuenta)',
                            ),
                            array(
                                'name' => 'Estado',
                                'value' => 'UtilidadesVarias::textoestado1($data->Estado)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("cuentaEmpleado/view", array("id"=>$data->Id_Cuenta_Emp))',
                                    ),
                                )
                            ),
                        ),
                    ));

                    ?>
                </div>    
            </div>     
        </div>
        <div class="tab-pane" id="contratos_anteriores">
            <div class="nav-tabs-custom" style="margin-top: 2%;">
                <ul class="nav nav-tabs" style="font-size: 12px !important;">
                    <li class="active"><a href="#con_ant" data-toggle="tab">Contratos</a></li>
                    <li><a href="#nov_ant" data-toggle="tab">Novedades de contratos</a></li>
                    <li><a href="#tur_ant" data-toggle="tab">Turnos</a></li>
                    <li><a href="#aus_ant" data-toggle="tab">Ausencias</a></li>
                    <li><a href="#dis_ant" data-toggle="tab">Llam. de atención / Sanciones</a></li>
                    <li><a href="#com_ant" data-toggle="tab">Comparendos</a></li>
                    <li><a href="#ele_ant" data-toggle="tab">Elementos</a></li>
                    <li><a href="#her_ant" data-toggle="tab">Herramientas</a></li>
                    <li><a href="#cue_ant" data-toggle="tab">Cuentas</a></li>

                </ul>
            </div>
            <div class="tab-content">  
                <div class="active tab-pane" id="con_ant">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'contrato-empleado-grid-ant',
                        'dataProvider'=> $model_contratos_ant,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_Empresa',
                                'value'=>'$data->idempresa->Descripcion',
                            ),
                            array(
                                'name' => 'Id_Unidad_Gerencia',
                                'value' => '($data->Id_Unidad_Gerencia == "") ? "NO ASIGNADO" : $data->idunidadgerencia->Unidad_Gerencia',
                            ),
                            array(
                                'name' => 'Id_Area',
                                'value' => '($data->Id_Area == "") ? "NO ASIGNADO" : $data->idarea->Area',
                            ),
                            array(
                                'name' => 'Id_Subarea',
                                'value' => '($data->Id_Subarea == "") ? "NO ASIGNADO" : $data->idsubarea->Subarea',
                            ),
                            array(
                                'name' => 'Id_Cargo',
                                'value' => '($data->Id_Cargo == "") ? "NO ASIGNADO" : $data->idcargo->Cargo',
                            ),
                            array(
                                'name' => 'Id_Centro_Costo',
                                'value' => '($data->Id_Centro_Costo == "") ? "NO ASIGNADO" : $data->idcentrocosto->Codigo',
                            ),
                            array(
                                'name'=>'Fecha_Ingreso',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha_Ingreso)',
                            ),
                             array(
                                'name'=>'Salario',
                                'value'=>function($data){
                                    return number_format($data->Salario, 0);
                                },
                                'htmlOptions'=>array('style' => 'text-align: right;'),
                            ),
                            array(
                                'name'=>'Fecha_Retiro',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha_Retiro)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}{update}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("contratoEmpleado/view", array("id"=>$data->Id_Contrato))',
                                    ),
                                    'update'=>array(
                                        'label'=>'<i class="fa fa-calendar actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Asignar fecha de liquidación'),
                                        'url'=>'Yii::app()->createUrl("contratoEmpleado/update2", array("id"=>$data->Id_Contrato))',
                                        'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->Fecha_Liquidacion == "")',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="nov_ant">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'novedad-contrato-grid-ant',
                        'dataProvider'=>$model_novedades_ant,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            'Novedad',
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("novedadContrato/view", array("id"=>$data->Id_N_Contrato))',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="tur_ant">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'turno-empleado-grid-ant',
                        'dataProvider'=>$model_turnos_ant,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_Turno',
                                'value'=>'$data->DescTurno($data->Id_Turno)',
                            ),
                            array(
                                'name'=>'Fecha_Inicial',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha_Inicial)',
                            ),
                            array(
                                'name'=>'Fecha_Final',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha_Final)',
                            ),
                            array(
                                'name'=>'Estado',
                                'value'=>'UtilidadesVarias::textoestado1($data->Estado)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}{update}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("turnoEmpleado/view", array("id"=>$data->Id_T_Empleado))',
                                    ),
                                    'update'=>array(
                                        'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Actualizar'),
                                        'url'=>'Yii::app()->createUrl("turnoEmpleado/update", array("id"=>$data->Id_T_Empleado))',
                                        'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->idcontrato->Id_M_Retiro == "")',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="aus_ant">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'ausencia-grid-ant',
                        'dataProvider'=>$model_ausencias_ant,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_M_Ausencia',
                                'value'=>'$data->idmausencia->Dominio',
                            ),
                            'Cod_Soporte',
                            array(
                                'name'=>'Fecha_Inicial',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha_Inicial)',
                            ),
                            array(
                                'name'=>'Fecha_Final',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha_Final)',
                            ),
                            array(
                                'name' => 'Dias',
                                'type' => 'raw',
                                'value' => '$data->Dias',
                                'htmlOptions'=>array('style' => 'text-align: right;'),
                            ),  
                            array(
                                'name' => 'Horas',
                                'type' => 'raw',
                                'value' => '($data->Horas == 0.0) ? 0 : $data->Horas',
                                'htmlOptions'=>array('style' => 'text-align: right;'),
                            ),
                            array(
                                'name' => 'Descontar',
                                'value' => 'UtilidadesVarias::textoestado2($data->Descontar)',
                            ),
                            array(
                                'name' => 'Descontar_FDS',
                                'value' => 'UtilidadesVarias::textoestado2($data->Descontar_FDS)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}{update}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("ausenciaEmpleado/view", array("id"=>$data->Id_Ausencia))',
                                    ),
                                    'update'=>array(
                                        'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Actualizar'),
                                        'url'=>'Yii::app()->createUrl("ausenciaEmpleado/update", array("id"=>$data->Id_Ausencia))',
                                        'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->idcontrato->Id_M_Retiro == "")',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="dis_ant">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'disciplinario-empleado-grid-ant',
                        'dataProvider'=>$model_disciplinarios_ant,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_M_Disciplinario',
                                'value'=>'$data->idmdisciplinario->Dominio',
                            ),
                            array(
                                'name'=>'Fecha',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha)',
                            ),
                            array(
                                'name'=>'Id_Empleado_Imp',
                                'value'=>'UtilidadesEmpleado::nombreempleado($data->Id_Empleado_Imp)',
                            ),
                            'Orden_No',
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}{update}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("disciplinarioEmpleado/view", array("id"=>$data->Id_Disciplinario, "opc"=>$data->GetOpc($data->Id_Disciplinario)))',
                                    ),
                                    'update'=>array(
                                        'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Actualizar'),
                                        'url'=>'Yii::app()->createUrl("disciplinarioEmpleado/update", array("id"=>$data->Id_Disciplinario, "opc"=>$data->GetOpc($data->Id_Disciplinario)))',
                                        'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->idcontrato->Id_M_Retiro == "")',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="com_ant">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'comparendo-empleado-grid-ant',
                        'dataProvider'=>$model_comparendos_ant,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_M_Disciplinario',
                                'value'=>'$data->idmdisciplinario->Dominio',
                            ),
                            array(
                                'name'=>'Fecha',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha)',
                            ),
                            array(
                                'name'=>'Id_Empleado_Imp',
                                'value'=>'UtilidadesEmpleado::nombreempleado($data->Id_Empleado_Imp)',
                            ),
                            'Orden_No',
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}{update}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("disciplinarioEmpleado/view", array("id"=>$data->Id_Disciplinario, "opc"=>$data->GetOpc($data->Id_Disciplinario)))',
                                    ),
                                    'update'=>array(
                                        'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Actualizar'),
                                        'url'=>'Yii::app()->createUrl("disciplinarioEmpleado/update", array("id"=>$data->Id_Disciplinario, "opc"=>$data->GetOpc($data->Id_Disciplinario)))',
                                        'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->idcontrato->Id_M_Retiro == "")',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="ele_ant">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'elemento-empleado-grid-ant',
                        'dataProvider'=>$model_elementos_ant,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name' => 'Cantidad',
                                'type' => 'raw',
                                'value' => '$data->Cantidad',
                                'htmlOptions'=>array('style' => 'text-align: right;'),
                            ),
                            array(
                                'name' => 'elemento',
                                'type' => 'raw',
                                'value' => '$data->idaelemento->idelemento->Elemento',
                            ),
                            array(
                                'name' => 'subarea',
                                'type' => 'raw',
                                'value' => '($data->idaelemento->Id_Subarea == "") ? "NO ASIGNADO" : $data->idaelemento->idsubarea->Subarea',
                            ),
                            array(
                                'name' => 'area',
                                'type' => 'raw',
                                'value' => '$data->idaelemento->idarea->Area',
                            ),
                            array(
                                'name'=>'Estado',
                                'value'=>'UtilidadesElemento::textoestado($data->Estado)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("elementoEmpleado/view", array("id"=>$data->Id_E_Empleado))',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="her_ant">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'herramienta-empleado-grid-ant',
                        'dataProvider'=>$model_herramientas_ant,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_Herramienta',
                                'value'=>'$data->idherramienta->Nombre',
                            ),
                            array(
                                'name'=>'Estado',
                                'value'=>'UtilidadesHerramienta::textoestado($data->Estado)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("herramientaEmpleado/view", array("id"=>$data->Id_H_Empleado))',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="cue_ant">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'cuenta-empleado-grid',
                        'dataProvider'=>$model_cuentas_ant,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            array(
                                'name'=>'clasificacion',
                                'value' => '$data->idcuenta->clasificacion->Dominio',
                            ),
                            array(
                                'name'=>'Id_Cuenta',
                                'value' => '$data->idcuenta->DescCuentaUsuario($data->Id_Cuenta)',
                            ),
                            array(
                                'name' => 'Estado',
                                'value' => 'UtilidadesVarias::textoestado1($data->Estado)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("cuentaEmpleado/view", array("id"=>$data->Id_Cuenta_Emp))',
                                    ),
                                )
                            ),
                        ),
                    ));
                    ?>
                </div> 
            </div>
        </div>
    </div>
</div>

<?php } ?>


<?php if(Yii::app()->user->getState('niv_det_vis_emp') == Yii::app()->params->niv_det_vis_emp_nor){ ?>

<div class="nav-tabs-custom" style="margin-top: 2%;">
    <ul class="nav nav-tabs" style="font-size: 12px !important;">
        <li class="active"><a href="#info" data-toggle="tab">Información</a></li>
        <li><a href="#contrato_activo" data-toggle="tab">Contrato activo</a></li>
        <li><a href="#contratos_anteriores" data-toggle="tab">Contratos anteriores</a></li>
    </ul>
    <div class="tab-content">
        <div class="active tab-pane" id="info">
            <h4>Datos generales</h4><br/>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>ID</label>
                        <?php echo '<p>'.$model->Id_Empleado.'</p>';?>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tipo de identificación</label>
                        <?php echo '<p>'.$model->idtipoident->Dominio.'</p>';?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label># Identificación</label>
                        <?php echo '<p>'.$model->Identificacion.'</p>';?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Apellidos</label>
                        <?php echo '<p>'.$model->Apellido.'</p>';?>
                    </div>
                </div>
            </div>
            <div class="row">
                 <div class="col-sm-4">
                    <div class="form-group">
                        <label>Nombres</label>
                        <?php echo '<p>'.$model->Nombre.'</p>';?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <?php if($model->Fecha_Nacimiento == "") { $Fecha_Nacimiento = "NO ASIGNADO"; } else { $Fecha_Nacimiento = UtilidadesVarias::textofecha($model->Fecha_Nacimiento); } ?>
                        <?php echo '<p>'.$Fecha_Nacimiento.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Edad</label>
                        <?php echo '<p id="edad_emp"></p>';?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Dpto - municipio nacimiento</label>
                        <?php if($model->Id_Ciudad_Nacimiento == "") { $Ciudad_N = "NO ASIGNADO"; } else { $Ciudad_N = $model->idciudadn->Ciudad; } ?>
                        <?php echo '<p>'.$Ciudad_N.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Dirección</label>
                        <?php if($model->Direccion == "") { $Direccion = "NO ASIGNADO"; } else { $Direccion = $model->Direccion; } ?>
                        <?php echo '<p>'.$Direccion.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Teléfono(s)</label>
                        <?php if($model->Telefono == "") { $Telefono = "NO ASIGNADO"; } else { $Telefono = $model->Telefono; } ?>
                        <?php echo '<p>'.$Telefono.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>E-mail</label>
                        <?php if($model->Correo == "") { $Correo = "NO ASIGNADO"; } else { $Correo = $model->Correo; } ?>
                        <?php echo '<p>'.$Correo.'</p>'; ?>
                    </div>
                </div>
            </div>
            <br/><h4>Datos sociodemográficos</h4><br/>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Grado de escolaridad</label>
                        <?php if($model->Id_Grado_Esc == "") { $Id_Grado_Esc = "NO ASIGNADO"; } else { $Id_Grado_Esc = $model->idgradoesc->Dominio; } ?>
                        <?php echo '<p>'.$Id_Grado_Esc.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Estado civil</label>
                        <?php if($model->Id_Estado_Civil == "") { $Estado_civil = "NO ASIGNADO"; } else { $Estado_civil = $model->idestadocivil->Dominio; } ?>
                        <?php echo '<p>'.$Estado_civil.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Raza</label>
                        <?php if($model->Id_Raza == "") { $Raza = "NO ASIGNADO"; } else { $Raza = $model->idraza->Dominio; } ?>
                        <?php echo '<p>'.$Raza.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Composición familiar</label>
                        <?php if($model->Id_Com_Fam == "") { $Com_Fam = "NO ASIGNADO"; } else { $Com_Fam = UtilidadesEmpleado::compfamempleado($model->Id_Com_Fam); } ?>
                        <?php echo '<p>'.$Com_Fam.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Ocupación</label>
                        <?php if($model->Id_Ocupacion == "") { $Ocupacion = "NO ASIGNADO"; } else { $Ocupacion = UtilidadesEmpleado::ocupmempleado($model->Id_Ocupacion); } ?>
                        <?php echo '<p>'.$Ocupacion.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Dpto - municipio residencia</label>
                        <?php if($model->Id_Ciudad_Residencia == "") { $Ciudad_R = "NO ASIGNADO"; } else { $Ciudad_R = $model->idciudadr->Ciudad; } ?>
                        <?php echo '<p>'.$Ciudad_R.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4" id="loc_res" style="display: none; ">
                    <div class="form-group">
                        <label>Localidad de residencia</label>
                        <?php if($model->Id_Localidad_Residencia == "") { $Loc_Res = "NO ASIGNADO"; } else { $Loc_Res = $model->idlocres->Dominio; } ?>
                        <?php echo '<p>'.$Loc_Res.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>RH</label>
                        <?php if($model->Id_Rh == "") { $Rh = "NO ASIGNADO"; } else { $Rh = $model->idrh->Dominio; } ?>
                        <?php echo '<p>'.$Rh.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Género</label>
                        <?php if($model->Id_Genero == "") { $Genero = "NO ASIGNADO"; } else { $Genero = $model->idgenero->Dominio; } ?>
                        <?php echo '<p>'.$Genero.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4" id="ges" style="display: none;">
                    <div class="form-group">
                        <label>Gestante ?</label>
                        <?php if($model->Es_Gestante == "") { $Es_Gestante = "NO ASIGNADO"; } else { $Es_Gestante = UtilidadesVarias::textoestado2($model->Es_Gestante); } ?>
                        <?php echo '<p>'.$Es_Gestante.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Estrato socioeconómico</label>
                        <?php if($model->Id_Estrato == "") { $Estrato = "NO ASIGNADO"; } else { $Estrato = $model->idestrato->Dominio; } ?>
                        <?php echo '<p>'.$Estrato.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Persona de contacto</label>
                        <?php if($model->Persona_Contacto == "") { $Persona_Contacto = "NO ASIGNADO"; } else { $Persona_Contacto = $model->Persona_Contacto; } ?>
                        <?php echo '<p>'.$Persona_Contacto.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Teléfono persona de contacto</label>
                        <?php if($model->Tel_Persona_Contacto == "") { $Tel_Persona_Contacto = "NO ASIGNADO"; } else { $Tel_Persona_Contacto = $model->Tel_Persona_Contacto; } ?>
                        <?php echo '<p>'.$Tel_Persona_Contacto.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Parentesco contacto</label>
                        <?php if($model->Id_Parentesco_Persona_Contacto == "") { $Parentesco_Persona_Contacto = "NO ASIGNADO"; } else { $Parentesco_Persona_Contacto = $model->idparentpercont->Dominio; } ?>
                        <?php echo '<p>'.$Parentesco_Persona_Contacto.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Fuma ?</label>
                        <?php if($model->Fuma == "") { $Fuma = "NO ASIGNADO"; } else { $Fuma = UtilidadesVarias::textoestado2($model->Fuma); } ?>
                        <?php echo '<p>'.$Fuma.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Alergia ?</label>
                        <?php if($model->Alergia == "") { $Alergia = "NO ASIGNADO"; } else { $Alergia = UtilidadesVarias::textoestado2($model->Alergia); } ?>
                        <?php echo '<p>'.$Alergia.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row" id="obs_alerg" style="display: none;"> 
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Observaciones (alergia)</label>
                        <?php if($model->Observaciones == "") { $Observaciones = "NO ASIGNADO"; } else { $Observaciones = $model->Observaciones; } ?>
                        <?php echo '<p>'.$Observaciones.'</p>'; ?>
                    </div>
                </div>       
            </div>
            <br/><h4>Otros datos</h4><br/>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Dpto - municipio labor</label>
                        <?php if($model->Id_Ciudad_Labor == "") { $Ciudad_L = "NO ASIGNADO"; } else { $Ciudad_L = $model->idciudadl->Ciudad; } ?>
                        <?php echo '<p>'.$Ciudad_L.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Regional de labor</label>
                        <?php if($model->Id_Regional_Labor == "") { $Regional_L = "NO ASIGNADO"; } else { $Regional_L = $model->idregional->Regional; } ?>
                        <?php echo '<p>'.$Regional_L.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Eps</label>
                        <?php if($model->Id_Eps == "") { $Eps = "NO ASIGNADO"; } else { $Eps = $model->ideps->Dominio; } ?>
                        <?php echo '<p>'.$Eps.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Caja de compensación</label>
                        <?php if($model->Id_Caja_C == "") { $Cc = "NO ASIGNADO"; } else { $Cc = $model->idcajac->Dominio; } ?>
                        <?php echo '<p>'.$Cc.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Fondo de pensiones</label>
                        <?php if($model->Id_Fondo_P == "") { $Fondo_p = "NO ASIGNADO"; } else { $Fondo_p = $model->idfondop->Dominio; } ?>
                        <?php echo '<p>'.$Fondo_p.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Fondo de cesantías</label>
                        <?php if($model->Id_Fondo_C == "") { $Fondo_c = "NO ASIGNADO"; } else { $Fondo_c = $model->idfondoc->Dominio; } ?>
                        <?php echo '<p>'.$Fondo_c.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Arl</label>
                        <?php if($model->Id_Arl == "") { $Arl = "NO ASIGNADO"; } else { $Arl = $model->idarl->Dominio; } ?>
                        <?php echo '<p>'.$Arl.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Banco</label>
                        <?php if($model->Id_Banco == "") { $Banco = "NO ASIGNADO"; } else { $Banco = $model->idbanco->Dominio; } ?>
                        <?php echo '<p>'.$Banco.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tipo de cuenta</label>
                        <?php if($model->Id_T_Cuenta == "") { $Tipo_Cuenta = "NO ASIGNADO"; } else { $Tipo_Cuenta = $model->idtcuenta->Dominio; } ?>
                        <?php echo '<p>'.$Tipo_Cuenta.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Número de cuenta</label>
                        <?php if($model->Num_Cuenta == "") { $Num_Cuenta = "NO ASIGNADO"; } else { $Num_Cuenta = $model->Num_Cuenta; } ?>
                        <?php echo '<p>'.$Num_Cuenta.'</p>'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Talla camisa</label>
                        <?php if($model->Talla_Camisa == "") { $Talla_Camisa = "NO ASIGNADO"; } else { $Talla_Camisa = $model->Talla_Camisa; } ?>
                        <?php echo '<p>'.$Talla_Camisa.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Talla pantalón</label>
                        <?php if($model->Talla_Pantalon == "") { $Talla_Pantalon = "NO ASIGNADO"; } else { $Talla_Pantalon = $model->Talla_Pantalon; } ?>
                        <?php echo '<p>'.$Talla_Pantalon.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Talla zapatos</label>
                        <?php if($model->Talla_Zapato == "") { $Talla_Zapato = "NO ASIGNADO"; } else { $Talla_Zapato = $model->Talla_Zapato; } ?>
                        <?php echo '<p>'.$Talla_Zapato.'</p>'; ?>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Talla overol</label>
                        <?php if($model->Talla_Overol == "") { $Talla_Overol = "NO ASIGNADO"; } else { $Talla_Overol = $model->Talla_Overol; } ?>
                        <?php echo '<p>'.$Talla_Overol.'</p>'; ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Talla bata</label>
                        <?php if($model->Talla_Bata == "") { $Talla_Bata = "NO ASIGNADO"; } else { $Talla_Bata = $model->Talla_Bata; } ?>
                        <?php echo '<p>'.$Talla_Bata.'</p>'; ?>
                    </div>
                </div>    
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Estado</label>
                        <?php echo '<p>'.UtilidadesEmpleado::estadoactualempleado($model->Id_Empleado).'</p>'; ?>
                    </div>
                </div>
            </div>
            <div id="info_act" style="display: none;">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Empresa</label>
                            <?php echo '<p>'.UtilidadesEmpleado::empresaactualempleado($model->Id_Empleado).'</p>'; ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Área</label>
                            <?php echo '<p>'.UtilidadesEmpleado::unidadgerenciaactualempleado($model->Id_Empleado).'</p>';?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Área</label>
                            <?php echo '<p>'.UtilidadesEmpleado::areaactualempleado($model->Id_Empleado).'</p>';?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Subárea</label>
                            <?php echo '<p>'.UtilidadesEmpleado::subareaactualempleado($model->Id_Empleado).'</p>';?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Cargo</label>
                            <?php echo '<p>'.UtilidadesEmpleado::cargoactualempleado($model->Id_Empleado).'</p>';?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Centro de costo</label>
                            <?php echo '<p>'.UtilidadesEmpleado::centrocostoactualempleado($model->Id_Empleado).'</p>';?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Usuario que creo</label>
                        <?php echo '<p>'.$model->idusuariocre->Usuario.'</p>';?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Fecha de creación</label>
                        <?php echo '<p>'.UtilidadesVarias::textofechahora($model->Fecha_Creacion).'</p>';?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Usuario que actualizó</label>
                        <?php echo '<p>'.$model->idusuarioact->Usuario.'</p>';?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Fecha de actualización</label>
                        <?php echo '<p>'.UtilidadesVarias::textofechahora($model->Fecha_Actualizacion).'</p>';?>
                    </div>
                </div>
            </div>  
        </div>
        <div class="tab-pane" id="contrato_activo">
            <div class="nav-tabs-custom" style="margin-top: 2%;">
                <ul class="nav nav-tabs" style="font-size: 12px !important;">
                    <li class="active"><a href="#con_act" data-toggle="tab">Contrato</a></li>
                    <li><a href="#com_act" data-toggle="tab">Comparendos</a></li>
                    <li><a href="#ele_act" data-toggle="tab">Elementos</a></li>
                    <li><a href="#her_act" data-toggle="tab">Herramientas</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="active tab-pane" id="con_act">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'contrato-empleado-grid-act',
                        'dataProvider'=> $model_contrato_act,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_Empresa',
                                'value'=>'$data->idempresa->Descripcion',
                            ),
                            array(
                                'name' => 'Id_Unidad_Gerencia',
                                'value' => '($data->Id_Unidad_Gerencia == "") ? "NO ASIGNADO" : $data->idunidadgerencia->Unidad_Gerencia',
                            ),
                            array(
                                'name' => 'Id_Area',
                                'value' => '($data->Id_Area == "") ? "NO ASIGNADO" : $data->idarea->Area',
                            ),
                            array(
                                'name' => 'Id_Subarea',
                                'value' => '($data->Id_Subarea == "") ? "NO ASIGNADO" : $data->idsubarea->Subarea',
                            ),
                            array(
                                'name' => 'Id_Cargo',
                                'value' => '($data->Id_Cargo == "") ? "NO ASIGNADO" : $data->idcargo->Cargo',
                            ),
                            array(
                                'name' => 'Id_Centro_Costo',
                                'value' => '($data->Id_Centro_Costo == "") ? "NO ASIGNADO" : $data->idcentrocosto->Codigo',
                            ),
                            array(
                                'name'=>'Fecha_Ingreso',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha_Ingreso)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}{update}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("contratoEmpleado/view2", array("id"=>$data->Id_Contrato))',
                                    ),
                                    'update'=>array(
                                        'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Actualizar'),
                                        'url'=>'Yii::app()->createUrl("contratoEmpleado/update3", array("id"=>$data->Id_Contrato))',
                                        'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->Id_M_Retiro == "")',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="com_act">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'comparendo-empleado-grid-act',
                        'dataProvider'=>$model_comparendos_act,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_M_Disciplinario',
                                'value'=>'$data->idmdisciplinario->Dominio',
                            ),
                            array(
                                'name'=>'Fecha',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha)',
                            ),
                            array(
                                'name'=>'Id_Empleado_Imp',
                                'value'=>'UtilidadesEmpleado::nombreempleado($data->Id_Empleado_Imp)',
                            ),
                            'Orden_No',
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}{update}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("disciplinarioEmpleado/view", array("id"=>$data->Id_Disciplinario, "opc"=>$data->GetOpc($data->Id_Disciplinario)))',
                                    ),
                                    'update'=>array(
                                        'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Actualizar'),
                                        'url'=>'Yii::app()->createUrl("disciplinarioEmpleado/update", array("id"=>$data->Id_Disciplinario, "opc"=>$data->GetOpc($data->Id_Disciplinario)))',
                                        'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->idcontrato->Id_M_Retiro == "")',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="ele_act">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'elemento-empleado-grid-act',
                        'dataProvider'=>$model_elementos_act,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name' => 'Cantidad',
                                'type' => 'raw',
                                'value' => '$data->Cantidad',
                                'htmlOptions'=>array('style' => 'text-align: right;'),
                            ),
                            array(
                                'name' => 'elemento',
                                'type' => 'raw',
                                'value' => '$data->idaelemento->idelemento->Elemento',
                            ),
                            array(
                                'name' => 'subarea',
                                'type' => 'raw',
                                'value' => '($data->idaelemento->Id_Subarea == "") ? "NO ASIGNADO" : $data->idaelemento->idsubarea->Subarea',
                            ),
                            array(
                                'name' => 'area',
                                'type' => 'raw',
                                'value' => '$data->idaelemento->idarea->Area',
                            ),
                            array(
                                'name'=>'Estado',
                                'value'=>'UtilidadesElemento::textoestado($data->Estado)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("elementoEmpleado/view", array("id"=>$data->Id_E_Empleado))',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="her_act">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'herramienta-empleado-grid-act',
                        'dataProvider'=>$model_herramientas_act,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_Herramienta',
                                'value'=>'$data->idherramienta->Nombre',
                            ),
                            array(
                                'name'=>'Estado',
                                'value'=>'UtilidadesHerramienta::textoestado($data->Estado)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("herramientaEmpleado/view", array("id"=>$data->Id_H_Empleado))',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>    
            </div>     
        </div>
        <div class="tab-pane" id="contratos_anteriores">
            <div class="nav-tabs-custom" style="margin-top: 2%;">
                <ul class="nav nav-tabs" style="font-size: 12px !important;">
                    <li class="active"><a href="#con_ant" data-toggle="tab">Contratos</a></li>
                    <li><a href="#com_ant" data-toggle="tab">Comparendos</a></li>
                    <li><a href="#ele_ant" data-toggle="tab">Elementos</a></li>
                    <li><a href="#her_ant" data-toggle="tab">Herramientas</a></li>
                </ul>
            </div>
            <div class="tab-content">  
                <div class="active tab-pane" id="con_ant">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'contrato-empleado-grid-ant',
                        'dataProvider'=> $model_contratos_ant,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_Empresa',
                                'value'=>'$data->idempresa->Descripcion',
                            ),
                            array(
                                'name' => 'Id_Unidad_Gerencia',
                                'value' => '($data->Id_Unidad_Gerencia == "") ? "NO ASIGNADO" : $data->idunidadgerencia->Unidad_Gerencia',
                            ),
                            array(
                                'name' => 'Id_Area',
                                'value' => '($data->Id_Area == "") ? "NO ASIGNADO" : $data->idarea->Area',
                            ),
                            array(
                                'name' => 'Id_Subarea',
                                'value' => '($data->Id_Subarea == "") ? "NO ASIGNADO" : $data->idsubarea->Subarea',
                            ),
                            array(
                                'name' => 'Id_Cargo',
                                'value' => '($data->Id_Cargo == "") ? "NO ASIGNADO" : $data->idcargo->Cargo',
                            ),
                            array(
                                'name' => 'Id_Centro_Costo',
                                'value' => '($data->Id_Centro_Costo == "") ? "NO ASIGNADO" : $data->idcentrocosto->Codigo',
                            ),
                            array(
                                'name'=>'Fecha_Ingreso',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha_Ingreso)',
                            ),
                            array(
                                'name'=>'Fecha_Retiro',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha_Retiro)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("contratoEmpleado/view2", array("id"=>$data->Id_Contrato))',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="com_ant">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'comparendo-empleado-grid-ant',
                        'dataProvider'=>$model_comparendos_ant,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_M_Disciplinario',
                                'value'=>'$data->idmdisciplinario->Dominio',
                            ),
                            array(
                                'name'=>'Fecha',
                                'value'=>'UtilidadesVarias::textofecha($data->Fecha)',
                            ),
                            array(
                                'name'=>'Id_Empleado_Imp',
                                'value'=>'UtilidadesEmpleado::nombreempleado($data->Id_Empleado_Imp)',
                            ),
                            'Orden_No',
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}{update}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("disciplinarioEmpleado/view", array("id"=>$data->Id_Disciplinario, "opc"=>$data->GetOpc($data->Id_Disciplinario)))',
                                    ),
                                    'update'=>array(
                                        'label'=>'<i class="fa fa-pencil actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Actualizar'),
                                        'url'=>'Yii::app()->createUrl("disciplinarioEmpleado/update", array("id"=>$data->Id_Disciplinario, "opc"=>$data->GetOpc($data->Id_Disciplinario)))',
                                        'visible'=> '(Yii::app()->user->getState("permiso_act") == true && $data->idcontrato->Id_M_Retiro == "")',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="ele_ant">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'elemento-empleado-grid-ant',
                        'dataProvider'=>$model_elementos_ant,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name' => 'Cantidad',
                                'type' => 'raw',
                                'value' => '$data->Cantidad',
                                'htmlOptions'=>array('style' => 'text-align: right;'),
                            ),
                            array(
                                'name' => 'elemento',
                                'type' => 'raw',
                                'value' => '$data->idaelemento->idelemento->Elemento',
                            ),
                            array(
                                'name' => 'subarea',
                                'type' => 'raw',
                                'value' => '($data->idaelemento->Id_Subarea == "") ? "NO ASIGNADO" : $data->idaelemento->idsubarea->Subarea',
                            ),
                            array(
                                'name' => 'area',
                                'type' => 'raw',
                                'value' => '$data->idaelemento->idarea->Area',
                            ),
                            array(
                                'name'=>'Estado',
                                'value'=>'UtilidadesElemento::textoestado($data->Estado)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("elementoEmpleado/view", array("id"=>$data->Id_E_Empleado))',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>
                <div class="tab-pane" id="her_ant">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'herramienta-empleado-grid-ant',
                        'dataProvider'=>$model_herramientas_ant,
                        //'filter'=>$model,
                        'enableSorting' => false,
                        'columns'=>array(
                            'Id_Contrato',
                            array(
                                'name'=>'Id_Herramienta',
                                'value'=>'$data->idherramienta->Nombre',
                            ),
                            array(
                                'name'=>'Estado',
                                'value'=>'UtilidadesHerramienta::textoestado($data->Estado)',
                            ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{view}',
                                'buttons'=>array(
                                    'view'=>array(
                                        'label'=>'<i class="fa fa-eye actions text-black"></i>',
                                        'imageUrl'=>false,
                                        'options'=>array('title'=>'Visualizar'),
                                        'url'=>'Yii::app()->createUrl("herramientaEmpleado/view", array("id"=>$data->Id_H_Empleado))',
                                    ),
                                )
                            ),
                        ),
                    )); ?>
                </div>  
            </div>
        </div>
    </div>
</div>


<?php } ?>

<?php if(Yii::app()->user->getState('niv_det_vis_emp') == Yii::app()->params->niv_det_vis_emp_bas){ ?>

<h4 style="margin-top: 2%;">Datos generales</h4><br/>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>ID</label>
            <?php echo '<p>'.$model->Id_Empleado.'</p>';?>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Tipo de identificación</label>
            <?php echo '<p>'.$model->idtipoident->Dominio.'</p>';?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label># Identificación</label>
            <?php echo '<p>'.$model->Identificacion.'</p>';?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Apellidos</label>
            <?php echo '<p>'.$model->Apellido.'</p>';?>
        </div>
    </div>
</div>
<div class="row">
     <div class="col-sm-4">
        <div class="form-group">
            <label>Nombres</label>
            <?php echo '<p>'.$model->Nombre.'</p>';?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Fecha de nacimiento</label>
            <?php if($model->Fecha_Nacimiento == "") { $Fecha_Nacimiento = "NO ASIGNADO"; } else { $Fecha_Nacimiento = UtilidadesVarias::textofecha($model->Fecha_Nacimiento); } ?>
            <?php echo '<p>'.$Fecha_Nacimiento.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Edad</label>
            <?php echo '<p id="edad_emp"></p>';?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Dpto - municipio nacimiento</label>
            <?php if($model->Id_Ciudad_Nacimiento == "") { $Ciudad_N = "NO ASIGNADO"; } else { $Ciudad_N = $model->idciudadn->Ciudad; } ?>
            <?php echo '<p>'.$Ciudad_N.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Dirección</label>
            <?php if($model->Direccion == "") { $Direccion = "NO ASIGNADO"; } else { $Direccion = $model->Direccion; } ?>
            <?php echo '<p>'.$Direccion.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Teléfono(s)</label>
            <?php if($model->Telefono == "") { $Telefono = "NO ASIGNADO"; } else { $Telefono = $model->Telefono; } ?>
            <?php echo '<p>'.$Telefono.'</p>'; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>E-mail</label>
            <?php if($model->Correo == "") { $Correo = "NO ASIGNADO"; } else { $Correo = $model->Correo; } ?>
            <?php echo '<p>'.$Correo.'</p>'; ?>
        </div>
    </div>
</div>
<br/><h4>Datos sociodemográficos</h4><br/>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Grado de escolaridad</label>
            <?php if($model->Id_Grado_Esc == "") { $Id_Grado_Esc = "NO ASIGNADO"; } else { $Id_Grado_Esc = $model->idgradoesc->Dominio; } ?>
            <?php echo '<p>'.$Id_Grado_Esc.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Estado civil</label>
            <?php if($model->Id_Estado_Civil == "") { $Estado_civil = "NO ASIGNADO"; } else { $Estado_civil = $model->idestadocivil->Dominio; } ?>
            <?php echo '<p>'.$Estado_civil.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Raza</label>
            <?php if($model->Id_Raza == "") { $Raza = "NO ASIGNADO"; } else { $Raza = $model->idraza->Dominio; } ?>
            <?php echo '<p>'.$Raza.'</p>'; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Composición familiar</label>
            <?php if($model->Id_Com_Fam == "") { $Com_Fam = "NO ASIGNADO"; } else { $Com_Fam = UtilidadesEmpleado::compfamempleado($model->Id_Com_Fam); } ?>
            <?php echo '<p>'.$Com_Fam.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Ocupación</label>
            <?php if($model->Id_Ocupacion == "") { $Ocupacion = "NO ASIGNADO"; } else { $Ocupacion = UtilidadesEmpleado::ocupmempleado($model->Id_Ocupacion); } ?>
            <?php echo '<p>'.$Ocupacion.'</p>'; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Dpto - municipio residencia</label>
            <?php if($model->Id_Ciudad_Residencia == "") { $Ciudad_R = "NO ASIGNADO"; } else { $Ciudad_R = $model->idciudadr->Ciudad; } ?>
            <?php echo '<p>'.$Ciudad_R.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4" id="loc_res" style="display: none; ">
        <div class="form-group">
            <label>Localidad de residencia</label>
            <?php if($model->Id_Localidad_Residencia == "") { $Loc_Res = "NO ASIGNADO"; } else { $Loc_Res = $model->idlocres->Dominio; } ?>
            <?php echo '<p>'.$Loc_Res.'</p>'; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>RH</label>
            <?php if($model->Id_Rh == "") { $Rh = "NO ASIGNADO"; } else { $Rh = $model->idrh->Dominio; } ?>
            <?php echo '<p>'.$Rh.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Género</label>
            <?php if($model->Id_Genero == "") { $Genero = "NO ASIGNADO"; } else { $Genero = $model->idgenero->Dominio; } ?>
            <?php echo '<p>'.$Genero.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4" id="ges" style="display: none;">
        <div class="form-group">
            <label>Gestante ?</label>
            <?php if($model->Es_Gestante == "") { $Es_Gestante = "NO ASIGNADO"; } else { $Es_Gestante = UtilidadesVarias::textoestado2($model->Es_Gestante); } ?>
            <?php echo '<p>'.$Es_Gestante.'</p>'; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Estrato socioeconómico</label>
            <?php if($model->Id_Estrato == "") { $Estrato = "NO ASIGNADO"; } else { $Estrato = $model->idestrato->Dominio; } ?>
            <?php echo '<p>'.$Estrato.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Persona de contacto</label>
            <?php if($model->Persona_Contacto == "") { $Persona_Contacto = "NO ASIGNADO"; } else { $Persona_Contacto = $model->Persona_Contacto; } ?>
            <?php echo '<p>'.$Persona_Contacto.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Teléfono persona de contacto</label>
            <?php if($model->Tel_Persona_Contacto == "") { $Tel_Persona_Contacto = "NO ASIGNADO"; } else { $Tel_Persona_Contacto = $model->Tel_Persona_Contacto; } ?>
            <?php echo '<p>'.$Tel_Persona_Contacto.'</p>'; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Parentesco contacto</label>
            <?php if($model->Id_Parentesco_Persona_Contacto == "") { $Parentesco_Persona_Contacto = "NO ASIGNADO"; } else { $Parentesco_Persona_Contacto = $model->idparentpercont->Dominio; } ?>
            <?php echo '<p>'.$Parentesco_Persona_Contacto.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Fuma ?</label>
            <?php if($model->Fuma == "") { $Fuma = "NO ASIGNADO"; } else { $Fuma = UtilidadesVarias::textoestado2($model->Fuma); } ?>
            <?php echo '<p>'.$Fuma.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Alergia ?</label>
            <?php if($model->Alergia == "") { $Alergia = "NO ASIGNADO"; } else { $Alergia = UtilidadesVarias::textoestado2($model->Alergia); } ?>
            <?php echo '<p>'.$Alergia.'</p>'; ?>
        </div>
    </div>
</div>
<div class="row" id="obs_alerg" style="display: none;"> 
    <div class="col-sm-4">
        <div class="form-group">
            <label>Observaciones (alergia)</label>
            <?php if($model->Observaciones == "") { $Observaciones = "NO ASIGNADO"; } else { $Observaciones = $model->Observaciones; } ?>
            <?php echo '<p>'.$Observaciones.'</p>'; ?>
        </div>
    </div>       
</div>
<br/><h4>Otros datos</h4><br/>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Dpto - municipio labor</label>
            <?php if($model->Id_Ciudad_Labor == "") { $Ciudad_L = "NO ASIGNADO"; } else { $Ciudad_L = $model->idciudadl->Ciudad; } ?>
            <?php echo '<p>'.$Ciudad_L.'</p>'; ?>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Regional de labor</label>
                <?php if($model->Id_Regional_Labor == "") { $Regional_L = "NO ASIGNADO"; } else { $Regional_L = $model->idregional->Regional; } ?>
                <?php echo '<p>'.$Regional_L.'</p>'; ?>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Eps</label>
            <?php if($model->Id_Eps == "") { $Eps = "NO ASIGNADO"; } else { $Eps = $model->ideps->Dominio; } ?>
            <?php echo '<p>'.$Eps.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Caja de compensación</label>
            <?php if($model->Id_Caja_C == "") { $Cc = "NO ASIGNADO"; } else { $Cc = $model->idcajac->Dominio; } ?>
            <?php echo '<p>'.$Cc.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Fondo de pensiones</label>
            <?php if($model->Id_Fondo_P == "") { $Fondo_p = "NO ASIGNADO"; } else { $Fondo_p = $model->idfondop->Dominio; } ?>
            <?php echo '<p>'.$Fondo_p.'</p>'; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Fondo de cesantías</label>
            <?php if($model->Id_Fondo_C == "") { $Fondo_c = "NO ASIGNADO"; } else { $Fondo_c = $model->idfondoc->Dominio; } ?>
            <?php echo '<p>'.$Fondo_c.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Arl</label>
            <?php if($model->Id_Arl == "") { $Arl = "NO ASIGNADO"; } else { $Arl = $model->idarl->Dominio; } ?>
            <?php echo '<p>'.$Arl.'</p>'; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Banco</label>
            <?php if($model->Id_Banco == "") { $Banco = "NO ASIGNADO"; } else { $Banco = $model->idbanco->Dominio; } ?>
            <?php echo '<p>'.$Banco.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Tipo de cuenta</label>
            <?php if($model->Id_T_Cuenta == "") { $Tipo_Cuenta = "NO ASIGNADO"; } else { $Tipo_Cuenta = $model->idtcuenta->Dominio; } ?>
            <?php echo '<p>'.$Tipo_Cuenta.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Número de cuenta</label>
            <?php if($model->Num_Cuenta == "") { $Num_Cuenta = "NO ASIGNADO"; } else { $Num_Cuenta = $model->Num_Cuenta; } ?>
            <?php echo '<p>'.$Num_Cuenta.'</p>'; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Talla camisa</label>
            <?php if($model->Talla_Camisa == "") { $Talla_Camisa = "NO ASIGNADO"; } else { $Talla_Camisa = $model->Talla_Camisa; } ?>
            <?php echo '<p>'.$Talla_Camisa.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Talla pantalón</label>
            <?php if($model->Talla_Pantalon == "") { $Talla_Pantalon = "NO ASIGNADO"; } else { $Talla_Pantalon = $model->Talla_Pantalon; } ?>
            <?php echo '<p>'.$Talla_Pantalon.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Talla zapatos</label>
            <?php if($model->Talla_Zapato == "") { $Talla_Zapato = "NO ASIGNADO"; } else { $Talla_Zapato = $model->Talla_Zapato; } ?>
            <?php echo '<p>'.$Talla_Zapato.'</p>'; ?>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Talla overol</label>
            <?php if($model->Talla_Overol == "") { $Talla_Overol = "NO ASIGNADO"; } else { $Talla_Overol = $model->Talla_Overol; } ?>
            <?php echo '<p>'.$Talla_Overol.'</p>'; ?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Talla bata</label>
            <?php if($model->Talla_Bata == "") { $Talla_Bata = "NO ASIGNADO"; } else { $Talla_Bata = $model->Talla_Bata; } ?>
            <?php echo '<p>'.$Talla_Bata.'</p>'; ?>
        </div>
    </div>    
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Estado</label>
            <?php echo '<p>'.UtilidadesEmpleado::estadoactualempleado($model->Id_Empleado).'</p>'; ?>
        </div>
    </div>
</div>
<div id="info_act" style="display: none;">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Empresa</label>
                <?php echo '<p>'.UtilidadesEmpleado::empresaactualempleado($model->Id_Empleado).'</p>'; ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Área</label>
                <?php echo '<p>'.UtilidadesEmpleado::unidadgerenciaactualempleado($model->Id_Empleado).'</p>';?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Área</label>
                <?php echo '<p>'.UtilidadesEmpleado::areaactualempleado($model->Id_Empleado).'</p>';?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Subárea</label>
                <?php echo '<p>'.UtilidadesEmpleado::subareaactualempleado($model->Id_Empleado).'</p>';?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Cargo</label>
                <?php echo '<p>'.UtilidadesEmpleado::cargoactualempleado($model->Id_Empleado).'</p>';?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Centro de costo</label>
                <?php echo '<p>'.UtilidadesEmpleado::centrocostoactualempleado($model->Id_Empleado).'</p>';?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Usuario que creo</label>
            <?php echo '<p>'.$model->idusuariocre->Usuario.'</p>';?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Fecha de creación</label>
            <?php echo '<p>'.UtilidadesVarias::textofechahora($model->Fecha_Creacion).'</p>';?>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Usuario que actualizó</label>
            <?php echo '<p>'.$model->idusuarioact->Usuario.'</p>';?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Fecha de actualización</label>
            <?php echo '<p>'.UtilidadesVarias::textofechahora($model->Fecha_Actualizacion).'</p>';?>
        </div>
    </div>
</div>  
        


<?php } ?>

<?php if(Yii::app()->user->getState('niv_det_vis_emp') == Yii::app()->params->niv_det_vis_emp_nin || Yii::app()->user->getState('niv_det_vis_emp') == ""){ ?>

<p style="margin-top: 2%;">Este usuario tiene restricción en este módulo, contacte al administrador del sistema.</p>

<?php } ?>



