<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Modelo_Familias');
		$this->load->helper('url');
		$this->load->library('session');
		if($this->session->userdata("usuario")==null){
			redirect('http://localhost/tiendainstrumentos/login');}

	}

	public function index()	{
		//$data['lista']=$this->Modelo_Familias->listar();
		$this->load->view('maestra/superior');
		$this->load->view('inicio/inicio');
		$this->load->view('maestra/inferior');
	}

}

