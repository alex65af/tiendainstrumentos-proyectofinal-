<?php
class Modelo_Usuarios extends CI_Model{

	function __construct(){
			parent::__construct();
			$this->load->database();
		}

	public function autenticar($correo,$password){
		$sql = "SELECT * from usuario where correo='".$correo."' and pass='".$password."'";
		$r=$this->db->query($sql);
		if($r->num_rows()>0){
			return $r->row();
		} else{
			return null;
		}
	}

}