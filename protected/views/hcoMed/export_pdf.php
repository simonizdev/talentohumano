<?php
/* @var $this FormulaMedController */
/* @var $model FormulaMed */

set_time_limit(0);

$modeloanexo = AnexoMed::model()->findByPk($id); 

$empleado = UtilidadesEmpleado::nombreempleado($modeloanexo->Id_Empleado);
$tipo_ident = $modeloanexo->idempleado->idtipoident->Dominio;
$ident = $modeloanexo->idempleado->Identificacion;
$fecha_nacimiento = UtilidadesVarias::textofecha($modeloanexo->idempleado->Fecha_Nacimiento);
$edad = UtilidadesEmpleado::edadempleado($modeloanexo->Id_Empleado);
$fecha_ingreso = UtilidadesVarias::textofecha($modeloanexo->idcontrato->Fecha_Ingreso);
$area = $modeloanexo->idcontrato->idarea->Area;
$cargo = $modeloanexo->idcontrato->idcargo->Cargo;
$fecha = $modeloanexo->Fecha;

//PDF

//se incluye la libreria pdf
require_once Yii::app()->basePath . '/extensions/fpdf/fpdf.php';

class PDF extends FPDF{

  function setId($id){
    $this->id = $id;
  }

  function setEmpleado($empleado){
    $this->empleado = $empleado;
  }

  function setTipoIdent($tipo_ident){
    $this->tipo_ident = $tipo_ident;
  }

  function setIdent($ident){
    $this->ident = $ident;
  }

  function setFechaNacimiento($fecha_nacimiento){
    $this->fecha_nacimiento = $fecha_nacimiento;
  }

  function setEdad($edad){
    $this->edad = $edad;
  }

  function setFechaIngreso($fecha_ingreso){
    $this->fecha_ingreso = $fecha_ingreso;
  }

  function setArea($area){
    $this->area = $area;
  }

  function setCargo($cargo){
    $this->cargo = $cargo;
  }

