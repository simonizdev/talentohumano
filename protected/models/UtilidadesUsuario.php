<?php

//clase creada para funciones relacionadas con el modelo de usuario

class UtilidadesUsuario {
   
	public static function adminperfilusuario($id_user, $array) {
		$array_per_selec = array();
		foreach ($array as $clave => $valor) {
		    
		    //se busca el registro para saber si tiene que ser creado 
		    $criteria=new CDbCriteria;
			$criteria->condition='Id_Usuario=:Id_Usuario AND Id_Perfil=:Id_Perfil';
			$criteria->params=array(':Id_Usuario'=>$id_user,':Id_Perfil'=>$valor);
			$modelo_perfil_usuario=PerfilUsuario::model()->find($criteria);

			if(!is_null($modelo_perfil_usuario)){
				//si el estado es inactivo se cambia a activo, si ya esta activo no se realiza ninguna acción
				if($modelo_perfil_usuario->Estado == 0){
					$modelo_perfil_usuario->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
					$modelo_perfil_usuario->Fecha_Actualizacion = date('Y-m-d H:i:s');
					$modelo_perfil_usuario->Estado = 1;
					if($modelo_perfil_usuario->save()){
						array_push($array_per_selec, intval($valor));
					}	
				}else{
					array_push($array_per_selec, intval($valor));	
				}
			}else{
				//se debe insertar un nuevo registro en la tabla
				$nuevo_perfil_usuario = new PerfilUsuario;
			    $nuevo_perfil_usuario->Id_Usuario = $id_user;
			    $nuevo_perfil_usuario->Id_Perfil = $valor;
				$nuevo_perfil_usuario->Id_Usuario_Creacion = Yii::app()->user->getState('id_user');
				$nuevo_perfil_usuario->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
				$nuevo_perfil_usuario->Fecha_Creacion = date('Y-m-d H:i:s');
				$nuevo_perfil_usuario->Fecha_Actualizacion = date('Y-m-d H:i:s');
				$nuevo_perfil_usuario->Estado = 1;
				if($nuevo_perfil_usuario->save()){
					array_push($array_per_selec, intval($valor));
				}
			}
		}

		//se inactivan los perfiles que no vienen en el array
		$perfiles_excluidos = implode(",",$array_per_selec);
		$pe = str_replace("'", "", $perfiles_excluidos);
		$criteria=new CDbCriteria;
		$criteria->condition='Id_Usuario=:Id_Usuario AND Id_Perfil NOT IN ('.$pe.')';
		$criteria->params=array(':Id_Usuario'=>$id_user);
		$modelo_perfil_usuario_inactivar=PerfilUsuario::model()->findAll($criteria);
		if(!is_null($modelo_perfil_usuario_inactivar)){
			foreach ($modelo_perfil_usuario_inactivar as $perfiles_inactivar) {
				//si el estado es activo se cambia a inactivo, si ya esta inactivo no se realiza ninguna acción
				if($perfiles_inactivar->Estado == 1){
					$perfiles_inactivar->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
					$perfiles_inactivar->Fecha_Actualizacion = date('Y-m-d H:i:s');
					$perfiles_inactivar->Estado = 0;
					$perfiles_inactivar->save();
				}	
			}
		}
	}

