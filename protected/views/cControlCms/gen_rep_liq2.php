<?php
/* @var $this ReporteController */
/* @var $model Reporte */

set_time_limit(0);

/*inicio configuración array de datos*/

$modelo_liq = CControlCms::model()->findByAttributes(array('ID_BASE' => $id));

$info_id = 'ID de liquidación: '.$modelo_liq->ID_BASE.', ';
$info_mes = 'Mes: '.$modelo_liq->Desc_Mes($modelo_liq->MES).', ';
$info_anio = 'Año: '.$modelo_liq->ANIO.', ';
$info_tipo = 'Tipo: '.$modelo_liq->tipo->Dominio.', ';
if($modelo_liq->LIQUIDACION == 1){
  $info_liquidacion = 'Liquidación: INDIVIDUAL, ';
  $info_vendedor = 'Vendedor: '.$modelo_liq->Desc_Vend($modelo_liq->VENDEDOR).', ';
}else{
  $info_liquidacion = 'Liquidación: TODOS LOS VENDEDORES, ';
  $info_vendedor = '';  
}
$info_obs = 'Observaciones: '.$modelo_liq->OBSERVACION.'.';

$info = $info_id.$info_mes.$info_anio.$info_tipo.$info_liquidacion.$info_vendedor.$info_obs;

$tipo = $modelo_liq->TIPO;

//se obtiene la cadena de la fecha actual
$diatxt=date('l');
$dianro=date('d');
$mestxt=date('F');
$anionro=date('Y');
// *********** traducciones y modificaciones de fechas a letras y a español ***********
$ding=array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
$ming=array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$mesp=array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
$desp=array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
$mesn=array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
$diaesp=str_replace($ding, $desp, $diatxt);
$mesesp=str_replace($ming, $mesp, $mestxt);

$fecha_act= $diaesp.", ".$dianro." de ".$mesesp." de ".$anionro;

$query ="EXEC [dbo].[CMS_CONS_CMS_TOT2] @ID = ".$id;

//echo $query;die;

