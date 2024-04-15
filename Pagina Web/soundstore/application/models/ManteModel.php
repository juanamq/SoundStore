<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManteModel extends CI_Model {
	public $table = 'mantenimiento';
	
	public function obtenerMantenimiento() {
        return $this->db->get('mantenimiento')->result();
    }

	public function actualizarMantenimiento($id_mantenimiento, $estado) {
		$data = array(  
			'estado' => $estado
		);
	
		// Actualizar datos en la tabla mantenimiento
		$this->db->where('id_mantenimiento', $id_mantenimiento);
		return $this->db->update('mantenimiento', $data);
	}

	public function cambiarEstadoMantenimiento($id_mantenimiento, $estado_mante) {
		$data = array(  
			'estado_mante' => $estado_mante
		);
	
		$this->db->where('id_mantenimiento', $id_mantenimiento);
		return $this->db->update('mantenimiento', $data);
	}
	

	public function getProductoPorId($id_mantenimiento) {
		return $this->db->get_where('mantenimiento', array('id_mantenimiento' => $id_mantenimiento))->row();
	}

	public function eliminarInstrumento($id_mantenimiento) {
		$this->db->where('id_mantenimiento', $id_mantenimiento);
		return $this->db->delete('mantenimiento');
	}
	
	

	public function obtener_productos() {
        $this->load->database();
		$this->db->where('estado', 'ACTIVO');
        $query = $this->db->get('mantenimiento'); 
        return $query->result();
    }

	public function getProducto($id){
		$this->db->select("nombre_producto,precio_venta, cantidad_disponible, descripcion, img");
		$this->db->where('id_producto', $id);
		$registros = $this->db->get('mantenimiento')->result();

		if (sizeof($registros)!=0) {
			return $registros[0];
		}else{
			return null;
		}
	}
	
	
	public function obtenerId_producto($id_producto) {
		$this->db->select("id_producto, nombre_producto, precio_venta, cantidad_disponible, descripcion, fecha_vencimiento, tipo, img");
		$this->db->where('id_producto', $id_producto);
		$resultado = $this->db->get('mantenimiento')->row();

		return $resultado;
	}
	
    public function actualizarImagenProduct($imagen, $id_producto) {
        $tabla_agri = 'mantenimiento';
        $data = array(
            'img' => $imagen
        );
        $this->db->where('id_producto', $id_producto);

        // Actualizar datos en la tabla agricultores
        return $this->db->update($tabla_agri, $data);
    }
    



}
