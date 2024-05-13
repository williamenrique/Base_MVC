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
		$data['page_tag'] = "Nombre de pagina";
		$data['page_title'] = "Pagina Principal";
		$data['page_name'] = "perfil";
		$data['page_functions'] = "function.usuario.js";
		$this->views->getViews($this, "perfil", $data);
	}
	public function updateImg(){
		if(!$_FILES['file']['name'] == null){
			if(!is_dir('./storage/'.$_SESSION['userData']['user_nick'])) mkdir('./storage/'.$_SESSION['userData']['user_nick']);
			$archivos_permitidos = ['jpeg', 'jpg', 'png', 'svg'];
			$max_size = 2000000;
			$fileData = pathinfo($_FILES['file']['name']);
			$fileExtension = strtolower($fileData['extension']);
			if(!in_array($fileExtension, $archivos_permitidos)){
				$arrResponse = ["status" => false, "message" => "No se acepta ese tipo de formato"];
			}elseif ($_FILES['file']['size'] > $max_size) {
				$arrResponse = ["status" => false, "message" => "Imagen demasiado grande"];
			}else{
				$idUser = 1;
				$fileBase = './storage/'.$_SESSION['userData']['user_nick'].'/';
				$fileHash = substr(md5($fileBase . uniqid(microtime() . mt_rand())), 0, 8);
				if (!file_exists($fileBase)) mkdir($fileBase, 0777, true);
				$namFile = 'Profile-'. $fileHash . "." . $fileExtension;
				$filePath = $fileBase . $namFile;
				if(move_uploaded_file($_FILES['file']['tmp_name'], $filePath)){
					$data = (!file_exists($filePath) ? [] : json_decode(file_get_contents($filePath)));
					$writable = fopen($filePath,'w');
					// insertar en la base de datos o en el archivo JSON
					$fileSize = round($_FILES['file']['size'] / 1048576, 2);
					// array_push($data , [
					// 	'idUser' => $idUser,
					// 	'file' => $namFile,
					// 	'extension' => $fileExtension,
					// 	'size' => $fileSize.' MB',
					// 	'fecha' => date('d-m-Y')
					// ]);
					fwrite($writable,json_encode($data));
					fclose($writable);
					$arrResponse = ["status" => true, "message" => "Imagen almacenada"];
				}else{
					$arrResponse = ["status" => false, "message" => "Ah ocurrido un error al guardar"];
				}
			}
		}else{
			$arrResponse = ["status" => false, "message" => "No se a cargado la imagen"];
		}

		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
	}
}