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

        // Carga la librería cURL si no está cargada
        if ( ! function_exists('curl_init')) {
            $this->load->library('curl');
        }
    }

    public function getInstrumentos() {
        // URL de la APIsoundstore para obtener instrumentos
        $url = 'http://APIsoundstore/getInstrumentos.php';

        // Inicializa cURL para realizar la solicitud
        $ch = curl_init($url);

        // Configura opciones de cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Agrega más opciones de configuración según sea necesario, como autenticación, encabezados, etc.

        // Ejecuta la solicitud cURL
        $response = curl_exec($ch);

        // Verifica si la solicitud fue exitosa
        if ($response === false) {
            // Si la solicitud falla, muestra un mensaje de error
            $error = curl_error($ch);
            echo "Error en la solicitud: " . $error;
        } else {
            // Si la solicitud es exitosa, decodifica la respuesta (asumiendo que es JSON)
            $data = json_decode($response, true);

            // Procesa los datos según sea necesario y pasa los datos a la vista
            $this->load->view('admin/verInstrumentos', ['instrumentos' => $data]);
        }

        // Cierra la sesión cURL
        curl_close($ch);
    }
}
