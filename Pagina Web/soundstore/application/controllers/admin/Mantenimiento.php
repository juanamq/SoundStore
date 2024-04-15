<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenimiento extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $validacion = $this->session->has_userdata("session-mvc");
        if ($validacion) {
            $session = $this->session->userdata("session-mvc");
            if ($session['tipo']=="ADMIN" && $session['estado']=="ACTIVO") {
                return false;
            } else {
                redirect('Login/cerrarSession','refresh');
                die();
            }
        } else {
            redirect('Login/cerrarSession','refresh');
            die();
        }

    }

    public function index(){
		$data['session'] = $this->session->userdata("session-mvc");
		$this->load->view('admin/inicio', $data);
	}

    public function openListMantenimientos() {
        $data['session'] = $this->session->userdata("session-mvc");
        $this->load->model('ManteModel');
        $data['mantenimientos'] = $this->ManteModel->obtenerMantenimiento();
        $this->load->view('admin/verMantenimiento', $data);
    }

    public function openEditMantenimientos($id_mantenimiento) {
        $data['session'] = $this->session->userdata("session-mvc");
        $this->load->model('ManteModel');
        $data['mantenimiento'] = $this->ManteModel->getProductoPorId($id_mantenimiento);
        $this->load->view('admin/editarMante', $data);
    }
    
    
    public function updateMantenimiento($id_mantenimiento) {
        $estado = $this->input->post('nuevo_estado');
    
        if ($estado != "") {
            $this->load->model('ManteModel');
            
            $resultado = $this->ManteModel->actualizarMantenimiento($id_mantenimiento, $estado);
            
            if ($resultado) {
                $_SESSION['mensaje'] = 'Se ha actualizado el mantenimiento correctamente';
                $_SESSION['tipo'] = 'success';
                redirect('admin/Mantenimiento/openListMantenimientos', 'refresh');
            } else {
                $_SESSION['mensaje'] = 'Ocurrió un error en el servidor';
                $_SESSION['tipo'] = 'danger';
                redirect('admin/Mantenimiento/openListMantenimientos', 'refresh');
            }
        } else {
            $_SESSION['mensaje'] = 'Por favor complete todos los campos obligatorios';
            $_SESSION['tipo'] = 'danger';
            redirect('admin/Mantenimiento/openListMantenimientos', 'refresh');
        }
    }
    
    public function deleteMantenimiento($id_mantenimiento) {
        $this->load->model('ManteModel');
        $resultado = $this->ManteModel->cambiarEstadoMantenimiento($id_mantenimiento, 'INACTIVO');
        if ($resultado) {
            $_SESSION['mensaje'] = 'Se ha cambiado el estado del mantenimiento correctamente';
            $_SESSION['tipo'] = 'success';
        } else {
            $_SESSION['mensaje'] = 'Ocurrió un error al cambiar el estado del mantenimiento';
            $_SESSION['tipo'] = 'danger';
        }
        redirect('admin/Mantenimiento/openListMantenimientos', 'refresh');
    }
    
    public function activateMantenimiento($id_mantenimiento) {
        $this->load->model('ManteModel');
        $resultado = $this->ManteModel->cambiarEstadoMantenimiento($id_mantenimiento, 'ACTIVO');
        if ($resultado) {
            $_SESSION['mensaje'] = 'Se ha activado el mantenimiento correctamente';
            $_SESSION['tipo'] = 'success';
        } else {
            $_SESSION['mensaje'] = 'Ocurrió un error al activar el mantenimiento';
            $_SESSION['tipo'] = 'danger';
        }
        redirect('admin/Mantenimiento/openListMantenimientos', 'refresh');
    }
    
}
