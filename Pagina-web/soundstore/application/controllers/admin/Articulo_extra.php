<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulo_extra extends CI_Controller {

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

	public function openCreateArticulos(){
		$data['session'] = $this->session->userdata("session-mvc");
		$this->load->view('admin/crearArticulo', $data);
	}

	// public function openListArticulos_extras() {
	// 	$data['session'] = $this->session->userdata("session-mvc");
	// 	$this->load->model('PersonasModel'); // Asegúrate de cargar el modelo
	// 	$data['Pedidos'] = $this->PersonasModel->getListaPersonas(); // Recupera los usuarios desde el modelo
	// 	$this->load->view('admin/verUsuarios', $data);
	// }
	

	// public function openEditArticulos_extras(){
	// 	$data['session'] = $this->session->userdata("session-mvc");
	// 	$this->load->view('admin/editarUsuarios', $data);
	// }

    public function openListArticulos_extras() {
        $data['session'] = $this->session->userdata("session-mvc");
        $this->load->model('ArticulosModel');
        $data['articulos_extras'] = $this->ArticulosModel->obtenerArticulos();
        $this->load->view('admin/verArticulosExtras', $data);
    }

	// public function openListArticulos_extras() {
    //     $data['session'] = $this->session->userdata("session-mvc");

    //     // Obtener datos de la API
    //     $api_url = "http://localhost/Apisoundstore/obtenerArticulosExtras.php";
    //     $response = file_get_contents($api_url);
    //     $data['articulos_extras'] = json_decode($response)->articulos_extras;

    //     // Cargar vista con datos
    //     $this->load->view('admin/verArticulosExtras', $data);

    // }

    public function createArticulos(){
        $nombre = $this->input->post('nuevo_nombre');
        $marca = $this->input->post('nuevo_marca');
        $stock = $this->input->post('nuevo_stock');
        $tipo = $this->input->post('nuevo_tipo');
        $color = $this->input->post('nuevo_color');
        $modelo = $this->input->post('nuevo_modelo');
        $precio = $this->input->post('nuevo_precio');
        $fecha_registro = date('Y-m-d H:i:s');
        $estado = $this->input->post('nuevo_estado');
        $foto = $_FILES['nuevo_foto']['name'];

        if (!empty($foto) && !empty($nombre) && !empty($marca) && !empty($stock) && !empty($tipo) && !empty($precio) && !empty($estado)) {
            $tipo_img = $_FILES['nuevo_foto']['type'];
            $temp = $_FILES['nuevo_foto']['tmp_name'];
    
            if (!((strpos($tipo_img,'gif') || strpos($tipo_img,'jpeg') || strpos($tipo_img,'png')))) {
                $_SESSION['mensaje'] = 'Solo se permite archivos jpeg, gif, png';
                $_SESSION['tipo'] = 'danger';
                redirect('admin/Articulo_extra/openListArticulos_extras', 'refresh');
            } else {
                $this->load->model('ArticulosModel');
                
                $resultado = $this->ArticulosModel->insertarArticulos($nombre, $marca, $stock, $foto, $tipo, $color, $modelo, $precio, $fecha_registro, $estado);
    
                if ($resultado) {
                    move_uploaded_file($temp, './dist/img/' . $foto);
                    $_SESSION['mensaje'] = 'Se ha creado el instrumento correctamente';
                    $_SESSION['tipo'] = 'success';
                    redirect('admin/Articulo_extra/openListArticulos_extras', 'refresh');
                } else {
                    $_SESSION['mensaje'] = 'Ocurrió un error en el servidor';
                    $_SESSION['tipo'] = 'danger';
                    redirect('admin/Articulo_extra/openListArticulos_extras', 'refresh');
                }
            }
        } else {
            $_SESSION['mensaje'] = 'Por favor complete todos los campos obligatorios';
            $_SESSION['tipo'] = 'danger';
            redirect('admin/Articulo_extra/openListArticulos_extras', 'refresh');
        }
    }


    public function openEditArticulos($id_articulo) {
        $data['session'] = $this->session->userdata("session-mvc");
        $this->load->model('ArticulosModel');
        $data['articulo_extra'] = $this->ArticulosModel->getProductoPorId($id_articulo);
        
        $this->load->view('admin/editar_Articulosextras', $data);
    }
    
    public function updateArticulos($id_articulo) {
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
            $this->load->model('ArticulosModel');
            
            $resultado = $this->ArticulosModel->actualizarArticulos($id_articulo, $nombre, $marca, $stock, $foto, $tipo, $color, $modelo, $precio, $fecha_registro);
            
            if ($resultado) {
                $_SESSION['mensaje'] = 'Se ha actualizado el articulo correctamente';
                $_SESSION['tipo'] = 'success';
                redirect('admin/Articulo_extra/openListArticulos_extras', 'refresh');
            } else {
                $_SESSION['mensaje'] = 'Ocurrió un error en el servidor';
                $_SESSION['tipo'] = 'danger';
                redirect('admin/Articulo_extra/openListArticulos_extras', 'refresh');
            }
        } else {
            $_SESSION['mensaje'] = 'Por favor complete todos los campos obligatorios';
            $_SESSION['tipo'] = 'danger';
            redirect('admin/Articulo_extra/openListArticulos_extras', 'refresh');
        }
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

    // public function deleteArticulos($id_articulo) {
    //     $this->load->model('ArticulosModel');
    //     $resultado = $this->ArticulosModel->eliminarArticulos($id_articulo);
    //     if ($resultado) {
    //         $_SESSION['mensaje'] = 'Se ha eliminado el articulo correctamente';
    //         $_SESSION['tipo'] = 'success';
    //     } else {
    //         $_SESSION['mensaje'] = 'Ocurrió un error al eliminar el articulo';
    //         $_SESSION['tipo'] = 'danger';
    //     }
    //     redirect('admin/Articulo_extra/openListArticulos_extras', 'refresh');

    // }

    public function deleteArticulos($id_articulo) {
        $this->load->model('ArticulosModel');
        $resultado = $this->ArticulosModel->cambiarEstadoArticulo($id_articulo, 'INACTIVO');
        if ($resultado) {
            $_SESSION['mensaje'] = 'Se ha cambiado el estado del instrumento correctamente';
            $_SESSION['tipo'] = 'success';
        } else {
            $_SESSION['mensaje'] = 'Ocurrió un error al cambiar el estado del instrumento';
            $_SESSION['tipo'] = 'danger';
        }
        redirect('admin/Articulo_extra/openListArticulos_extras', 'refresh');
    }
    
    public function activateArticulos($id_articulo) {
        $this->load->model('ArticulosModel');
        $resultado = $this->ArticulosModel->cambiarEstadoArticulo($id_articulo, 'ACTIVO');
        if ($resultado) {
            $_SESSION['mensaje'] = 'Se ha activado el instrumento correctamente';
            $_SESSION['tipo'] = 'success';
        } else {
            $_SESSION['mensaje'] = 'Ocurrió un error al activar el instrumento';
            $_SESSION['tipo'] = 'danger';
        }
        redirect('admin/Articulo_extra/openListArticulos_extras', 'refresh');
    }
}