<?php
header('Access-Control-Allow-Origin: *');
class Acceso extends Controllers{
	public function __construct(){
		session_start();
		if (isset($_SESSION['login'])) {
			header("Location:".base_url().'home');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function acceso(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		//TODO: vista
		$data['page_tag'] = "Nombre de pagina";
		$data['page_title'] = "Pagina Principal";
		$data['page_name'] = "acceso";
		$data['page_functions'] = "function.login.js";
		$this->views->getViews($this, "acceso", $data);
	}
	/********* acceder en el login *********/
	public function getAcceso(){
		if($_POST){
			if(empty($_POST['txtUser']) || empty($_POST['txtPass'])){
				$arrResponse = array('status' => false, 'msg' => 'Debe llenar los campos');
			}else{
				$strUser = strtolower($_POST['txtUser']);
				$strPass = encryption($_POST['txtPass']);
				$requestUser = $this->model->loginUser($strUser,$strPass);
				if(empty($requestUser)){
					$arrResponse = array('status' => false, 'msg' => 'El usuario o el password es incorrecto');
				}else{
					$arrData = $requestUser;
					if ($arrData['user_status'] == 1) {
						$_SESSION['idUser'] = $arrData['user_id'];
						$_SESSION['login'] = true;
						$arrData = $this->model->sessionLogin($_SESSION['idUser']);
						//creamos la variable de sesion mediante un helper
						sessionUser($_SESSION['idUser']);
						$strCodigo = "biCod-".$_SESSION['userData']['user_id']."-".codGenerator();
						$_SESSION['strCodigo'] = $strCodigo;
						$fecha = date('Y-m-d');
						$strHoraInicio = date("g:i a");
						// setTimeline($_SESSION['idUser'],$strCodigo,$fecha,$strHoraInicio);
						$arrResponse = array('status' => true, 'msg' => 'ok');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'El usuario inactivo');
					}
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}