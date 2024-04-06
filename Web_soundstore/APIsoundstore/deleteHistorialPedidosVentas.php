<?php
header("Access-Control-Allow-Origin: * "); // Permite el acceso desde cualquier origen, o usa "http://localhost" si solo quieres permitirlo desde localhost.
header("Access-Control-Allow-Methods: POST"); 
header("Access-Control-Allow-Headers: Content-Type");
include 'Conexion.php';


if (!empty($_POST['id_pedido'])) {
    $id_pedido = $_POST['id_pedido'];

    $consulta = $base_de_datos->prepare("DELETE FROM historial_pedidos_ventas WHERE id_pedido = :id_pedido");
    $consulta->bindParam(':id_pedido', $id_pedido);

    
    if ($consulta->execute()) {
        $respuesta = [
            'status' => true,
            'message' => 'El historial de pedidos y ventas se eliminó correctamente.'
        ];
    } else {
        $respuesta = [
            'status' => false,
            'message' => 'Error al eliminar el historial de pedidos y ventas.'
        ];
    }
} else {
    $respuesta = [
        'status' => false,
        'message' => 'No se proporcionó el ID del historial de pedidos y ventas a eliminar.'
    ];
}


echo json_encode($respuesta);
?>