if($opc == 1){
  //PDF

  //se incluye la libreria pdf
  require_once Yii::app()->basePath . '/extensions/fpdf/fpdf.php';

  class PDF extends FPDF{

    function setFechaActual($fecha_actual){
      $this->fecha_actual = $fecha_actual;
    }
    
    function setInfo($info){
      $this->info = $info;
    }

    function setSql($sql){
      $this->sql = $sql;
    }

    function setTipo($tipo){
      $this->tipo = $tipo;
    }

    function Header(){
      $this->SetFont('Arial','B',9);
      $this->Cell(200,5,utf8_decode('BASE DE COMISIONES'),0,0,'L');
      $this->SetFont('Arial','',7);
      $this->Cell(80,5,utf8_decode($this->fecha_actual),0,0,'R');
      $this->Ln();
      $this->Ln();
      $this->SetFont('Arial','',6);
      $this->MultiCell(280,5,utf8_decode('INFO: '.$this->info),0,'J');
      $this->Ln();
      
      //linea superior a la cabecera de la tabla
      $this->SetDrawColor(0,0,0);
      $this->Cell(280,1,'','T');
      $this->SetFillColor(224,235,255);
      $this->SetTextColor(0);
      $this->Ln();  
      
      //cabecera de tabla
      $this->SetFont('Arial','B',5);
  
      $this->Cell(15,2,utf8_decode('NIT'),0,0,'L');
      $this->Cell(50,2,utf8_decode('VENDEDOR'),0,0,'L');
      $this->Cell(23,2,utf8_decode('TIPO'),0,0,'L');
      $this->Cell(20,2,utf8_decode('FECHA INICIAL'),0,0,'L');
      $this->Cell(20,2,utf8_decode('FECHA FINAL'),0,0,'L');
      $this->Cell(19,2,utf8_decode('BASE RECAUDO'),0,0,'R');
      $this->Cell(19,2,utf8_decode('TOTAL RECAUDO'),0,0,'R');
      $this->Cell(19,2,utf8_decode('BASE VENTA'),0,0,'R');
      $this->Cell(19,2,utf8_decode('TOTAL VENTA'),0,0,'R');
      $this->Cell(19,2,utf8_decode('TOTAL CORRERIA'),0,0,'R');
      $this->Cell(19,2,utf8_decode('BASE AJUSTE'),0,0,'R');
      $this->Cell(19,2,utf8_decode('TOTAL AJUSTE'),0,0,'R');
      $this->Cell(19,2,utf8_decode('TOTAL GENERAL'),0,0,'R');
      
      $this->Ln(3);   
      
      //linea inferior a la cabecera de la tabla
      $this->SetDrawColor(0,0,0);
      $this->Cell(280,1,'','T');
      $this->SetFillColor(224,235,255);
      $this->SetTextColor(0);
      

      $this->Ln();
    }

    function Tabla(){

      $q1 = Yii::app()->db->createCommand($this->sql)->queryAll();

      if(!empty($q1)){
        foreach ($q1 as $reg1) {

          if($this->tipo == $reg1['TIPO']){

            $NIT_VENDEDOR = $reg1['NIT_VENDEDOR'];
            $NOMBRE_VENDEDOR = $reg1['NOMBRE_VENDEDOR']; 
            $TIPO = Dominio::model()->findByPk($reg1['TIPO'])->Dominio;
            $FECHA_INICIAL = $reg1['FECHA1'];
            $FECHA_FINAL = $reg1['FECHA2'];
            $BASE_RECAUDO = $reg1['BASE_RECAUDO'];
            $RECAUDO = $reg1['RECAUDO'];
            $BASE_VENTA = $reg1['BASE_VENTA'];
            $VENTA = $reg1['VENTA'];
            $CORRERIA = $reg1['CORRERIA'];
            $BASE_ACELERADOR = $reg1['BASE_ACELERADOR'];
            $ACELERADOR = $reg1['ACELERADOR']; 
            $BASE_AJUSTE = $reg1['BASE_AJUSTE'];
            $AJUSTE = $reg1['AJUSTE']; 
            $TOTAL = $reg1['TOTAL']; 

            $this->SetFont('Arial','',5);
            $this->Cell(15,3,$NIT_VENDEDOR,0,0,'L');
            $this->Cell(50,3,substr(utf8_decode($NOMBRE_VENDEDOR),0, 35),0,0,'L');
            $this->Cell(23,3,substr(utf8_decode($TIPO), 0, 15),0,0,'L');
            $this->Cell(20,3,$FECHA_INICIAL,0,0,'L');
            $this->Cell(20,3,$FECHA_FINAL,0,0,'L');
            $this->Cell(19,3,number_format(($BASE_RECAUDO),2,".",","),0,0,'R');
            $this->Cell(19,3,number_format(($RECAUDO),2,".",","),0,0,'R');
            $this->Cell(19,3,number_format(($BASE_VENTA),2,".",","),0,0,'R');
            $this->Cell(19,3,number_format(($VENTA),2,".",","),0,0,'R');
            $this->Cell(19,3,number_format(($CORRERIA),2,".",","),0,0,'R');
            $this->Cell(19,3,number_format(($BASE_AJUSTE),2,".",","),0,0,'R');
            $this->Cell(19,3,number_format(($AJUSTE),2,".",","),0,0,'R');
            $this->Cell(19,3,number_format(($TOTAL),2,".",","),0,0,'R');
            $this->Ln();
          }
        }
      }

      $this->Ln();
      $this->SetDrawColor(0,0,0);
      $this->Cell(280,0,'','T');                            
      $this->Ln();

    }//fin tabla

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','B',6);
        $this->Cell(0,8,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C');
    }
  }

  $pdf = new PDF('L','mm','A4');
  //se definen las variables extendidas de la libreria FPDF
  $pdf->setInfo($info);
  $pdf->setFechaActual($fecha_act);
  $pdf->setSql($query);
  $pdf->setTipo($tipo);
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->Tabla();
  ob_end_clean();
  $pdf->Output('D','Base_comisiones_'.$id.'_'.date('Y-m-d H_i_s').'.pdf');
}

