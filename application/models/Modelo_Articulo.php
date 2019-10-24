<?php 
	class Modelo_Articulo extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function insertar($idclasificacion,$idmarca, $nombre,$precio,$descripcion,$foto){
			$sql = "INSERT into articulos(idclasificacion,idmarca, nombre, precio, descripcion, foto) values (".$idclasificacion.",".$idmarca.",'".$nombre."',".$precio.",'".$descripcion."','".$foto."')";
			$this->db->query($sql);
		}

		function actualizar($idarticulo,$idclasificacion,$idmarca, $nombre,$precio,$descripcion,$foto){
			$sql = "UPDATE articulos SET idclasificacion=".$idclasificacion.", idmarca=".$idmarca.", nombre = '".$nombre."', precio = ".$precio.", descripcion = '".$descripcion."', foto = '".$foto."' WHERE idarticulo = ".$idarticulo;
			$this->db->query($sql);
		}

		function eliminar($idarticulo){
			$sql = "DELETE FROM articulos WHERE idarticulo = ".$idarticulo;
			$this->db->query($sql);
		}

		public function getxId($id){
		$sql="SELECT * From articulos where idarticulo = ".$id;
		$r = $this->db->query($sql);
		return $r->row();	
	}

		function listar(){
			$sql="SELECT * From articulos";
			$r=$this->db->query($sql);
			return $r->result();
		}

		function listarxId($id) {
			$sql="SELECT * From articulos where idclasificacion = ".$id;
			$r=$this->db->query($sql);
			return $r->result();
		}
		

	}
?>