<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instrumento extends CI_Controller {

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

	public function openCreateInstrumentos(){
		$data['session'] = $this->session->userdata("session-mvc");
		$this->load->view('admin/crearInstrumento', $data);
	}

    public function openListInstrumentos() {
        $data['session'] = $this->session->userdata("session-mvc");
        $this->load->model('InstrumentosModel');
        $data['instrumentos'] = $this->InstrumentosModel->obtenerInstrumentos();
        $this->load->view('admin/verInstrumentos', $data);
    }

	// public function openListInstrumentos() {
    //     $data['session'] = $this->session->userdata("session-mvc");

    //     $api_url = "http://localhost/APIsoundstore/obtenerInstrumentos.php";
    //     $response = file_get_contents($api_url);
    //     $data['instrumentos'] = json_decode($response)->registros_intrumentos;

    //     $this->load->view('admin/verInstrumentos', $data);
    // }

    public function createInstrumento(){
        $nombre = $this->input->post('nuevo_nombre');
        $marca = $this->input->post('nuevo_marca');
        $stock = $this->input->post('nuevo_stock');
        $foto = $this->input->post('nuevo_foto');
        $tipo = $this->input->post('nuevo_tipo');
        $color = $this->input->post('nuevo_color');
        $modelo = $this->input->post('nuevo_modelo');
        $precio = $this->input->post('nuevo_precio');
        $fecha_registro = date('Y-m-d');
    
        if ($nombre != "" && $marca != "" && $stock != "" && $tipo != "" && $precio != "") {
            $this->load->model('InstrumentosModel');
            
            $resultado = $this->InstrumentosModel->insertarInstrumento($nombre, $marca, $stock, $foto, $tipo, $color, $modelo, $precio, $fecha_registro);
    
            if ($resultado) {
                $_SESSION['mensaje'] = 'Se ha creado el instrumento correctamente';
                $_SESSION['tipo'] = 'success';
                redirect('admin/Instrumento/openListInstrumentos', 'refresh');
            } else {
                $_SESSION['mensaje'] = 'Ocurrió un error en el servidor';
                $_SESSION['tipo'] = 'danger';
                redirect('admin/Instrumento/openListInstrumentos', 'refresh');
            }
        } else {
            $_SESSION['mensaje'] = 'Por favor complete todos los campos obligatorios';
            $_SESSION['tipo'] = 'danger';
            redirect('admin/Instrumento/openListInstrumentos', 'refresh');
        }
    }


    public function openEditInstrumentos($id_instrumento) {
        $data['session'] = $this->session->userdata("session-mvc");
        $this->load->model('InstrumentosModel');
        $data['instrumento'] = $this->InstrumentosModel->getProductoPorId($id_instrumento);
        $this->load->view('admin/editarInstru', $data);
    }
    
    public function updateInstrumento($id_instrumento) {
        $nombre = $this->input->post('nuevo_nombre');
        $marca = $this->input->post('nuevo_marca');
        $stock = $this->input->post('nuevo_stock');
        $precio = $this->input->post('nuevo_precio');
        $color = $this->input->post('nuevo_color');
        $modelo = $this->input->post('nuevo_modelo');
        $fecha_registro = $this->input->post('fecha_ingreso');
        $tipo = $this->input->post('nuevo_tipo');
        $foto = $this->input->post('nuevo_foto');
    
        if ($nombre != "" && $marca != "" && $stock != "" && $tipo != "" && $precio != "") {
            $this->load->model('InstrumentosModel');
            
            $resultado = $this->InstrumentosModel->actualizarInstrumento($id_instrumento, $nombre, $marca, $stock, $foto, $tipo, $color, $modelo, $precio, $fecha_registro);
            
            if ($resultado) {
                $_SESSION['mensaje'] = 'Se ha actualizado el instrumento correctamente';
                $_SESSION['tipo'] = 'success';
                redirect('admin/Instrumento/openListInstrumentos', 'refresh');
            } else {
                $_SESSION['mensaje'] = 'Ocurrió un error en el servidor';
                $_SESSION['tipo'] = 'danger';
                redirect('admin/Instrumento/openListInstrumentos', 'refresh');
            }
        } else {
            $_SESSION['mensaje'] = 'Por favor complete todos los campos obligatorios';
            $_SESSION['tipo'] = 'danger';
            redirect('admin/Instrumento/openListInstrumentos', 'refresh');
        }
    }

    public function deleteInstrumento($id_instrumento) {
        $this->load->model('InstrumentosModel');
        $resultado = $this->InstrumentosModel->eliminarInstrumento($id_instrumento);
        if ($resultado) {
            $_SESSION['mensaje'] = 'Se ha eliminado el instrumento correctamente';
            $_SESSION['tipo'] = 'success';
        } else {
            $_SESSION['mensaje'] = 'Ocurrió un error al eliminar el instrumento';
            $_SESSION['tipo'] = 'danger';
        }
        redirect('admin/Instrumento/openListInstrumentos', 'refresh');
    }
    
}