  function Header(){
    $this->SetFont('Arial','B',15);
    $this->Cell(195,10,utf8_decode('Historia clinica ocupacional'),0,0,'L');
    $this->Ln();
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(195,5,utf8_decode('Empleado'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->Cell(195,5,utf8_decode($this->empleado),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(65,5,utf8_decode('Tipo de identificación'),0,0,'L');
    $this->Cell(65,5,utf8_decode('# Identificación'),0,0,'L');
    $this->Cell(65,5,utf8_decode('Fecha de nacimiento'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->Cell(65,5,utf8_decode($this->tipo_ident),0,0,'L');
    $this->Cell(65,5,utf8_decode($this->ident),0,0,'L');
    $this->Cell(65,5,utf8_decode($this->fecha_nacimiento),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(65,5,utf8_decode('Edad'),0,0,'L');
    $this->Cell(65,5,utf8_decode('Fecha de ingreso'),0,0,'L');
    $this->Cell(65,5,utf8_decode('Área'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->Cell(65,5,utf8_decode($this->edad),0,0,'L');
    $this->Cell(65,5,utf8_decode($this->fecha_ingreso),0,0,'L');
    $this->Cell(65,5,utf8_decode($this->area),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(195,5,utf8_decode('Cargo'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->Cell(195,5,utf8_decode($this->cargo),0,0,'L');
    $this->Ln();
    $this->Ln();

  }

  function Tabla(){

    $modelohco = HcoMed::model()->findByPk($this->id); 

    $info_adic_emp = ($modelohco->Informacion_Adicional_Emp == "") ? "No asignado" : $modelohco->Informacion_Adicional_Emp;
    $fecha = UtilidadesVarias::textofecha($modelohco->Fecha);
    $tipo_examen = ($modelohco->Tipo_Examen == "") ? "No asignado" : $modelohco->tipoexamen->Dominio;
    $reubicacion = ($modelohco->Reubicacion == "") ? "No asignado" : $modelohco->Reubicacion;
    $func_principales = ($modelohco->Funciones_Principales == "") ? "No asignado" : $modelohco->funcionesprincipales->Dominio;
    $empresa1 = $modelohco->Ant_Lab_Empresa_1;
    $area1 = $modelohco->Ant_Lab_Area_1;
    $cargo1 = $modelohco->Ant_Lab_Cargo_1;
    $tiempo1 = $modelohco->Ant_Lab_Tiempo_1;
    $empresa2 = $modelohco->Ant_Lab_Empresa_2;
    $area2 = $modelohco->Ant_Lab_Area_2;
    $cargo2 = $modelohco->Ant_Lab_Cargo_2;
    $tiempo2 = $modelohco->Ant_Lab_Tiempo_2;
    $empresa3 = $modelohco->Ant_Lab_Empresa_3;
    $area3 = $modelohco->Ant_Lab_Area_3;
    $cargo3 = $modelohco->Ant_Lab_Cargo_3;
    $tiempo3 = $modelohco->Ant_Lab_Tiempo_3;
    $tipo_riesgo = ($modelohco->Tipo_Riesgo == "") ? "No asignado" : $modelohco->tiporiesgo->Dominio;
    $riesgo = ($modelohco->Riesgo == "") ? "No asignado" : $modelohco->riesgo->Dominio;
    $ant_patologicos = ($modelohco->Ant_Per_Patologico == "") ? "No asignado" : $modelohco->Ant_Per_Patologico;
    $ant_quirurgicos = ($modelohco->Ant_Per_Quirurgico == "") ? "No asignado" : $modelohco->Ant_Per_Quirurgico;
    $ant_traumatologicos = ($modelohco->Ant_Per_Traumatologico == "") ? "No asignado" : $modelohco->Ant_Per_Traumatologico;
    $ant_inmunologicos = ($modelohco->Ant_Per_Inmunologico == "") ? "No asignado" : $modelohco->Ant_Per_Inmunologico;
    $habitos = ($modelohco->Ant_Per_Habito == "") ? "No asignado" : $modelohco->Ant_Per_Habito;
    $talla = ($modelohco->Sig_Vit_Talla == "") ? "No asignado" : $modelohco->Sig_Vit_Talla;
    $peso = ($modelohco->Sig_Vit_Peso == "") ? "No asignado" : $modelohco->Sig_Vit_Peso;
    $imc = ($modelohco->Sig_Vit_Imc == "") ? "No asignado" : $modelohco->Sig_Vit_Imc;
    $perimetro_abdominal = ($modelohco->Sig_Vit_Perimetro_Abdominal == "") ? "No asignado" : $modelohco->Sig_Vit_Perimetro_Abdominal;
    $pulso = ($modelohco->Sig_Vit_Pulso == "") ? "No asignado" : $modelohco->Sig_Vit_Pulso;
    $frecuencia_respiratoria = ($modelohco->Sig_Vit_Frecuencia_Respiratoria == "") ? "No asignado" : $modelohco->Sig_Vit_Frecuencia_Respiratoria;
    $saturacion_oxigeno = ($modelohco->Sig_Vit_Saturacion_Oxigeno == "") ? "No asignado" : $modelohco->Sig_Vit_Saturacion_Oxigeno;
    $temperatura = ($modelohco->Sig_Vit_Temperatura == "") ? "No asignado" : $modelohco->Sig_Vit_Temperatura;
    $presion_arterial = ($modelohco->Sig_Vit_Presion_Arterial == "") ? "No asignado" : $modelohco->Sig_Vit_Presion_Arterial;
    $piel = ($modelohco->Sis_Piel == "") ? "No asignado" : $modelohco->Sis_Piel;
    $cabeza = ($modelohco->Sis_Cabeza == "") ? "No asignado" : $modelohco->Sis_Cabeza;
    $ojos = ($modelohco->Sis_Ojos == "") ? "No asignado" : $modelohco->Sis_Ojos;
    $oidos = ($modelohco->Sis_Oidos == "") ? "No asignado" : $modelohco->Sis_Oidos;
    $nariz = ($modelohco->Sis_Nariz == "") ? "No asignado" : $modelohco->Sis_Nariz;
    $boca = ($modelohco->Sis_Boca == "") ? "No asignado" : $modelohco->Sis_Boca;
    $piezas_dentales = ($modelohco->Sis_Piezas_Dentales == "") ? "No asignado" : $modelohco->piezasdentales->Dominio;
    $estado_piezas_dentales = ($modelohco->Sis_Estado_Piezas_Dentales == "") ? "No asignado" : $modelohco->estadopiezasdentales->Dominio;
    $cuello = ($modelohco->Sis_Cuello == "") ? "No asignado" : $modelohco->Sis_Cuello;
    $respiratorio = ($modelohco->Sis_Respiratorio == "") ? "No asignado" : $modelohco->Sis_Respiratorio;
    $cardiaco = ($modelohco->Sis_Cardiaco == "") ? "No asignado" : $modelohco->Sis_Cardiaco;
    $abdomen = ($modelohco->Sis_Abdomen == "") ? "No asignado" : $modelohco->Sis_Abdomen;
    $miembros_superiores = ($modelohco->Sis_Miembros_Superiores == "") ? "No asignado" : $modelohco->Sis_Miembros_Superiores;
    $genito_urinarios = ($modelohco->Sis_Genito_Urinario == "") ? "No asignado" : $modelohco->Sis_Genito_Urinario;
    $miembros_inferiores = ($modelohco->Sis_Miembros_Inferiores == "") ? "No asignado" : $modelohco->Sis_Miembros_Inferiores;
    $columna_vertebral = ($modelohco->Sis_Columna_Vertebral == "") ? "No asignado" : $modelohco->Sis_Columna_Vertebral;
    $def_izq = ($modelohco->Deformidad_Cong_Adq_Izq == 1) ? "( + )" : "( - )";
    $def_der = ($modelohco->Deformidad_Cong_Adq_Der == 1) ? "( + )" : "( - )";
    $prot_izq = ($modelohco->Protuberancia_Izq == 1) ? "( + )" : "( - )";
    $prot_der = ($modelohco->Protuberancia_Der == 1) ? "( + )" : "( - )";
    $dolor_izq = ($modelohco->Dolor_Izq == 1) ? "( + )" : "( - )";
    $dolor_der = ($modelohco->Dolor_Der == 1) ? "( + )" : "( - )";
    $comp_art_izq = ($modelohco->Compromiso_Articular_Izq == 1) ? "( + )" : "( - )";
    $comp_art_der = ($modelohco->Compromiso_Articular_Der == 1) ? "( + )" : "( - )";
    $dis_mov_izq = ($modelohco->Disminucion_Mov_Dom_Izq == 1) ? "( + )" : "( - )";
    $dis_mov_der = ($modelohco->Disminucion_Mov_Dom_Der == 1) ? "( + )" : "( - )";
    $par_izq = ($modelohco->Paralisis_Izq == 1) ? "( + )" : "( - )";
    $par_der = ($modelohco->Paralisis_Der == 1) ? "( + )" : "( - )";
    $rig_izq = ($modelohco->Rigidez_Izq == 1) ? "( + )" : "( - )";
    $rig_der = ($modelohco->Rigidez_Der == 1) ? "( + )" : "( - )";
    $hallaz_osteo = ($modelohco->Hallazgo_Osteomuscular == "") ? "No asignado" : $modelohco->Hallazgo_Osteomuscular;
    $ant_traumatico = ($modelohco->Ant_Traumatico == "") ? "No asignado" : $modelohco->Ant_Traumatico;
    $tono_fuerza = ($modelohco->Tono_Fuerza_Reflejos == "") ? "No asignado" : $modelohco->Tono_Fuerza_Reflejos;
    $man_des = ($modelohco->Maniobra_Desault == "") ? "No asignado" : $modelohco->Maniobra_Desault;
    $codo_ten = ($modelohco->Codo_Tenista == "") ? "No asignado" : $modelohco->Codo_Tenista;
    $codo_golf = ($modelohco->Codo_Golfista == "") ? "No asignado" : $modelohco->Codo_Golfista;
    $sig_pha = ($modelohco->Signo_Phalen == "") ? "No asignado" : $modelohco->Signo_Phalen;
    $sig_tin = ($modelohco->Signo_Tinel == "") ? "No asignado" : $modelohco->Signo_Tinel;
    $man_fink = ($modelohco->Maniobra_Finkelsten == "") ? "No asignado" : $modelohco->Maniobra_Finkelsten;
    $pru_jac = ($modelohco->Prueba_Jackson == "") ? "No asignado" : $modelohco->Prueba_Jackson;
    $pru_las = ($modelohco->Prueba_Lasegue == "") ? "No asignado" : $modelohco->Prueba_Lasegue;
    $pru_caj = ($modelohco->Prueba_Cajon  == "") ? "No asignado" : $modelohco->Prueba_Cajon;
    $pru_bos = ($modelohco->Prueba_Bostezo == "") ? "No asignado" : $modelohco->Prueba_Bostezo;
    $concepto = ($modelohco->Concepto == "") ? "No asignado" : $modelohco->concepto->Dominio;
    $concepto_egreso = ($modelohco->Concepto_Egreso == "") ? "No asignado" : $modelohco->conceptoegreso->Dominio;
    $observaciones_con_egreso = ($modelohco->Observaciones_Concepto_Egreso == "") ? "No asignado" : $modelohco->Observaciones_Concepto_Egreso;
    $diagnostico = ($modelohco->Diagnostico == "") ? "No asignado" : $modelohco->diagnostico->Dominio;
    $recomendaciones = ($modelohco->Recomendaciones == "") ? "No asignado" : $modelohco->Recomendaciones;

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Información adicional de empleado'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($info_adic_emp));
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Fecha'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($fecha));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(65,5,utf8_decode('Tipo de examen'),0,0,'L');
    $this->Cell(65,5,utf8_decode('Reubicación'),0,0,'L');
    $this->Cell(65,5,utf8_decode('Funciones principales'),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','',7);
    $this->Cell(65,5,utf8_decode($tipo_examen),0,0,'L');
    $this->Cell(65,5,utf8_decode($reubicacion),0,0,'L');
    $this->Cell(65,5,utf8_decode($func_principales),0,0,'L');
    $this->Ln();

    if($empresa1 != "" || $empresa2 != "" || $empresa3 != ""){

      $this->SetFont('Arial','B',9);
      $this->Cell(0,8,utf8_decode('Antecedentes laborales'),0,0,'L');
      $this->Ln();

      $this->SetFont('Arial','B',7);
      $this->Cell(48,5,utf8_decode('Empresa'),0,0,'L');
      $this->Cell(48,5,utf8_decode('Área'),0,0,'L');
      $this->Cell(48,5,utf8_decode('Cargo'),0,0,'L');
      $this->Cell(48,5,utf8_decode('Tiempo'),0,0,'L');      
      $this->Ln();

      if($empresa1 != ""){
        $this->SetFont('Arial','',7);
        $this->Cell(48,5,utf8_decode($empresa1),0,0,'L');
        $this->Cell(48,5,utf8_decode($area1),0,0,'L');
        $this->Cell(48,5,utf8_decode($cargo1),0,0,'L');
        $this->Cell(48,5,utf8_decode($tiempo1),0,0,'L');      
        $this->Ln();
      }

      if($empresa2 != ""){
        $this->SetFont('Arial','',7);
        $this->Cell(48,5,utf8_decode($empresa2),0,0,'L');
        $this->Cell(48,5,utf8_decode($area2),0,0,'L');
        $this->Cell(48,5,utf8_decode($cargo2),0,0,'L');
        $this->Cell(48,5,utf8_decode($tiempo2),0,0,'L');      
        $this->Ln();
      }

      if($empresa3 != ""){
        $this->SetFont('Arial','',7);
        $this->Cell(48,5,utf8_decode($empresa3),0,0,'L');
        $this->Cell(48,5,utf8_decode($area3),0,0,'L');
        $this->Cell(48,5,utf8_decode($cargo3),0,0,'L');
        $this->Cell(48,5,utf8_decode($tiempo3),0,0,'L');      
        $this->Ln();
      }

    }

    $this->SetFont('Arial','B',9);
    $this->Cell(0,8,utf8_decode('Riesgos laborales'),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(50,5,utf8_decode('Tipo riesgo'),0,0,'L');
    $this->Cell(145,5,utf8_decode('Riesgo'),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','',7);
    $this->Cell(50,5,utf8_decode($tipo_riesgo),0,0,'L');
    $this->Cell(145,5,utf8_decode($riesgo),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','B',9);
    $this->Cell(0,8,utf8_decode('Antecedentes personales'),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Patologícos'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($ant_patologicos));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Quirúrgicos'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($ant_quirurgicos));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Traumatológicos'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($ant_traumatologicos));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Inmunológicos'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($ant_inmunologicos));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Hábitos'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($habitos));
    $this->Ln();

    $this->SetFont('Arial','B',9);
    $this->Cell(0,8,utf8_decode('Examen médico'),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','B',8);
    $this->Cell(0,8,utf8_decode('Signos vitales'),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(39,5,utf8_decode('Talla (Cm)'),0,0,'L');
    $this->Cell(39,5,utf8_decode('Peso (Kg)'),0,0,'L');
    $this->Cell(39,5,utf8_decode('IMC'),0,0,'L');
    $this->Cell(39,5,utf8_decode('Perimetro abdominal'),0,0,'L');  
    $this->Cell(39,5,utf8_decode('Pulso'),0,0,'L');      
    $this->Ln();
  
    $this->SetFont('Arial','',7);
    $this->Cell(39,5,utf8_decode($talla),0,0,'L');
    $this->Cell(39,5,utf8_decode($peso),0,0,'L');
    $this->Cell(39,5,utf8_decode($imc),0,0,'L');
    $this->Cell(39,5,utf8_decode($perimetro_abdominal),0,0,'L'); 
    $this->Cell(39,5,utf8_decode($pulso),0,0,'L');      
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(39,5,utf8_decode('Frecuencia respiratoria'),0,0,'L');
    $this->Cell(39,5,utf8_decode('Saturación de oxigeno'),0,0,'L');
    $this->Cell(39,5,utf8_decode('Temperatura'),0,0,'L');
    $this->Cell(39,5,utf8_decode('Presión arterial'),0,0,'L');       
    $this->Ln();
  
    $this->SetFont('Arial','',7);
    $this->Cell(39,5,utf8_decode($frecuencia_respiratoria),0,0,'L');
    $this->Cell(39,5,utf8_decode($saturacion_oxigeno),0,0,'L');
    $this->Cell(39,5,utf8_decode($temperatura),0,0,'L');
    $this->Cell(39,5,utf8_decode($presion_arterial),0,0,'L');      
    $this->Ln();
      
    $this->SetFont('Arial','B',8);
    $this->Cell(0,8,utf8_decode('Órgano o sistema'),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Piel'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($piel));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Cabeza'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($cabeza));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Ojos'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($ojos));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Oidos'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($oidos));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Nariz'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($nariz));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Boca, amigdalas, laringe y faringe'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($boca));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(97,5,utf8_decode('Piezas dentales'),0,0,'L');
    $this->Cell(97,5,utf8_decode('Estado piezas dentales'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->Cell(97,5,utf8_decode($piezas_dentales),0,0,'L');
    $this->Cell(97,5,utf8_decode($estado_piezas_dentales),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Cuello'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($cuello));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Respiratorio'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($respiratorio));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Cardiaco'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($cardiaco));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Abdomen'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($abdomen));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Miembros superiores'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($miembros_superiores));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Genito-urinarios'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($genito_urinarios));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Miembros inferiores'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($miembros_inferiores));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Columna vertebral'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($columna_vertebral));
    $this->Ln();

    $this->SetFont('Arial','B',9);
    $this->Cell(0,8,utf8_decode('Valoración en miembros superiores, inferiores y columna'),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(97,5,utf8_decode('Deformidad Congénita y/o adquirida'),0,0,'L');
    $this->Cell(97,5,utf8_decode('Protuberancia'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->Cell(48,5,utf8_decode('Izquierda '.$def_izq),0,0,'L');
    $this->Cell(49,5,utf8_decode('Derecha '.$def_der),0,0,'L');
    $this->Cell(48,5,utf8_decode('Izquierda '.$prot_izq),0,0,'L');
    $this->Cell(49,5,utf8_decode('Derecha '.$prot_der),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(97,5,utf8_decode('Dolor'),0,0,'L');
    $this->Cell(97,5,utf8_decode('Compromiso articular'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->Cell(48,5,utf8_decode('Izquierda '.$dolor_izq),0,0,'L');
    $this->Cell(49,5,utf8_decode('Derecha '.$dolor_der),0,0,'L');
    $this->Cell(48,5,utf8_decode('Izquierda '.$comp_art_izq),0,0,'L');
    $this->Cell(49,5,utf8_decode('Derecha '.$comp_art_der),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(97,5,utf8_decode('Disminución de la movilidad'),0,0,'L');
    $this->Cell(97,5,utf8_decode('Parálisis'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->Cell(48,5,utf8_decode('Izquierda '.$dis_mov_izq),0,0,'L');
    $this->Cell(49,5,utf8_decode('Derecha '.$dis_mov_der),0,0,'L');
    $this->Cell(48,5,utf8_decode('Izquierda '.$par_izq),0,0,'L');
    $this->Cell(49,5,utf8_decode('Derecha '.$par_der),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(97,5,utf8_decode('Rigidez'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->Cell(48,5,utf8_decode('Izquierda '.$rig_izq),0,0,'L');
    $this->Cell(49,5,utf8_decode('Derecha '.$rig_der),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Hallazgo osteomuscular'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($hallaz_osteo));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Antecedentes traumáticos'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($ant_traumatico));
    $this->Ln();

    $this->SetFont('Arial','B',8);
    $this->Cell(0,8,utf8_decode('Signos'),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Tono fuerza y reflejos de miembros superiores'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($tono_fuerza));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Maniobra de desault'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($man_des));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Codo de tenista'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($codo_ten));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Codo de golfista'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($codo_golf));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Signo de phalen'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($sig_pha));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Signo de tinel'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($sig_tin));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Maniobra de finkelsten'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($man_fink));
    $this->Ln();

    $this->SetFont('Arial','B',8);
    $this->Cell(0,8,utf8_decode('Maniobras para columna'),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Prueba de jackson (cervical)'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($pru_jac));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Prueba de lasegue (lumbar)'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($pru_las));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Prueba de cajón'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($pru_caj));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Prueba de bostezo'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($pru_bos));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(97,5,utf8_decode('Concepto'),0,0,'L');
    $this->Cell(97,5,utf8_decode('Concepto de egreso'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->Cell(97,5,utf8_decode($concepto),0,0,'L');
    $this->Cell(97,5,utf8_decode($concepto_egreso),0,0,'L');
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Observaciones concepto de egreso'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($observaciones_con_egreso));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Diagnóstico'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($diagnostico));
    $this->Ln();

    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Recomendaciones'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($recomendaciones));
    $this->Ln();

  }//fin tabla

  function Footer()
  {
      $this->SetY(-15);
      $this->SetFont('Arial','B',6);
      $this->Cell(0,8,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C');
  }
}

$pdf = new PDF('P','mm','A4');
//se definen las variables extendidas de la libreria FPDF
$pdf->setId($id);
$pdf->setEmpleado($empleado);
$pdf->setTipoIdent($tipo_ident);
$pdf->setIdent($ident);
$pdf->setFechaNacimiento($fecha_nacimiento);
$pdf->setEdad($edad);
$pdf->setFechaIngreso($fecha_ingreso);
$pdf->setArea($area);
$pdf->setCargo($cargo);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Tabla();
ob_end_clean();
$pdf->Output('D','Historia_clinica_ocupacional_'.$ident.'_'.$fecha.'.pdf');


?>











