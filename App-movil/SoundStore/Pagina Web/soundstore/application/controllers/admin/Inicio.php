<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$validacion = $this->session->has_userdata("session-mvc");
		$this->load->model('UsuariosModel');
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
	
		$api_url = "http://localhost/Apisoundstore/ObtenerUser.php";
		$response = file_get_contents($api_url);
		$data['users'] = json_decode($response);
	
		$this->load->view('admin/verUsuarios', $data);
	}

	public function openEditUsers(){
		$data['session'] = $this->session->userdata("session-mvc");
		$this->load->view('admin/editarUsuarios', $data);
	}
    
	public function editarCliente($cedula) {
		$data['session'] = $this->session->userdata("session-mvc");
		$data['cliente'] = $this->UsuariosModel->obtenerClientePorCedula($cedula);
		$this->load->view('admin/editarUsuarios', $data);
	}

	public function guardarCambiosCliente() {
		$cedula = $this->input->post('cedula');
		$nombres = $this->input->post('nombres');
		$apellidos = $this->input->post('apellidos');
		$email = $this->input->post('email');
		$telefono = $this->input->post('telefono');
		$direccion = $this->input->post('direccion');
		$estado = $this->input->post('estado');

		$resultado = $this->UsuariosModel->actualizarCliente($cedula, $nombres, $apellidos, $email, $telefono, $direccion, $estado);

		if ($resultado) {
			$this->session->set_flashdata('mensaje', 'Cambios guardados correctamente');
			$this->session->set_flashdata('tipo', 'success');
		} else {
			$this->session->set_flashdata('mensaje', 'Error al guardar los cambios');
			$this->session->set_flashdata('tipo', 'danger');
		}

		redirect('admin/inicio/openListUsers', 'refresh');
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

	public function cambiarEstadoUsuario($cedula) {   

		$actualizacion = $this->UsuariosModel->cambiarEstadoUsuario($cedula, 'INACTIVO');

		if ($actualizacion) {
			$this->session->set_flashdata('estado_cambiado', true);
			$this->session->set_flashdata('tipo', 'success');
		} else {
			
			$this->session->set_flashdata('estado_error', true);
			$this->session->set_flashdata('tipo', 'danger');
		}

		redirect('admin/inicio/openListUsers', 'refresh');
	}
}

/* End of file Inicio.php */
/* Location: ./application/controllers/admin/Inicio.php */