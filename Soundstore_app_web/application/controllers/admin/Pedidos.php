<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {
	
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

	public function openCreatePedidos(){
		$data['session'] = $this->session->userdata("session-mvc");
		$this->load->view('admin/crearUsuario', $data);
	}

	// public function openListPedidos() {
	// 	$data['session'] = $this->session->userdata("session-mvc");
	// 	$this->load->model('PersonasModel'); // Asegúrate de cargar el modelo
	// 	$data['Pedidos'] = $this->PersonasModel->getListaPersonas(); // Recupera los usuarios desde el modelo
	// 	$this->load->view('admin/verUsuarios', $data);
	// }
	

	public function openEditPedidos(){
		$data['session'] = $this->session->userdata("session-mvc");
		$this->load->view('admin/editarUsuarios', $data);
	}

	public function openListPedidos() {
        $data['session'] = $this->session->userdata("session-mvc");

        // Obtener datos de la API
        $api_url = "http://localhost/apIsoundstore/ObtenerPedidos.php";
        $response = file_get_contents($api_url);
        $data['pedidos'] = json_decode($response)->registro_pedidos;

        // Cargar vista con datos
        $this->load->view('admin/historialPedidos', $data);
    }
}

/* End of file Inicio.php */
/* Location: ./application/controllers/admin/Inicio.php */