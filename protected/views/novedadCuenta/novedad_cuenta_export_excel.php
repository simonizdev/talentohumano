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

  $objPHPExcel->setActiveSheetIndex()->setCellValue('A1', 'ID de cuenta');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B1', 'Novedades');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('C1', 'Usuario que creo');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('D1', 'Fecha de creación');

  $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
  $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true);

  $Fila= 3;

  /*Inicio contenido tabla*/

  foreach ($data as $reg) {
  
    $id_cuenta = $reg->Id_Cuenta;
    $novedades = $reg->Novedades;
    $usuario_creacion = $reg->idusuariocre->Usuario;
    $fecha_creacion = $reg->Fecha_Creacion;

    $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$Fila,$id_cuenta);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$Fila,$novedades);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$Fila,$usuario_creacion);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$Fila,$fecha_creacion);

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

  $n = 'Novedad_Cuenta_'.date('Y-m-d H_i_s');

  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="'.$n.'.xlsx"');
  header('Cache-Control: max-age=0');
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
  ob_end_clean();
  $objWriter->save('php://output');
  exit;

?>

