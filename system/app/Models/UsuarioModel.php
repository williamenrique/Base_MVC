<?php
class UsuarioModel extends Mysql {

	public function __construct(){
		parent::__construct();
	}
    public function updateData(int $intIdUser,string $srtNombre,string $srtApellido,string $srtEmail,string $srtTlf){
        $this->intIdUser = $intIdUser;
        $this->srtNombre  = $srtNombre ;
        $this->srtApellido  = $srtApellido ;
        $this->srtEmail  = $srtEmail ;
        $this->srtTlf = $srtTlf;
        $sql = "UPDATE table_user SET  user_nombres = ?, user_apellidos = ?, user_tlf = ? , user_email = ? WHERE user_id = $this->intIdUser";
        $arrData = array(
            $this->srtNombre,
            $this->srtApellido,
            $this->srtTlf,
            $this->srtEmail
        );
        $request = $this->update($sql,$arrData);
		return $request;
    }
    public function updateImg(int $intIdUser,string $srtImg, string $fileBase){
		$this->intIdUser = $intIdUser;
		$this->srtImg = $srtImg;
		$this->fileBase = $fileBase;
		$sql = "UPDATE table_user SET  user_img = ?, user_ruta = ? WHERE user_id = $this->intIdUser";
		$arrData = array($this->fileBase,$this->srtImg);
		$request = $this->update($sql,$arrData);
		return $request;
	}
}
