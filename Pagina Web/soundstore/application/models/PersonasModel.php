<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonasModel extends CI_Model {

	public function getPersonaByEmail($email){
		$this->db->where('email', $email);
		$registros = $this->db->get('personas')->result();

		if (sizeof($registros)!=0) {
			return $registros[0];
		}else{
			return null;
		}
	}

	public function validarRegistro($cedula, $email){
		$this->db->select('*');
		$this->db->where("cedula", $cedula);
		$this->db->or_where("email", $email);
		$registros = $this->db->get('personas')->result();

		return (sizeof($registros)==0);
	}

	public function validarCedula($cedula){
		$this->db->select('*');
		$this->db->where("cedula", $cedula);
		$registros = $this->db->get('personas')->result();

		return (sizeof($registros)==0);
	}

	public function validarEmail($email){
		$this->db->select('*');
		$this->db->where("email", $email);
		$registros = $this->db->get('personas')->result();

		return (sizeof($registros)==0);
	}

	public function insertar($cedula, $nombres, $apellidos, $telefono, $direccion, $correo){
		$data = [
					'cedula' => $cedula,
					'nombres' => $nombres,
					'apellidos' => $apellidos,
					'telefono' => $telefono,
					'direccion' => $direccion,
					'email' => $correo,
					'foto' => 'default.png'
				];
				
		return $this->db->insert('personas', $data);
	}

	public function getListaPersonas(){
		return $this->db->get('personas')->result();
	}
	

	public function actualizarUsuario($cedula, $datos_actualizados) {
		// Actualizar los datos del usuario en la base de datos
		$this->db->where('cedula', $cedula);
		return $this->db->update('personas', $datos_actualizados);
	}
	
	public function openDeleteUsers($cedula) {
		// Carga el modelo de PersonasModel
		$this->load->model('PersonasModel');
		
		// Llama al método eliminarUsuario del modelo
		$result = $this->PersonasModel->eliminarUsuario($cedula);
		
		if ($result) {
			// Redirige a la página de lista de usuarios si la eliminación fue exitosa
			redirect('Inicio/openListUsers','refresh');
		} else {
			// Maneja el caso en el que la eliminación falló
			echo "Error al eliminar el usuario.";
		}
	}
	

}
