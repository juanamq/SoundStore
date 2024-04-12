<?php 
include 'Conexion.php';

if (!empty($_POST['cedula']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email'])
    && !empty($_POST['direccion']) && !empty($_POST['contrasena']) && !empty($_POST['telefono'])
    && !empty($_POST['tipo']) && !empty($_POST['estado'])) {

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];   
    $telefono = $_POST['telefono'];
    $contrasena = $_POST['contrasena']; 
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];

    $consulta_cedula = $base_de_datos->prepare("SELECT COUNT(*) AS total FROM personas WHERE cedula = :cedula");
    $consulta_cedula->bindParam(':cedula', $cedula);
    $consulta_cedula->execute();
    $resultado_cedula = $consulta_cedula->fetch(PDO::FETCH_ASSOC);

    if ($resultado_cedula['total'] > 0) {
        $respuesta = [
            'status' => false,
            'message' => "ERROR##CEDULA##EXISTE"
        ];
        echo json_encode($respuesta);
    } else {
        $consulta_correo = $base_de_datos->prepare("SELECT COUNT(*) AS total FROM personas WHERE email = :email");
        $consulta_correo->bindParam(':email', $email);
        $consulta_correo->execute();
        $resultado_correo = $consulta_correo->fetch(PDO::FETCH_ASSOC);

        if ($resultado_correo['total'] > 0) {
            $respuesta = [
                'status' => false,
                'message' => "ERROR##CORREO##EXISTE"
            ];
            echo json_encode($respuesta);
        } else {
            try {
                $base_de_datos->beginTransaction();

                $consulta_personas = $base_de_datos->prepare("INSERT INTO personas (cedula, nombres, apellidos, telefono, direccion, email)
                VALUES(:ced, :nom, :ape, :tel, :dir, :ema) ");
                $consulta_personas->bindParam(':ced', $cedula);
                $consulta_personas->bindParam(':nom', $nombre);
                $consulta_personas->bindParam(':ape', $apellido);
                $consulta_personas->bindParam(':tel', $telefono);
                $consulta_personas->bindParam(':dir', $direccion);   
                $consulta_personas->bindParam(':ema', $email);     
                $consulta_personas->execute();

                $consulta_usuarios = $base_de_datos->prepare("INSERT INTO usuarios (cedula, email, contrasena, tipo, estado)
                VALUES(:ced, :ema, :cont, :tip, :est) ");
                $consulta_usuarios->bindParam(':ced', $cedula);
                $consulta_usuarios->bindParam(':ema', $email);
                $consulta_usuarios->bindParam(':cont', $contrasena);
                $consulta_usuarios->bindParam(':tip', $tipo);
                $consulta_usuarios->bindParam(':est', $estado);
                $consulta_usuarios->execute();

                $base_de_datos->commit();

                $respuesta = [
                    'status' => true,
                    'message' => "OK##USER##INSERT"
                ];
                echo json_encode($respuesta);
            } catch (Exception $e) {
                $base_de_datos->rollBack();

                $respuesta = [
                    'status' => false,
                    'message' => "ERROR##SQL",
                    'exception' => $e
                ];
                echo json_encode($respuesta);
            }
        }
    }
} else {
    $respuesta = [
        'status' => false,
        'message' => "ERROR##DATOS##POST",
        '$_GET' => $_GET,
        '$_POST' => $_POST
    ];
    echo json_encode($respuesta);
}
?>
