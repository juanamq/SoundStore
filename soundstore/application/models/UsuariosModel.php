<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model {

	public function validarIngreso($email, $password){
		$this->db->select('cedula, email, tipo');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('estado', 'ACTIVO');
		$registros = $this->db->get('usuarios')->result();
		// $registros = $this->db2->get('personas')->result();

		if (sizeof($registros)==0) {
			return false;
		}else{
			return true;
		}
	}

	public function getUsuarioByEmail($email){
		$this->db->select("cedula, tipo, estado");
		$this->db->where('email', $email);
		$registros = $this->db->get('usuarios')->result();

		if (sizeof($registros)!=0) {
			return $registros[0];
		}else{
			return null;
		}
	}

	public function insertar($cedula, $correo, $password, $tipo){
		$data = [
					'cedula' => $cedula,
					'email' => $correo,
					'password' => md5($password),
					'tipo' => $tipo,
					'estado' => 'ACTIVO'
				];
		return $this->db->insert('usuarios', $data);
	}

	
	public function obtenerClientePorCedula($cedula) {


		$this->db->select("cedula, nombres, apellidos, email, telefono, direccion");
		$this->db->where('cedula', $cedula);
		$datos_persona = $this->db->get('personas')->row();
	
		// Obtener datos de la tabla usuarios
		$this->db->select("id_usuario,estado, tipo");
		$this->db->where('cedula', $cedula);
		$datos_usuario = $this->db->get('usuarios')->row();
	
		// Combinar los resultados en un solo objeto
		$resultado = new stdClass();
		$resultado->cedula = $datos_persona->cedula;
		$resultado->nombres = $datos_persona->nombres;
		$resultado->apellidos = $datos_persona->apellidos;
		$resultado->email = $datos_persona->email;
		$resultado->telefono = $datos_persona->telefono;
		$resultado->direccion = $datos_persona->direccion;
		$resultado->estado = $datos_usuario->estado;
		$resultado->tipo = $datos_usuario->tipo;
	
		return $resultado;
	}

	public function actualizarCliente($cedula, $nombres, $apellidos, $email, $telefono, $direccion, $estado) {
		$data_usuarios = array(
			'email' => $email,
			'estado' => $estado
		);
	
		$data_personas = array(
			'nombres' => $nombres,
			'apellidos' => $apellidos,
			'telefono' => $telefono,
			'direccion' => $direccion,
			'email' => $email
		);

		$this->db->where('cedula', $cedula);
		$result_usuarios = $this->db->update('usuarios', $data_usuarios);
	
		$this->db->where('cedula', $cedula);
		$result_personas = $this->db->update('personas', $data_personas);
	
		return ($result_usuarios && $result_personas);
	}

	public function cambiarEstadoUsuario($cedula, $nuevo_estado) {
		$this->db->where('cedula', $cedula);
		$datos_actualizados = array('estado' => $nuevo_estado);
	
		return $this->db->update('usuarios', $datos_actualizados);
	}

}
