<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstrumentosModel extends CI_Model {
	public $table = 'instrumentos';
	
	public function obtenerInstrumentos() {
        return $this->db->get('instrumentos')->result();
    }
	
	public function insertarInstrumento($nombre, $marca, $stock, $foto, $tipo, $color, $modelo, $precio, $fecha_registro) {
        $data = array(	
            'nombre' => $nombre,
			'marca' => $marca,
			'stock' => $stock,
			'foto' => $foto,
			'tipo' => $tipo,
			'color' => $color,
			'modelo' => $modelo,
            'precio' => $precio,
			'fecha_registro' => $fecha_registro
        );

        // Insertar datos en la tabla instrumentos
        return $this->db->insert('instrumentos', $data);
    }

	public function actualizarInstrumento($id_instrumento, $nombre, $marca, $stock, $foto, $tipo, $color, $modelo, $precio, $fecha_registro) {
		$data = array(  
			'nombre' => $nombre,
			'marca' => $marca,
			'stock' => $stock,
			'foto' => $foto,
			'tipo' => $tipo,
			'color' => $color,
			'modelo' => $modelo,
			'precio' => $precio,
			'fecha_registro' => $fecha_registro
		);
	
		// Actualizar datos en la tabla instrumentos
		$this->db->where('id_instrumento', $id_instrumento);
		return $this->db->update('instrumentos', $data);
	}

	public function getProductoPorId($id_instrumento) {
		return $this->db->get_where('instrumentos', array('id_instrumento' => $id_instrumento))->row();
	}

	public function eliminarInstrumento($id_instrumento) {
		$this->db->where('id_instrumento', $id_instrumento);
		return $this->db->delete('instrumentos');
	}
	
	

	public function obtener_productos() {
        $this->load->database();
		$this->db->where('estado', 'ACTIVO');
        $query = $this->db->get('instrumentos'); 
        return $query->result();
    }

	public function getProducto($id){
		$this->db->select("nombre_producto,precio_venta, cantidad_disponible, descripcion, img");
		$this->db->where('id_producto', $id);
		$registros = $this->db->get('instrumentos')->result();

		if (sizeof($registros)!=0) {
			return $registros[0];
		}else{
			return null;
		}
	}
	
	
	public function obtenerId_producto($id_producto) {
		$this->db->select("id_producto, nombre_producto, precio_venta, cantidad_disponible, descripcion, fecha_vencimiento, tipo, img");
		$this->db->where('id_producto', $id_producto);
		$resultado = $this->db->get('instrumentos')->row();

		return $resultado;
	}
	
    public function actualizarImagenProduct($imagen, $id_producto) {
        $tabla_agri = 'instrumentos';
        $data = array(
            'img' => $imagen
        );
        $this->db->where('id_producto', $id_producto);

        // Actualizar datos en la tabla agricultores
        return $this->db->update($tabla_agri, $data);
    }
    
	public function actualizarProducto($id_producto, $nombre_producto, $precio_venta, $cantidad_disponible, $descripcion, $fecha_vencimiento, $tipo) {
		$data = array(
			'nombre_producto' => $nombre_producto,
			'precio_venta' => $precio_venta,
			'cantidad_disponible' => $cantidad_disponible,
			'descripcion' => $descripcion,
			'fecha_vencimiento' => $fecha_vencimiento,
			'tipo' => $tipo
		);
	
		$this->db->where('id_producto', $id_producto);
		return $this->db->update('instrumentos', $data);
	}



}