	public static function adminempresausuario($id_user, $array) {
		$array_emp_selec = array();
		foreach ($array as $clave => $valor) {
		    
		    //se busca el registro para saber si tiene que ser creado 
		    $criteria=new CDbCriteria;
			$criteria->condition='Id_Usuario=:Id_Usuario AND Id_Empresa=:Id_Empresa';
			$criteria->params=array(':Id_Usuario'=>$id_user,':Id_Empresa'=>$valor);
			$modelo_empresa_usuario=EmpresaUsuario::model()->find($criteria);

			if(!is_null($modelo_empresa_usuario)){
				//si el estado es inactivo se cambia a activo, si ya esta activo no se realiza ninguna acción
				if($modelo_empresa_usuario->Estado == 0){
					$modelo_empresa_usuario->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
					$modelo_empresa_usuario->Fecha_Actualizacion = date('Y-m-d H:i:s');
					$modelo_empresa_usuario->Estado = 1;
					if($modelo_empresa_usuario->save()){
						array_push($array_emp_selec, intval($valor));
					}	
				}else{
					array_push($array_emp_selec, intval($valor));	
				}
			}else{
				//se debe insertar un nuevo registro en la tabla
				$nuevo_empresa_usuario = new EmpresaUsuario;
			    $nuevo_empresa_usuario->Id_Usuario = $id_user;
			    $nuevo_empresa_usuario->Id_Empresa = $valor;
				$nuevo_empresa_usuario->Id_Usuario_Creacion = Yii::app()->user->getState('id_user');
				$nuevo_empresa_usuario->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
				$nuevo_empresa_usuario->Fecha_Creacion = date('Y-m-d H:i:s');
				$nuevo_empresa_usuario->Fecha_Actualizacion = date('Y-m-d H:i:s');
				$nuevo_empresa_usuario->Estado = 1;
				if($nuevo_empresa_usuario->save()){
					array_push($array_emp_selec, intval($valor));
				}
			}
		}

		//se inactivan las empresas que no vienen en el array
		$empresas_excluidas = implode(",",$array_emp_selec);
		$ee = str_replace("'", "", $empresas_excluidas);

		$criteria=new CDbCriteria;
		$criteria->condition='Id_Usuario=:Id_Usuario AND Id_Empresa NOT IN ('.$ee.')';
		$criteria->params=array(':Id_Usuario'=>$id_user);
		$modelo_empresa_usuario_inactivar=EmpresaUsuario::model()->findAll($criteria);
		if(!is_null($modelo_empresa_usuario_inactivar)){
			foreach ($modelo_empresa_usuario_inactivar as $empresas_inactivar) {
				//si el estado es activo se cambia a inactivo, si ya esta inactivo no se realiza ninguna acción
				if($empresas_inactivar->Estado == 1){
					$empresas_inactivar->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
					$empresas_inactivar->Fecha_Actualizacion = date('Y-m-d H:i:s');
					$empresas_inactivar->Estado = 0;
					$empresas_inactivar->save();
				}	
			}
		}
	}

