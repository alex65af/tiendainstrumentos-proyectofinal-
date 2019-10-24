<?php 
	class Modelo_Clasificacion extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function insertar($idfamilia,$nombre,$foto){
			$sql = "INSERT into clasificacion(idfamilia, nombre, foto) values (".$idfamilia.",'".$nombre."','".$foto."')";
			$this->db->query($sql);
		}

		function actualizar($idclasificacion,$idfamilia, $nombre,$foto){
			$sql = "UPDATE clasificacion SET idfamilia=".$idfamilia.", nombre = '".$nombre."', foto = '".$foto."' WHERE idclasificacion = ".$idclasificacion;
			$this->db->query($sql);
		}

		function eliminar($idclasificacion){
			$sql = "DELETE FROM clasificacion WHERE idclasificacion = ".$idclasificacion;
			$this->db->query($sql);
		}

		function listar(){
			$sql="Select * From clasificacion";
			$r=$this->db->query($sql);
			return $r->result();
		}
		function listarV(){
			$sql="SELECT * from clasificacion WHERE idfamilia=3";
			$r=$this->db->query($sql);
			return $r->result();
		}
		function listarC(){
			$sql="SELECT * from clasificacion where idfamilia=1";
			$r=$this->db->query($sql);
			return $r->result();
		}
		function listarP(){
			$sql="SELECT * from clasificacion where idfamilia=2";
			$r=$this->db->query($sql);
			return $r->result();
		}
		function listarA(){
			$sql="SELECT * from clasificacion where idfamilia=4";
			$r=$this->db->query($sql);
			return $r->result();
		}

	}
?>