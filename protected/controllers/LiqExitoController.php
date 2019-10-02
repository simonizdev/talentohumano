<?php

class LiqExitoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','imp','uploadfile'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return LiqExito the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LiqExito::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LiqExito $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='liq-exito-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionImp()
	{
		$model= new LiqExito;
		$model->scenario = 'imp';

		$this->render('imp',array(
			'model'=>$model,
		));
	}

	public function actionUploadFile()
	{		
		$opc = '';
       	$msj = '';

		$file_tmp = $_FILES['LiqExito']['tmp_name']['archivo'];
        
        set_time_limit(0);

        // Se inactiva el autoloader de yii
		spl_autoload_unregister(array('YiiBase','autoload'));   

		require_once Yii::app()->basePath . '/extensions/PHPExcel/Classes/PHPExcel.php';
		require_once Yii::app()->basePath . '/extensions/PHPExcel/Classes/PHPExcel/Reader/Excel2007.php';
		require_once Yii::app()->basePath . '/extensions/PHPExcel/Classes/PHPExcel/IOFactory.php';

		//cuando se termina la accion relacionada con la libreria se activa el autoloader de yii
		spl_autoload_register(array('YiiBase','autoload'));

		$objPHPExcel = PHPExcel_IOFactory::load($file_tmp); 
        $objPHPExcel->setActiveSheetIndex(0);

        //Convierto la data de la Hoja en un arreglo
        $dataExcel = $objPHPExcel->getActiveSheet()->toArray();

        $filas = count($dataExcel);

        //echo $filas;die;

        $cont = 0;

   		if($filas < 5){

        	$opc = 0;
        	$msj = '<h4><i class="icon fa fa-info-circle"></i> Error</h4> El archivo esta vacio.';

        }else{

    		$opc = 1;
    	
    		//se ejecuta el sp por cada fila en el archivo

    		$msj = '<h4><i class="icon fa fa-info-circle"></i> Info</h4>';

    		for($i = 4; $i <= $filas - 1; $i++){

        		$param1 = $dataExcel[$i][0]; //Nit
        		$param2 = $dataExcel[$i][1]; //Razon_Social
        		$param3 = $dataExcel[$i][2]; //Fecha_Corte
        		$param4 = $dataExcel[$i][3]; //Corte_Desde
        		$param5 = $dataExcel[$i][4]; //Corte_Hasta
        		$param6 = $dataExcel[$i][5]; //Fecha_Vcto
        		$param7 = $dataExcel[$i][6]; //Cedi
        		$param8 = $dataExcel[$i][7]; //Orden
        		$param9 = $dataExcel[$i][8]; //Grupo
        		$param10 = $dataExcel[$i][9]; //Descripcion_Grupo
        		$param11 = $dataExcel[$i][10]; //Sublinea
        		$param12 = $dataExcel[$i][11]; //Descripcion_Sublinea
        		$param13 = $dataExcel[$i][12]; //Iva
        		$param14 = $dataExcel[$i][13]; //Plu
        		$param15 = $dataExcel[$i][14]; //Ean
        		$param16 = $dataExcel[$i][15]; //Descripcion_Plu
        		$param17 = $dataExcel[$i][16]; //Marca
        		$param18 = $dataExcel[$i][17]; //Descripcion_Marca
        		$param19 = $dataExcel[$i][18]; //Referencia
        		$param20 = $dataExcel[$i][19]; //Almacen
        		$param21 = $dataExcel[$i][20]; //Descripcion_Almacen
        		$param22 = $dataExcel[$i][21]; //Venta_Actual
        		$param23 = $dataExcel[$i][22]; //Venta_Anterior
        		$param24 = $dataExcel[$i][23]; //Despachos
        		$param25 = $dataExcel[$i][24]; //Cambio_Actual
        		$param26 = $dataExcel[$i][25]; //Cambio_Anterior
        		$param27 = $dataExcel[$i][26]; //Averias
        		//$param28 = $dataExcel[$i][27]; //
        		$param29 = $dataExcel[$i][28]; //Cantidad_Pagar
        		$param30 = $dataExcel[$i][29]; //Costo_Fabricacion
        		//$param31 = $dataExcel[$i][30]; //
        		$param32 = $dataExcel[$i][31]; //Liquidacion
    			//$param33 = $dataExcel[$i][32]; //
        		$param34 = $dataExcel[$i][33]; //Descuento
        		$param35 = $dataExcel[$i][34]; //Tipo
        		$param36 = $dataExcel[$i][35]; //Tienda_Ean
        		$param37 = $dataExcel[$i][36]; //SubInvetario
        		$param38 = $dataExcel[$i][37]; //Oracle
        		$param39 = $dataExcel[$i][38]; //Descripcion
        		$param40 = $dataExcel[$i][39]; //Categoria_Oracle
        		//$param41 = $dataExcel[$i][40]; //
        		$param42 = $dataExcel[$i][41]; //Cedi_C
        		$param43 = $dataExcel[$i][42]; //Almacen_Trasporte
        		$param44 = $dataExcel[$i][43]; //Almacen_Exito
        		$param45 = $dataExcel[$i][44]; //Mes
        		$param46 = $dataExcel[$i][45]; //Ano
        		$param47 = $dataExcel[$i][46]; //Unidad
        		$param48 = $dataExcel[$i][47]; //Pvp_Cal_Liq_Exito
        		$param49 = $dataExcel[$i][48]; //Pvp_SIva_Liq_Exito
        		$param50 = $dataExcel[$i][49]; //Porc_Dsto_Liq_Exito
        		$param51 = $dataExcel[$i][50]; //Vlr_Dsto_Liq_Exito
        		$param52 = $dataExcel[$i][51]; //Vlr_Neto_Liq_Exito
        		$param53 = $dataExcel[$i][52]; //Tot_Pag_Liq_Exito
        		$param54 = $dataExcel[$i][53]; //Pvp_Autor_Cia
        		$param55 = $dataExcel[$i][54]; //Pvp_SIva_Autor_Cia
        		$param56 = $dataExcel[$i][55]; //Porc_Dsto_Autor_Cia
        		$param57 = $dataExcel[$i][56]; //Vlr_Dsto_Autor_Cia
        		$param58 = $dataExcel[$i][57]; //Vlr_Neto_Autor_Cia
        		$param59 = $dataExcel[$i][58]; //Tot_Pag_Autor_Cia
        		$param60 = $dataExcel[$i][59]; //Dif_Pvp
        		$param61 = $dataExcel[$i][60]; //Dif_Porc_Dsto
        		$param62 = $dataExcel[$i][61]; //Dif_Vlr_Neto
        		$param63 = $dataExcel[$i][62]; //Dif_Tot_Pag
        		$param64 = $dataExcel[$i][63]; //Documento_Interno
        		$param65 = $dataExcel[$i][64]; //Cantidad_Interno
        		$param66 = $dataExcel[$i][65]; //Unidad_Negocio
        		$param67 = $dataExcel[$i][66]; //Ean_Interno

        		if(
        			is_null($param1) 
        			|| is_null($param2)
        			|| is_null($param3)
        			|| is_null($param4)
        			|| is_null($param5)
        			|| is_null($param6)
        			|| is_null($param7)
        			|| is_null($param8)
        			|| is_null($param9)
        			|| is_null($param10)
        			|| is_null($param11)
        			|| is_null($param12)
        			|| is_null($param13)
        			|| is_null($param14)
        			|| is_null($param15)
        			|| is_null($param16)
        			|| is_null($param17)
        			|| is_null($param18)
        			|| is_null($param19)
        			|| is_null($param20)
        			|| is_null($param21)
        			|| is_null($param22)
        			|| is_null($param23)
        			|| is_null($param24)
        			|| is_null($param25)
        			|| is_null($param26)
        			|| is_null($param27)
        			|| is_null($param29)
        			|| is_null($param30)
        			|| is_null($param32)
        			|| is_null($param34)
        			|| is_null($param35)
        			|| is_null($param36)
        			|| is_null($param37)
        			|| is_null($param38)
        			|| is_null($param39)
        			|| is_null($param40)
        			|| is_null($param42)
        			|| is_null($param43)
        			|| is_null($param44)
        			|| is_null($param45)
        			|| is_null($param46)
        			|| is_null($param47)
        			|| is_null($param48)
        			|| is_null($param49)
        			|| is_null($param50)
        			|| is_null($param51)
        			|| is_null($param52)
        			|| is_null($param53)
        			|| is_null($param54)
        			|| is_null($param55)
        			|| is_null($param56)
        			|| is_null($param57)
        			|| is_null($param58)
        			|| is_null($param59)
        			|| is_null($param60)
        			|| is_null($param61)
        			|| is_null($param62)
        			|| is_null($param63)
        			|| is_null($param64)
        			|| is_null($param65)
        			|| is_null($param66)
        			|| is_null($param67)
        		){
    				$fila_error = $i + 1;
        			$msj .= 'Error en la fila # '.$fila_error.', hay columnas vacias que son requeridas.<br>'; 
        			$opc = 0;
        		}

        		
        	}
        }

        if($opc == 1){
        
        	$reg_ins = 0;

        	for($i = 4; $i <= $filas - 1; $i++){

        		$Fecha_Corte_F = explode("-", $dataExcel[$i][2]);
  				$Fecha_Corte = '20'.$Fecha_Corte_F[2]."-".$Fecha_Corte_F[0]."-".$Fecha_Corte_F[1];
  				$Corte_Desde_F = explode("-", $dataExcel[$i][3]);
  				$Corte_Desde = "20".$Corte_Desde_F[2]."-".$Corte_Desde_F[0]."-".$Corte_Desde_F[1];
				$Corte_Hasta_F = explode("-", $dataExcel[$i][4]);
  				$Corte_Hasta = "20".$Corte_Hasta_F[2]."-".$Corte_Hasta_F[0]."-".$Corte_Hasta_F[1];
  				$Fecha_Vcto_F = explode("-", $dataExcel[$i][5]);
  				$Fecha_Vcto = "20".$Fecha_Vcto_F[2]."-".$Fecha_Vcto_F[0]."-".$Fecha_Vcto_F[1];
  				$Liquidacion = str_replace(",","",$dataExcel[$i][31]);
  				$Descuento = str_replace(",","",$dataExcel[$i][33]);
  				$Pvp_Cal_Liq_Exito_a = str_replace("$","",$dataExcel[$i][47]); 
				$Pvp_Cal_Liq_Exito = str_replace(",","",$Pvp_Cal_Liq_Exito_a);
				$Pvp_SIva_Liq_Exito_a = str_replace("$","",$dataExcel[$i][48]); 
				$Pvp_SIva_Liq_Exito = str_replace(",","",$Pvp_SIva_Liq_Exito_a); 
				$Porc_Dsto_Liq_Exito = str_replace("%", "", $dataExcel[$i][49]);
				$Vlr_Dsto_Liq_Exito_a = str_replace("$","",$dataExcel[$i][50]); 
				$Vlr_Dsto_Liq_Exito = str_replace(",","",$Vlr_Dsto_Liq_Exito_a);
				$Vlr_Neto_Liq_Exito_a = str_replace("$","",$dataExcel[$i][51]); 
				$Vlr_Neto_Liq_Exito = str_replace(",","",$Vlr_Neto_Liq_Exito_a);
				$Tot_Pag_Liq_Exito_a = str_replace("$","",$dataExcel[$i][52]); 
				$Tot_Pag_Liq_Exito = str_replace(",","",$Tot_Pag_Liq_Exito_a);
				$Pvp_Autor_Cia_a = str_replace("$","",$dataExcel[$i][53]); 
				$Pvp_Autor_Cia = str_replace(",","",$Pvp_Autor_Cia_a);
				$Pvp_SIva_Autor_Cia_a = str_replace("$","",$dataExcel[$i][54]); 
				$Pvp_SIva_Autor_Cia = str_replace(",","",$Pvp_SIva_Autor_Cia_a);
				$Porc_Dsto_Autor_Cia = str_replace("%", "", $dataExcel[$i][55]);
				$Vlr_Dsto_Autor_Cia_a = str_replace("$","",$dataExcel[$i][56]); 
				$Vlr_Dsto_Autor_Cia = str_replace(",","",$Vlr_Dsto_Autor_Cia_a);
				$Vlr_Neto_Autor_Cia_a = str_replace("$","",$dataExcel[$i][57]); 
				$Vlr_Neto_Autor_Cia = str_replace(",","",$Vlr_Neto_Autor_Cia_a);
				$Tot_Pag_Autor_Cia_a = str_replace("$","",$dataExcel[$i][58]); 
				$Tot_Pag_Autor_Cia = str_replace(",","",$Tot_Pag_Autor_Cia_a);
				$Dif_Pvp_a = str_replace("$","",$dataExcel[$i][59]); 
				$Dif_Pvp = str_replace(",","",$Dif_Pvp_a);
				$Dif_Porc_Dsto_a = str_replace("%","",$dataExcel[$i][60]); 
				$Dif_Porc_Dsto = str_replace(",","",$Dif_Porc_Dsto_a);
				$Dif_Vlr_Neto_a = str_replace("$","",$dataExcel[$i][61]); 
				$Dif_Vlr_Neto = str_replace(",","",$Dif_Vlr_Neto_a);
				$Dif_Tot_Pag_a = str_replace("$","",$dataExcel[$i][62]); 
				$Dif_Tot_Pag = str_replace(",","",$Dif_Tot_Pag_a);

				$sql = "
				INSERT INTO TH_LIQ_EXITO (
				Nit, 
				Razon_Social,
				Fecha_Corte,
				Corte_Desde,
				Corte_Hasta,
				Fecha_Vcto,
				Cedi,
				Orden,
				Grupo,
				Descripcion_Grupo,
				Sublinea,
				Descripcion_Sublinea,
				Iva,
				Plu,
				Descripcion_Plu,
				Ean,
				Marca,
				Descripcion_Marca,
				Referencia,
				Almacen,
				Descripcion_Almacen,
				Venta_Actual,
				Venta_Anterior,
				Despachos,
				Cambio_Actual,
				Cambio_Anterior,
				Averias,
				Cantidad_Pagar,
				Costo_Fabricacion,
				Liquidacion,
				Descuento,
				Tipo,
				Tienda_Ean,
				SubInvetario,
				Oracle,
				Descripcion,
				Categoria_Oracle,
				Cedi_C,
				Almacen_Trasporte,
				Almacen_Exito,
				Mes,
				Ano,
				Unidad,
				Pvp_Cal_Liq_Exito,
				Pvp_SIva_Liq_Exito,
				Porc_Dsto_Liq_Exito,
				Vlr_Dsto_Liq_Exito,
				Vlr_Neto_Liq_Exito,
				Tot_Pag_Liq_Exito,
				Pvp_Autor_Cia,
				Pvp_SIva_Autor_Cia,
				Porc_Dsto_Autor_Cia,
				Vlr_Dsto_Autor_Cia,
				Vlr_Neto_Autor_Cia,
				Tot_Pag_Autor_Cia,
				Dif_Pvp,
				Dif_Porc_Dsto,
				Dif_Vlr_Neto,
				Dif_Tot_Pag,
				Documento_Interno,
				Cantidad_Interno,
				Unidad_Negocio,
				Ean_Interno,
				Fecha_Creacion
				) VALUES(
				".intval($dataExcel[$i][0]).", 
				'".$dataExcel[$i][1]."',
				'".$Fecha_Corte."',
				'".$Corte_Desde."',
				'".$Corte_Hasta."',
				'".$Fecha_Vcto."',
				".intval($dataExcel[$i][6]).",
				".intval($dataExcel[$i][7]).",
				".intval($dataExcel[$i][8]).",
				'".$dataExcel[$i][9]."',
				".intval($dataExcel[$i][10]).",
				'".$dataExcel[$i][11]."',
				".intval($dataExcel[$i][12]).",
				".intval($dataExcel[$i][13]).",
				'".$dataExcel[$i][15]."',
				'".$dataExcel[$i][14]."',
				".intval($dataExcel[$i][16]).",
				'".$dataExcel[$i][17]."',
				".intval($dataExcel[$i][18]).",
				".intval($dataExcel[$i][19]).",
				'".$dataExcel[$i][20]."',
				".intval($dataExcel[$i][21]).",
				".intval($dataExcel[$i][22]).",
				".intval($dataExcel[$i][23]).",
				".intval($dataExcel[$i][24]).",
				".intval($dataExcel[$i][25]).",
				".intval($dataExcel[$i][26]).",
				".intval($dataExcel[$i][28]).",
				".(float) $dataExcel[$i][29].",
				".(float) $Liquidacion.",
				".(float) $Descuento.",
				'".$dataExcel[$i][34]."',
				'".$dataExcel[$i][35]."',
				'".$dataExcel[$i][36]."',
				".intval($dataExcel[$i][37]).",
				'".$dataExcel[$i][38]."',
				'".$dataExcel[$i][39]."',
				'".$dataExcel[$i][41]."',
				'".$dataExcel[$i][42]."',
				'".$dataExcel[$i][43]."',
				'".$dataExcel[$i][44]."',
				".intval($dataExcel[$i][45]).",
				'".$dataExcel[$i][46]."',
				".(float) $Pvp_Cal_Liq_Exito.",
				".(float) number_format($Pvp_SIva_Liq_Exito , 2, ',', '').",
				".(float) number_format($Porc_Dsto_Liq_Exito , 2, ',', '').",
				".(float) $Vlr_Dsto_Liq_Exito.",
				".(float) $Vlr_Neto_Liq_Exito.",
				".(float) $Tot_Pag_Liq_Exito.",
				".(float) $Pvp_Autor_Cia.",
				".(float) $Pvp_SIva_Autor_Cia.",
				".(float) $Porc_Dsto_Autor_Cia.",
				".(float) $Vlr_Dsto_Autor_Cia.",
				".(float) $Vlr_Neto_Autor_Cia.",
				".(float) $Tot_Pag_Autor_Cia.",
				".(float) $Dif_Pvp.",
				".(float) $Dif_Porc_Dsto.",
				".(float) $Dif_Vlr_Neto.",
				".(float) $Dif_Tot_Pag.",
				'".$dataExcel[$i][63]."',
				".intval($dataExcel[$i][64]).",
				'".$dataExcel[$i][65]."',
				'".$dataExcel[$i][66]."',
				'".date('Y-m-d H:i:s')."'	
				)"; 

				$command = Yii::app()->db->createCommand($sql);

				if($command->execute()){
					$reg_ins = $reg_ins + 1;	
				}
        	}

        	if($reg_ins == 1){
        		$msj .= 'se ha cargado '.$reg_ins.' registro correctamente.<br>'; 	
        	}else{
        		$msj .= 'se han cargado '.$reg_ins.' registros correctamente.<br>'; 	
        	}	
        }

        $resp = array('opc' => $opc, 'msj' => $msj);

        echo json_encode($resp);

    }
}