	public static function adminareausuario($id_user, $array) {
		$array_areas_selec = array();
		if(!empty($array)){

			foreach ($array as $clave => $valor) {
			    
			    //se busca el registro para saber si tiene que ser creado 
			    $criteria=new CDbCriteria;
				$criteria->condition='Id_Usuario=:Id_Usuario AND Id_Area=:Id_Area';
				$criteria->params=array(':Id_Usuario'=>$id_user,':Id_Area'=>$valor);
				$modelo_area_usuario=AreaUsuario::model()->find($criteria);

				if(!is_null($modelo_area_usuario)){
					//si el estado es inactivo se cambia a activo, si ya esta activo no se realiza ninguna acción
					if($modelo_area_usuario->Estado == 0){
						$modelo_area_usuario->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
						$modelo_area_usuario->Fecha_Actualizacion = date('Y-m-d H:i:s');
						$modelo_area_usuario->Estado = 1;
						if($modelo_area_usuario->save()){
							array_push($array_areas_selec, intval($valor));
						}	
					}else{
						array_push($array_areas_selec, intval($valor));	
					}
				}else{
					//se debe insertar un nuevo registro en la tabla
					$nueva_area_usuario = new AreaUsuario;
				    $nueva_area_usuario->Id_Usuario = $id_user;
				    $nueva_area_usuario->Id_Area = $valor;
					$nueva_area_usuario->Id_Usuario_Creacion = Yii::app()->user->getState('id_user');
					$nueva_area_usuario->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
					$nueva_area_usuario->Fecha_Creacion = date('Y-m-d H:i:s');
					$nueva_area_usuario->Fecha_Actualizacion = date('Y-m-d H:i:s');
					$nueva_area_usuario->Estado = 1;
					if($nueva_area_usuario->save()){
						array_push($array_areas_selec, intval($valor));
					}
				}
			}

			//se inactivan las areas que no vienen en el array
			$areas_excluidas = implode(",",$array_areas_selec);
			$ae = str_replace("'", "", $areas_excluidas);

			$criteria=new CDbCriteria;
			$criteria->condition='Id_Usuario=:Id_Usuario AND Id_Area NOT IN ('.$ae.')';
			$criteria->params=array(':Id_Usuario'=>$id_user);
			$modelo_area_usuario_inactivar=AreaUsuario::model()->findAll($criteria);
			if(!is_null($modelo_area_usuario_inactivar)){
				foreach ($modelo_area_usuario_inactivar as $areas_inactivar) {
					//si el estado es activo se cambia a inactivo, si ya esta inactivo no se realiza ninguna acción
					if($areas_inactivar->Estado == 1){
						$areas_inactivar->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
						$areas_inactivar->Fecha_Actualizacion = date('Y-m-d H:i:s');
						$areas_inactivar->Estado = 0;
						$areas_inactivar->save();
					}	
				}
			}
		}else{
			//si el array llega vacio se inactivan todos los registros que esten activos 
		    $criteria=new CDbCriteria;
			$criteria->condition='Id_Usuario=:Id_Usuario AND Estado = 1';
			$criteria->params=array(':Id_Usuario'=>$id_user);
			$modelo_area_usuario=AreaUsuario::model()->findAll($criteria);
			if(!is_null($modelo_area_usuario)){
				foreach ($modelo_area_usuario as $areas_act) {
					$areas_act->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
					$areas_act->Fecha_Actualizacion = date('Y-m-d H:i:s');
					$areas_act->Estado = 0;
					$areas_act->save();
		
				}
			}
		}
	}

	public static function adminsubareausuario($id_user, $array) {
		$array_subareas_selec = array();
		if(!empty($array)){

			foreach ($array as $clave => $valor) {
			    
			    //se busca el registro para saber si tiene que ser creado 
			    $criteria=new CDbCriteria;
				$criteria->condition='Id_Usuario=:Id_Usuario AND Id_Subarea=:Id_Subarea';
				$criteria->params=array(':Id_Usuario'=>$id_user,':Id_Subarea'=>$valor);
				$modelo_subarea_usuario=SubareaUsuario::model()->find($criteria);

				if(!is_null($modelo_subarea_usuario)){
					//si el estado es inactivo se cambia a activo, si ya esta activo no se realiza ninguna acción
					if($modelo_subarea_usuario->Estado == 0){
						$modelo_subarea_usuario->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
						$modelo_subarea_usuario->Fecha_Actualizacion = date('Y-m-d H:i:s');
						$modelo_subarea_usuario->Estado = 1;
						if($modelo_subarea_usuario->save()){
							array_push($array_subareas_selec, intval($valor));
						}	
					}else{
						array_push($array_subareas_selec, intval($valor));	
					}
				}else{
					//se debe insertar un nuevo registro en la tabla
					$nueva_subarea_usuario = new SubareaUsuario;
				    $nueva_subarea_usuario->Id_Usuario = $id_user;
				    $nueva_subarea_usuario->Id_Subarea = $valor;
					$nueva_subarea_usuario->Id_Usuario_Creacion = Yii::app()->user->getState('id_user');
					$nueva_subarea_usuario->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
					$nueva_subarea_usuario->Fecha_Creacion = date('Y-m-d H:i:s');
					$nueva_subarea_usuario->Fecha_Actualizacion = date('Y-m-d H:i:s');
					$nueva_subarea_usuario->Estado = 1;
					if($nueva_subarea_usuario->save()){
						array_push($array_subareas_selec, intval($valor));
					}
				}
			}

			//se inactivan las areas que no vienen en el array
			$subareas_excluidas = implode(",",$array_subareas_selec);
			$se = str_replace("'", "", $subareas_excluidas);

			$criteria=new CDbCriteria;
			$criteria->condition='Id_Usuario=:Id_Usuario AND Id_Subarea NOT IN ('.$se.')';
			$criteria->params=array(':Id_Usuario'=>$id_user);
			$modelo_subarea_usuario_inactivar=SubareaUsuario::model()->findAll($criteria);
			if(!is_null($modelo_subarea_usuario_inactivar)){
				foreach ($modelo_subarea_usuario_inactivar as $subareas_inactivar) {
					//si el estado es activo se cambia a inactivo, si ya esta inactivo no se realiza ninguna acción
					if($subareas_inactivar->Estado == 1){
						$subareas_inactivar->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
						$subareas_inactivar->Fecha_Actualizacion = date('Y-m-d H:i:s');
						$subareas_inactivar->Estado = 0;
						$subareas_inactivar->save();
					}	
				}
			}
		}else{
			//si el array llega vacio se inactivan todos los registros que esten activos 
		    $criteria=new CDbCriteria;
			$criteria->condition='Id_Usuario=:Id_Usuario AND Estado = 1';
			$criteria->params=array(':Id_Usuario'=>$id_user);
			$modelo_subarea_usuario=SubareaUsuario::model()->findAll($criteria);
			if(!is_null($modelo_subarea_usuario)){
				foreach ($modelo_subarea_usuario as $subareas_act) {
					$subareas_act->Id_Usuario_Actualizacion = Yii::app()->user->getState('id_user');
					$subareas_act->Fecha_Actualizacion = date('Y-m-d H:i:s');
					$subareas_act->Estado = 0;
					$subareas_act->save();
		
				}
			}	
		}
	}

