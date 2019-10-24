<?php
class MUsuario extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function autenticar($usuario,$password){
		$sql = "Select * from usuario where usuario='".$usuario."' and pass='".$password."'";
		$r=$this->db->query($sql);
		if ($r->num_rows()>0)
		{
			return $r->row();
		}
		else
		{
			return null;
		}
	}
	public function seleccionar(){
		$sql="Select * from usuario";
		$r=$this->db->query($sql);
		return $r->result();
	}
	public function insertar($nombre,$correo,$pass,$tipo,$estado,$foto,$tarjeta){
		$sql="insert into usuario(nombre,correo,pass,tipo,estado,foto,tarjeta)values('".$nombre."','".$correo."','".$pass."','".$tipo."','".$estado."','".$foto."','".$tarjeta."')";
		$this->db->query($sql);
	}
}