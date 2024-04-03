<?php
    include 'Conexion.php';

    if (!empty($_GET['cedula'])) {
	    $consulta = $base_de_datos->query("SELECT * FROM personas WHERE cedula = ".$_GET['cedula']);
	    $datos = $consulta->fetchAll();
		echo json_encode((sizeof($datos)>0)? $datos[0] : $datos);
	}else{
        $respuesta = [
                        'status' => false,
                        'mesagge' => "ERROR##DATOS##GET",
                        '$_GET' => $_GET,
                        '$_POST' => $_POST
                      ];
        echo json_encode($respuesta);
    }
    
?>