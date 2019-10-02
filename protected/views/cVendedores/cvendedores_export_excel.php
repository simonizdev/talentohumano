<?php
/* @var $this PromocionController */
/* @var $model Promocion */

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

  $objPHPExcel->setActiveSheetIndex()->setCellValue('A1', 'ID');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B1', 'ROW ID');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('C1', 'Nit');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('D1', 'Nombre');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('E1', 'E-mail');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('F1', 'ID Vendedor');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('G1', 'Recibo');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('H1', 'Ruta');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('I1', 'Nombre ruta');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('J1', 'Portafolio');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('K1', 'Nit supervisor');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('L1', 'Nombre supervisor');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('M1', 'Tipo');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('N1', 'Usuario que actualizó');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('O1', 'Fecha de actualización');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('P1', 'Estado');

  $objPHPExcel->getActiveSheet()->getStyle('A1:P1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
  $objPHPExcel->getActiveSheet()->getStyle('A1:P1')->getFont()->setBold(true);

  $Prom = "";
  $Fila= 3;

  /*Inicio contenido tabla*/

  foreach ($data as $reg) {

    $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$Fila,$reg->ID);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$Fila,$reg->ROWID);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$Fila,$reg->NIT_VENDEDOR);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$Fila,$reg->NOMBRE_VENDEDOR);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$Fila,$reg->EMAIL);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$Fila,$reg->ID_VENDEDOR);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$Fila,$reg->RECIBO);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$Fila,$reg->RUTA);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$Fila,$reg->NOMBRE_RUTA);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$Fila,$reg->PORTAFOLIO);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$Fila,$reg->NIT_SUPERVISOR);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$Fila,$reg->NOMBRE_SUPERVISOR);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('M'.$Fila,($reg->TIPO == "") ? "NO ASIGNADO" : $reg->tipo->Dominio);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('N'.$Fila,$reg->idusuarioact->Usuario);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('O'.$Fila,UtilidadesVarias::textofechahora($reg->FECHA_ACTUALIZACION));
    $objPHPExcel->setActiveSheetIndex()->setCellValue('P'.$Fila,$reg->ESTADO);


    $objPHPExcel->getActiveSheet()->getStyle('A'.$Fila.':P'.$Fila)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

    $Fila ++;
         
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

  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Vendedores_'.date('Y-m-d H_i_s').'.xls"');
  header('Cache-Control: max-age=0');
 
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
  $objWriter->save('php://output');

  
  exit;


?>

