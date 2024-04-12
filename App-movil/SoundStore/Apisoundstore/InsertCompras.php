<?php 
    
    include 'Conexion.php';

    if (!empty($_POST['marca']) && !empty($_POST['id_usuario']) && !empty($_POST['img_instrumento']) && !empty($_POST['nombre']) && !empty($_POST['precio_unitario']) 
        && !empty($_POST['cantidad']) && !empty($_POST['precio_total']) && !empty($_POST['estado']) ) {

        $marca = $_POST['marca'];
        $id_usuario = $_POST['id_usuario'];
        $img_instrumento = $_POST['img_instrumento'];
        $nombre = $_POST['nombre'];
        $precio_unitario = $_POST['precio_unitario'];
        $cantidad = $_POST['cantidad'];
        $precio_total = $_POST['precio_total'];
        $estado = $_POST['estado'];


        try {
            $consulta = $base_de_datos->prepare("INSERT INTO historial_compras (marca, id_usuario, img_instrumento, nombre, precio_unitario, cantidad, precio_total, estado)
            VALUES (:mar, :idu, :img, :nom, :prcu, :cnt, :prct, :est)");

            
            $consulta->bindParam(':mar', $marca);
            $consulta->bindParam(':idu', $id_usuario);
            $consulta->bindParam(':img', $img_instrumento);
            $consulta->bindParam(':nom', $nombre);
            $consulta->bindParam(':prcu', $precio_unitario);
            $consulta->bindParam(':cnt', $cantidad);
            $consulta->bindParam(':prct', $precio_total);
            $consulta->bindParam(':est', $estado);

            $proceso = $consulta->execute();

            if( $proceso ){
                $respuesta = [
                                'status' => true,
                                'mesagge' => "OK##SHOP##INSERT"
                              ];
                echo json_encode($respuesta);
            }else{
                $respuesta = [
                                'status' => false,
                                'mesagge' => "ERROR##SHOP##INSERT"
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
