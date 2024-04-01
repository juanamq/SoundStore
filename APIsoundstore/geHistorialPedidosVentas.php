<?php 
header("Access-Control-Allow-Origin: * "); // Permite el acceso desde cualquier origen, o usa "http://localhost" si solo quieres permitirlo desde localhost.
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");
include 'Conexion.php';

if (!empty($_GET['id_pedido'])) {
    $id_pedido = $_GET['id_pedido'];
    
    // Consulta para obtener el historial de pedidos y ventas
    $consulta_pedido = $base_de_datos->prepare("SELECT * FROM historial_pedidos_ventas WHERE id_pedido = :id_pedido");
    $consulta_pedido->bindParam(':id_pedido', $id_pedido);
    $consulta_pedido->execute();
    $pedido = $consulta_pedido->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontró el pedido
    if ($pedido) {
        // Construir respuesta con el pedido encontrado
        $respuesta = [
            'status' => true,
            'pedido' => $pedido
        ];
        echo json_encode($respuesta);
    } else {
        // Si no se encontró el pedido, devolver mensaje de error
        $respuesta = [
            'status' => false,
            'message' => "No se encontró ningún pedido con el ID proporcionado: $id_pedido"
        ];
        echo json_encode($respuesta);
    }
} else {
    // Si no se proporciona el parámetro id_pedido en la solicitud GET, devolver mensaje de error
    $respuesta = [
        'status' => false,
        'message' => "Falta el parámetro id_pedido en la solicitud GET"
    ];
    echo json_encode($respuesta);
}
?>