<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('MUsuario');
		$this->load->helper('url');
		$this->load->library('session');
		if($this->session->userdata("usuario")==null){
			redirect('http://localhost/tiendainstrumentos/login');}
	}
	public function index()	{
		$this->load->view('maestra/superior');
		$this->load->view('usuario/index');
		$this->load->view('maestra/inferior');
	}
	public function listar(){
		$lista=$this->MUsuario->seleccionar();
		echo json_encode($lista);
	}
	public function insertar(){
		$archivo = 'foto';
		$config['upload_path'] = "imagen/";
		$config['file_name'] = "foto";
		$config['allowed_types'] = "*";
		$this->load->library('upload', $config);
		$this->upload->do_upload($archivo);
		$foto=$this->upload->data('file_name');
		$this->MUsuario->insertar($_POST["nombre"],$_POST["correo"],$_POST["password"],"usuario","activo",$foto,$_POST["tarjeta"]);
	}
}