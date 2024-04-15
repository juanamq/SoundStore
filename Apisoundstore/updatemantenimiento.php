<?php 
    // header("Access-Control-Allow-Origin: *"); // Permite el acceso desde cualquier origen, o usa "http://localhost" si solo quieres permitirlo desde localhost.
    // header("Access-Control-Allow-Methods: GET, POST");
    // header("Access-Control-Allow-Headers: Content-Type");
    
    include 'Conexion.php';

    if (!empty($_POST['id_mantenimiento'])) {

        $id_mantenimiento = $_POST['id_mantenimiento'];
        $id_usuario = $_POST['id_usuario'];
        $tipo_instrumento = $_POST['tipo_instrumento'];
        $marca = $_POST['marca'];
        $tiempo = $_POST['tiempo'];
        $fecha = $_POST['fecha'];
        $estado = $_POST['estado'];
        try {
            $consulta = $base_de_datos->prepare("UPDATE manteniento SET  id_usuario=:idu, tipo_instrumento=:tpi, marca=:mrc, tiempo=:tmp,fecha=:fch,estado=:est
            WHERE id_mantenimiento = :idm ");

            $consulta->bindParam(':idm', $id_mantenimiento);
            $consulta->bindParam(':idu', $id_usuario);
            $consulta->bindParam(':tpi', $tipo_instrumento);
            $consulta->bindParam(':mrc', $marca);
            $consulta->bindParam(':tmp', $tiempo);
            $consulta->bindParam(':fch', $fecha);
            $consulta->bindParam(':est', $estado);

            $proceso = $consulta->execute();

            if( $proceso ){
                $respuesta = [
                                'status' => true,
                                'mesagge' => "OK##CLIENT##INSERT"
                              ];
                echo json_encode($respuesta);
            }else{
                $respuesta = [
                                'status' => false,
                                'mesagge' => "ERROR##CLIENT##INSERT"
                              ];
                echo json_encode($respuesta);
            }
        } catch (Exception $e) {
            $respuesta = [
                            'status' => false,
                            'mesagge' => "ERROR##SQL",
                            'exception' => $e
                          ];
            echo json_encode($respuesta);
        }
    }else{
        $respuesta = [
                        'status' => false,
                        'mesagge' => "ERROR##DATOS##POST",
                        '$_GET' => $_GET,
                        '$_POST' => $_POST
                      ];
        echo json_encode($respuesta);
    }
?>
