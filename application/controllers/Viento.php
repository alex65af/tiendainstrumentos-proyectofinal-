<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viento extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Modelo_Clasificacion');
		$this->load->helper('url');
	}

	public function index(){
		$data['lista'] = $this->Modelo_Clasificacion->listarV();
		$this->load->view('maestra/superior');
		$this->load->view('familias/viento',$data);
		$this->load->view('maestra/inferior');
	}	
}