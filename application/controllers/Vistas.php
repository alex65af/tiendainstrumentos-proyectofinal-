<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vistas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Modelo_Articulo');
		$this->load->model('Modelo_Clasificacion');
		$this->load->model('Modelo_Marca');
		$this->load->helper('url');
		$this->load->library('session');
		if($this->session->userdata("usuario")==null){
			redirect('http://localhost/tiendainstrumentos/login');
		}
	}

	public function index() {
		$id=$_POST['id'];
		$data['lista']=$this->Modelo_Articulo->listarxId($id);
		$this->load->view('maestra/superior');
		$this->load->view('familias/vista',$data);
		$this->load->view('maestra/inferior');
	}

	public function getxId(){
		$id=$_GET['idarticulo'];
		$articulo=$this->Modelo_Articulo->getxId($id);
		echo json_encode($articulo);
	}

	public function insertar(){
		$idarticulo=$_POST['idarticulo'];
		$idclasificacion=$_POST['idclasificacion'];
		$idmarca=$_POST['idmarca'];
		$nombre=$_POST['nombre'];
		$precio=$_POST['precio'];
		$descripcion=$_POST['descripcion'];

	/*	$archivo = 'foto';
		$config['upload_path'] = "/tiendainstrumentos/imagen/";
		$config['file_name'] = "foto";
		$config['allowed_types'] = "*";
		$this->load->library('upload', $config);
		$this->upload->do_upload($archivo);
		$foto=$this->upload->data('file_name');
*/
		

		//Convertimos la información de la imagen en binario para insertarla en la BBDD
	$imagenBinaria = addslashes(file_get_contents($_FILES['foto']['tmp_name']));

	//Nombre del archivo
	$nombreArchivo = $_FILES['foto']['name'];

	//Extensiones permitidas
	$extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

	//Obtenemos la extensión (en minúsculas) para poder comparar
	$extension = strtolower(end(explode('.', $nombreArchivo)));
	
	//Verificamos que sea una extensión permitida, si no lo es mostramos un mensaje de error
	if(!in_array($extension, $extensiones)) {
		die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
	} else {
		//Si la extensión es correcta, procedemos a comprobar el tamaño del archivo subido
		//Y definimos el máximo que se puede subir
		//Por defecto el máximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 'upload_max_filesize' en el php.ini

		$tamañoArchivo = $_FILES['foto']['size']; //Obtenemos el tamaño del archivo en Bytes
		$tamañoArchivoKB = round(intval(strval( $tamañoArchivo / 1024 ))); //Pasamos el tamaño del archivo a KB

		$tamañoMaximoKB = "2048"; //Tamaño máximo expresado en KB
		$tamañoMaximoBytes = $tamañoMaximoKB * 1024; // -> 2097152 Bytes -> 2 MB

		//Comprobamos el tamaño del archivo, y mostramos un mensaje si es mayor al tamaño expresado en Bytes
		if($tamañoArchivo > $tamañoMaximoBytes) {
			die( "El archivo ".$nombreArchivo." es demasiado grande. El tamaño máximo del archivo es de ".$tamañoMaximoKB."Kb." );
		} else {
			//Si el tamaño es correcto, subimos los datos
			//$consulta = "INSERT INTO mmv002 (titulo, descripcion, imagen) VALUES ('$titulo', '$descripcion', '$imagenBinaria')";
		if ($idarticulo==0) {
			$this->Modelo_Articulo->insertar($idclasificacion, $idmarca, $nombre, $precio, $descripcion, $imagenBinaria);
		}
		else{
			$this->Modelo_Articulo->actualizar($idarticulo, $idclasificacion, $idmarca, $nombre, $precio, $descripcion, $imagenBinaria);
		}
 
	}
}
}

	public function eliminar(){
		$this->Modelo_Articulo->eliminar($_POST['idarticulo']);
	}

	public function listar(){
		$lista=$this->Modelo_Articulo->listar();
		echo json_encode($lista);
	}
}
