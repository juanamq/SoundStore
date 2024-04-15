<?php 

    include 'Conexion.php';

    if (!empty($_GET['id_usuario'])) {
        $id_usuario = $_GET['id_usuario'];
        try {
            $consulta = $base_de_datos->prepare("UPDATE usuarios SET estado = 'INACTIVO'
            WHERE id_usuario = :id");
            $consulta->bindParam(':id', $id_usuario);
            $proceso = $consulta->execute();

            if( $proceso ){
                $respuesta = [
                                'status' => true,
                                'mesagge' => "OK##USER##DELETE"
                              ];
                echo json_encode($respuesta);
            }else{
                $respuesta = [
                                'status' => false,
                                'mesagge' => "ERROR##USER##DELETE"
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
