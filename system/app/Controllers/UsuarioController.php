<?php
header('Access-Control-Allow-Origin: *');
class Usuario extends Controllers{
	public function __construct(){
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'acceso');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function perfil(){
		//invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		//TODO: vista
		$data['page_tag'] = "Nombre de pagina";
		$data['page_title'] = "Pagina Principal";
		$data['page_name'] = "perfil";
		$data['page_functions'] = "function.usuario.js";
		$this->views->getViews($this, "perfil", $data);
	}
	/********* actualizar datos de perfil *********/
	public function updateData(){
		$srtNombre = strtoupper($_POST['txtNombre']);
		$srtApellido = strtoupper($_POST['txtApellido']);
		$srtEmail = strtoupper($_POST['txtEmail']);
		$srtTlf = $_POST['txtTelefono'];
		$idUSer = $_SESSION['userData']['user_id'];
		if(empty($_POST['txtNombre']) || empty($_POST['txtApellido'] ) || empty($_POST['txtEmail'])) {
			$arrResponse = array("status" => false, "msg" => "Campo no deben estar vacios");
		}else{
			$requestUser = $this->model->updateData($idUSer,$srtNombre,$srtApellido,$srtEmail,$srtTlf);
			if($requestUser > 0){
				$arrResponse = array("status" => true, "msg" => "Datos actualizados correctamente");
				sessionUser($_SESSION['idUser']);
			}else{
				$arrResponse = array("status" => false, "msg" => "No es posible almacenar ls datos");
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	/********* cambiar imagen de usuario *********/
	public function subirImagen(){
		$arrResponse =array();
		$archivos_permitidos = array('pdf', 'jpg', 'png', 'svg');
		// capturo las partes del nombre del archivo
		$fileData = pathinfo($_FILES['file']['name']);
		$path_info =  './storage/' . $_FILES['file']['name'];
		if(!$_FILES['file']['name'] == null){
			$max_size = 90000;
			$fileExtension = strtolower($fileData['extension']);
			if(!in_array($fileExtension, $archivos_permitidos)){
				$arrResponse = ["status" => false, "msg" => "No se acepta ese tipo de formato"];
			}elseif ($_FILES['file']['size'] > $max_size) {
				$arrResponse = ["status" => false, "msg" => "Imagen demasiado grande tamaño permitido 300x300"];
			}else{
				$arrResponse = ["status" => true, "msg" => "Hasta aqui bien"];
				$fileBase =  'storage/' . $_SESSION['userData']['user_nick'].'/';
				$fileHash = substr(md5($fileBase . uniqid(microtime() . mt_rand())), 0, 8);

				if (!file_exists($fileBase))
				mkdir($fileBase, 0777, true);
				$filePath = $fileBase . $_SESSION['idUser'].'-'. $fileHash . "." . $fileExtension;
				if(move_uploaded_file($_FILES['file']['tmp_name'], $filePath)){
					$arrResponse = ["status" => true, "msg" => "Archivo guardado con exito"];
					// $requestUser = $this->model->updateImg($_SESSION['idUser'], $fileBase.$_SESSION['idUser'].'-'. $fileHash . "." . $fileExtension);
					$requestUser = $this->model->updateImg($_SESSION['idUser'], $_SESSION['idUser'].'-'. $fileHash . "." . $fileExtension,$fileBase);
					$deleteImg = unlink($_SESSION['userData']['user_img']);
					sessionUser($_SESSION['idUser']);
				}else{
					$arrResponse = ["status" => false, "msg" => "Ah ocurrido un error al guardar"];
				}
			}
		}else{
			$arrResponse = ["status" => false, "msg" => "Ah ocurrido un error"];
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
}