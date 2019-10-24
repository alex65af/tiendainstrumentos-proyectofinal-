<?php 
	class Modelo_Familias extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function listar(){
			$sql="SELECT * from familias";
			$r=$this->db->query($sql);
			return $r->result();
		}
		

	}
?>