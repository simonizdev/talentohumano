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
    $this->Cell(195,10,utf8_decode('Anexo médico'),0,0,'L');
    $this->Ln();
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(195,5,utf8_decode('Empleado:'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->Cell(195,5,utf8_decode($this->empleado),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(65,5,utf8_decode('Tipo de identificación:'),0,0,'L');
    $this->Cell(65,5,utf8_decode('# Identificación:'),0,0,'L');
    $this->Cell(65,5,utf8_decode('Fecha de nacimiento:'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->Cell(65,5,utf8_decode($this->tipo_ident),0,0,'L');
    $this->Cell(65,5,utf8_decode($this->ident),0,0,'L');
    $this->Cell(65,5,utf8_decode($this->fecha_nacimiento),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(65,5,utf8_decode('Edad:'),0,0,'L');
    $this->Cell(65,5,utf8_decode('Fecha de ingreso:'),0,0,'L');
    $this->Cell(65,5,utf8_decode('Área:'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->Cell(65,5,utf8_decode($this->edad),0,0,'L');
    $this->Cell(65,5,utf8_decode($this->fecha_ingreso),0,0,'L');
    $this->Cell(65,5,utf8_decode($this->area),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(195,5,utf8_decode('Cargo:'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->Cell(195,5,utf8_decode($this->cargo),0,0,'L');
    $this->Ln();
    $this->Ln();

  }

  function Tabla(){

    $modeloanexo = AnexoMed::model()->findByPk($this->id); 

    $info_adic_emp = ($modeloanexo->Informacion_Adicional_Emp == "") ? "No asignado" : $modeloanexo->Informacion_Adicional_Emp;
    $fecha = UtilidadesVarias::textofecha($modeloanexo->Fecha);
    $padecimiento_actual = ($modeloanexo->Padecimiento_Actual == "") ? "No asignado" : $modeloanexo->Padecimiento_Actual;
    $motivo = ($modeloanexo->Motivo == "") ? "No asignado" : $modeloanexo->Motivo;
    $enfermedad_actual = ($modeloanexo->Enfermedad_Actual == "") ? "No asignado" : $modeloanexo->Enfermedad_Actual;
    $alergia = ($modeloanexo->Alergia == "") ? "No asignado" : $modeloanexo->Alergia;
    $hallazgo = ($modeloanexo->Hallazgo == "") ? "No asignado" : $modeloanexo->Hallazgo;
    $diagnostico = $modeloanexo->diagnostico->Dominio;
    $plan = ($modeloanexo->Plan_Anexo == "") ? "No asignado" : $modeloanexo->Plan_Anexo;


    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Información adicional de empleado:'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($info_adic_emp));
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Fecha:'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($fecha));
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Padecimiento actual (1 Principio, 2 Evolución, 3 Estado actual):'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($padecimiento_actual));
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Motivo:'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($motivo));
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Enfermedad Actual:'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($enfermedad_actual));
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Alergias:'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($alergia));
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Hallazgos:'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($hallazgo));
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Diagnóstico:'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($diagnostico));
    $this->Ln();
    $this->SetFont('Arial','B',7);
    $this->Cell(0,5,utf8_decode('Plan:'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($plan));
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
$pdf->Output('D','Anexo_Medico_'.$ident.'_'.$fecha.'.pdf');


?>











