<?php

//clase creada para funciones relacionadas con el modelo de cuenta

class UtilidadesCuenta {
   
	/*public static function novedadcuenta(
		$id, 

		$tipo_asociacion_act,  
		$tipo_asociacion_nue, 
		
		$id_empleado_act, 
		$id_empleado_nue, 
		
		$tipo_act, 
		$tipo_nue, 
		
		$usuario_act, 
		$usuario_nue, 
		
		$dominio_act, 
		$dominio_nue, 
		
		$cuenta_correo_act, 
		$cuenta_correo_nue, 
		
		$password_correo_act, 
		$password_correo_nue, 

		$cuenta_correo_red_act,
		$cuenta_correo_red_nue,
		
		$cuenta_skype_act, 
		$cuenta_skype_nue, 
		
		$password_skype_act, 
		$password_skype_nue, 
		
		$usuario_siesa_act, 
		$usuario_siesa_nue, 

		$password_siesa_act, 
		$password_siesa_nue,

		$usuario_glpi_act, 
		$usuario_glpi_nue, 

		$password_glpi_act, 
		$password_glpi_nue,

		$usuario_papercut_act, 
		$usuario_papercut_nue, 

		$password_papercut_act, 
		$password_papercut_nue, 

		$estado_act, 
		$estado_nue, 

		$observaciones_act, 
		$observaciones_nue
	){

		$texto_novedad = "";
		$flag = 0;

		if($tipo_asociacion_act != $tipo_asociacion_nue){
			$flag = 1;

			$n_tipo_asoc_act = Dominio::model()->findByPk($tipo_asociacion_act);
			$n_tipo_asoc_nue = Dominio::model()->findByPk($tipo_asociacion_nue);

			$texto_novedad .= "Tipo de asociación: ".$n_tipo_asoc_act->Dominio." / ".$n_tipo_asoc_nue->Dominio.", ";
		}

		if($id_empleado_act != $id_empleado_nue){
			$flag = 1;

			if($id_empleado_act != ''){
				$n_empleado_act = UtilidadesEmpleado::nombreempleado($id_empleado_act);
			}else{
				$n_empleado_act = 'No asignado';
			}

			if($id_empleado_nue != ''){
				$n_empleado_nue = UtilidadesEmpleado::nombreempleado($id_empleado_nue);
			}else{
				$n_empleado_nue = 'No asignado';
			}

			$texto_novedad .= "Empleado: ".$n_empleado_act." / ".$n_empleado_nue.", ";
		}

		if($tipo_act != $tipo_nue){
			$flag = 1;	

			if($tipo_act != ''){
				$n_tipo_act = Dominio::model()->findByPk($tipo_act);
				$t_n_tipo_act = $n_tipo_act->Dominio;
			}else{
				$t_n_tipo_act = 'No asignado';
			}

			if($tipo_nue != ''){
				$n_tipo_nue = Dominio::model()->findByPk($tipo_nue);
				$t_n_tipo_nue = $n_tipo_nue->Dominio;
			}else{
				$t_n_tipo_nue = 'No asignado';
			}
	
			$texto_novedad .= "Tipo de cuenta: ".$t_n_tipo_act." / ".$t_n_tipo_nue.", ";
		}

		if($usuario_act != $usuario_nue){
			$flag = 1;

			if($usuario_act != ''){
				$t_usuario_act = $usuario_act;
			}else{
				$t_usuario_act = 'No asignado';
			}

			if($usuario_nue != ''){
				$t_usuario_nue = $usuario_nue;
			}else{
				$t_usuario_nue = 'No asignado';
			}

			$texto_novedad .= "Usuario: ".$t_usuario_act." / ".$t_usuario_nue.", ";
		}

		if($dominio_act != $dominio_nue){
			$flag = 1;	

			if($dominio_act != ''){
				$n_dominio_act = Dominio::model()->findByPk($dominio_act);
				$t_dominio_act = $n_dominio_act->Dominio;
			}else{
				$t_dominio_act = 'No asignado';
			}

			if($dominio_nue != ''){
				$n_dominio_nue = Dominio::model()->findByPk($dominio_nue);
				$t_dominio_nue = $n_dominio_nue->Dominio;
			}else{
				$t_dominio_nue = 'No asignado';
			}


			$texto_novedad .= "Dominio: ".$t_dominio_act." / ".$t_dominio_nue.", ";
		}

		if($cuenta_correo_act != $cuenta_correo_nue){
			$flag = 1;

			if($cuenta_correo_act != ''){
				$t_cuenta_correo_act = $cuenta_correo_act;
			}else{
				$t_cuenta_correo_act = 'No asignado';
			}

			if($cuenta_correo_nue != ''){
				$t_cuenta_correo_nue = $cuenta_correo_nue;
			}else{
				$t_cuenta_correo_nue = 'No asignado';
			}

			$texto_novedad .= "Cuenta de correo: ".$t_cuenta_correo_act." / ".$cuenta_correo_nue.", ";
		}

		if($password_correo_act != $password_correo_nue){
			$flag = 1;

			if($password_correo_act == ''){
				$password_correo_act = 'No asignado';
			}

			if($password_correo_nue == ''){
				$password_correo_nue = 'No asignado';
			}

			$texto_novedad .= "Password correo: ".$password_correo_act." / ".$password_correo_nue.", ";
		}

		if($cuenta_skype_act != $cuenta_skype_nue){
			$flag = 1;

			if($cuenta_skype_act == ''){
				$cuenta_skype_act = 'No asignado';
			}

			if($cuenta_skype_nue == ''){
				$cuenta_skype_nue = 'No asignado';
			}

			$texto_novedad .= "Cuenta de skype: ".$cuenta_skype_act." / ".$cuenta_skype_nue.", ";
		}

		if($password_skype_act != $password_skype_nue){
			$flag = 1;
			
			if($password_skype_act == ''){
				$password_skype_act = 'No asignado';
			}

			if($password_skype_nue == ''){
				$password_skype_nue = 'No asignado';
			}

			$texto_novedad .= "Password skype: ".$password_skype_act." / ".$password_skype_nue.", ";
		}

		if($usuario_siesa_act != $usuario_siesa_nue){
			$flag = 1;

			if($usuario_siesa_act == ''){
				$usuario_siesa_act = 'No asignado';
			}

			if($usuario_siesa_nue == ''){
				$usuario_siesa_nue = 'No asignado';
			}

			$texto_novedad .= "Usuario siesa: ".$usuario_siesa_act." / ".$usuario_siesa_nue.", ";
		}

		if($password_siesa_act != $password_siesa_nue){
			$flag = 1;
			
			if($password_siesa_act == ''){
				$password_siesa_act = 'No asignado';
			}

			if($password_siesa_nue == ''){
				$password_siesa_nue = 'No asignado';
			}

			$texto_novedad .= "Password siesa: ".$password_siesa_act." / ".$password_siesa_nue.", ";
		}

		if($usuario_glpi_act != $usuario_glpi_nue){
			$flag = 1;

			if($usuario_glpi_act == ''){
				$usuario_glpi_act = 'No asignado';
			}

			if($usuario_glpi_nue == ''){
				$usuario_glpi_nue = 'No asignado';
			}

			$texto_novedad .= "Usuario glpi: ".$usuario_glpi_act." / ".$usuario_glpi_nue.", ";
		}

		if($password_glpi_act != $password_glpi_nue){
			$flag = 1;
			
			if($password_glpi_act == ''){
				$password_glpi_act = 'No asignado';
			}

			if($password_glpi_nue == ''){
				$password_glpi_nue = 'No asignado';
			}

			$texto_novedad .= "Password glpi: ".$password_glpi_act." / ".$password_glpi_nue.", ";
		}

		if($usuario_papercut_act != $usuario_papercut_nue){
			$flag = 1;

			if($usuario_papercut_act == ''){
				$usuario_papercut_act = 'No asignado';
			}

			if($usuario_papercut_nue == ''){
				$usuario_papercut_nue = 'No asignado';
			}

			$texto_novedad .= "Usuario papercut: ".$usuario_papercut_act." / ".$usuario_papercut_nue.", ";
		}

		if($password_papercut_act != $password_papercut_nue){
			$flag = 1;
			
			if($password_papercut_act == ''){
				$password_papercut_act = 'No asignado';
			}

			if($password_papercut_nue == ''){
				$password_papercut_nue = 'No asignado';
			}

			$texto_novedad .= "Password papercut: ".$password_papercut_act." / ".$password_papercut_nue.", ";
		}

		if($estado_act != $estado_nue){
			$flag = 1;	

			$n_estado_act = Dominio::model()->findByPk($estado_act);
			$n_estado_nue = Dominio::model()->findByPk($estado_nue);

			$texto_novedad .= "Estado: ".$n_estado_act->Dominio." / ".$n_estado_nue->Dominio.", ";
		}

		if($cuenta_correo_red_act != $cuenta_correo_red_nue){
			$flag = 1;

			if($cuenta_correo_red_act == ''){
				$c_a = 'No asignado';
			}else{
				$n_cuenta_correo_red_act = Cuenta::model()->findByPk($cuenta_correo_red_act);
				$c_a = $n_cuenta_correo_red_act->Cuenta_Correo;
			}

			if($cuenta_correo_red_nue == ''){
				$c_n = 'No asignado';
			}else{
				$n_cuenta_correo_red_nue = Cuenta::model()->findByPk($cuenta_correo_red_nue);
				$c_n = $n_cuenta_correo_red_nue->Cuenta_Correo;
			}

			$texto_novedad .= "Cuenta de Correo para redirección: ".$c_a." / ".$c_n.", ";
		}

		if($observaciones_act != $observaciones_nue){
			$flag = 1;

			if($observaciones_act == ''){
				$observaciones_act = 'No asignado';
			}

			if($observaciones_nue == ''){
				$observaciones_nue = 'No asignado';
			}

			$texto_novedad .= "Observaciones: ".$observaciones_act." / ".$observaciones_nue.", ";
		}

		//alguno de los criterios cambio
		if($flag == 1){
			$texto_novedad = substr ($texto_novedad, 0, -2);
			$nueva_novedad = new NovedadCuenta;
			$nueva_novedad->Id_Cuenta = $id;
			$nueva_novedad->Novedades = $texto_novedad;
			$nueva_novedad->Id_Usuario_Creacion = Yii::app()->user->getState('id_user');
			$nueva_novedad->Fecha_Creacion = date('Y-m-d H:i:s');
			$nueva_novedad->save();
		}
	}*/

