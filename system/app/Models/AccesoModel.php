<?php
class AccesoModel extends Mysql {

	public function __construct(){
		parent::__construct();
	}

	public function loginUser(string $txtUser, string $txtPass){
		$this->strTxtUser = $txtUser;
		$this->strTxtPass = $txtPass;
		$sql = "SELECT * FROM table_user WHERE (user_email = '$this->strTxtUser' OR user_nick = '$this->strTxtUser') AND  user_pass = '$this->strTxtPass' AND user_status != 0";
		$request = $this->select($sql);
		return $request;
	}
	public function sessionLogin(int $intIdUser){
		$this->intIdUser = $intIdUser;
		$sql = "SELECT  p.user_ci,p.user_nick, p.user_id,p.user_nombres,p.user_pass,p.user_apellidos,p.user_tlf,p.user_img,p.user_email, p.user_status,r.rol_id,r.rol_name FROM table_user p INNER JOIN table_roles r ON p.user_rol = r.rol_id WHERE p.user_id = $this->intIdUser";
		$request = $this->select($sql);
		$_SESSION['userData'] = $request;
		return $request;
	}
}