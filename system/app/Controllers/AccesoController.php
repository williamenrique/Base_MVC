<?php
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
		$data['page_tag'] = "Nombre de pagina";
		$data['page_title'] = "Pagina Principal";
		$data['page_name'] = "acceso";
		$data['page_functions'] = "function.login.js";
		$this->views->getViews($this, "acceso", $data);
	}
}