<?php
header("Access-Control-Allow-Origin: * "); // Permite el acceso desde cualquier origen, o usa "http://localhost" si solo quieres permitirlo desde localhost.
header("Access-Control-Allow-Methods: POST"); // Solo permitimos el método POST para actualizar registros.
header("Access-Control-Allow-Headers: Content-Type");
include 'Conexion.php';

// Verificar si se han enviado el ID del historial de pedidos y ventas y los datos actualizados mediante POST
if (!empty($_POST['id_pedido']) && !empty($_POST['id_instrumento']) && !empty($_POST['id_usuario']) && !empty($_POST['cliente']) && !empty($_POST['producto']) && !empty($_POST['direccion']) && !empty($_POST['cantidad']) && !empty($_POST['precio_total'])) {
    // Obtener los datos actualizados desde la solicitud POST
    $id_pedido = $_POST['id_pedido'];
    $id_instrumento = $_POST['id_instrumento'];
    $id_usuario = $_POST['id_usuario'];
    $cliente = $_POST['cliente'];
    $producto = $_POST['producto'];
    $direccion = $_POST['direccion'];
    $cantidad = $_POST['cantidad'];
    $precio_total = $_POST['precio_total'];

    // Preparar la consulta para actualizar el registro de historial de pedidos y ventas
    $consulta = $base_de_datos->prepare("UPDATE historial_pedidos_ventas SET id_instrumento = :id_instrumento, id_usuario = :id_usuario, cliente = :cliente, producto = :producto, direccion = :direccion, cantidad = :cantidad, precio_total = :precio_total WHERE id_pedido = :id_pedido");
    $consulta->bindParam(':id_pedido', $id_pedido);
    $consulta->bindParam(':id_instrumento', $id_instrumento);
    $consulta->bindParam(':id_usuario', $id_usuario);
    $consulta->bindParam(':cliente', $cliente);
    $consulta->bindParam(':producto', $producto);
    $consulta->bindParam(':direccion', $direccion);
    $consulta->bindParam(':cantidad', $cantidad);
    $consulta->bindParam(':precio_total', $precio_total);

    // Ejecutar la consulta
    if ($consulta->execute()) {
        $respuesta = [
            'status' => true,
            'message' => 'El historial de pedidos y ventas se actualizó correctamente.'
        ];
    } else {
        $respuesta = [
            'status' => false,
            'message' => 'Error al actualizar el historial de pedidos y ventas.'
        ];
    }
} else {
    $respuesta = [
        'status' => false,
        'message' => 'No se proporcionó el ID del historial de pedidos y ventas o los datos actualizados.'
    ];
}

// Devolver la respuesta en formato JSON
echo json_encode($respuesta);
?>