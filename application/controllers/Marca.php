<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Modelo_Marca');
		$this->load->helper('url');
		$this->load->library('session');
		if($this->session->userdata("usuario")==null){
			redirect('http://localhost/tiendainstrumentos/login');
		}
	}

	public function index()	{
		$data['marca']=$this->Modelo_Marca->listar();
		$this->load->view('adm/superior');
		$this->load->view('registro/marcas',$data);
		$this->load->view('adm/inferior');
	}

	public function insertar(){
		$idmarca=$_POST['idmarca'];
		$nombre=$_POST['nombre'];
		
		
		if ($idmarca==0) {
			$this->Modelo_Marca->insertar($nombre);
		}
		else{
			$this->Modelo_Marca->actualizar($idmarca, $nombre);
		}
  		redirect('http://localhost/tiendainstrumentos/marca');
	}

	public function eliminar(){
		$idmarca=$_POST['idmarca'];
		$this->Modelo_Marca->eliminar($idmarca);
		redirect('http://localhost/tiendainstrumentos/marca');
	}
}
