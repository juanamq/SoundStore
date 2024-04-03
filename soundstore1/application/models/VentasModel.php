<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  VentasModel extends CI_Model {


	public function obtenerVentasPorId($id_historial_compras) {
		$this->db->select("id_historial_compras,marca, nombre, precio_unitario, cantidad, precio_total");
		$this->db->where('id_historial_compras', $id_historial_compras);
		$resultado = $this->db->get('historial_compras')->row();

		return $resultado;
	}

	public function actualizarVentas($id_historial_compras,$marca, $nombre, $precio_unitario, $cantidad, $precio_total) {
		$data = array(
			'marca' => $marca,
			'nombre' => $nombre,
			'precio_unitario' => $precio_unitario,
			'cantidad' => $cantidad,
			'precio_total' => $precio_total,
		);
	
		$this->db->where('id_historial_compras', $id_historial_compras);
		return $this->db->update('historial_compras', $data);
	}


	public function cambiarEstadoVenta($id_historial_compras, $nuevo_estado) {
		$this->db->where('id_historial_compras', $id_historial_compras);
		$datos_actualizados = array('estado' => $nuevo_estado);
	
		return $this->db->update('historial_compras', $datos_actualizados);
	}
}
