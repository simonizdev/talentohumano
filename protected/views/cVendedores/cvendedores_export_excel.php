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

  $Fila= 3;

  /*Inicio contenido tabla*/

  foreach ($data as $reg) {

    $id = $reg->ID;
    $rowid = $reg->ROWID;
    $nit_vendedor = $reg->NIT_VENDEDOR;
    $nombre_vendedor = $reg->NOMBRE_VENDEDOR;
    $email = $reg->EMAIL;
    $id_vendedor = $reg->ID_VENDEDOR;
    $recibo = $reg->RECIBO;
    $ruta = $reg->RUTA;
    $nombre_ruta = $reg->NOMBRE_RUTA;
    $portafolio = $reg->PORTAFOLIO;
    $nit_supervisor = $reg->NIT_SUPERVISOR;
    $nombre_supervisor = $reg->NOMBRE_SUPERVISOR;
    if($reg->TIPO == "" ) { $tipo = "NO ASIGNADO"; } else { $tipo = $reg->tipo->Dominio; }
    $usuario_act = $reg->idusuarioact->Usuario;
    $fecha_act = UtilidadesVarias::textofechahora($reg->FECHA_ACTUALIZACION);
    $estado = $reg->ESTADO;

    $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$Fila,$id);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$Fila,$rowid);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$Fila,$nit_vendedor);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$Fila,$nombre_vendedor);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$Fila,$email);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$Fila,$id_vendedor);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$Fila,$recibo);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$Fila,$ruta);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$Fila,$nombre_ruta);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$Fila,$portafolio);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$Fila,$nit_supervisor);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$Fila,$nombre_supervisor);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('M'.$Fila,$tipo);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('N'.$Fila,$usuario_act);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('O'.$Fila,$fecha_act);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('P'.$Fila,$estado);

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

  $n = 'Vendedores_'.date('Y-m-d H_i_s');

  ob_end_clean();
  header( "Content-type: application/vnd.ms-excel" );
  header('Content-Disposition: attachment; filename="'.$n.'.xlsx"');
  header('Cache-Control: max-age=0');
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
  ob_end_clean();
  $objWriter->save('php://output');
  exit;

?>

