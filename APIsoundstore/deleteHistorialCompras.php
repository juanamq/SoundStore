<?php
header("Access-Control-Allow-Origin: * "); // Permite el acceso desde cualquier origen, o usa "http://localhost" si solo quieres permitirlo desde localhost.
header("Access-Control-Allow-Methods: POST"); 
header("Access-Control-Allow-Headers: Content-Type");
include 'Conexion.php';


if (!empty($_POST['id_historial_compras'])) {
    
    $id_historial_compras = $_POST['id_historial_compras'];                                                                 

   
    $consulta = $base_de_datos->prepare("DELETE FROM historial_compras WHERE id_historial_compras = :id_historial_compras");
    $consulta->bindParam(':id_historial_compras', $id_historial_compras);

    
    if ($consulta->execute()) {
        $respuesta = [
            'status' => true,
            'message' => 'El historial de compras se eliminó correctamente.'
        ];
    } else {
        $respuesta = [
            'status' => false,
            'message' => 'Error al eliminar el historial de compras.'
        ];
    }
} else {
    $respuesta = [
        'status' => false,
        'message' => 'No se proporcionó el ID del historial de compras a eliminar.'
    ];
}


echo json_encode($respuesta);
?>