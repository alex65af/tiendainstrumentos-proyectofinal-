<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Familias extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Modelo_Familias');
		$this->load->helper('url');
		
	}

	public function index(){
		$data = array('familias' => $this->Modelo_Familias->listar());
		$this->load->view('maestra/superior');
		$this->load->view('familias/index',$data);
		$this->load->view('maestra/inferior');
	}	

}