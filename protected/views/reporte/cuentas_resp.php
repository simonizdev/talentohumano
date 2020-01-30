<?php
/* @var $this ReporteController */
/* @var $model Reporte */

set_time_limit(0);

//se reciben los parametros para el reporte
if (isset($model['dominio_correo'])) { $dominio_correo = $model['dominio_correo']; } else { $dominio_correo = ""; }
if (isset($model['estado'])) { $estado = $model['estado']; } else { $estado = ""; }

$condicion = "WHERE c.Clasificacion = 314 AND c.Tipo_Cuenta = 100";

if($dominio_correo != null){
  
  $condicion .= " AND c.Dominio = ".$dominio_correo;

}

if($estado != null){
  
  $condicion .= " AND c.Estado = ".$estado;

}

/*inicio configuración array de datos*/

$query ="
SELECT
c.Cuenta_Usuario,
dw.Dominio,
CONCAT(c.Cuenta_Usuario, '@', dw.Dominio) AS Cuenta,
CASE
WHEN c.Observaciones IS NULL THEN '-'
WHEN c.Observaciones IS NOT NULL THEN c.Observaciones
Else '-'
END AS Observaciones,
est.Dominio AS Estado_Cuenta,
CASE
WHEN e.Id_Empleado IS NULL THEN '-'
WHEN e.Id_Empleado IS NOT NULL THEN CONCAT (e.Nombre, ' ', e.Apellido)
Else '-'
END AS Empleado,
CASE
WHEN e.Estado = 1 THEN 'ACTIVO'
WHEN e.Estado = 0 THEN 'INACTIVO'
Else '-'
END AS Estado_Empleado
FROM TH_CUENTA c
LEFT JOIN TH_CUENTA_EMPLEADO ce ON c.Id_Cuenta = ce.Id_Cuenta AND ce.Estado = 1
LEFT JOIN TH_EMPLEADO e ON ce.Id_Empleado = e.Id_Empleado 
LEFT JOIN TH_DOMINIO est ON c.Estado = est.Id_Dominio
LEFT JOIN TH_DOMINIO_WEB dw ON c.Dominio = dw.Id_Dominio_Web
".$condicion."
ORDER BY dw.Dominio, c.Cuenta_Usuario 
";

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

$objPHPExcel->setActiveSheetIndex()->setCellValue('A1', 'Cuenta');
$objPHPExcel->setActiveSheetIndex()->setCellValue('B1', 'Dominio');
$objPHPExcel->setActiveSheetIndex()->setCellValue('C1', 'Correo');
$objPHPExcel->setActiveSheetIndex()->setCellValue('D1', 'Notas');
$objPHPExcel->setActiveSheetIndex()->setCellValue('E1', 'Estado de Correo');
$objPHPExcel->setActiveSheetIndex()->setCellValue('F1', 'Empleado');
$objPHPExcel->setActiveSheetIndex()->setCellValue('G1', 'Estado de empleado');

$objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);

/*Inicio contenido tabla*/

$query1 = Yii::app()->db->createCommand($query)->queryAll();
    
$Fila = 2; 

foreach ($query1 as $reg1) {

  $Cuenta_Usuario      = $reg1 ['Cuenta_Usuario']; 
  $Dominio             = $reg1 ['Dominio']; 
  $Cuenta              = $reg1 ['Cuenta']; 
  $Notas               = $reg1 ['Observaciones']; 
  $Estado_Cuenta       = $reg1 ['Estado_Cuenta']; 
  $Empleado            = $reg1 ['Empleado']; 
  $Estado_Empleado     = $reg1 ['Estado_Empleado']; 

  
  $objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$Fila, $Cuenta_Usuario);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$Fila, $Dominio);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$Fila, $Cuenta);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$Fila, $Notas);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$Fila, $Estado_Cuenta);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$Fila, $Empleado);
  $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$Fila, $Estado_Empleado);
  
  $objPHPExcel->getActiveSheet()->getStyle('A'.$Fila.':G'.$Fila)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

  $Fila = $Fila + 1;

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

$n = 'Cuentas_correo_'.date('Y-m-d H_i_s');

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$n.'.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
ob_end_clean();
$objWriter->save('php://output');
exit;



?>