	public static function novedadcuenta($id, $password_act, $password_nue, $observaciones_act, $observaciones_nue, $tipo_cuenta_act, $tipo_cuenta_nue, $tipo_acceso_act, $tipo_acceso_nue, $estado_act, $estado_nue){

		$texto_novedad = "";
		$flag = 0;

		if($password_act != $password_nue){
			$flag = 1;

			$texto_novedad .= "Password: ".$password_act." / ".$password_nue.", ";
		}

		if($tipo_cuenta_act != $tipo_cuenta_nue){
			$flag = 1;	

			$n_tipo_cuenta_act = Dominio::model()->findByPk($tipo_cuenta_act);
			$n_tipo_cuenta_nue = Dominio::model()->findByPk($tipo_cuenta_nue);

			$texto_novedad .= "Tipo de cuenta: ".$n_tipo_cuenta_act->Dominio." / ".$n_tipo_cuenta_nue->Dominio.", ";
		}

		if($tipo_acceso_act != $tipo_acceso_nue){
			$flag = 1;

			if($tipo_acceso_act == 1){
				$n_tipo_acceso_act = 'GENÉRICO';	
			}

			if($tipo_acceso_act == 2){
				$n_tipo_acceso_act = 'PERSONAL';
			}

			if($tipo_acceso_nue == 1){
				$n_tipo_acceso_nue = 'GENÉRICO';
			}

			if($tipo_acceso_nue == 2){
				$n_tipo_acceso_nue = 'PERSONAL';
			}


			$texto_novedad .= "Tipo de acceso: ".$n_tipo_acceso_act." / ".$n_tipo_acceso_nue.", ";
		}

		if($estado_act != $estado_nue){
			$flag = 1;	

			$n_estado_act = Dominio::model()->findByPk($estado_act);
			$n_estado_nue = Dominio::model()->findByPk($estado_nue);

			$texto_novedad .= "Estado: ".$n_estado_act->Dominio." / ".$n_estado_nue->Dominio.", ";
		}

		if($observaciones_act != $observaciones_nue){
			$flag = 1;

			if($observaciones_act == ''){
				$observaciones_act = 'No asignado';
			}

			if($observaciones_nue == ''){
				$observaciones_nue = 'No asignado';
			}

			$texto_novedad .= "Observaciones: ".$observaciones_act." / ".$observaciones_nue.", ";
		}

		//alguno de los criterios cambio
		if($flag == 1){
			$texto_novedad = substr ($texto_novedad, 0, -2);
			$nueva_novedad = new NovedadCuenta;
			$nueva_novedad->Id_Cuenta = $id;
			$nueva_novedad->Novedades = $texto_novedad;
			$nueva_novedad->Id_Usuario_Creacion = Yii::app()->user->getState('id_user');
			$nueva_novedad->Fecha_Creacion = date('Y-m-d H:i:s');
			$nueva_novedad->save();
		}
	}

	public static function generateRandomString() {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i <= 4; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

}