if($opc == 2){
    //EXCEL

    // Se inactiva el autoloader de yii
    spl_autoload_unregister(array('YiiBase','autoload'));   

    require_once Yii::app()->basePath . '/extensions/PHPExcel/Classes/PHPExcel.php';

    //cuando se termina la accion relacionada con la libreria se activa el autoloader de yii
    spl_autoload_register(array('YiiBase','autoload'));

    $objPHPExcel = new PHPExcel();

    $objPHPExcel->getActiveSheet()->setTitle('Hoja1');
    $objPHPExcel->setActiveSheetIndex();

    /*Cabecera tabla*/

    $objPHPExcel->getActiveSheet()->mergeCells('A1:J1');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('A1', 'INFO: '.$info);
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

    $objPHPExcel->setActiveSheetIndex()->setCellValue('A3', 'NIT');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('B3', 'VENDEDOR');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C3', 'TIPO');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D3', 'FECHA INICIAL');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('E3', 'FECHA FINAL');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('F3', 'BASE RECAUDO');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('G3', 'TOTAL RECAUDO');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('H3', 'BASE VENTA');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('I3', 'TOTAL VENTA');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('J3', 'TOTAL CORRERIA');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('K3', 'BASE AJUSTE');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('L3', 'TOTAL AJUSTE');
    $objPHPExcel->setActiveSheetIndex()->setCellValue('M3', 'TOTAL GENERAL');

    $objPHPExcel->getActiveSheet()->getStyle('A3:M3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('A3:M3')->getFont()->setBold(true);

    /*Inicio contenido tabla*/
        
    $Fila = 4;

    $q1 = Yii::app()->db->createCommand($query)->queryAll();

    if(!empty($q1)){
      foreach ($q1 as $reg1) {

        if($tipo == $reg1['TIPO']){

          $NIT_VENDEDOR = $reg1['NIT_VENDEDOR'];
          $NOMBRE_VENDEDOR = $reg1['NOMBRE_VENDEDOR']; 
          $TIPO = Dominio::model()->findByPk($reg1['TIPO'])->Dominio;
          $FECHA_INICIAL = $reg1['FECHA1'];
          $FECHA_FINAL = $reg1['FECHA2'];
          $BASE_RECAUDO = $reg1['BASE_RECAUDO'];
          $RECAUDO = $reg1['RECAUDO'];
          $BASE_VENTA = $reg1['BASE_VENTA'];
          $VENTA = $reg1['VENTA'];
          $CORRERIA = $reg1['CORRERIA'];
          $BASE_ACELERADOR = $reg1['BASE_ACELERADOR'];
          $ACELERADOR = $reg1['ACELERADOR']; 
          $BASE_AJUSTE = $reg1['BASE_AJUSTE'];
          $AJUSTE = $reg1['AJUSTE']; 
          $TOTAL = $reg1['TOTAL'];


          $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$Fila, $NIT_VENDEDOR);
          $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$Fila, $NOMBRE_VENDEDOR);
          $objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$Fila, $TIPO);
          $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$Fila, $FECHA_INICIAL);
          $objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$Fila, $FECHA_FINAL);
          $objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$Fila, $BASE_RECAUDO);
          $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$Fila, $RECAUDO);
          $objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$Fila, $BASE_VENTA);
          $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$Fila, $VENTA);
          $objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$Fila, $CORRERIA);
          $objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$Fila, $BASE_AJUSTE);
          $objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$Fila, $AJUSTE);
          $objPHPExcel->setActiveSheetIndex()->setCellValue('M'.$Fila, $TOTAL);

          $objPHPExcel->getActiveSheet()->getStyle('A'.$Fila.':E'.$Fila)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
          $objPHPExcel->getActiveSheet()->getStyle('F'.$Fila.':M'.$Fila)->getNumberFormat()->setFormatCode('#,##0.00');
          $objPHPExcel->getActiveSheet()->getStyle('F'.$Fila.':M'.$Fila)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

          $Fila = $Fila + 1;
        } 
          
      }
    }

    /*fin contenido tabla*/

    //se configura el ancho de cada columna en automatico solo funciona en el rango A-Z
    foreach($objPHPExcel->getWorksheetIterator() as $worksheet) {

        $objPHPExcel->setActiveSheetIndex($objPHPExcel->getIndex($worksheet));

        $sheet = $objPHPExcel->getActiveSheet();
        $cellIterator = $sheet->getRowIterator()->current()->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(true);
        foreach ($cellIterator as $cell) {
            $sheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
        }
    }

    $n = 'Base_comisiones_'.$id.'_'.date('Y-m-d H_i_s');

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$n.'.xls"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');

    exit;
}

?>































































































<?php



?>
