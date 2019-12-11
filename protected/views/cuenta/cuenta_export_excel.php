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
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B1', 'Clasif.');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('C1', 'Cuenta / Usuario');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('D1', 'Dominio');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('E1', 'Password');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('F1', 'Tipo de cuenta');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('G1', 'Tipo de acceso');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('H1', 'Cuenta red.');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('I1', 'Observaciones');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('J1', 'Estado');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('K1', 'Usuario que creo');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('L1', 'Fecha de creación');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('M1', 'Usuario que actualizó');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('N1', 'Fecha de actualización');

  $objPHPExcel->getActiveSheet()->getStyle('A1:N1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
  $objPHPExcel->getActiveSheet()->getStyle('A1:N1')->getFont()->setBold(true);

  $Fila= 3;

  /*Inicio contenido tabla*/

  foreach ($data as $reg) {
  
    $id_cuenta = $reg->Id_Cuenta;
    $clasificacion = $reg->clasificacion->Dominio;
    $cuenta = $reg->DescCuentaUsuario($reg->Id_Cuenta);
    
    if($reg->Dominio == NULL){
      $dominio = '-';
    }else{
      $dominio = $reg->dominioweb->Dominio;
    }

    $password = $reg->Password;

    if($reg->Tipo_Cuenta == NULL){
      $tipo_cuenta = '-';
    }else{
      $tipo_cuenta = $reg->tipocuenta->Dominio;
    }

    if($reg->Tipo_Acceso == NULL){
      $tipo_acceso = '-';
    }else{
      $tipo_acceso = $reg->DescTipoAcceso($reg->Tipo_Acceso);
    }

    if($reg->Id_Cuenta_Red == NULL){
      $cuenta_red = '-';
    }else{
      $cuenta_red = $reg->DescCuentaUsuario($reg->Id_Cuenta_Red);
    }

    if($reg->Observaciones == NULL){
      $observaciones = '-';
    }else{
      $observaciones = $reg->Observaciones;
    }

    $estado = $reg->estado->Dominio;
    $usuario_creacion = $reg->idusuariocre->Usuario;
    $fecha_creacion = $reg->Fecha_Creacion;
    $usuario_actualizacion = $reg->idusuarioact->Usuario;
    $fecha_creacion = $reg->Fecha_Creacion;


    $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$Fila,$id_cuenta);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$Fila,$clasificacion);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$Fila,$cuenta);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$Fila,$dominio);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$Fila,$password);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$Fila,$tipo_cuenta);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$Fila,$tipo_acceso);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$Fila,$cuenta_red);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$Fila,$observaciones);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$Fila,$estado);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$Fila,$usuario_creacion);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$Fila,$fecha_creacion);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('M'.$Fila,$usuario_actualizacion);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('N'.$Fila,$fecha_creacion);
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

  $n = 'Cuentas_'.date('Y-m-d H_i_s');

  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="'.$n.'.xlsx"');
  header('Cache-Control: max-age=0');
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
  ob_end_clean();
  $objWriter->save('php://output');
  exit;

?>

