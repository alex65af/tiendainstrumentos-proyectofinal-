<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Percusion extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Modelo_Clasificacion');
		$this->load->helper('url');
	}

	public function index(){
		//$familia = $_GET['familia'];
		//$nombre = $_GET['nombre'];
		$data['lista'] = $this->Modelo_Clasificacion->listarP();
		//$data['name'] = $nombre;
		$this->load->view('maestra/superior');
		$this->load->view('familias/percusion',$data);
		$this->load->view('maestra/inferior');
	}	
}