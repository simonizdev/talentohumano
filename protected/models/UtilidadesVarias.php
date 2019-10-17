<?php

class UtilidadesVarias {
   
	public static function textofechahora($datetime) {

		$fecha = date_create($datetime);

		$diatxt = date_format($fecha, 'l');
		$dianro = date_format($fecha, 'd');
		$mestxt = date_format($fecha, 'F');
		$anionro = date_format($fecha, 'Y');

		$hora = date_format($fecha, 'g');
		$min = date_format($fecha, 'i');
		$jorn = date_format($fecha, 'A');
		
		// *********** traducciones y modificaciones de fechas a letras y a español ***********
		$ding=array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
		$ming=array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		$mesp=array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
		$desp=array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
		$mesn=array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
		$diaesp=str_replace($ding, $desp, $diatxt);
		$mesesp=str_replace($ming, $mesp, $mestxt);

		return $diaesp.", ".$dianro." de ".$mesesp." de ".$anionro.' - '.$hora.':'.$min.' '.$jorn;	

	}

	public static function textofecha($date) {

		$fecha = date_create($date);

		$diatxt = date_format($fecha, 'l');
		$dianro = date_format($fecha, 'd');
		$mestxt = date_format($fecha, 'F');
		$anionro = date_format($fecha, 'Y');
		
		// *********** traducciones y modificaciones de fechas a letras y a español ***********
		$ding=array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
		$ming=array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		$mesp=array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
		$desp=array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
		$mesn=array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
		$diaesp=str_replace($ding, $desp, $diatxt);
		$mesesp=str_replace($ming, $mesp, $mestxt);

		return $diaesp.", ".$dianro." de ".$mesesp." de ".$anionro;	
	}

	public static function estadofechavencimiento($opc, $id) {
		//recibe parametro de tabla, pk de la tabla a consultar
		
		if($opc == 1){

			$modelodominio = DominioWeb::model()->findByPk($id);

			if($modelodominio->Estado == 0){

				return "label-default";

			}else{

				$str = strtotime(date('Y-m-d')) - (strtotime($modelodominio->Fecha_Vencimiento));
				$diff = floor($str/3600/24);

				if ($diff > -45){
					return "label-danger";
				}else{
					return "label-success";

				}

			}

		}
		
	}

	public static function textoestado1($opc) {

		if($opc == 0){
			return 'INACTIVO';
		}

		if($opc == 1){
			return 'ACTIVO';	
		}
	}


	public static function textoestado2($opc) {

		if($opc == 0){
			return 'NO';
		}

		if($opc == 1){
			return 'SI';	
		}
	}

	public static function envioemailliq($opc, $id, $id_vendedor, $email, $ruta_archivo) {


		$modelo_liq = CControlCms::model()->findByAttributes(array('ID_BASE' => $id));

		$info_id = $modelo_liq->ID_BASE;
		$info_mes = $modelo_liq->Desc_Mes($modelo_liq->MES);
		$info_anio = $modelo_liq->ANIO;
		$info = $info_mes.' - '.$info_anio;

		set_time_limit(0); 

		// Se inactiva el autoloader de yii
		spl_autoload_unregister(array('YiiBase','autoload'));  

		//require_once(Yii::app()->basePath . '\extensions\PHPMailer\class.phpmailer.php');
		//require_once(Yii::app()->basePath . '\extensions\PHPMailer\class.smtp.php');

		require_once(Yii::app()->basePath . '\extensions\PHPMailer\src\PHPMailer.php');
		require_once(Yii::app()->basePath . '\extensions\PHPMailer\src\SMTP.php');

		//cuando se termina la accion relacionada con la libreria se activa el autoloader de yii
		spl_autoload_register(array('YiiBase','autoload'));

		$cuenta = Yii::app()->params->email_send_emails;
		$password = Yii::app()->params->psw_send_emails;
		$de = Yii::app()->params->email_send_emails;
		$de_nombre = Yii::app()->params->name_send_emails_com;

		$para = $email;

		if($opc == 1){
			//resumen general
			$asunto = "Detalle comisión ".$info;
		}else{
			//resumen por vendedor
			$asunto = "Detalle comisión ".$info.' (Vendedor '.$id_vendedor.')';
		}

		$hora = date('H');

	    if($hora >= 0 && $hora <= 12){
	        $mensaje_hora = "Buenos días,";
	    }

	    if($hora >= 13 && $hora <= 16){
	        $mensaje_hora = "Buenos tardes,";
	    }

	    if($hora >= 17 && $hora <= 23){
	        $mensaje_hora = "Buenos noches,";
	    }
		
		$mensaje = $mensaje_hora."<br><br>
		Se Adjunta documento PDF con detalle de comisión.<br>";

		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->CharSet = 'UTF-8';
		$mail->Host = "secure.emailsrvr.com";
		$mail->SMTPAuth= true;
		$mail->Port = 465;
	 	$mail->Username= $cuenta;
		$mail->Password= $password;
		$mail->SMTPSecure = 'ssl';
		$mail->From = $de;
 		$mail->FromName= $de_nombre;
		$mail->isHTML(true);
		$mail->Subject = $asunto;
		$mail->Body = $mensaje; 

		$mail->addAddress($email);

		if($opc == 1){
			//resumen general
			$mail->AddAttachment( $ruta_archivo, "Detalle comisión ".$info.'.pdf');
		}else{
			//resumen por vendedor
			$mail->AddAttachment( $ruta_archivo, "Detalle comisión ".$info.' (Vendedor '.$id_vendedor.').pdf');
		}

		if(!$mail->send()){
			return 0;
		}else{
		 	return 1;
		}
	
	}


}
