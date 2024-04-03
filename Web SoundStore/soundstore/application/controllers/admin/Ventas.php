<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('VentasModel');
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
		
		
		
	public function editarVentas($id_historial_compras) {
		$data['session'] = $this->session->userdata("session-mvc");
		$data['venta'] = $this->VentasModel->obtenerVentasPorId($id_historial_compras);
		$this->load->view('admin/editarVentas', $data);
	}

	public function guardarCambiosVentas() {
		$id_historial_compras = $this->input->post('id_historial_compras');
		$marca = $this->input->post('marca');
		$nombre = $this->input->post('nombre');
		$precio_unitario = $this->input->post('precio_unitario');
		$cantidad = $this->input->post('cantidad');
		$precio_total = $this->input->post('precio_total');
	

		$resultado = $this->VentasModel->actualizarVentas($id_historial_compras,$marca, $nombre, $precio_unitario, $cantidad, $precio_total);

		if ($resultado) {
			$this->session->set_flashdata('mensaje', 'Cambios guardados correctamente');
			$this->session->set_flashdata('tipo', 'success');
		} else {
			$this->session->set_flashdata('mensaje', 'Error al guardar los cambios');
			$this->session->set_flashdata('tipo', 'danger');
		}

		redirect('admin/Ventas/openListVentas', 'refresh');
	}
     

	public function cambiarEstadoVenta($id_historial_compras) {   

		$actualizacion = $this->VentasModel->cambiarEstadoVenta($id_historial_compras, 'INACTIVA');

		if ($actualizacion) {
			$this->session->set_flashdata('estado_cambiado', true);
			$this->session->set_flashdata('tipo', 'success');
		} else {
			
			$this->session->set_flashdata('estado_error', true);
			$this->session->set_flashdata('tipo', 'danger');
		}

		redirect('admin/Ventas/openListVentas', 'refresh');
	}

}

