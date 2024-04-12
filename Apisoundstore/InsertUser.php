<?php 

include 'Conexion.php';

if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email'])
    && !empty($_POST['direccion']) && !empty($_POST['contrasena']) && !empty($_POST['telefono'])
    && !empty($_POST['rol']) && !empty($_POST['estado']) && !empty($_POST['fecha_registro'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];   
    $telefono = $_POST['telefono'];
    $contrasena = md5($_POST['contrasena']); 
    $rol = $_POST['rol'];
    $estado = $_POST['estado'];
    $fecha_registro = $_POST['fecha_registro'];

    
    $consulta_correo = $base_de_datos->prepare("SELECT COUNT(*) AS total FROM usuarios WHERE email = :email");
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

            if ($proceso) {
                $respuesta = [
                    'status' => true,
                    'message' => "OK##USER##INSERT"
                ];
                echo json_encode($respuesta);
            } else {
                $respuesta = [
                    'status' => false,
                    'message' => "ERROR##USER##INSERT"
                ];
                echo json_encode($respuesta);
            }
        } catch (Exception $e) {
            $respuesta = [
                'status' => false,
                'message' => "ERROR##SQL",
                'exception' => $e
            ];
            echo json_encode($respuesta);
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
