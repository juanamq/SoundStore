<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  PedidosModel extends CI_Model {


	public function obtenerPedidosPorId($id_pedido) {
		$this->db->select("id_pedido,id_instrumento, id_usuario, cliente, producto, direccion, cantidad, precio_total, fecha_pedido");
		$this->db->where('id_pedido', $id_pedido);
		$resultado = $this->db->get('historial_pedidos_ventas')->row();

		return $resultado;
	}

	public function actualizarPedidos($id_pedido, $id_instrumento, $id_usuario, $cliente, $producto, $direccion, $cantidad, $precio_total, $fecha_pedido) {
		$data = array(
  
			'id_instrumento' => $id_instrumento,
			'id_usuario' => $id_usuario,
			'cliente' => $cliente,
			'producto' => $producto,
			'direccion' => $direccion,
            'cantidad' => $cantidad,
            'precio_total' => $precio_total,
            'fecha_pedido' => $fecha_pedido,
		);
	
		$this->db->where('id_pedido', $id_pedido);
		return $this->db->update('historial_pedidos_ventas', $data);
	}


	public function cambiarEstadoPedido($id_pedido, $nuevo_estado) {
		$this->db->where('id_pedido', $id_pedido);
		$datos_actualizados = array('estado' => $nuevo_estado);
	
		return $this->db->update('historial_pedidos_ventas', $datos_actualizados);
	}
}
