<?php 
    
    include 'Conexion.php';

    if (!empty($_POST['id_usuario']) && !empty($_POST['tipo_instrumento']) && !empty($_POST['marca'])&& !empty($_POST['modelo'])
        && !empty($_POST['tiempo']) && !empty($_POST['fecha']) && !empty($_POST['estado']) ) {

        $id_usuario = $_POST['id_usuario'];
        $tipo_instrumento = $_POST['tipo_instrumento'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $tiempo = $_POST['tiempo'];
        $fecha = $_POST['fecha'];
        $estado = $_POST['estado'];


        try {
            $consulta = $base_de_datos->prepare("INSERT INTO mantenimiento (id_usuario, tipo_instrumento, marca, modelo, tiempo, fecha, estado)
            VALUES (:id, :tpi, :mar, :mod, :tim, :fec, :est)");

            $consulta->bindParam(':id', $id_usuario);
            $consulta->bindParam(':tpi', $tipo_instrumento);
            $consulta->bindParam(':mar', $marca);
            $consulta->bindParam(':mod', $modelo);
            $consulta->bindParam(':tim', $tiempo);
            $consulta->bindParam(':fec', $fecha);
            $consulta->bindParam(':est', $estado);
            $proceso = $consulta->execute();

            if( $proceso ){
                $respuesta = [
                                'status' => true,
                                'mesagge' => "OK##MAINTENANCE##INSERT"
                              ];
                echo json_encode($respuesta);
            }else{
                $respuesta = [
                                'status' => false,
                                'mesagge' => "ERROR##MAINTENANCE##INSERT"
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
