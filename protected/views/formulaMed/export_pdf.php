<?php
/* @var $this FormulaMedController */
/* @var $model FormulaMed */

set_time_limit(0);

$modeloformula = FormulaMed::model()->findByPk($id); 

$empleado = UtilidadesEmpleado::nombreempleado($modeloformula->Id_Empleado);
$tipo_ident = $modeloformula->idempleado->idtipoident->Dominio;
$ident = $modeloformula->idempleado->Identificacion;
$fecha_nacimiento = UtilidadesVarias::textofecha($modeloformula->idempleado->Fecha_Nacimiento);
$edad = UtilidadesEmpleado::edadempleado($modeloformula->Id_Empleado);
$fecha_ingreso = UtilidadesVarias::textofecha($modeloformula->idcontrato->Fecha_Ingreso);
$area = $modeloformula->idcontrato->idarea->Area;
$cargo = $modeloformula->idcontrato->idcargo->Cargo;
$fecha = $modeloformula->Fecha;

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
    $this->Cell(195,10,utf8_decode('Fórmula médica'),0,0,'L');
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

    $modeloformula = FormulaMed::model()->findByPk($this->id); 

    $info_adic_emp = ($modeloformula->Informacion_Adicional_Emp == "") ? "No asignado" : $modeloformula->Informacion_Adicional_Emp;
    $fecha = UtilidadesVarias::textofecha($modeloformula->Fecha);
    $form_med = ($modeloformula->Formula_Medica == "") ? "No asignado" : $modeloformula->Formula_Medica;

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
    $this->Cell(0,5,utf8_decode('Fórmula médica:'),0,0,'L');
    $this->Ln();
    $this->SetFont('Arial','',7);
    $this->MultiCell(0,5,utf8_decode($form_med));
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
$pdf->Output('D','Formula_Medica_'.$ident.'_'.$fecha.'.pdf');


?>











