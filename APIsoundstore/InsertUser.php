<?php 

    include 'Conexion.php';

    if (!empty($_POST['nombre']) and !empty($_POST['apellido']) and !empty($_POST['email'])
        and !empty($_POST['direccion']) and !empty(md5($_POST['contrasena'])) and !empty($_POST['telefono'])
        and !empty($_POST['rol']) and !empty($_POST['estado']) and !empty($_POST['fecha_registro'])) {

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $direccion = $_POST['direccion'];   
            $telefono = $_POST['telefono'];
            $contrasena = $_POST['contrasena'];
            $rol = $_POST['rol'];
            $estado = $_POST['estado'];
            $fecha_registro = $_POST['fecha_registro'];

        try {
            $consulta = $base_de_datos->prepare("INSERT INTO usuarios (nombre, apellido, email, direccion, contrasena, telefono, rol, estado, fecha_registro)
            VALUES(:nom, :ape, :ema, :dir, :cont, :tel, :rol, :est, :fec) ");

            $consulta->bindParam(':nom', $nombre);
            $consulta->bindParam(':ape', $apellido);
            $consulta->bindParam(':ema', $email);
            $consulta->bindParam(':dir', $direccion);
            $consulta->bindParam(':cont', $contrasena);
            $consulta->bindParam(':tel', $telefono); 
            $consulta->bindParam(':rol', $rol);       
            $consulta->bindParam(':est', $estado);
            $consulta->bindParam(':fec', $fecha_registro);
            
            $proceso = $consulta->execute();

            if( $proceso ){
                $respuesta = [
                                'status' => true,
                                'mesagge' => "OK##USER##INSERT"
                              ];
                echo json_encode($respuesta);
            }else{
                $respuesta = [
                                'status' => false,
                                'mesagge' => "ERROR##USER##INSERT"
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
