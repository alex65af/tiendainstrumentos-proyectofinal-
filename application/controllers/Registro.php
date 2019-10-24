<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Modelo_Usuarios');
		$this->load->helper('url');
		$this->load->library('session');		
	}

	function index(){
		
			$this->load->view('sesion/registro');
	}

	function autenticar(){
		$usuario=$_POST['correo'];
		$password=$_POST['password'];
		$obj=$this->Modelo_Usuarios->autenticar($usuario, $password);
		if ($obj!=null) {
			$_SESSION['usuario']=$obj;
			redirect('http://localhost/tiendainstrumentos/articulo');	
		}
		else{
			redirect('http://localhost/tiendainstrumentos/login');
		}
	}

	function salir(){
		$this->session->unset_userdata('usuario');
		redirect('http://localhost/tiendainstrumentos/inicio');
	}
	
}