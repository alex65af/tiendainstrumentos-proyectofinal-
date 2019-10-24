<?php 
	class Modelo_Marca extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function insertar($nombre){
			$sql = "INSERT into marca(nombre) values ('".$nombre."')";
			$this->db->query($sql);
		}

		function actualizar($idmarca, $nombre){
			$sql = "UPDATE marca SET nombre = '".$nombre."' WHERE idmarca = ".$idmarca;
			$this->db->query($sql);
		}

		function eliminar($idmarca){
			$sql = "DELETE FROM marca WHERE idmarca = ".$idmarca;
			$this->db->query($sql);
		}

		function listar(){
			$sql="Select * From marca";
			$r=$this->db->query($sql);
			return $r->result();
		}

	}
?>