<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Modelo_Usuarios');
		$this->load->helper('url');
		$this->load->library('session');		
	}

	function index(){
		if($this->session->userdata("usuario")!=null){
			$obj=$this->session->userdata("usuario");
			if($obj->tipo=="Administrador"){
				redirect('http://localhost/tiendainstrumentos/articulo');
			}
		}
		else{
			$this->load->view('sesion/login');
		}
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