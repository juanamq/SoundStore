<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$validacion = $this->session->has_userdata("session-mvc");
		if ($validacion) {
			$session = $this->session->userdata("session-mvc");
			if ($session['tipo']=="ADMIN" && $session['estado']=="ACTIVO") {
				return false;
			}else{
				redirect('Login/cerrarSession','refresh');
				die();
			}
		}else{
			redirect('Login/cerrarSession','refresh');
			die();
		}
	}

	public function index(){
		$data['session'] = $this->session->userdata("session-mvc");
		$this->load->view('admin/inicio', $data);
	}

	public function openCreateUser(){
		$data['session'] = $this->session->userdata("session-mvc");
		$this->load->view('admin/crearUsuario', $data);
	}

	// public function openListUsers() {
	// 	$data['session'] = $this->session->userdata("session-mvc");
	// 	$this->load->model('PersonasModel'); // Asegúrate de cargar el modelo
	// 	$data['users'] = $this->PersonasModel->getListaPersonas(); // Recupera los usuarios desde el modelo
	// 	$this->load->view('admin/verUsuarios', $data);
	// }
	
	public function openListUsers() {
		$data['session'] = $this->session->userdata("session-mvc");
	
		$api_url = "http://localhost/apIsoundstore/ObtenerUser.php";
		$response = file_get_contents($api_url);
		$data['users'] = json_decode($response);
	
		$this->load->view('admin/verUsuarios', $data);
	}

	public function openEditUsers(){
		$data['session'] = $this->session->userdata("session-mvc");
		$this->load->view('admin/editarUsuarios', $data);
	}

	public function openListVentas() {
        $data['session'] = $this->session->userdata("session-mvc");

        // Obtener datos de la API
        $api_url = "http://localhost/apIsoundstore/ObtenerHistoVentas.php";
        $response = file_get_contents($api_url);
        $data['ventas'] = json_decode($response)->registro_histo_ventas;

        // Cargar vista con datos
        $this->load->view('admin/historialVentas', $data);
    }
}

/* End of file Inicio.php */
/* Location: ./application/controllers/admin/Inicio.php */