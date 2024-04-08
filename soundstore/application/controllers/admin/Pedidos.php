<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('PedidosModel');
	}

	
	public function openListPedidos() {
		$data['session'] = $this->session->userdata("session-mvc");

		// Obtener datos de la API
		$api_url = "http://localhost/Apisoundstore/ObtenerPedidos.php";
		$response = file_get_contents($api_url);
		$data['pedidos'] = json_decode($response)->registro_pedidos;

		// Cargar vista con datos
		$this->load->view('admin/historialPedidos', $data);
	}
		
		
		
	public function editarPedidos($id_pedido) {
		$data['session'] = $this->session->userdata("session-mvc");
		$data['pedido'] = $this->PedidosModel->obtenerPedidosPorId($id_pedido);
		$this->load->view('admin/editarPedidos', $data);
	}

	public function guardarCambiosPedidos() {
		$id_pedido = $this->input->post('id_pedido');
		$cliente = $this->input->post('cliente');
		$producto = $this->input->post('producto');
		$direccion = $this->input->post('direccion'); 
		$cantidad = $this->input->post('cantidad');
		$precio_total = $this->input->post('precio_total');
		$fecha_pedido = $this->input->post('fecha_pedido');

		
		$resultado = $this->PedidosModel->actualizarPedidos($id_pedido, $cliente, $producto, $direccion, $cantidad, $precio_total, $fecha_pedido);

		if ($resultado) {
			$this->session->set_flashdata('mensaje', 'Cambios guardados correctamente');
			$this->session->set_flashdata('tipo', 'success');
		} else {
			$this->session->set_flashdata('mensaje', 'Error al guardar los cambios');
			$this->session->set_flashdata('tipo', 'danger');
		}

		redirect('admin/Pedidos/openListPedidos', 'refresh');
	}
     

	public function cambiarEstadoPedido($id_pedido) {   

		$actualizacion = $this->PedidosModel->cambiarEstadoPedido($id_pedido, 'INACTIVA');

		if ($actualizacion) {
			$this->session->set_flashdata('estado_cambiado', true);
			$this->session->set_flashdata('tipo', 'success');
		} else {

			$this->session->set_flashdata('estado_error', true);
			$this->session->set_flashdata('tipo', 'danger');
		}

		redirect('admin/Pedidos/openListPedidos', 'refresh');
	}

}