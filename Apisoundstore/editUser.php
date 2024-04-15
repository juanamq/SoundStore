    <?php 

    include 'Conexion.php';

    if (!empty($_GET['id_usuario']) and !empty($_GET['nombre']) and !empty($_GET['apellido']) and !empty($_GET['email'])
        and !empty($_GET['direccion']) and !empty(md5($_GET['contrasena'])) and !empty($_GET['telefono']) and !empty($_GET['rol']) 
        and !empty($_GET['estado']) and !empty($_GET['fecha_registro'])) 
    {
        $id_usuario =  $_GET['id_usuario'];
        $nombre = $_GET['nombre'];
        $apellido = $_GET['apellido'];
        $email = $_GET['email'];
        $direccion = $_GET['direccion'];
        $telefono = $_GET['telefono'];
        $contrasena = $_GET['contrasena'];
        $rol = $_GET['rol'];
        $estado = $_GET['estado'];
        $fecha_registro = $_GET['fecha_registro'];

        try {
            $consulta = $base_de_datos->prepare("UPDATE usuarios SET nombre=:nom, apellido=:ape, email=:ema,
            direccion=:dir, telefono=:tel, contrasena=:con, rol=:rol,estado=:est, fecha_registro=:fec
            WHERE id_usuario = :id ");
            $consulta->bindParam(':id', $id_usuario);
            $consulta->bindParam(':nom', $nombre);
            $consulta->bindParam(':ape', $apellido);
            $consulta->bindParam(':ema', $email);
            $consulta->bindParam(':dir', $direccion);
            $consulta->bindParam(':tel', $telefono);
            $consulta->bindParam(':con', $contrasena);
            $consulta->bindParam(':rol', $rol);
            $consulta->bindParam(':est', $estado);
            $consulta->bindParam(':fec', $fecha_registro);
            
            $proceso = $consulta->execute();

            if( $proceso ){
                $respuesta = [
                                'status' => true,
                                'mesagge' => "OK##USER##UPDATE"
                              ];
                echo json_encode($respuesta);
            }else{
                $respuesta = [
                                'status' => false,
                                'mesagge' => "ERROR##USER##UPDATE"
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
