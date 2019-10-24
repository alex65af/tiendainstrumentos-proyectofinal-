<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clasificacion extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Modelo_Clasificacion');
		$this->load->model('Modelo_Familias');
		$this->load->helper('url');
		$this->load->library('session');
		if($this->session->userdata("usuario")==null){
			redirect('http://localhost/tiendainstrumentos/login');
		}
	}

	public function index()	{
		$data = array('clasificacion' => $this->Modelo_Clasificacion->listar(), 'familia' => $this->Modelo_Familias->listar());
		$this->load->view('adm/superior');
		$this->load->view('registro/clasificaciones',$data);
		$this->load->view('adm/inferior');
	}

	public function insertar(){
		$idclasificacion=$_POST['idclasificacion'];
		$idfamilia=$_POST['idfamilia'];
		$nombre=$_POST['nombre'];
		
		$archivo = 'foto';
		$config['upload_path'] = "imagen/";
		$config['file_name'] = "clasificacion";
		$config['allowed_types'] = "*";
		$this->load->library('upload', $config);
		$this->upload->do_upload($archivo);
		$foto=$this->upload->data('file_name');

		if ($idclasificacion==0) {
			$this->Modelo_Clasificacion->insertar($idfamilia, $nombre, $foto);
		}
		else{
			$this->Modelo_Clasificacion->actualizar($idclasificacion, $idfamilia, $nombre, $foto);
		}
  		redirect('http://localhost/tiendainstrumentos/clasificacion');
	}

	public function eliminar(){
		$idclasificacion=$_POST['idclasificacion'];
		$this->Modelo_Clasificacion->eliminar($idclasificacion);
		redirect('http://localhost/tiendainstrumentos/clasificacion');
	}
}
