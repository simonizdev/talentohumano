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
  $objPHPExcel->setActiveSheetIndex()->setCellValue('A1', 'ID Cuenta');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B1', 'Tipo de asociación');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('C1', 'Empleado');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('D1', 'Área');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('E1', 'Cargo');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('F1', 'Empresa');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('G1', 'Estado de empleado');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('H1', 'Tipo de cuenta');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('I1', 'Usuario');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('J1', 'Dominio');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('K1', 'Cuenta de correo');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('L1', 'Password correo');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('M1', 'Cuenta de skype');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('N1', 'Password skype');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('O1', 'Usuario siesa');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('P1', 'Password siesa');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('Q1', 'Usuario glpi');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('R1', 'Password glpi');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('S1', 'Usuario papercut');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('T1', 'Password papercut');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('U1', 'Cuenta de correo para redirección');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('V1', 'Estado de cuenta');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('W1', 'Observaciones');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('X1', 'Usuario que creo');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('Y1', 'Fecha de creación');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('Z1', 'Usuario que actualizó');
  $objPHPExcel->setActiveSheetIndex()->setCellValue('AA1', 'Fecha de actualización');


  $objPHPExcel->getActiveSheet()->getStyle('A1:AA1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
  $objPHPExcel->getActiveSheet()->getStyle('A1:AA1')->getFont()->setBold(true);

  $Fila= 3;

  /*Inicio contenido tabla*/

  foreach ($data as $reg) {

    $id_cuenta = $reg->Id_Cuenta;
    $tipo_asoc = $reg->tipoasociacion->Dominio;

    if($reg->Id_Empleado == ""){
      $empleado = '';
      $area = '';
      $cargo = '';
      $estado_emp = '';
      $empresa_emp = '';
    }else{
      $empleado = UtilidadesEmpleado::nombreempleado($reg->Id_Empleado);
      
      $query_contrato= Yii::app()->db->createCommand('SELECT TOP 1 Id_Contrato FROM TH_CONTRATO_EMPLEADO WHERE Id_Empleado = '.$reg->Id_Empleado.' ORDER BY 1 DESC')->queryRow();

      $id_ult_contrato = $query_contrato['Id_Contrato'];

      if($id_ult_contrato != ''){
        $modelocontrato = ContratoEmpleado::model()->findByPk($id_ult_contrato);
        $area = $modelocontrato->idarea->Area;
        $cargo = $modelocontrato->idcargo->Cargo;
        $empresa_emp = $modelocontrato->idempresa->Descripcion;
      }else{
        $area = '';
        $cargo = '';
        $empresa_emp = '';
      }

      $modeloempleado = Empleado::model()->findByPk($reg->Id_Empleado);

      if($modeloempleado->Estado == 1){
        $estado_emp = 'Activo';
      }else{
        $estado_emp = 'Inactivo';
      }

    }

    if($reg->Tipo == ""){
      $tipo_cuenta = '';
    }else{
      $tipo_cuenta = $reg->tipo->Dominio;
    }

    if($reg->Usuario == ""){
      $usuario = '';
    }else{
      $usuario = $reg->Usuario;
    }

    if($reg->Dominio == ""){
      $dominio = '';
    }else{
      $dominio = $reg->dominio->Dominio;
    }

    if($reg->Cuenta_Correo == ""){
      $cuenta_correo = '';
    }else{
      $cuenta_correo = $reg->Cuenta_Correo;
    }

    if($reg->Password_Correo == ""){
      $password_correo = '';
    }else{
      $password_correo = $reg->Password_Correo;
    }

    if($reg->Cuenta_Skype == ""){
      $cuenta_skype = '';
    }else{
      $cuenta_skype = $reg->Cuenta_Skype;
    }

    if($reg->Password_Skype == ""){
      $password_skype = '';
    }else{
      $password_skype = $reg->Password_Skype;
    }

    if($reg->Usuario_Siesa == ""){
      $usuario_siesa = '';
    }else{
      $usuario_siesa = $reg->Usuario_Siesa;
    }

    if($reg->Password_Siesa == ""){
      $password_siesa = '';
    }else{
      $password_siesa = $reg->Password_Siesa;
    }

    if($reg->Usuario_Glpi == ""){
      $usuario_glpi = '';
    }else{
      $usuario_glpi = $reg->Usuario_Glpi;
    }

    if($reg->Password_Glpi == ""){
      $password_glpi = '';
    }else{
      $password_glpi = $reg->Password_Glpi;
    }

    if($reg->Usuario_Papercut == ""){
      $usuario_papercut = '';
    }else{
      $usuario_papercut = $reg->Usuario_Papercut;
    }

    if($reg->Password_Papercut == ""){
      $password_papercut = '';
    }else{
      $password_papercut = $reg->Password_Papercut;
    }

    if($reg->Cuenta_Correo_Red == ""){
      $cuenta_de_correo_para_redireccion = '';
    }else{
      $cuenta_de_correo_para_redireccion = $reg->cuentacorreored->Cuenta_Correo;
    }

    $estado = $reg->estado->Dominio;

    if($reg->Observaciones == ""){
      $observaciones = '';
    }else{
      $observaciones = $reg->Observaciones;
    }

    $usuario_creacion = $reg->idusuariocre->Usuario;
    $fecha_creacion = $reg->Fecha_Creacion;
    $usuario_actualizacion = $reg->idusuarioact->Usuario;
    $fecha_actualizacion = $reg->Fecha_Actualizacion;

    $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$Fila,$id_cuenta);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$Fila,$tipo_asoc);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$Fila,$empleado);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$Fila,$area);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$Fila,$cargo);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$Fila,$empresa_emp);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$Fila,$estado_emp);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$Fila,$tipo_cuenta);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$Fila,$usuario);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$Fila,$dominio);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$Fila,$cuenta_correo);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$Fila,$password_correo);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('M'.$Fila,$cuenta_skype);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('N'.$Fila,$password_skype);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('O'.$Fila,$usuario_siesa);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('P'.$Fila,$password_siesa);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('Q'.$Fila,$usuario_glpi);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('R'.$Fila,$password_glpi);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('S'.$Fila,$usuario_papercut);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('T'.$Fila,$password_glpi);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('U'.$Fila,$cuenta_de_correo_para_redireccion);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('V'.$Fila,$estado);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('W'.$Fila,$observaciones);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('X'.$Fila,$usuario_creacion);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('Y'.$Fila,$fecha_creacion);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('Z'.$Fila,$usuario_actualizacion);
    $objPHPExcel->setActiveSheetIndex()->setCellValue('AA'.$Fila,$fecha_actualizacion);

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