	public static function perfilesactivos($id_user) {
		//opciones activas en el combo perfiles
		$criteria=new CDbCriteria;
		$criteria->condition='Id_Usuario=:Id_Usuario AND Estado=:Estado';
		$criteria->params=array(':Id_Usuario'=>$id_user,':Estado'=> 1);
		$array_per_activos = array();
		$perfiles_activos=PerfilUsuario::model()->findAll($criteria);
		foreach ($perfiles_activos as $perf_act) {
			array_push($array_per_activos, $perf_act->Id_Perfil);
		}

		return json_encode($array_per_activos);
	}

	public static function empresasactivas($id_user) {
		//opciones activas en el combo empresas
		$criteria=new CDbCriteria;
		$criteria->condition='Id_Usuario=:Id_Usuario AND Estado=:Estado';
		$criteria->params=array(':Id_Usuario'=>$id_user,':Estado'=> 1);
		$array_emp_activas = array();
		$empresas_activas=EmpresaUsuario::model()->findAll($criteria);
		foreach ($empresas_activas as $empr_act) {
			array_push($array_emp_activas, $empr_act->Id_Empresa);
		}

		return json_encode($array_emp_activas);
	}

	public static function areasactivas($id_user) {
		//opciones activas en el combo áreas
		$criteria=new CDbCriteria;
		$criteria->condition='Id_Usuario=:Id_Usuario AND Estado=:Estado';
		$criteria->params=array(':Id_Usuario'=>$id_user,':Estado'=> 1);
		$array_ar_activas = array();
		$areas_activas=AreaUsuario::model()->findAll($criteria);
		foreach ($areas_activas as $area_act) {
			array_push($array_ar_activas, $area_act->Id_Area);
		}

		return json_encode($array_ar_activas);
	}

	public static function subareasactivas($id_user) {
		//opciones activas en el combo subáreas
		$criteria=new CDbCriteria;
		$criteria->condition='Id_Usuario=:Id_Usuario AND Estado=:Estado';
		$criteria->params=array(':Id_Usuario'=>$id_user,':Estado'=> 1);
		$array_subareas_activas = array();
		$subareas_activas=SubareaUsuario::model()->findAll($criteria);
		foreach ($subareas_activas as $subarea_act) {
			array_push($array_subareas_activas, $subarea_act->Id_Subarea);
		}

		return json_encode($array_subareas_activas);
	}

}
