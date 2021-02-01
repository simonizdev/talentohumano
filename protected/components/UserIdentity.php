<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

  const ERROR_USERNAME_NOT_FOUND = 3;
  const ERROR_USERNAME_INACTIVE = 4;
  const ERROR_PASSWORD_NO_VALID = 5;
  const ERROR_PERFILES_NOT_FOUND = 6;
  const ERROR_EMPRESAS_NOT_FOUND = 7;

	public function authenticate()
	{
		//se busca el registro en usuarios
		$modelousuario=Usuario::model()->findByAttributes(array('Usuario'=>$this->username));

    if (is_null($modelousuario)) {
      //no se encontro usuario
        $this->errorCode=self::ERROR_USERNAME_NOT_FOUND;
    } else if ($modelousuario->Estado == 0) {
        //usuario inactivo
        $this->errorCode=self::ERROR_USERNAME_INACTIVE;
    } else if ($modelousuario->Password !== sha1($this->password)) {
        //password incorrecto
        $this->errorCode=self::ERROR_PASSWORD_NO_VALID;
    } else {
      //usuario valido

      //permisos para actualizar registros
      $permiso_act = false;

      //se verifica si el usuario esta autorizado a ver información de log de contratos y salarios
      $usuario_updth=UsuarioUpdTh::model()->findByAttributes(array("Id_Upd_Th" => 1, "Id_Usuario" => $modelousuario->Id_Usuario, "Estado" => 1));

      if(is_null($usuario_updth)){
        $upd_th = false;
      }else{
        $upd_th = true;
      }

      //se verifica cuantos perfiles tiene asociado el usuario
      $criteria = new CDbCriteria;
      $criteria->join ='LEFT JOIN TH_PERFIL p ON t.Id_Perfil = p.Id_Perfil';
      $criteria->condition = 't.Id_Usuario = :Id_Usuario AND t.Estado = :Estado';
      $criteria->order = 'p.Descripcion';
      $criteria->params = array(":Id_Usuario" => $modelousuario->Id_Usuario, ":Estado" => 1);
      $perfiles_usuario=PerfilUsuario::model()->findAll($criteria);

      $num_perf=0;
      foreach ($perfiles_usuario as $pu) {
        if($pu->idperfil->Estado != 0){
          $num_perf++;
        }
      }

      //se verifica cuantas empresas tiene asociado el usuario
      $criteria = new CDbCriteria;
      $criteria->join ='LEFT JOIN TH_EMPRESA e ON t.Id_Empresa = e.Id_Empresa';
      $criteria->condition = 't.Id_Usuario = :Id_Usuario AND t.Estado = :Estado';
      $criteria->order = 'e.Descripcion';
      $criteria->params = array(":Id_Usuario" => $modelousuario->Id_Usuario, ":Estado" => 1);
      $empresas_usuario=EmpresaUsuario::model()->findAll($criteria);

      $num_empr=0;
      foreach ($empresas_usuario as $eu) {
        if($eu->idempresa->Estado != 0){
          $num_empr++;
        }
      }

      //se verifica cuantas areas tiene asociado el usuario
      $criteria = new CDbCriteria;
      $criteria->join ='LEFT JOIN TH_AREA a ON t.Id_Area = a.Id_Area';
      $criteria->condition = 't.Id_Usuario = :Id_Usuario AND t.Estado = :Estado';
      $criteria->order = 'a.Area';
      $criteria->params = array(":Id_Usuario" => $modelousuario->Id_Usuario, ":Estado" => 1);
      $areas_usuario=AreaUsuario::model()->findAll($criteria);

      //se verifica cuantas subareas tiene asociado el usuario
      $criteria = new CDbCriteria;
      $criteria->join ='LEFT JOIN TH_SUBAREA s ON t.Id_Subarea = s.Id_Subarea';
      $criteria->condition = 't.Id_Usuario = :Id_Usuario AND t.Estado = :Estado';
      $criteria->order = 's.Subarea';
      $criteria->params = array(":Id_Usuario" => $modelousuario->Id_Usuario, ":Estado" => 1);
      $subareas_usuario=SubareaUsuario::model()->findAll($criteria);

      
      if ($num_perf == 0){
        //usuario sin perfiles asociados o perfiles asociados inactivos
        $this->errorCode=self::ERROR_PERFILES_NOT_FOUND;
      } else if ($num_empr == 0) {
        //usuario sin empresas asociadas o empresas asociadas inactivos
        $this->errorCode=self::ERROR_EMPRESAS_NOT_FOUND; 
      } else if ($num_empr  > 0) {

        //el usuario solo tiene una empresa asociada o tiene varias

        $array_empresas = array();
        foreach ($empresas_usuario as $e) {
          if($e->idempresa->Estado != 0){
              array_push($array_empresas, $e->Id_Empresa);
          } 
        }

        $array_perfiles = array();
        foreach ($perfiles_usuario as $p) {
          if($p->idperfil->Estado != 0){
              array_push($array_perfiles, $p->Id_Perfil);
              if($p->idperfil->Modificacion_Reg != 0){
                $permiso_act = true; 
              }
          } 
        }

        $array_areas = array();
        foreach ($areas_usuario as $a) {
          if($a->idarea->Estado != 0){
              array_push($array_areas, $a->Id_Area);
          } 
        }

        $array_subareas = array();
        foreach ($subareas_usuario as $s) {
          if($s->idsubarea->Estado != 0){
              array_push($array_subareas, $s->Id_Subarea);
          } 
        }

        $this->setState('id_user', $modelousuario->Id_Usuario);
        $this->setState('name_user', $modelousuario->Nombres);
        $this->setState('username_user', $modelousuario->Usuario);
        $this->setState('email_user', $modelousuario->Correo);
        $this->setState('array_empresas', $array_empresas);
        $this->setState('array_perfiles', $array_perfiles);
        $this->setState('array_areas', $array_areas);
        $this->setState('array_subareas', $array_subareas);
        $this->setState('permiso_act', $permiso_act);
        $this->setState('niv_det_vis_emp', $modelousuario->Id_Niv_Det_Emp);
        $this->setState('upd_th', $upd_th);
        $this->errorCode=self::ERROR_NONE;

      }
    }

    return $this->errorCode;
	}
}