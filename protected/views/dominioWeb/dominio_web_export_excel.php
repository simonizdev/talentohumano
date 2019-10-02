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

  $objPHPExcel->setActiveSheetIndex()->setCellValue('A1', 'Tipo');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B1', 'Dominio');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('C1', 'Link');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('D1', 'Usuario');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('E1', 'Password');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('F1', 'Empresa administradora');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('G1', 'Contacto empresa administradora');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('H1', 'Contratado por');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('I1', 'Uso');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('J1', 'Fecha de activación');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('K1', 'Fecha de vencimiento');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('L1', 'Observaciones');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('M1', 'Estado');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('N1', 'Usuario que creo');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('O1', 'Fecha de creación');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('P1', 'Usuario que actualizó');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('Q1', 'Fecha de actualización');

  $objPHPExcel->getActiveSheet()->getStyle('A1:Q1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
  $objPHPExcel->getActiveSheet()->getStyle('A1:Q1')->getFont()->setBold(true);

  $Prom = "";
  $Fila= 3;

  /*Inicio contenido tabla*/

  foreach ($data as $reg) {

    if($reg->Id_Tipo == ''){
      $tipo = 'No asignado';
    }else{
      $tipo = $reg->idtipo->Dominio;
    }
  
    $dominio = $reg->Dominio;
    $link = $reg->Link;
    $usuario = $reg->Usuario;
    $password = $reg->Password;
    $ea = $reg->Empresa_Administradora;
    $cea = $reg->Contacto_Emp_Adm;
    $cp = $reg->Contratado_Por;
    $uso = $reg->Uso;
    $fecha_activacion = UtilidadesVarias::textofecha($reg->Fecha_Activacion);
    $fecha_vencimiento = UtilidadesVarias::textofecha($reg->Fecha_Vencimiento);

    if($reg->Observaciones == ''){
      $observaciones = 'No asignado';
    }else{
      $observaciones = $reg->Observaciones;
    }

    if($reg->Estado == 1){
      $estado = 'Activo';
    }else{
      $estado = 'Inactivo';
    }

    $usuario_creacion = $reg->idusuariocre->Usuario;
    $fecha_creacion = UtilidadesVarias::textofechahora($reg->Fecha_Creacion);

    $usuario_actualizacion = $reg->idusuarioact->Usuario;
    $fecha_actualizacion = UtilidadesVarias::textofechahora($reg->Fecha_Actualizacion);

    $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$Fila,$tipo);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$Fila,$dominio);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$Fila,$link);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$Fila,$usuario);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$Fila,$password);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$Fila,$ea);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$Fila,$cea);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$Fila,$cp);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$Fila,$uso);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$Fila,$fecha_activacion);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$Fila,$fecha_vencimiento);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$Fila,$observaciones);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('M'.$Fila,$estado);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('N'.$Fila,$usuario_creacion);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('O'.$Fila,$fecha_creacion);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('P'.$Fila,$usuario_actualizacion);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('Q'.$Fila,$fecha_actualizacion);

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

  $n = 'Dominio_Web_'.date('Y-m-d H_i_s');

  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="'.$n.'.xlsx"');
  header('Cache-Control: max-age=0');
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
  ob_end_clean();
  $objWriter->save('php://output');
  exit;

?>

